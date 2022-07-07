<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Обращения</h1>

<!-- request-search -->
<div class="request-search">
  <div class="request-search-b">
    

<?php echo CHtml::beginForm('','post'); ?>
  
  <h2>Посмотреть обращения</h2>

  &nbsp;
  с <?php echo CHtml::activeTextField($model,'DT1',array('size'=>7,'class'=>'datepicker')); ?>
  &nbsp;
  до <?php echo CHtml::activeTextField($model,'DT2',array('size'=>7,'class'=>'datepicker')); ?>
  &nbsp;
  <?php echo CHtml::submitButton('Посмотреть'); ?>

<?php echo CHtml::endForm(); ?>

  </div>
</div>
<!-- /request-search -->

<p><?php echo CHtml::errorSummary($model); ?></p>


<div class="request">

<select name="" style="width:99%;" onchange="document.location.href=this.value">
<?php 
	foreach ($sections as $record){
  	$selected = $record->ID==$id ? ' selected="selected"' : '';
  	echo '<option value="/site/categories/id/'.$record->ID.'"'.$selected.'>'.$name = $record->NAME.'</option>';
	}
?>
</select>
<br /><br />

<?php 
	foreach ($questions as $record) {
?>
  <!-- \ -->
  <div class="item">
    <div class="head"><h3><?php echo $record->section->NAME;?></h3></div>
    <div class="desc">
      <?php echo $record->DESCRIPTION;?>
      <br />
      <a class="more-link" href="/site/viewquestion/id/<?php echo $record->ID;?>">читать весь текст вопроса и ответ</a>
    </div>
    <div class="keywords">
      <div class="keywords-b">
        <h4>Ключевые слова</h4>

<?php
		$tags = $record->getTags();
		foreach($tags as $tag){
	      echo "<a href=\"/site/findquestions/keyword/".CHtml::encode($tag)."\">$tag</a>\n";
		}
?>
        
      </div>
    </div>
  </div>
  <!-- / -->
<?php 
	}
?>

</div>

<!--div class="pages">
<?php $this->widget('CLinkPager',array(
         'pages'=>$pages, 
         'maxButtonCount' => Yii::app()->params['maxButtonCount'],
         'cssFile' => false
 )); ?>
</div-->

