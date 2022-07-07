<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Редактирование страницы &quot;<?php echo $model->NAME; ?>&quot;</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Просмотр',array('view','id'=>$model->ID)); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>