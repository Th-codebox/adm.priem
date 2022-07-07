<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Обращения</h1>

<p><b>Последние обращения</b></p>

<?php 
	foreach ($last_questions as $record) {
?>
		<p>
			<div><b>Категория:</b> <?php echo $record->section->NAME;?></div>
			<div><b>Вопрос:</b> <?php echo $record->DESCRIPTION;?></div>
			<div><b>Ответ:</b> <?php echo $record->ANSWER;?></div>
			<div>****************************************************************************************************</div>
		</p>
<?php 
	}
?>

<p><b>Категории</b></p> 

<?php 
	foreach ($sections as $record) {
?>
		<p>
			<?php echo CHtml::link($record->NAME,'/site/questions/id/'.$record->ID)?>
		</p>
<?php 
	}
?>

<p><b>Года</b></p> 

<?php 
	for ($year=$end_year;$year>=$start_year;$year--) {
?>
		<p>
			<?php echo CHtml::link($year,'/site/questions/year/'.$year)?>
		</p>
<?php
	}
?>

<p>
	<?php echo CHtml::link('Подробная статистика','/site/statistika')?>
</p>
