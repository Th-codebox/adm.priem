<div class="form">

<?php echo CHtml::beginForm(); ?>


	<?php echo CHtml::errorSummary($model); ?>

<table width="70%" cellpadding="3">
  <col width="30%" />
  <col width="2%" />
  <col width="68%" />
  <col width="2%" />
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'name'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'full_name'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'full_name',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'active'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeDropDownlist($model,'active',array('1'=>'Да','0'=>'Нет')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'morder'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'morder',array('class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
</table>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->