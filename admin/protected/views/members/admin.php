<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);
?>
<h1>Сотрудники</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Создать',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'name',

        array(
			'name'=>'active',
			'value'=>'($data->active == 1) ? "<img src=/img/clean.png>" : "<img src=/img/deletered.png>"',
			'type'=>'html',
		),

		/*
		'active',
		*/
		'morder',
		/*
		'create_by',
		'modify_by',
		*/
		'create_time',
		'modify_time',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100','align'=>'center'),
			'viewButtonImageUrl'=>'/img/magnigy.png',
      'updateButtonImageUrl'=>'/img/icn_edit.gif',
			'deleteButtonImageUrl'=>'/img/icn_delete.gif'
		),
	),
	'cssFile' => false,
	'pager' => array('cssFile'=> false),
)); ?>
