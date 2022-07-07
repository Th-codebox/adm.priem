<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	'Manage',
);
?>
<h1>Рубрикатор</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
</ul>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'NAME',

        array(
			'name'=>'ACTIVE',
			'value'=>'($data->ACTIVE == "Y") ? "<img src=/img/clean.png>" : "<img src=/img/deletered.png>"',
			'type'=>'html',
		),

		/*
		'ACTIVE',
		*/

		'CREATE_TIME',
		'MODIFY_TIME',
		/*
		'CREATE_BY',
		'MODIFY_BY',
		'MORDER',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100','align'=>'center'),
			'viewButtonImageUrl'=>'/img/magnigy.png',
      'updateButtonImageUrl'=>'/img/icn_edit.gif',
			'deleteButtonImageUrl'=>'/img/icn_delete.gif'
		),
	),
	'cssFile' => false,
	'pager' => array('cssFile' => false),
	'pagerCssClass' => 'pages'
)); ?>
