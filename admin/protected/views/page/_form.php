<div class="form">

<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'NAME'); ?>
		<?php echo CHtml::activeTextField($model,'NAME',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'DESCRIPTION'); ?>
<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget', array(
  "model"=>$model,
  "attribute"=>'DESCRIPTION',
  "height"=>'400px',
  "width"=>'100%',
  "toolbarSet"=>'My',
  "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
  "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
  "config" => array(
//    "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',
  ),
// http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
)) ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->
