<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Обращения</h1>
<h2>Подробная статистика</h2>


<?php echo CHtml::beginForm('','post'); ?>

	<div class="form">
		<?php echo CHtml::activeLabelEx($model,'Категория',array('for'=>'SearchQuestionForm_RUBR')); ?>
		<?php echo CHtml::activeDropDownlist($model,'RUBR',$rubrs); ?>
	</div>

<!-- request-search -->
<div class="request-search">
  <div class="request-search-b">
  
  <h2>Посмотреть обращения</h2>

  &nbsp;
  с <?php echo CHtml::activeTextField($model,'DT1',array('size'=>7,'class'=>'datepicker')); ?>
  &nbsp;
  от <?php echo CHtml::activeTextField($model,'DT2',array('size'=>7,'class'=>'datepicker')); ?>
  &nbsp;
  <?php echo CHtml::submitButton('Показать'); ?>

  </div>
</div>
<!-- /request-search -->

<?php echo CHtml::errorSummary($model); ?>

<?php echo CHtml::endForm(); ?>


<?php 
	if ($amount > 0) {
?>

<p><b>Найдено:</b> <?php echo $amount;?></p>

<?php 
	}
?>


<?php 
	foreach ($questions as $record) {
?>
		<table width="100%" cellpadding="3">
    <col width="25%">
    <col width="75%">
    <tr>
      <td>Вопрос:</td>
      <td><?php echo $record->DESCRIPTION;?></td>
    </tr>
    <tr>
      <td>Ответ:</td>
      <td><?php echo $record->ANSWER;?></td>
    </tr>
    </table>
		
		<?php if($record->NAME){ ?>
      <br>     
      <?php echo $record->NAME; ?>
      <br /><br />
    <?php } ?>
    
    <div class="separator"></div>
		
<?php 
	}
?>

<!--div class="pages">
<?php $this->widget('CLinkPager',array(
         'pages'=>$pages, 
         'maxButtonCount' => Yii::app()->params['maxButtonCount'],
         'cssFile' => false
 )); ?>
</div-->

<p>
<?php echo CHtml::link('Назад',array('site/questions')); ?> 
</p>