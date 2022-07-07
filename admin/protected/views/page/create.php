<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Create',
);
?>
<h1>Добавление страницы</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
