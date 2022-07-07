<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Обращения</h1>
<h2>Подробная статистика</h2>

<div class="form">

<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Категория'); ?>
		<?php echo CHtml::activeDropDownlist($model,'RUBR',$rubrs); ?>
		<?php echo CHtml::error($model,'RUBR'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Дата1'); ?>
		<?php echo CHtml::activeTextField($model,'DT1'); ?>
		<?php echo CHtml::error($model,'DT1'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'Дата2'); ?>
		<?php echo CHtml::activeTextField($model,'DT2'); ?>
		<?php echo CHtml::error($model,'DT2'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Показать'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div>

<?php 
	foreach ($questions as $record) {
?>
		<p>
			<div><b>Вопрос:</b> <?php echo $record->DESCRIPTION;?></div>
			<div><b>Ответ:</b> <?php echo $record->ANSWER;?></div>
			<div>****************************************************************************************************</div>
		</p>
<?php 
	}
?>


<p>
<?php echo CHtml::link('Назад',array('site/questions')); ?> 
</p>