<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);
?>

<h1>Статистика</h1>

<ul class="actions">
	<!--li><?php echo CHtml::link('Не обработанные',array('index')); ?></li-->

<?php if (Yii::app()->user->role == 'moderator'): ?>
	<li><?php echo CHtml::link('Подробная статистика',array('stat')); ?></li>
	<li><?php echo CHtml::link('Статистика',array('control')); ?></li>
	<!--li><?php echo CHtml::link('Moderate',array('control')); ?></li-->
<?php endif ?>

</ul>

<div class="form">


<table cellpadding="3">
  <col width="30%" />
  <col width="2%" />
  <col width="68%" />

<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>

<tr>
  <td align="right">с:</td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'date1',array('class'=>'textfield datepicker','style'=>'width:70px;')); ?></td>
</tr>
<tr>
  <td align="right">по:</td>
  <td></td>
  <td><?php echo CHtml::activeTextField($model,'date2',array('class'=>'textfield datepicker','style'=>'width:70px;')); ?></td>
</tr>
<tr>
   <td align="right">Кому</td>
   <td></td>
   <td><?php echo CHtml::activeDropDownlist($model,'member',$members); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Тематическая рубрика</td>
   <td></td>
   <td><?php echo CHtml::activeDropDownlist($model,'rubr',$rubrs); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Льготная категория</td>
   <td></td>
   <td><?php echo CHtml::activeDropDownlist($model,'lgota',Yii::app()->params['lgota']); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Пол</td>
   <td></td>
   <td><?php echo CHtml::activeDropDownlist($model,'pol',array(''=>'','M'=>'Мужской','F'=>'Женский')); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Вид ответа</td>
   <td></td>
   <td><?php echo CHtml::activeDropDownlist($model,'status',array(''=>'','0'=>'Ответить лично','1'=>'Публиковать общедоступно')); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Срок ответа</td>
   <td></td>
   <td><?php echo CHtml::activeDropDownlist($model,'srok',array(''=>'','7'=>'7 дней','30'=>'30 дней','33'=>'33 дня')); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Возраст от</td>
   <td></td>
   <td><?php echo CHtml::activeTextField($model,'age1',array('class'=>'textfield','style'=>'width:70px;')); ?></td>
   <td></td>
</tr>
<tr>
   <td align="right">Возраст до</td>
   <td></td>
   <td><?php echo CHtml::activeTextField($model,'age2',array('class'=>'textfield','style'=>'width:70px;')); ?></td>
   <td></td>
</tr>
</table>

<?php echo CHtml::submitButton('Рассчёт'); ?>


<?php echo CHtml::endForm(); ?>

</div>

<?php 
	if ($cnt>=0 && $flag==1) {
		echo("<b>Количество обращений:</b> ".$cnt);
	}
?> 