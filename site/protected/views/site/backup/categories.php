<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Обращения</h1>
<h2><?php echo($category->NAME);?></h2> 

<?php 
	foreach ($sections as $record) {
?>
		<p>
			<?php 
				if ($record->ID==$id) {
					echo $record->NAME;
				}
				else {
					echo CHtml::link($record->NAME,'/site/questions/id/'.$record->ID);
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
			<div><b>Вопрос:</b> <?php echo $record->DESCRIPTION;?></div>
			<div><b>Ответ:</b> <?php echo $record->ANSWER;?></div>
			<div>****************************************************************************************************</div>
		</p>
<?php 
	}
?>

<?php echo CHtml::link('Назад',array('site/questions')); ?>