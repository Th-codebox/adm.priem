<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Обращения</h1>
<h2><?php echo $year;?></h2> 

<?php 
	for ($y=$end_year;$y>=$start_year;$y--) {
?>
<p>
<?php
		if ($y==$year) {
			echo $y;
		}
		else {
			echo CHtml::link($y,'/site/questions/year/'.$y);
		}
?>
</p>
<?php 
}
?>

<?php 
	foreach ($questions as $record) {
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

<?php echo CHtml::link('Назад',array('site/questions')); ?> 