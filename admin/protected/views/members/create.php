<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);
?>
<h1>Добавление сотрудника</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>