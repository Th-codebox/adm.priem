<h1>Просмотр сертификата</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
<?php if (!$model->revoked):?>
	<li><?php echo CHtml::link('Скачать',array('download', 'serial'=>$model->serial)); ?></li>
<?php else :?>
	<li><?php echo CHtml::link('Обновить',array('renew', 'serial'=>$model->serial)); ?></li>
<?php endif ?>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'serial',
		'common_name',
		'email',
	),
)); ?>

<?php if ($model->revoked) echo '<h2 style="color:red;">Отозван: '.date('d-m-Y', $model->revoked).'</h2>' ?>
<pre style="overflow:scroll; height:600px;">
<?php echo $model->certText ?>
</pre>