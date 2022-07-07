<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->ID,
);
?>
<h1 class="noprint">Просмотр обращения #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список обращений',array('index')); ?></li>
	<li><?php echo CHtml::link('Редактор обращения',array('update','id'=>$model->ID)); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
/*
		'ID',
		'RUBR',
*/
		array(
			'label'=>'Категория',
			'value'=>($model->section->NAME) ? $model->section->NAME : CHtml::tag('font',array('color'=>'red'),'Не указана'),
			'type'=>'html'
		), 

		array(
			'label'=>'Кому',
			'value'=>$model->member->full_name,
		), 

		'FIRSTNAME',
		'SECONDNAME',

		array(
			'name'=>'FIRDNAME',
			'value'=>($model->FIRDNAME) ? $model->FIRDNAME : CHtml::tag('font',array('color'=>'red'),'Не указано'),
			'type'=>'html'
		), 

		array(
			'name'=>'JOB',
			'value'=>($model->JOB) ? $model->JOB : CHtml::tag('font',array('color'=>'red'),'Не указан'),
			'type'=>'html'
		), 

		array(
			'name'=>'POL',
			'value'=>($model->POL) ? (($model->POL == 'F') ? "Женский" : "Мужской") : CHtml::tag('font',array('color'=>'red'),'Не указан'),
			'type'=>'html'
		), 

		array(
			'name'=>'AGE',
			'value'=>($model->AGE) ? $model->AGE : CHtml::tag('font',array('color'=>'red'),'Не указан'),
			'type'=>'html'
		), 

		'P_INDEX',
		'CITY',
		'STREET',
		'HOUSE',
		'FLAT',

		array(
			'name'=>'EMAIL',
			'value'=>($model->EMAIL) ? $model->EMAIL : CHtml::tag('font',array('color'=>'red'),'Не указан'),
			'type'=>'html'
		), 

		array(
			'name'=>'TELEPHONE',
			'value'=>($model->TELEPHONE) ? $model->TELEPHONE : CHtml::tag('font',array('color'=>'red'),'Не указан'),
			'type'=>'html'
		), 

		'DESCRIPTION',

		array(
			'name'=>'ANSWER',
			'value'=>($model->ANSWER) ? $model->ANSWER : CHtml::tag('font',array('color'=>'red'),'Не задан'),
			'type'=>'html'
		), 
/*

		'SEND_EMAIL',
		'STATUS',
		'SYSTEM_STATUS',
		'CREATE_TIME',
		'PUBLISH_TIME',
		'OPERATOR',
		'ADMIN_COMMENT',
		'OPERATOR_COMMENT',
		'USER_PASSWORD',
*/
	),
)); ?>

<?php echo CHtml::label('Прикреплённые файлы:','Files'); ?>
<?php foreach ($model->files as $record):?>
	<li>
		<?php echo CHtml::Link($record->NAME, array('file','id'=>$record->ID)) ?> (<?php echo $record->SIZE;?> Кб)</a>
	</li>
<?php endforeach ?>


<div class="print"><a href="#" onclick="window.print();return false">Печать</a></div>



