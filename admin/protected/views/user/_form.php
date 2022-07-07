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
  <td><?php echo CHtml::activeLabelEx($model,'LOGIN'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'LOGIN',array('size'=>60,'maxlength'=>100,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'PASSWORD'); ?></td>
  <td></td>
  <td><?php echo CHtml::activePasswordField($model,'PASSWORD',array('size'=>60,'maxlength'=>100,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'EMAIL'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'EMAIL',array('size'=>60,'maxlength'=>100,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'ACTIVE'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeDropDownlist($model,'ACTIVE',array('0'=>'Не активен','1'=>'Активен')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'JOB'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'JOB',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'COMPANY'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'COMPANY',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
  <td></td>
</tr>
<tr>
  <td><?php echo CHtml::activeLabelEx($model,'STATUS'); ?></td>
  <td></td>
  <td><?php echo CHtml::activeDropDownlist($model,'STATUS',array('1'=>'Администратор','2'=>'Модератор','3'=>'Оператор')); ?></td>
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

</div>
