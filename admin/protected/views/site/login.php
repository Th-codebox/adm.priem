<?php
$this->pageTitle=Yii::app()->name . ' - Вход';

if($_SERVER['REQUEST_URI']=="/index.php/site/login" || $_SERVER['REQUEST_URI'] == "/site/login.html"){
  header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
}

?>


<?php echo CHtml::beginForm(); ?>
  
  <div><?php echo CHtml::errorSummary($model); ?></div>
  
  <div class="row">
    <?php echo CHtml::activeTextField($model,'username',array('class'=>'textfield')); ?>
    <?php echo CHtml::activeLabelEx($model,'Логин',array('for'=>'LoginForm_username')); ?>
  </div>
  <div class="row">
    <?php echo CHtml::activePasswordField($model,'password',array('class'=>'textfield')); ?>
    <?php echo CHtml::activeLabelEx($model,'Пароль',array('for'=>'LoginForm_password')); ?>
  </div>
  <div class="row">
    <input class="button" type="image" src="/img/but_login.gif" alt="Войти" />
  </div>
	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabel($model,'Запомнить',array('for'=>'LoginForm_rememberMe')); ?>
	</div>

	<!--div class="row submit">
		<?php echo CHtml::submitButton('Войти'); ?>
	</div-->

<?php echo CHtml::endForm(); ?>


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>

