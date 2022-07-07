<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->NAME,
);
?>
<h1>Просмотр рубрики #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список рубрик',array('index')); ?></li>
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
	<li><?php echo CHtml::link('Редактировать',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Удалить',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
/*		'ID',
*/
		'NAME',
		array(
			'label' => 'Активность',	
			'value' => ($model->ACTIVE == 'Y') ? 'Активный':'Не активный',
		),
		'CREATE_TIME',
		'MODIFY_TIME',
		array(
			'label' => 'Создан',
			'value' => $model->user->NAME, 
		),
		array(
			'label' => 'Изменён',
			'value' => $model->user_m->NAME, 
		),
		'MORDER',
	),
)); ?>
