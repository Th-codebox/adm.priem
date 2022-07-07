<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Редактор обращения <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список обращений',array('index')); ?></li>
	<li><?php echo CHtml::link('Просмотр',array('view','id'=>$model->ID)); ?></li>
</ul>

<div><a href="javascript:history.back()">&laquo; Назад</a></div>
<br /><br />

<?php echo $this->renderPartial('_form', array('model'=>$model,'rubrs'=>$rubrs,'operators'=>$operators, 'status'=>$status, 'members'=>$members, 'comments'=>$comments, 'chekeds'=>$chekeds)); ?>

