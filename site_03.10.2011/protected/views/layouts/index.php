<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="ru" />
  <!--base href="<?php echo Yii::app()->request->baseUrl; ?>" /-->
  
  <link rel="stylesheet" type="text/css" href="/css/style.css?v=2" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
  
  <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="/css/iefix.css" />
  <![endif]-->
  
  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  
</head>  
<body class="mainpage">  

<table class="main-cont">
  <tr>
    <td class="main-cont-b">

<!-- \\\header\\\ -->
<div class="header">
  <div class="header-b">

<div class="logo">
  <img class="ie6hide" src="/img/gerb.png" alt="Петрозаводск" height="114" width="90" />
  <!--[if lt IE 7]>
    <img style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/img/gerb.png',sizingMethod='crop');" src="/img/transp.gif" alt="Петрозаводск" height="114" width="90" />
  <![endif]-->
  <br />
  <img class="ie6hide" src="/img/head_title.png" alt="<?php echo CHtml::encode($this->pageTitle); ?>" height="59" width="606" />
  <!--[if lt IE 7]>
    <img style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/img/head_title.png',sizingMethod='crop');" src="/img/transp.gif" alt="<?php echo CHtml::encode($this->pageTitle); ?>" height="59" width="606" />
  <![endif]-->
</div>

<!-- main menu -->
<div class="main-menu">
  <div class="main-menu-b">
  <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Об электронной приёмной', 'url'=>array('/site/about')),
				array('label'=>'Задать вопрос', 'url'=>array('/site/contact')),
				array('label'=>'Получить ответ', 'url'=>array('/site/answer')),
				array('label'=>'Обращения', 'url'=>array('/site/questions')),
				//array('label'=>'Вопросы и ответы', 'url'=>array('/site/faq')),
			),
		)); ?>
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
<div class="mp-left-col">
  <div class="padding">
  
<div class="mp-buttons">
  <a class="button-quest" href="/site/contact.html">Задать вопрос</a>
  <a class="button-answ" href="/site/answer.html">Получить ответ</a>
</div>

<div class="clear"></div>

<div class="quest-icn">
  <img class="ie6hide" src="/img/icn_quest.png" alt="" height="151" width="191" />
  <!--[if lt IE 7]>
    <img style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/img/icn_quest.png',sizingMethod='crop');" src="/img/transp.gif" alt="" height="151" width="191" />
  <![endif]-->
</div>

  </div>
  <br class="clear none" />
</div>
<!-- ///left col/// -->

<!-- \\\center col\\\ -->
<div class="mp-center-col">
  <div class="padding">

<img src="/img/mp_title01.gif" alt="Добро пожаловать!" height="21" width="167" />

<?php echo $content; ?>

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
        <a class="mw-logo" href="http://mediaweb.ru" target="_blank"><img src="/img/mw_logo.gif" width="27" height="27" alt="" /></a>
        <a href="http://mediaweb.ru" target="_blank">Создание сайта</a><br /><a href="http://mediaweb.ru" target="_blank">&copy; 2009, Студия Медиавеб</a>
      <br><br>
<!--- COUNTERS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->

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
<br><br>
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

      &copy; 2001-2011 &laquo;Администрация Петрозаводского городского округа&raquo;<br />Все права защищены.
      <br /><br />
      фото Сергея Потехина
    
    </div>
  </div>
</div>
<!-- ///footer/// -->

</body>  
</html> 