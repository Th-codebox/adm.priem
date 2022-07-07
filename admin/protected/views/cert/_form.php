<div class="form">

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>


<table width="70%" cellpadding="3">
  <col width="30%" />
  <col width="2%" />
  <col width="68%" />
  <col width="2%" />
  <tr>
    <td><?php echo CHtml::activeLabel($model,'common_name'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'common_name',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'email'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'email',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'unit'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'unit',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'organization'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'organization',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'locality'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'locality',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'province'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'province',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'country'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'country',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'passwd'); ?></td>
    <td></td>
    <td><?php echo CHtml::activePasswordField($model,'passwd',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td>Повтор</td>
    <td></td>
    <td><?php echo CHtml::activePasswordField($model,'passwd_repeat',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'expiry'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownList($model,'expiry', array(1=>'1 год', 2=>'2 года', 3=>'3 года', 4=>'4 года', 5=>'5 лет')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model, 'keysize'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownList($model, 'keysize', array(512=>'512 бит', 1024=>'1024 бита', 2048=>'2048 бит', 4096=>'4096 бит')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabel($model,'cert_type'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownList($model,'cert_type', array('email'=>'Пользовательский', 'server'=>'Серверный')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::submitButton(isset($_GET['serial']) ? 'Обновить' : 'Создать'); ?></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>


<?php echo CHtml::endForm(); ?>

</div>
