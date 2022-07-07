<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Получить ответ</h1>

<div class="form">
      
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>


  <table width="70%" cellpadding="3">
    <col width="35%" />
    <col width="65%" />
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'Идентификатор сообщения',array('for'=>'AnswerForm_ID')); ?>:</td>
      <td><?php echo CHtml::activeTextField($model,'ID',array('class'=>'textfield')); ?></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'Пароль',array('for'=>'AnswerForm_PASSWORD')); ?>:</td>
      <td><?php echo CHtml::activePasswordField($model,'PASSWORD',array('class'=>'textfield')); ?></td>
    </tr>
    <tr>
      <td colspan="2">
        <!--?php echo CHtml::submitButton('Запрос'); ?-->
        <input class="submit" type="image" src="/img/but_submit_answ.gif" alt="Получить ответ" />
      </td>
    </tr>
  </table>

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
			
	<table width="100%" cellpadding="3">
    <col width="30%">
    <col width="70%">
    <tr>
      <td>Категория:</td>
      <td><?php echo $record->section->NAME;?></td>
    </tr>
    <tr>
      <td>Дата обращения:</td>
      <td><?php echo $record->CREATE_TIME;?></td>
    </tr>
    <tr>
      <td>Вопрос:</td>
      <td><?php echo $record->DESCRIPTION;?></td>
    </tr>
    <tr>
      <td>Статус обращения:</td>
      <td><?php echo Yii::app()->params['user_status'][$record->SYSTEM_USER_STATUS];?></td>
    </tr>
<?php if ($record->SYSTEM_STATUS==5) {?>
    <tr>
      <td>Дата ответа:</td>
      <td><?php echo $record->PUBLISH_TIME;?></td>
    </tr>
    <tr>
      <td>Ответ:</td>
      <td><?php echo $record->ANSWER;?></td>
    </tr>
<?php }?>
	</table>
	
	<?php if($record->NAME && $record->SYSTEM_STATUS==5){ ?>
    <br>
    <h2>Ответственный</h2>
    
    <?php echo $record->NAME; ?>
    <br /><br />
  <?php } ?>
	
<?php 
		}
	}
?>