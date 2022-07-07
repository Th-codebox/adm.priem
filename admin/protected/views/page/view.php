<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->NAME,
);
?>
<h1>Просмотр страницы &quot;<?php echo $model->NAME; ?>&quot;</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Редактировать',array('update','id'=>$model->ID)); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NAME',
		'DESCRIPTION:html',
	),
)); ?>
