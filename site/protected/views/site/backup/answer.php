<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Получить ответ</h1>

<div class="form">

<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Идентификатор сообщения'); ?>
		<?php echo CHtml::activeTextField($model,'ID'); ?>
		<?php echo CHtml::error($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Пароль'); ?>
		<?php echo CHtml::activePasswordField($model,'PASSWORD'); ?>
		<?php echo CHtml::error($model,'PASSWORD'); ?>
	</div>


	<div class="row submit">
		<?php echo CHtml::submitButton('Запрос'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div>

<?php 
	if ($cnt == 0) {
?>
		<p>По вашему запросу не обнаружено ни одного обращения</p>
<?php 
	}	
?>

<?php 
	if ($cnt > 0) {
		foreach ($questions as $record) {
?>
			<p>
				<div><b>Категория:</b> <?php echo $record->section->NAME;?></div>
				<div><b>Время подачи вопроса:</b> <?php echo $record->CREATE_TIME;?></div>
				<div><b>Вопрос:</b> <?php echo $record->DESCRIPTION;?></div>
				<div><b>Ответственный:</b> <?php echo $record->user->NAME;?></div>
				<div><b>Ответ:</b> <?php echo $record->ANSWER;?></div>
				<div><b>Время публикации:</b> <?php echo $record->PUBLISH_TIME;?></div>
				<div>****************************************************************************************************</div>
			</p>
<?php 
		}
	}
?>