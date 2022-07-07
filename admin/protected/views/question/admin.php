<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);
?>

<h1>Обращения</h1>

<ul class="actions">
	<!--li><?php echo CHtml::link('Необработанные',array('index')); ?></li-->

<?php if (Yii::app()->user->role == 'moderator'): ?>
	<li><?php echo CHtml::link('Подробная статистика',array('stat')); ?></li>
	<li><?php echo CHtml::link('Статистика',array('control')); ?></li>
<?php endif ?>

</ul>

<select name="" onchange="window.location.href=this.value">

<?php if (Yii::app()->user->role == 'moderator'): ?>
  <option value="/index.php/question/index">Необработанные</option>
  <option value="/index.php/question/index/mode/1"<?php if($_GET['mode']==1): ?> selected="selected"<?php endif; ?>>Принятые к рассмотрению</option>
	<option value="/index.php/question/index/mode/2"<?php if($_GET['mode']==2): ?> selected="selected"<?php endif; ?>>Готовится ответ</option>
	<option value="/index.php/question/index/mode/3"<?php if($_GET['mode']==3): ?> selected="selected"<?php endif; ?>>Редактируются</option>
	<option value="/index.php/question/index/mode/4"<?php if($_GET['mode']==4): ?> selected="selected"<?php endif; ?>>Отклонённые</option>
	<option value="/index.php/question/index/mode/5"<?php if($_GET['mode']==5): ?> selected="selected"<?php endif; ?>>Опубликованные</option>
	<option value="/index.php/question/index/mode/6"<?php if($_GET['mode']==6): ?> selected="selected"<?php endif; ?>>Все</option>
<?php endif; ?>

<?php if (Yii::app()->user->role == 'operator'): ?>
  <option value="/index.php/question/index/mode/1"<?php if($_GET['mode']==1): ?> selected="selected"<?php endif; ?>>Принятые к рассмотрению</option>
	<option value="/index.php/question/index/mode/2"<?php if($_GET['mode']==2): ?> selected="selected"<?php endif; ?>>Готовится ответ</option>
<?php endif; ?>

</select>

<?php if (Yii::app()->user->role == 'moderator'): ?>
	<select name="" onchange="window.location.href=this.value">
    	<option value="/index.php/question/index/"></option>
	<?php foreach ($members as $record) { ?>
		<option <?php if ($_GET['member']==$record->id) {?>selected="selected"<?php } ?>value="/index.php/question/index/member/<?php echo $record->id;?>/mode/<?php echo $_GET['mode'];?>"><?php echo $record->name;?></option>
<?php } ?>
	</select>
<?php endif; ?>

<?php if (Yii::app()->user->role == 'moderator'): ?>
<form action="/index.php/question/index/" method="GET">
<div style="padding-top:5px;">
   Фамилия подателя: <input type="text" name="fio" value="<?php echo($_GET['fio']); ?>">
   Регистрационный номер обращения: <input type="text" name="number" value="<?php echo($_GET['number']); ?>"><br>
   Осталось дней: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="day" value="<?php echo($_GET['day']); ?>"> 
	<input type="submit" value="показать">
</div>
</form>
<?php endif; ?>

<?php
	if ($mode==4 || $mode==5)
		$colums = array(
						'ID',
						'DESCRIPTION',
						'PUBLISH_TIME',

						array(
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('width'=>'100','align'=>'center'),
							'viewButtonImageUrl'=>'/img/magnigy.png',
						    'updateButtonImageUrl'=>'/img/icn_edit.gif',
							'deleteButtonImageUrl'=>'/img/icn_delete.gif'
						)

		);
	else
		$colums = array(

						'ID',
						'DESCRIPTION',
						'PUBLISH_TIME',

				        array(
							'name'=>'Осталось (дней)',
							'value'=>'($data->timeToAnswer <0) ? ( ($data->SYSTEM_STATUS==5 || $data->SYSTEM_STATUS==4) ? "" : "<font color=red>".$data->timeToAnswer."</font>") : (($data->timeToAnswer >=0 && $data->timeToAnswer <= 3) ? "<font color=orange><b>".(int)$data->timeToAnswer."</b></font>" : $data->timeToAnswer)',
							'type'=>'html',
						),

						array(
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('width'=>'100','align'=>'center'),
							'viewButtonImageUrl'=>'/img/magnigy.png',
						    'updateButtonImageUrl'=>'/img/icn_edit.gif',
							'deleteButtonImageUrl'=>'/img/icn_delete.gif'
						)
		);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>$colums,
	'cssFile' => false,
	'pager' => array('cssFile' => false),
	'pagerCssClass' => 'pages'
)); ?>


<script type="text/javascript">

$(window).load(function(){
  $('a','ul.yiiPager').click(function(){
    var goTo = $(this).attr('href'); 
    window.location.href = goTo;
  });
});

</script>



