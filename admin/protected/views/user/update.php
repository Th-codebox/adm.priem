<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Редактор пользователя <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
	<li><?php echo CHtml::link('Просмотр',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Удалить',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>