<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Редактор сотрудника <?php echo $model->id; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список рубрик',array('index')); ?></li>
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
	<li><?php echo CHtml::link('Смотреть',array('view','id'=>$model->id)); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>