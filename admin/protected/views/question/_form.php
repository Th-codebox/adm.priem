<!-- tabs -->
<div id="tabs">

  <div class="tab">

    <ul>
      <li class="active"><a href="#">Вопрос</a></li>
      <li><a href="#">Ответ</a></li>
    </ul>
  </div>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<!-- tab content 1 -->
<div class="tab-content">

  <div class="form">
  
  <table width="80%" cellpadding="3">
    <col width="30%" />
    <col width="2%" />
    <col width="68%" />
    <col width="2%" />
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'CREATE_TIME'); ?></td>
      <td></td>
      <td><?php echo $model->CREATE_TIME?></td>
      <td></td>
    </tr>
    <?php if ($status<3) { ?>
      <!--tr>
        <td><?php echo CHtml::activeLabelEx($model,'PUBLISH_TIME'); ?></td>
        <td></td>
        <td><?php echo CHtml::activeTextField($model,'PUBLISH_TIME',array('class'=>'textfield datepicker','style'=>'width:80px')); ?></td>
        <td></td>
      </tr-->
      <tr>
        <td><?php echo CHtml::activeLabelEx($model,'PUBLISH_TIME'); ?></td>
        <td></td>
        <td><?php echo $model->PUBLISH_TIME;?></td>
        <td></td>
      </tr>
      <tr>
        <td><?php echo CHtml::activeLabelEx($model,'SROK'); ?></td>
        <td></td>
        <td><?php echo CHtml::activeDropDownlist($model,'SROK',array('0'=>'','7'=>'7 дней','30'=>'30 дней','33'=>'33 дня')); ?></td>
        <td></td>
      </tr>
    <?php } else { ?>
      <tr>
        <td><?php echo CHtml::activeLabelEx($model,'PUBLISH_TIME'); ?></td>
        <td></td>
        <td><?php echo $model->PUBLISH_TIME;?></td>
        <td></td>
      </tr>
    <?php }?>
    
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'NUMBER'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'NUMBER',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'MEMBER'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeDropDownlist($model,'MEMBER',$members); ?></td>
      <td></td>
    </tr>

  <?php if ($status<3) { ?> 
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'RUBR'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeDropDownlist($model,'RUBR',$rubrs); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'LGOTA');?>:</td>
      <td></td>
      <td><?php echo CHtml::activeDropDownlist($model,'LGOTA',Yii::app()->params['lgota']); ?></td>
      <td></td>
   </tr>
  <?php } ?>
    
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'FIRSTNAME'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'FIRSTNAME',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'SECONDNAME'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'SECONDNAME',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'FIRDNAME'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'FIRDNAME',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'JOB'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'JOB',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'POL'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeDropDownlist($model,'POL',array('M'=>'Мужской','F'=>'Женский')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'AGE'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'AGE',array('class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'P_INDEX'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'P_INDEX',array('class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'CITY'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'CITY',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'STREET'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'STREET',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'HOUSE'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'HOUSE',array('size'=>10,'maxlength'=>10,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'FLAT'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'FLAT',array('class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'EMAIL'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'EMAIL',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'TELEPHONE'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextField($model,'TELEPHONE',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
      <td></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'DESCRIPTION'); ?></td>
      <td></td>
      <td><?php echo CHtml::activeTextArea($model,'DESCRIPTION',array('rows'=>6, 'cols'=>50)); ?></td>
      <td></td>
    </tr>
  <tr>
    <td><?php echo CHtml::label('Прикреплённые файлы','Files'); ?></td>
    <td></td>
    <td>
<?php foreach ($model->files as $record) {?>
	<p>
		<?php echo CHtml::Link($record->NAME, array('file','id'=>$record->ID)) ?> (<?php echo $record->SIZE;?> Кб)</a>
	</p>
<?php } ?>
    </td>
    <td></td>
  </tr>
  </table>
  
  </div>

</div>
<!-- /tab content 1 -->

<!-- tab content 2 -->
<div class="tab-content" style="display:none;">
  
  <div class="form">
  
  <table width="80%" cellpadding="3">
    <col width="30%" />
    <col width="2%" />
    <col width="68%" />
    <col width="2%" />
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'ANSWER'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextArea($model,'ANSWER',array('rows'=>10, 'cols'=>50)); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'ANSWER_FOR_EMAIL'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextArea($model,'ANSWER_FOR_EMAIL',array('rows'=>10, 'cols'=>50)); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'NAME'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeTextField($model,'NAME',array('size'=>60,'maxlength'=>255,'class'=>'textfield')); ?></td>
    <td></td>
 </tr>

<?php if ($status<3) { ?> 
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'SEND_EMAIL'); ?></td>
    <td></td>
    <td><?php if ($model->SEND_EMAIL==1) {echo "Да";} else {echo "Нет";}?></td>
    <td></td>
  </tr>
<?php } ?>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'STATUS'); ?></td>
    <td></td>
    <td><?php if ($model->STATUS==1) { echo "Публиковать ответ на сайте общедоступно";} else {echo "Ответить лично";} ?></td>
    <td></td>
  </tr>

<?php if ($status<3) { ?> 
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'SYSTEM_STATUS'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownlist($model,'SYSTEM_STATUS',array('0'=>'Не обработан','1'=>'Принят к рассмотрению','2'=>'Готовится ответ','3'=>'Редактируется','4'=>'Отклонён','5'=>'Опубликован')); ?></td>
    <td></td>
  </tr>
<?php } else {?>
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'SYSTEM_STATUS'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownlist($model,'SYSTEM_STATUS',array('0'=>'Не обработан','1'=>'Принят к рассмотрению','2'=>'Готовится ответ','3'=>'Редактируется')); ?></td>
    <td></td>
  </tr>
<?php }?>

 
<?php if ($status<3) { ?> 
  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'OPERATOR'); ?></td>
    <td></td>
    <td><?php echo CHtml::activeDropDownlist($model,'OPERATOR',$operators); ?></td>
    <td></td>
  </tr>
<?php } ?>
  
  <tr>
    <td><?php echo CHtml::label('Комментарий','COMMENT'); ?></td>
    <td></td>
    <td>

	<?php foreach ($comments as $record) {?>
       <p>
          <b><?php echo $record->user->NAME;?></b> (<?php echo $record->create_time;?>)<br>
          <?php echo $record->description;?>
       </p>
    <?php }?>

       <?php echo CHtml::textArea('COMMENT','',array('rows'=>6, 'cols'=>50)); ?>
    </td>
    <td></td>
  </tr>

  <tr>
    <td><?php echo CHtml::label('Ключевые слова','KEYWORDS'); ?></td>
    <td></td>
    <td>
       <?php echo CHtml::checkBoxList('KEYWORDS',$chekeds,Yii::app()->params['keywords']);?>
    </td>
    <td></td>
  </tr>

  <tr>
    <td><?php echo CHtml::activeLabelEx($model,'USER_PASSWORD'); ?></td>
    <td></td>
    <td><?php echo $model->USER_PASSWORD?></td>
    <td></td>
  </tr>
  </table>

  </div>
  
</div>
<!-- /tab content 2 -->


<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>

</div>


<?php echo CHtml::endForm(); ?>

</div><!-- form -->