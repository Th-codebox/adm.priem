<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
?>
<h1>Добавление пользователя</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список пользователей',array('index')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>



