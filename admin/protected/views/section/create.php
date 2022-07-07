<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	'Create',
);
?>
<h1>Добавление рубрики</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список рубрик',array('index')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>