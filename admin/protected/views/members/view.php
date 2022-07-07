<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->name,
);
?>
<h1>Просмотр сотрудника #<?php echo $model->id; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
#		'id',
		'name',
		array(
			'label' => 'Активность',	
			'value' => ($model->active == 1) ? 'Активный':'Не активный',
		),
		'morder',
		array(
			'label' => 'Создан',
			'value' => $model->user->NAME, 
		),
		array(
			'label' => 'Изменён',
			'value' => $model->user_m->NAME, 
		),
		'create_time',
		'modify_time',
	),
)); ?>
