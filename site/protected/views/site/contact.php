<?php
//Yii::beginProfile('blockID');
$this->pageTitle=Yii::app()->name . ' - Подать обращение';
?>

<h1>Подать обращение</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>Здесь вы можете задать нам свой вопрос</p>

<script type="text/javascript">
  function openBlock(cl,index,parent){
    $('div.'+cl,'#'+parent).hide();
    if(index!=''){
      $('#block'+index).show();
    }
  }
</script>


<!-- form -->
<div class="form stretch-form">

<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>

	<!--p class="note">Все поля обязательны для заполнения</p-->

	<?php echo CHtml::hiddenField('agree',1);?>

	<?php if ($err):?>
		<p><?echo $err; ?></p>
	<?php endif ?>	

	<?php echo CHtml::errorSummary($model); ?>

<table width="100%" cellpadding="3">
  <col width="30%">
  <col width="2%">
  <col width="68%">
  <col width="2%">
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Кому',array('for'=>'Question_MEMBER')); ?>:</td>
    <td><span class="red">*</span></td>
    <td id="whom">
      <?php echo CHtml::activeDropDownlist($model,'MEMBER',$members,array('class'=>'iefixselect','onchange'=>'openBlock("hiddenblock",this.value,"whom");')); ?>
      <?php
        foreach ($members_list as $record) {
           echo '
             <div class="hiddenblock" id="block'.$record->id.'" style="display:none; padding:5px 0;">
              '.$record->full_name.'
            </div>
           ';
        }
      ?>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Вопрос',array('for'=>'Question_DESCRIPTION')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextArea($model,'DESCRIPTION',array('cols'=>45,'rows'=>7)); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Льготная категория',array('for'=>'Question_LGOTA')); ?>:</td>
    <td></td>
    <td><?php echo CHtml::activeDropDownlist($model,'LGOTA',Yii::app()->params['lgota']); ?></td>
    <td></td>
  </tr>
  <!-- <tr>
    <td><?php //echo CHtml::activeLabelEx($model,'Как Вам ответить',array('for'=>'Question_STATUS')); ?>:</td>
    <td></td>
    <td><?php //echo CHtml::activeDropDownlist($model,'STATUS',array('0'=>'Ответить лично')); ?></td>
    <td></td>
  </tr> -->
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Фамилия',array('for'=>'Question_FIRSTNAME')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'FIRSTNAME',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Имя',array('for'=>'Question_SECONDNAME')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'SECONDNAME',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Отчество',array('for'=>'Question_FIRDNAME')); ?>:</td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'FIRDNAME',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Род занятий',array('for'=>'Question_JOB')); ?>:</td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'JOB',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Пол',array('for'=>'Question_POL')); ?>:</td>
    <td></td>
    <td><?php echo CHtml::activeDropDownlist($model,'POL',array(''=>'','M'=>'М','F'=>'Ж')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Возраст',array('for'=>'Question_AGE')); ?>:</td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'AGE',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Почтовый индекс',array('for'=>'Question_P_INDEX')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'P_INDEX',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Город',array('for'=>'Question_CITY')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'CITY',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Улица',array('for'=>'Question_STREET')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'STREET',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Дом',array('for'=>'Question_HOUSE')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'HOUSE',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Квартира',array('for'=>'Question_FLAT')); ?>:</td>
    <td><span class="red">*</span></td>
    <td><?php echo CHtml::activeTextField($model,'FLAT',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'E-mail',array('for'=>'Question_EMAIL')); ?>:</td>
    <td></td>
    <td>
      <?php echo CHtml::activeTextField($model,'EMAIL',array('class'=>'textfield')); ?>
      <br /><span class="gray">Если у Вас нет электронной почты, то вы сможете получить ответ  на сайте электронной приемной.</span>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Телефон',array('for'=>'Question_TELEPHONE')); ?>:</td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'TELEPHONE',array('class'=>'textfield')); ?></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="3">
      <?php echo CHtml::activeCheckBox($model,'SEND_EMAIL',array('value'=>1)); ?>
      <?php echo CHtml::activeLabelEx($model,'Хочу получать уведомления по электронной почте о ходе рассмотрения моего обращения',array('for'=>'Question_SEND_EMAIL')); ?>
    </td>
    <td></td>
  </tr>
  
<?php if(extension_loaded('gd')): ?>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'Защита от СПАМа',array('for'=>'verifyCode')); ?>:<br><small class="red">введите текст с изображения</small></td>
    <td><span class="red">*</span></td>
    <td>
      <img class="captcha" id="captcha" src="/site/captcha" alt="" height="50" width="120">
      <input style="width:180px;" class="textfield" type="text" name="verifyCode" id="verifyCode">
      <br>
      <a class="reload" href="#" onclick="jQuery.ajax({'success':function(html){jQuery('#captcha').attr('src',html)},'url':'/site/captcha/refresh/1.html','cache':false});return false;">обновить изображение</a>
    </td>
    <td></td>
  </tr>
<?php endif; ?>

  <tr>
    <td>Прикрепить файл:</td>
    <td></td>
    <td>
      <div id="fileFields">
        <button class="float-r" type="button" name="" onclick="addAttachFile();return false;">Добавить</button>
        <div id="fileField0"><input type="file" name="file[]" /></div>
      </div>
    </td>
    <td></td>
  </tr>
  
</table>

<div class="file-upload" style="display:none;">
  <h2>Прикрепленные файлы</h2>
  <div class="file-upload-b" id="fileNames">
  </div>
</div>

<br />
<table width="100%" cellpadding="3">
  <tr>
    <td colspan="3">
      <input class="submit" type="image" src="/img/but_submit.gif" alt="Отправить" />
      <small><span class="red">*</span>  - символом отмечены поля, обязательные для заполнения.</small>
    </td>
    <td></td>
  </tr>
</table>


<?php echo CHtml::endForm(); ?>


</div>
<!-- form -->

    <script type="text/javascript">
       (function(d, t, p) {
           var j = d.createElement(t); j.async = true; j.type = "text/javascript";
           j.src = ("https:" == p ? "https:" : "http:") + "//stat.sputnik.ru/cnt.js";
           var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
       })(document, "script", document.location.protocol);
    </script>

<?php endif; 
//Yii::endProfile('blockID'); ?>

    <script type="text/javascript">
       (function(d, t, p) {
           var j = d.createElement(t); j.async = true; j.type = "text/javascript";
           j.src = ("https:" == p ? "https:" : "http:") + "//stat.sputnik.ru/cnt.js";
           var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
       })(document, "script", document.location.protocol);
    </script>