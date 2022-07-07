<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);
?>
<h1>Страницы</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
//		'ID',
		'NAME',
//		'DESCRIPTION',
		array(
		  'template'=>'{view} {update}',
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100','align'=>'center'),
			'viewButtonImageUrl'=>'/img/magnigy.png',
      'updateButtonImageUrl'=>'/img/icn_edit.gif',
			'deleteButtonImageUrl'=>'/img/icn_delete.gif'
		),
	),
)); ?>
