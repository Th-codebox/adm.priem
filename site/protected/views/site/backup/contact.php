<?php
$this->pageTitle=Yii::app()->name . ' - Задать вопрос';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Задать вопрос</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>Здесь вы можете задать нам свой вопрос</p>

<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Все поля обязательны для заполнения</p>

	<p><b>Условия по отправке вопроса</b></p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::label('Вы согласны?','agree',array('required'=>1)); ?>
		<?php echo CHtml::CheckBox('agree',false,array('value'=>1)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Категория'); ?>
		<?php echo CHtml::activeDropDownlist($model,'RUBR',$rubrs); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Вопрос'); ?>
		<?php echo CHtml::activeTextArea($model,'DESCRIPTION',array('cols'=>45,'rows'=>7)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Статус обращения'); ?>
		<?php echo CHtml::activeDropDownlist($model,'STATUS',array('0'=>'Ответить лично','1'=>'Публиковать ответ общедоступно')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Фамилия'); ?>
		<?php echo CHtml::activeTextField($model,'FIRSTNAME'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Имя'); ?>
		<?php echo CHtml::activeTextField($model,'SECONDNAME'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Отчество'); ?>
		<?php echo CHtml::activeTextField($model,'FIRDNAME'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Род занятий'); ?>
		<?php echo CHtml::activeTextField($model,'JOB'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Пол'); ?>
		<?php echo CHtml::activeDropDownlist($model,'POL',array(''=>'','M'=>'М','F'=>'Ж')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Возраст'); ?>
		<?php echo CHtml::activeTextField($model,'AGE'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Почтовый индекс'); ?>
		<?php echo CHtml::activeTextField($model,'P_INDEX'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Город'); ?>
		<?php echo CHtml::activeTextField($model,'CITY'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Улица'); ?>
		<?php echo CHtml::activeTextField($model,'STREET'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Дом'); ?>
		<?php echo CHtml::activeTextField($model,'HOUSE'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Квартира'); ?>
		<?php echo CHtml::activeTextField($model,'FLAT'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'E-mail'); ?>
		<?php echo CHtml::activeTextField($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Телефон'); ?>
		<?php echo CHtml::activeTextField($model,'TELEPHONE'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Хочу получать уведомления по электронной почте о ходе рассмотрения моего обращения'); ?>
		<?php echo CHtml::activeCheckBox($model,'SEND_EMAIL',array('value'=>1)); ?>
	</div>

	<?php if(extension_loaded('gd')): ?>
	<div class="row">
		<?php echo CHtml::label('Укажите код на картинке','verifyCode',array('required'=>1)); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo CHtml::TextField('verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
	</div>
	<?php endif; ?>

	<div class="row submit">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php endif; ?>