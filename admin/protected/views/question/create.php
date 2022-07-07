<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);
?>
<h1>Добавление обращения</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список обращений',array('index')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model,'rubrs'=>$rubrs,'operators'=>$operators)); ?>