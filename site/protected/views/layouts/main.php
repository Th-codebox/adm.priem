<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Электронная приемная Администрации Петрозаводского городского округа</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="Content-Language" content="ru-RU" />
  
  <link rel="stylesheet" type="text/css" href="/css/style.css?v=2" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
  
  <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="/css/iefix.css" />
  <![endif]-->
  
  <!--script src="/js/jquery-1.4.min.js" type="text/javascript"></script-->
  
  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  
  <script type="text/javascript" src="/js/script.js"></script>
  
  <link type="text/css" href="/js/jquery-ui-1.7-datepicker/css/overcast/jquery-ui-1.7.2.custom_valid.css" rel="stylesheet" />
  <script type="text/javascript" src="/js/jquery-ui-1.7-datepicker/js/jquery-ui-1.7.2.custom.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui-1.7-datepicker/js/ui.datepicker-ru.js"></script>
   
  
</head>  
<body class="innerpage">  

<table class="main-cont">
  <tr>
    <td class="main-cont-b">


<!-- \\\header\\\ -->
<div class="header">
  <div class="header-b">

<div class="logo">
  <a href="/"><img class="ie6hide" src="/img/gerb.png" alt="Петрозаводск" height="114" width="90" /></a>
  <!--[if lt IE 7]>
    <a href="/"><img style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/img/gerb.png',sizingMethod='crop');" src="/img/transp.gif" alt="Петрозаводск" height="114" width="90" /></a>
  <![endif]-->
  <br />
  <a href="/"><img class="ie6hide" src="/img/head_title.png" alt="<?php echo CHtml::encode($this->pageTitle); ?>" height="59" width="606" /></a>
  <!--[if lt IE 7]>
    <a href="/"><img style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/img/head_title.png',sizingMethod='crop');" src="/img/transp.gif" alt="<?php echo CHtml::encode($this->pageTitle); ?>" height="59" width="606" /></a>
  <![endif]-->
</div>

<!-- main menu -->
<div class="main-menu">
  <div class="main-menu-b">
  <?php 
//  Yii::beginProfile('11');
  $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Об электронной приёмной', 'url'=>array('/site/about')),
				array('label'=>'Подать обращение', 'url'=>array('/site/contact')),
				array('label'=>'Получить ответ', 'url'=>array('/site/answer')),
				//array('label'=>'Обращения', 'url'=>array('/site/questions')),
				//array('label'=>'Вопросы и ответы', 'url'=>array('/site/faq')),
			),
		)); 
//		Yii::endProfile('11');
		?>
  </div>
</div>
<!-- /main menu -->

  </div>
</div>
<!-- ///header/// -->

<div class="main-cont-c">

<!-- conteiner1 -->
<div class="conteiner1">

<!-- \\\left col\\\ -->
<div class="left-col">
  <div class="padding">

<!-- left menu -->  
<div class="left-menu">
  <div class="left-menu-b">
  
	<?php 
//	Yii::beginProfile('12');
	if (Yii::app()->params['menu'][$this->getAction()->id]) $this->widget('zii.widgets.CMenu',array('items'=> Yii::app()->params['menu'][$this->getAction()->id])); 
//	Yii::endProfile('12');
	?>
	
  </div>
</div>
<!-- /left menu -->

<!-- search -->
<div class="sideblock">
  <div class="sideblock-b">

<div class="search">

<!-- <h2>Поиск</h2>

<form action="/search.html">
  <input class="textfield" type="text" name="query" value="" />
  <input type="submit" value="Искать" />
</form>
-->
</div>
  
  </div>
</div>
<!-- /search --> 


<!-- tags cloud -->
<!--<div class="tagscloud">
  <div class="tagscloud-b">
    <div class="tagscloud-c">

<?php 
//Yii::beginProfile('33');
		/* function ucmp($a, $b)
		{
		    return strcmp($b["count"], $a["count"]);
		}

		$tags = Question::model()->getAllTagsWithModelsCount();
		usort($tags,"ucmp");
		foreach($tags as $tag) { 
		  $total += $tag['count'];	
		}
		if ($total>0) {
			$k=1;
			foreach($tags as $tag) {
				if ($k>20) 
					break;
				$size=8+(int)(16*$tag['count']/($total+10));	
				echo "
				<span class=\"tag\" style=\"font-size:".$size."pt\"><a href=\"/site/findquestions/keyword/".$tag['name']."\">".$tag['name']."</a></span>
				";
				$k++;
			}
		} */
//Yii::endProfile('33');
?>



    </div>
  </div>
</div> -->

<!-- /tags cloud -->

  </div>
  <br class="clear none" />
</div>
<!-- ///left col/// -->

<!-- \\\center col\\\ -->
<div class="center-col">
  <div class="padding">

<?php 

//Yii::beginProfile('14');
echo $content; 

//Yii::endProfile('14');
?>
   
  </div>
  <br class="clear" />
</div>
<!-- ///center col/// -->

</div>
<!-- /conteiner1 -->

</div>


    </td>
  </tr>
</table>


<!-- \\\footer\\\ -->
<div class="footer">
  <div class="footer-b">
    <div class="foot-right">

      <div class="mw-copy">
        <a class="mw-logo" href="http://mediaweb.ru" target="_blank"><img src="/img/mw_logo2.gif" width="27" height="27" alt="" /></a>
        <a href="http://mediaweb.ru" target="_blank">Создание сайта</a><br /><a href="http://mediaweb.ru" target="_blank">&copy; 2009, Студия Медиавеб</a>

<!--- COUNTERS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<br><br>
<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=9759214&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/9759214/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:9759214,type:0,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter9759214 = new Ya.Metrika({id:9759214, enableAll: true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/9759214" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- begin of Top100 code -->

<script id="top100Counter" type="text/javascript" src="https://scounter.rambler.ru/top100.jcn?2550717"></script>
<noscript>
<a href="http://top100.rambler.ru/navi/2550717/">
<img src="https://scounter.rambler.ru/top100.cnt?2550717" alt="Rambler's Top100" border="0" />
</a>

</noscript>
<!-- end of Top100 code -->

<!--- COUNTERS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->      



</div>

    </div>
    <div class="copyrights">

      &copy; 2005-2015 &laquo;Администрация Петрозаводского городского округа&raquo;<br />Все права защищены. 
    
    </div>
  </div>
</div>
<!-- ///footer/// -->

</body>  
</html>