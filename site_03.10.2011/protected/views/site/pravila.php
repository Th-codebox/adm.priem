<h1>Задать вопрос</h1>

<?php echo $page->DESCRIPTION?>

<div class="form stretch-form">

<?php echo CHtml::beginForm(); ?>

	<div class="row">
		<?php echo CHtml::RadioButton('agree',false,array('value'=>1,'id'=>'agree1')); ?>
		<?php echo CHtml::label('Согласен','agree1'); ?>
    &nbsp;&nbsp;
		<?php echo CHtml::RadioButton('agree',false,array('value'=>2,'id'=>'agree2')); ?>
		<?php echo CHtml::label('Не согласен','agree2'); ?>
	</div>
  <br />
  <?php echo CHtml::submitButton('Submit',array('value'=>'Продолжить')); ?>
  

<?php echo CHtml::endForm(); ?>

</div>
