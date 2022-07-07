<h1>Обращения</h1> 

<?php if ($view>0) {?>
   
  <table width="100%" cellpadding="3">
    <col width="30%" />
    <col width="70%" />
    <tr>
      <td>Дата обращения:</td>
      <td>
        <?php
          list($year,$month,$day,$time) = split('[-[:space:]]', $question->CREATE_TIME);
          echo "$day.$month.$year";
        ?>
      </td>
    </tr>
    <tr>
      <td>Вопрос:</td>
      <td>
        <?php echo $question->DESCRIPTION; ?>
      </td>
    </tr>
    
  <?php if($question->ANSWER){ ?>
    <tr>
      <td>Дата ответа:</td>
      <td>
        <?php
          list($year,$month,$day,$time) = split('[-[:space:]]', $question->PUBLISH_TIME);
          echo "$day.$month.$year";
        ?>
      </td>
    </tr>
    <tr>
      <td>Ответ:</td>
      <td>
        <?php echo $question->ANSWER; ?>
      </td>
    </tr>
  <?php }else{ ?>
<!--
    <tr>
      <td>Статус:</td>
      <td>
        <?php echo $question->STATUS; ?>
      </td>
    </tr>
-->
  <?php } ?>
  
  <?php if($question->NAME){ ?>
    <tr>
      <td></td>
      <td><br /><b><?php echo $question->NAME; ?></b></td>
    </tr>
  <?php } ?>
  </table>
  

<?php } ?>
