<h1><?php echo (isset($_GET['serial'])) ? 'Обновить': 'Добавить' ?> сертификат</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
