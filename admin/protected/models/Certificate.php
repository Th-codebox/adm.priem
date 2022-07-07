<?php


class Certificate extends CFormModel
{
	/**
	 * The followings are the available columns
	 * @var integer $serial
	 * @var string $status
	 * @var string $issued
	 * @var string $expires
	 * @var string $common_name
	 * @var string $email
	 * @var string $unit
	 * @var string $organization
	 * @var string $locality
	 * @var string $passwd
	 * @var string $passwd_repeat
	 */

	private $_config;
	private $_cnf_file;

	public $serial;
	public $status;
	public $issued;
	public $expires;
	public $revoked;
	public $expiry;
	public $common_name;
	public $email;
	public $unit;
	public $organization;
	public $locality;
	public $province;
	public $country;
	public $passwd;
	public $passwd_repeat;
	public $key_size;
	public $cert_type;

	private $_cert_text;

	function __destruct() {
		$this->_clearCnf();
//		parent::__destruct();
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('common_name, unit, organization, locality, province, country, email', 'required'),
			array('expiry, keysize', 'numerical'),
			array('expiry, keysize, cert_type', 'required', 'on'=>'create'),
//			array('expiry, keysize, cert_type', 'safe'),
			array('email', 'email'),
			array('country', 'length', 'is'=>2),
			array('passwd', 'compare', 'message'=>'Пароли не совпадают!', 'allowEmpty'=>true, 'compareAttribute'=>'passwd_repeat'),
			array('passwd, passwd_repeat','length', 'max'=>12),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'serial' => 'Serial',
			'status' => 'Status',
			'issued' => 'Issued',
			'expires' => 'Expires',
			'common_name' => 'Имя пользователя или адрес сервера',
			'email' => 'Электронная почта',
			'unit' => 'Подразделение',
			'organization' => 'Организация',
			'locality' => 'Город',
			'province' => 'Регион',
			'country' => 'Страна',
			'passwd' => 'Пароль сертификата',
			'expiry' => 'Срок действия',
			'keysize' => 'Длина сертификата',
			'cert_type' => 'Тип сертификата',
		);
	}

	public function getList($search = '', $sortField = 'expired', $order ='A')
	{
		$config = $this->getConfig();

		// Prepend a default status to search string if missing.
		if (! preg_match('/^\^\[.*\]/', $search)) $search = '^[VRE].*'.$search;

		if (preg_match('/^\^\[.*V.*\]/',$search)) $inclval = true;
		if (preg_match('/^\^\[.*R.*\]/',$search)) $inclrev = true;
		if (preg_match('/^\^\[.*E.*\]/',$search)) $inclexp = true;

		// There isn't really a status of 'E' in the openssl index.
		// Change (E)xpired to (V)alid within the search string.
		$search = preg_replace('/^(\^\[.*)E(.*\])/','\\1V\\2', $search);

		$db = array();

		exec('egrep -i '.escapeshellarg($search).' '.$config['index'], $x);
		foreach($x as $y) {
			$i = $this->_explodeEntry($y);
			if (($i['status'] == "Valid" && $inclval) || ($i['status'] == "Revoked" && $inclrev) || ($i['status'] == "Expired" && $inclexp))
				$db[$i['serial']] = $i;
		}
		return $this->_csort($db, $sortField, ($order=='A')?SORT_ASC:SORT_DESC);

	}

	public function getEntry($serial) {
		$config = $this->getConfig();
		$regexp = "^[VR]\t.*\t.*\t$serial\t.*\t.*$";
        $x = exec('egrep '.escapeshellarg($regexp).' '.$config['index']);
		if ($x) {
			$item = $this->_explodeEntry($x);
			$this->setAttributes($item, false);
			$this->getCert_type();
			$this->getKeysize();
			return $item;
		}
		else {
			return false;
		}
	}

	public function getConfig()
	{
		if ($this->_config === null) {
			$this->_config = Yii::app()->params['ssl'];
		}
		return $this->_config;

	}

	public function readDefaults()
	{
		$cfg = $this->getConfig();
		$file = $cfg['dir'] . '/defaults.sav';
		$ret = array();
		if (file_exists($file)) {
			$ret = unserialize(file_get_contents($file));
		}
		if (!$ret) {
			$ret = $cfg['defValues'];
		}
		$this->setAttributes($ret, false);
	}

	public function saveDefaults()
	{
		$cfg = $this->getConfig();
		$file = $cfg['dir'] . '/defaults.sav';
		// serialize current fields to $file
		file_put_contents($file,serialize($this->attributes));
	}

	public function find($email='', $name='')
	{

		$cfg = $this->getConfig();
		$email = escapeshellcmd($email);
		$name = escapeshellcmd($name);
		$regexp = "^[V].*CN=$name/(Email|emailAddress)=$email";
        $x = exec('egrep -i '.escapeshellcmd($regexp).' '.$cfg['index']);
        if ($x) {
			list($j,$j,$j,$serial,$j,$j) = explode("\t", $x);
			return $serial;
		}
		else
			return false;
	}

	public function createCert()
	{
		$config = $this->getConfig();

		$fd = fopen($config['index'],"a");
		flock($fd, LOCK_EX);

		$serial = trim(implode('',file($config['serial'])));

		$userkey   = $config['private_dir'].'/'.$serial.'-key.pem';
		$userreq   = $config['req_dir'].'/'.$serial.'-req.pem';
		$usercert  = $config['new_certs_dir'].'/'.$serial.'.pem';
		$userder   = $config['cert_dir'].'/'.$serial.'.der';
		$userpfx   = $config['pfx_dir'].'/'.$serial.'.pfx';

		$expiry_days = round($this->expiry * 365.25, 0);
	    # Escape certain dangerous characters in user input
	    $email         = escapeshellcmd($this->email);
	    $passwd        = escapeshellarg($this->passwd);
	    $friendly_name = escapeshellarg($this->common_name);
		$extension = $this->cert_type . '_ext';

		$cnf_file = $this->_createCnf();

		unset($cmd_output);
		$cmd_output[] = 'Creating certifcate request.';

		if ($passwd) {
			exec("openssl req -new -newkey rsa:$keysize -keyout '$userkey' -out '$userreq' -config '$cnf_file' -days '$expiry_days' -passout pass:$passwd  2>&1", $cmd_output, $ret);
		}
		else {
			exec("openssl req -new -newkey rsa:$keysize -keyout '$userkey' -out '$userreq' -config '$cnf_file' -days '$expiry_days' -nodes 2>&1", $cmd_output, $ret);
		}

		if ($ret == 0) {
			unset($cmd_output);
			$cmd_output[] = "Signing $this->cert_type certifcate request.";
			exec("openssl ca -config '$cnf_file' -in '$userreq' -out /dev/null -notext -days '$expiry_days' -passin pass:'$config[ca_pwd]' -batch -extensions $extension 2>&1", $cmd_output, $ret);
		}

		if ($ret == 0) {
			unset($cmd_output);
			$cmd_output[] = "Creating DER format certifcate.";
			exec("openssl x509 -in '$usercert' -out '$userder' -inform PEM -outform DER 2>&1", $cmd_output, $ret);
		}

		if ($ret == 0) {
			unset($cmd_output);
			$cmd_output[] = "Creating PKCS12 format certifcate.";
			if ($passwd) {
				$cmd_output[] = "infile: $usercert   keyfile: $userkey   outfile: $userpfx  pass: $passwd";
				exec("RANDFILE='$config[random]' openssl pkcs12 -export -in '$usercert' -inkey '$userkey' -certfile '$config[cacert_pem]' -caname '$config[organization]' -out '$userpfx' -name $friendly_name -rand '$config[random]' -passin pass:$passwd -passout pass:$passwd  2>&1", $cmd_output, $ret);
			}
			else {
				$cmd_output[] = "infile: $usercert	keyfile: $userkey	outfile: $userpfx";
				$cmd_output[] =  "RANDFILE='$config[random]' openssl pkcs12 -export -in '$usercert' -inkey '$userkey' -certfile '$config[cacert_pem]' -caname '$config[organization]' -out '$userpfx' -name $friendly_name 2>&1";
				exec("RANDFILE='$config[random]' openssl pkcs12 -export -in '$usercert' -inkey '$userkey' -certfile '$config[cacert_pem]' -caname '$config[organization]' -out '$userpfx' -name $friendly_name  -passout pass: 2>&1", $cmd_output, $ret);
			}
		}

		fclose($fd);
		$this->_clearCnf();

		if ($ret == 0) {
			return $serial;
		}
		else {
			$this->_removeCert($serial);
			$this->addError('serial',join("<br>\n", $cmd_output));
			return false;
		}
	}

	private function _removeCert($serial) {
		$config = $this->getConfig();

		$userreq  = $config['req_dir'].'/'.$serial.'-req.pem';
		$userkey  = $config['private_dir'].'/'.$serial.'-key.pem';
		$usercert = $config['new_certs_dir'].'/'.$serial.'.pem';
		$userder  = $config['cert_dir'].'/'.$serial.'.der';
		$userpfx  = $config['pfx_dir'].'/'.$serial.'.pfx';


		# Wait here if another user has the database locked.
		$fd = fopen($config['index'],'a');
		flock($fd, LOCK_EX);

		if( file_exists($userreq))  unlink($userreq);
		if( file_exists($userkey))  unlink($userkey);
		if( file_exists($usercert)) unlink($usercert);
		if( file_exists($userder))  unlink($userder);
		if( file_exists($userpfx))  unlink($userpfx);

		$tmpfile = $config['index'].'.tmp';
		copy($config['index'], $tmpfile);

		$regexp = "^[VR]\t.*\t.*\t".$serial."\t.*\t.*$";
		exec('egrep -v '.escapeshellarg($regexp)." $tmpfile > $config[index] 2>/dev/null");

		unlink($tmpfile);
		fclose($fd);
	}

	private function _createCnf() {
		if ($this->_cnf_file && file_exists($this->_cnf_file))
			return $this->_cnf_file;

		$config = $this->getConfig();
		$issuer = $config['issuer'];

		$cnf_contents = "
HOME             = $config[dir]
RANDFILE         = $config[dir]/.rnd
dir	             = $config[dir]
certs            = $config[cert_dir]
crl_dir	         = $config[crl_dir]
database         = $config[index]
new_certs_dir    = $config[new_certs_dir]
private_dir      = $config[private_dir]
serial           = $config[serial]
certificate      = $config[cacert_pem]
crl              = $config[cacrl_pem]
private_key      = $config[cakey]
crl_extentions	 = crl_ext
default_days     = 365
default_crl_days = 30
preserve         = no
default_md       = md5

[ req ]
default_bits        = $this->keysize
string_mask         = nombstr
prompt              = no
distinguished_name  = req_name
req_extensions      = req_ext

[ req_name ]
C=$this->country
ST=$this->province
L=$this->locality
0.O=$this->organization
OU=$this->unit
CN=$this->common_name
emailAddress=$this->email

[ ca ]
default_ca             = email_cert

[ email_cert ]
x509_extensions        = email_ext
default_days           = 365
policy                 = policy_supplied

[ server_cert ]
x509_extensions        = server_ext
default_days           = 1095
policy                 = policy_supplied

[ policy_supplied ]
countryName            = supplied
stateOrProvinceName    = supplied
localityName           = supplied
organizationName       = supplied
organizationalUnitName = supplied
commonName             = supplied
emailAddress           = supplied

[ req_ext]
basicConstraints = CA:false

[ crl_ext ]
issuerAltName=issuer:copy
authorityKeyIdentifier=keyid:always,issuer:always

[ email_ext ]
basicConstraints       = critical, CA:false
keyUsage               = critical, nonRepudiation, digitalSignature, keyEncipherment
extendedKeyUsage       = critical, emailProtection, clientAuth
nsCertType             = critical, client, email
subjectKeyIdentifier   = hash
authorityKeyIdentifier = keyid:always, issuer:always
subjectAltName         = email:copy
issuerAltName          = issuer:copy

[ server_ext ]
basicConstraints        = critical, CA:false
keyUsage                = critical, digitalSignature, keyEncipherment
nsCertType              = critical, server
extendedKeyUsage        = critical, serverAuth
subjectKeyIdentifier    = hash
authorityKeyIdentifier  = keyid:always, issuer:always
issuerAltName           = issuer:copy
";

		$cnf_file  = ($this->_cnf_file) ? $this->_cnf_file : tempnam($config['dir'].'/tmp','cnf-');
		file_put_contents($cnf_file, $cnf_contents);
		return($cnf_file);
	}

	private function _csort($array, $column, $order = SORT_ASC)
	{
	    if (sizeof($array) == 0) return $array;

	    foreach($array as $x) $sortarr[]=$x[$column];

	    array_multisort($sortarr, $order, $array);

	    return $array;
	}

	private function _explodeEntry($dbentry)
	{
		$a = explode("\t", $dbentry);
		$b1  = preg_split('!/([A-Za-z]+)=!', $a[5], -1, PREG_SPLIT_DELIM_CAPTURE);
		while ($k = next($b1))
			$b[$k] = next($b1);


		switch ($a[0]) {
		case "V":
			$db['status'] = "Valid";
			$db['revoked'] = 0;
			break;
		case "R":
			$db['status'] = "Revoked";
			sscanf($a[2], "%2s%2s%2s",$yy,$mm,$dd);
			$db['revoked'] = strtotime("$mm/$dd/$yy");
			break;
		}

		sscanf($this->_certStartDate($a[3]),"%s %s %s %s", $mm,$dd,$tt,$yy);
		$db['issued'] = strtotime("$dd $mm $yy");

		sscanf($a[1], '%2s%2s%2s',$yy,$mm,$dd);
		$db['expires'] = strtotime("$mm/$dd/$yy");


		$db['expiry'] = date('Y', $db['expires']) - date('Y', $db['issued']);

		if (time() > strtotime("$mm/$dd/$yy"))
			$db['status'] = "Expired";

		$db['serial']       = $a[3];
		$db['country']      = $b['C'];
		$db['province']     = $b['ST'];
		$db['locality']     = $b['L'];
		$db['organization'] = $b['O'];
		$db['unit']	        = $b['OU'];
		$db['common_name']  = $b['CN'];
		$db['email']        = $b['emailAddress'];

		return $db;
	}

	private function _certStartDate($serial) {
		$certfile = $this->_config['new_certs_dir'] . '/' . $serial . '.pem';
		$x = exec('openssl x509 -in '.escapeshellarg($certfile).' -noout -startdate 2>&1');
		return(str_replace('notBefore=','',$x));
	}

	public function getCert_type() {
		if ($this->cert_type)
			return $this->cert_type;

		$certtext = $this->getCertText();

		if (ereg('SSL.* (E.?mail|Personal) .*Certificate', $certtext) && ereg('Code Signing', $certtest)) {
			$this->cert_type = 'email_codesigning';
		}
		if (ereg('SSL.* (E.?mail|Personal) .*Certificate', $certtext)) {
			$this->cert_type = 'email';
		}
		elseif (ereg('SSL.* Server .*Certificate', $certtext)) {
			$this->cert_type = 'server';
		}
		elseif (ereg('timeStamping|Time Stamping', $certtext)) {
			$this->cert_type = 'time_stamping';
		}
		elseif (ereg('TLS Web Client Authentication', $certtext) && ereg('TLS Web Server Authentication', $certtext)) {
			$this->cert_type = 'vpn_client_server';
		}
		elseif (ereg('TLS Web Client Authentication', $certtext)) {
			$this->cert_type = 'vpn_client';
		}
		elseif (ereg('TLS Web Server Authentication', $certtext)) {
			$this->cert_type = 'vpn_server';
		}
		else {
			$this->cert_type = 'vpn_client_server';
		}

		return $this->cert_type;
	}

	public function setCert_type($val = 'email')
	{
// !!! check value
		$this->cert_type = $val;
	}

	public function getKeysize() {
		if ($this->key_size)
			return $this->key_size;

		$certtext = $this->getCertText();
		if( preg_match('/RSA Public Key: \((\d+) bit\)/s', $certtext, $matches))
			$this->setKeysize($matches[1]);

		return $this->key_size;
	}

	public function setKeysize($val)
	{
// !!! check value
		$this->key_size = intval($val);
	}

	public function getCertText() {
		if ($this->_cert_text)
			return $this->_cert_text;

		$config = $this->getConfig();
		$certfile = $config['new_certs_dir'] . '/' . $this->serial . '.pem';
		$this->_cert_text = shell_exec($config['openssl'].' x509 -in '.escapeshellarg($certfile).' -text -purpose 2>&1');
		return $this->_cert_text;
	}

	public function sendCert($type = 'PEMKEY')
	{
		$config = $this->getConfig();
		$serial = $this->serial;

		$ctype = 'application/octet-stream';
		$destName = $this->common_name.' ('.$this->email.').';
		$content = '';

		switch ($type) {
		case 'PKCS#12':
			$content = file_get_contents("$config[pfx_dir]/$serial.pfx");
			$destName .= 'p12';
			$ctype = 'application/x-pkcs12';
			break;
		case 'PEMCERT':
			$content = file_get_contents("$config[new_certs_dir]/$serial.pem");
			$destName .= 'pem';
			$ctype = 'application/pkix-cert';
			break;
		case 'PEMKEY':
			$content = file_get_contents("$config[private_dir]/$serial-key.pem");
			$destName .= 'pem';
			break;
		case 'PEMBUNDLE':
			$content = file_get_contents("$config[private_dir]/$serial-key.pem")
					 . file_get_contents("$config[new_certs_dir]/$serial.pem");
			$destName .= 'pem';
			break;
		case 'PEMCABUNDLE':
			$content = file_get_contents("$config[private_dir]/$serial-key.pem")
					 . file_get_contents("$config[new_certs_dir]/$serial.pem")
					 . file_get_contents($config['cacert_pem']);
			$destName .= 'pem';
			break;
		default:
			throw new CHttpException(404, 'Invalid type: '.$type);
		}

		CHttpRequest::sendFile($destName, $content, $ctype, true);
	}

	public function revoke() {
		$config = $this->getConfig();

		$fd = fopen($config['index'],'a');
		flock($fd, LOCK_EX);

		$certfile     = $config['new_certs_dir'] . "/$this->serial.pem";
		$cnf_file = $this->_createCnf();

		$cmd_output[] = 'Revoking the certificate.';
		exec($config['openssl']." ca -config '$cnf_file' -revoke ".escapeshellarg($certfile)." -passin pass:'$config[ca_pwd]' 2>&1", $cmd_output, $ret);

		fclose($fd);
		$this->_clearCnf();

		if ($ret == 0) {
			unset($cmd_output);
			return $this->generateCrl();
		}

		$this->addError('serial', join("\n", $cmd_output));
		return false;
	}

	public function generateCrl() {
		$config = $this->getConfig();
		$cnf_file = $this->_createCnf();
		$ret = 0;
		$cmd_output[] = "Generating Certificate Revocation List.";
		exec($config['openssl']." ca -gencrl -config '$cnf_file' -out '$config[cacrl_pem]' -passin pass:'$config[ca_pwd]' 2>&1", $cmd_output, $ret);

		if ($ret == 0) {
			unset($cmd_output);
			$cmd_output[] = "Creating DER format Certificate Revocation List.";
			exec($config['openssl']." crl -in '$config[cacrl_pem]' -out '$config[cacrl_der]' -inform PEM -outform DER 2>&1", $cmd_output, $ret);
		}

		if ($ret)
			$this->addError('serial', join("\n", $cmd_output));

		return ($ret == 0);
	}

	private function _clearCnf() {
		if ($this->_cnf_file && file_exists($this->_cnf_file)) unlink($this->_cnf_file);
	}
}