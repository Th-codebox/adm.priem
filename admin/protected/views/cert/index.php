<?php
$this->breadcrumbs=array(
	'Cert',
);?>

<h1>Управление сертификатами</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
</ul><!-- actions -->

<?php
$colors = array('Valid'=>'green','Revoked'=>'red','Expired'=>'orange');
$names = array('Valid'=>'Действующий','Revoked'=>'Отозванный','Expired'=>'Просроченный');
?>


<div>
  <center>
  <form action="<?php echo CHtml::normalizeUrl(array('index'))?>" method=get name=filter>
    Поиск: <input type=text name=search value="<?php echo htmlentities($_GET['search'])?>" style="font-size: 11px;" maxlength=60 size=30>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=checkbox name=show_valid value="V"<?php if($_GET['show_valid']) echo ' checked' ?>>Действующие
    &nbsp&nbsp<input type=checkbox name=show_revoked value="R"<?php if($_GET['show_revoked']) echo ' checked' ?>>Отозванные
    &nbsp&nbsp<input type=checkbox name=show_expired value="E"<?php if($_GET['show_expired']) echo ' checked' ?>>Просроченные
    &nbsp&nbsp&nbsp&nbsp&nbsp<input type=submit value="Искать" style="font-size: 11px;">
  </form>
  </center>
</div>

<table class="data-table">
<tr>
<?php foreach($headings as $field=>$head): ?>
  <th class="<?php if($sortfield==$field && $order=='A'){ ?>desc<?php }elseif($sortfield==$field && $order=='D'){ ?>asc<?php } if($field=='status'){echo" first";}?>">
    <?php
    echo CHtml::link($head, array('index', 'sortfield'=>$field, 'order'=>($sortfield==$field && $order=='A')?'D':'A', 'search'=>$search, 'show_valid'=>$_GET['show_valid'], 'show_revoked'=>$_GET['show_valid'], 'show_expired'=>$_GET['show_expired']));
    //if ($sortfield == $field)
    	//echo ' '.CHtml::link('<img width="15" src="/img/arrow-'.$order.'.gif" alt="'.$order.'">', array('index', 'sortfield'=>$field, 'order'=>($order=='A')?'D':'A', 'search'=>$search, 'show_valid'=>$_GET['show_valid'], 'show_revoked'=>$_GET['show_valid'], 'show_expired'=>$_GET['show_expired']));
    ?>
  </th>
<?php endforeach ?>
  <th class="last"></th>
</tr>

<?php foreach($data as $id=>$row):?>
<tr>
<td style="color:<?php echo $colors[$row['status']] ?>"><b><?php echo $names[$row['status']] ?></b></td>
<td style="white-space: nowrap"><?php echo date('d-m-Y', $row['issued']) ?></td>
<td style="white-space: nowrap"><?php echo date('d-m-Y', $row['expires']) ?></td>
<td><?php echo $row['common_name'] ?></td>
<td style="white-space: nowrap"><a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a></td>
<td><?php echo $row['organization'] ?></td>
<td><?php echo $row['unit'] ?></td>
<td><?php echo $row['locality'] ?></td>
<td>
<?php
echo CHtml::link('<img src="/img/view.png" alt="view" title="Посмотреть содержимое сертификата.">', array('cert/view','serial'=>$row['serial']));
if ($row['status'] == 'Valid') {
	echo CHtml::link('<img src="/img/download.png" alt="download" title="Скачать  личный ключ или сертификат.">', array('cert/download','serial'=>$row['serial']));
	echo CHtml::link('<img src="/img/revoke.png" alt="revoke" title="Отозвать сертификат.">', array('cert/revoke','serial'=>$row['serial']));
}
echo CHtml::link('<img src="/img/renew.png" alt="renew" title="Обновить сертификат.">', array('cert/renew','serial'=>$row['serial']));
?>
</td>
</tr>
<?php endforeach ?>
</table>
