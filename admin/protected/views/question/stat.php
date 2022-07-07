<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);
?>

<h1>Подробная статистика</h1>

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
  <td></td>
  <td></td>
  <td><?php echo CHtml::activeDropDownlist($model,'criteri',array('1'=>'По тематической рубрике','2'=>'По полу','3'=>'По времени','4'=>'По льготной категории','5'=>'По виду ответа','6'=>'По полю "Кому"','7'=>'По возрасту','8'=>'По сроку ответа'),array('style'=>'width:200px;')); ?></td>
</tr>
</table>

<?php echo CHtml::submitButton('Показать'); ?>


<?php echo CHtml::endForm(); ?>

</div>

<?php 
	if ($criteri == 1) {
?>
		<table class="data-table" style="width:70%;" cellpadding="3">
		<tr>
			<th class="first">Название рубрики</th>
			<th class="last">Количество обращений</th>
		</tr>	
<?php 
		$total=0;
		foreach ($arr as $record) {
			$total+=$mas[$record->ID];
?>
			<tr>
				<td><?php echo $record->NAME;?></td>		
				<td><?php echo $mas[$record->ID];?></td>		
			</tr>
<?php 
	}
?>
	      	<tr>
				<td>Рубрика не определена:</td>
				<td><?php echo $cnt;?></td>
			</tr>
	      	<tr>
				<td></td>
				<td><b>Всего:</b> <?php echo ($total+$cnt);?></td>
			</tr>
		</table>
		
<?php 
	}
	elseif ($criteri == 2) {
?>
				<table class="data-table" style="width:70%;" cellpadding="3">
					<tr>
						<th class="first">Пол</th>
						<th class="last">Количество обращений</th>
					</tr>	
					<tr>
						<td>Не указан</td>
						<td><?php echo $cnt;?></td>
					</tr>	
					<tr>
						<td>Мужчины</td>
						<td><?php echo $cnt1;?></td>
					</tr>	
					<tr>
						<td>Женщины</td>
						<td><?php echo $cnt2;?></td>
					</tr>	
					<tr>
						<td><b>Всего:</b></td>		
						<td><?php echo ($cnt+$cnt1+$cnt2);?></td>		
					</tr>
				</table>
<?php 
	}
	elseif ($criteri == 3) {
?>
				<table class="data-table" style="width:70%;" cellpadding="3">
					<tr>
						<th class="first">Дата</th>
						<th class="last">Количество обращений</th>
					</tr>	
<?php 
		$total=0;
		for ($i=0;$i<count($mas);$i++) {
			$total+=$mas[$i];
?>
			<tr>
				<td><?php echo $arr[$i];?></td>		
				<td><?php echo $mas[$i];?></td>		
			</tr>
<?php 
	}
?>
			<tr>
				<td><b>Всего:</b></td>		
				<td><?php echo $total;?></td>		
			</tr>
		</table>

<?php 
		}
		elseif ($criteri == 4) {
?>
				<table class="data-table" style="width:70%;" cellpadding="3">
					<tr>
						<th class="first">Наименование льготы</th>
						<th class="last">Количество обращений</th>
					</tr>	
<?php 
			for ($i=0;$i<count($arr);$i++) {
				$total+=$mas[$i];
?>
					<tr>
						<td><?php echo ($i==0) ? 'Не указана' : $arr[$i];?></td>
						<td><?php echo $mas[$i]?></td>
					</tr>	
<?php 
			}
?>
				<tr>
					<td><b>Всего:</b></td>		
					<td><?php echo $total;?></td>		
				</tr>
				</table>
<?php 
	}
	elseif ($criteri == 5) {
?>
				<table class="data-table" style="width:70%;" cellpadding="3">
					<tr>
						<th class="first">Вид ответа</th>
						<th class="last">Количество обращений</th>
					</tr>	
				<tr>
					<td>Публиковать лично</td>		
					<td><?php echo $cnt1;?></td>		
				</tr>
				<tr>
					<td>Публиковать общедоступно</td>		
					<td><?php echo $cnt2;?></td>		
				</tr>
				<tr>
					<td><b>Всего:</b></td>		
					<td><?php echo ($cnt1+$cnt2);?></td>		
				</tr>
				</table>
<?php 
	}
	elseif ($criteri == 6) {
?>
		<table class="data-table" style="width:70%;" cellpadding="3">
		<tr>
			<th class="first">"Кому"</th>
			<th class="last">Количество обращений</th>
		</tr>	
<?php 
		$total=0;
		foreach ($arr as $record) {
			$total+=$mas[$record->id];
?>
			<tr>
				<td><?php echo $record->name;?></td>		
				<td><?php echo $mas[$record->id];?></td>		
			</tr>
<?php 
	}
?>
	      	<tr>
				<td>Не указано:</td>
				<td><?php echo $cnt;?></td>
			</tr>
	      	<tr>
				<td></td>
				<td><b>Всего:</b> <?php echo ($total+$cnt);?></td>
			</tr>
		</table>

<?php 
	}
	elseif ($criteri == 7) {
?>
		<table class="data-table" style="width:70%;" cellpadding="3">
			<tr>
				<th class="first">Возраст</th>
				<th class="last">Количество обращений</th>
			</tr>	
<?php 

					$k=0;
					$j=0;
					$total=0;
					for ($i=0;$i<=100;$i+=10) {
						if ($i>0) {
?>

			<tr>
				<td>От <?php echo ($k+1);?> до <?php echo $i;?></td>		
				<td><?php echo $mas[$j];?></td>		
			</tr>

<?php 
					$k=$i;
					$j++;
					$total+=$mas[$j];
	}
	}
?>

	      	<tr>
				<td>Указан:</td>
				<td><?php echo $total;?></td>
			</tr>
	      	<tr>
				<td>Не указан:</td>
				<td><?php echo ($cnt-$total);?></td>
			</tr>
	      	<tr>
				<td></td>
				<td><b>Всего:</b> <?php echo $cnt;?></td>
			</tr>
		</table>

<?php 
	}
	elseif ($criteri == 8) {
?>
				<table class="data-table" style="width:70%;" cellpadding="3">
					<tr>
						<th class="first">Срок ответа</th>
						<th class="last">Количество обращений</th>
					</tr>	
					<tr>
						<td>7 дней</td>		
						<td><?php echo $cnt1;?></td>		
					</tr>
					<tr>
						<td>30 дней</td>		
						<td><?php echo $cnt2;?></td>		
					</tr>
					<tr>
						<td>33 дня</td>		
						<td><?php echo $cnt3;?></td>		
					</tr>
			      	<tr>
						<td>Не указан:</td>
						<td><?php echo ($cnt-$cnt1-$cnt2-$cnt3);?></td>
					</tr>
			      	<tr>
						<td></td>
						<td><b>Всего:</b> <?php echo $cnt;?></td>
					</tr>
				</table>

<?php 
	}
?>
