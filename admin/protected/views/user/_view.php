<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOGIN')); ?>:</b>
	<?php echo CHtml::encode($data->LOGIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACTIVE')); ?>:</b>
	<?php echo CHtml::encode($data->ACTIVE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MODIFY_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->MODIFY_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_BY')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_BY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MODIFY_BY')); ?>:</b>
	<?php echo CHtml::encode($data->MODIFY_BY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JOB')); ?>:</b>
	<?php echo CHtml::encode($data->JOB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPANY')); ?>:</b>
	<?php echo CHtml::encode($data->COMPANY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>