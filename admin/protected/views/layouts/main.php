<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="Content-Language" content="ru-RU" />
  
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen,projection" />
  <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
  
  <link rel="stylesheet" type="text/css" href="/js/jquery-ui-1.7-datepicker/css/overcast/jquery-ui-1.7.2.custom_valid.css" />
  
  <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="/css/iefix.css" />
  <![endif]-->

  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  
  <script src="/js/jquery-ui-1.7-datepicker/js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
  <script src="/js/jquery-ui-1.7-datepicker/js/ui.datepicker-ru.js" type="text/javascript"></script>
  <script src="/js/script.js" type="text/javascript"></script>
  
</head>
<body>  

<!-- main-cont -->
<div class="main-cont">

<!-- \\\header\\\ -->
<div class="header">
  <div class="header-b">
    
    <div class="welcome">
      <div>
        <span class="gray">Добро пожаловать,</span>
        <?php echo Yii::app()->user->NAME; ?>
        <br />
        <small class="red">(<?php echo Yii::app()->user->role; ?>)</small>
      </div>
      <div class="user-nav">
      
        <?php if(!Yii::app()->user->isGuest){ ?>
          <div class="float-r"><a href="/index.php/site/logout">выход</a></div>
        <?php } ?>
        
        <!--a class="link-profil" href="#">профиль</a>
        &nbsp;
        <a class="link-comments" href="#">сообщения</a-->
      </div>
    </div>
    
    <img class="ie6hide noprint" src="/img/logo2.png" alt="<?php echo CHtml::encode(Yii::app()->name); ?>" height="74" width="305" />
    
    <!--[if lt IE 7]>
      <img class="noprint" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/img/logo2.png',sizingMethod='crop');" src="/img/transp.gif" alt="Электронная приемная. Раздел администрирования." height="74" width="305" />
    <![endif]-->
    
    <img class="printed" src="/img/logo2_p.png" alt="<?php echo CHtml::encode(Yii::app()->name); ?>" height="74" width="305" />
    
  </div>
</div>
<!-- ///header/// -->

<!-- conteiner1 -->
<div class="conteiner1">
<!-- \\\left col\\\ -->
<div class="left-col">
  <div class="padding">
  
<!-- main menu -->
<div class="main-menu">

		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=> Yii::app()->params['menu'][Yii::app()->user->role],
		)); ?>

</div>
<!-- /main menu -->


  </div>
  <br class="clear none" />
</div>
<!-- ///left col/// -->

<!-- \\\center col\\\ -->
<div class="center-col">
  <div class="center-col-b">
    <div class="padding">

	

<!--
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?>
-->


		<?php echo $content; ?>


    </div>
  </div>
  <br class="clear" />
</div>
<!-- ///center col/// -->

</div>
<!-- /conteiner1 -->

  <br class="clear none" />
</div>
<!-- /main-cont -->

<!-- \\\footer\\\ -->
<div class="footer">
  <div class="footer-b">
    <div class="foot-left">
      <img src="/img/verisign.gif" alt="VeriSign Secured" height="51" width="104" />
    </div>
    <div class="foot-right">
      <div class="mw-copy">
        <a class="mw-logo" href="http://mediaweb.ru" target="_blank"><img src="/img/mw_logo.gif" width="27" height="27" alt="" /></a>
        <a href="http://mediaweb.ru" target="_blank">Создание сайта</a>
        <br />
        <a href="http://mediaweb.ru" target="_blank">&copy; 2009, Студия Медиавеб</a>
      </div>
    </div>
    <div class="foot-center">
      &copy; 2009-2011 «Администрация Петрозаводского городского округа»
    </div>
  </div>
</div>
<!-- ///footer/// -->

</body>  
</html>