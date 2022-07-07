<h1>Отзыв Сертификата</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
</ul><!-- actions -->

<div class="form">
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<li>Серийный номер: <?php echo $model->serial ?>
<li>Имя пользователя: <?php echo $model->common_name ?>
<li>Емайл: <?php echo $model->email ?>
<li>Подразделение<?php echo $model->unit ?>
<li>Организация:<?php echo $model->organization ?>
<li>Город: <?php echo $model->locality ?>
<li>Регион: <?php echo $model->province ?>
<li>Страна: <?php echo $model->country ?>

<div class="row submit">
<?php echo CHtml::submitButton('Отозвать'); ?>
<?php echo CHtml::submitButton('Отмена'); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->