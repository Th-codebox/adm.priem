<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->NAME,
);
?>
<h1>Просмотр пользователя #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
	<li><?php echo CHtml::link('Редактировать',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Удалить',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'LOGIN',
		'PASSWORD',
		'EMAIL',
		'ACTIVE',
		'CREATE_TIME',
		'MODIFY_TIME',
		'CREATE_BY',
		'MODIFY_BY',
		'JOB',
		'COMPANY',
		'STATUS',
	),
)); ?>
