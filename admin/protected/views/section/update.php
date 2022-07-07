<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Редактор рубрики <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список рубрик',array('index')); ?></li>
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
	<li><?php echo CHtml::link('Смотреть',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Редактировать',array('update','id'=>$model->ID)); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


