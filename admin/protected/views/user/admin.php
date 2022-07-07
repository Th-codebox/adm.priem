<?php
$this->breadcrumbs=array(
	'Users'
);
?>
<h1>Пользователи</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Добавить',array('create')); ?></li>
</ul>
<!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'NAME',
		'LOGIN',
		/*
		'PASSWORD',
		*/
		'EMAIL',
		/*
		'ACTIVE',
		'CREATE_TIME',
		'MODIFY_TIME',
		'CREATE_BY',
		'MODIFY_BY',
		'JOB',
		'COMPANY',
		'STATUS',
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
));




?>


