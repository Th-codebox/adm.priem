<div class="form">

<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>

<table width="70%" cellpadding="3">
  <col width="30%" />
  <col width="2%" />
  <col width="68%" />
  <col width="2%" />
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'NAME'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'NAME',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'ACTIVE'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownlist($model,'ACTIVE',array('Y'=>'Да','N'=>'Нет')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'MORDER'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'MORDER',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>


<?php echo CHtml::endForm(); ?>

</div><!-- form -->