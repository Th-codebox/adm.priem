<?php $this->pageTitle=Yii::app()->name; ?>

<?php
$left_menu = 'test';
?>


<h1>Обращения</h1>

<h2>Последние обращения</h2>

<div class="request">

<?php 
	foreach ($last_questions as $record) {
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
