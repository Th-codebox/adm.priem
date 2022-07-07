


$.fn.selectIeFix = function(){
  if($.browser.msie){
  
    var winWidth = $(window).width();
    
    $(this).each(function(){
      
      var selectEl = $(this);
      var selWidth = $(this).width();
      var selHeight = $(this).height();
      
      function selectReset(){
        selectEl.css({
          'position':'static',
          'width':selWidth+'px'
        })
        .parent('div').css('z-index','1');
      }
      $(this)
      .wrap('<div style="position:relative;width:'+selWidth+'px;height:'+selHeight+'px;"></div>')
      .click(function(){
        if($(this).css('position')!='absolute'){
          var posSide = $(this).offset().left > winWidth-200 ? 'right' : 'left';
          $(this)
          .css({
            'position':'absolute',
            'top':'0',
            'width':'auto'
          })
          .css(posSide,'0')
          .blur(selectReset)
          .parent('div').css('z-index','777');
        }
      });
    });
  }
}


var filesCount = 0;

function addAttachFile(){  
  var pic_ext = new Array('jpg','jpeg','gif','png','bmp','tif','tiff');
  var doc_ext = new Array('rtf','doc','xls','odf','ods','txt','pdf');
  var arch_ext = new Array('zip','rar','7z');
  var exts = pic_ext.concat(doc_ext).concat(arch_ext);
  
  var firstFieldRow = $('div:first','#fileFields');
  var firstField = $('"input:first',firstFieldRow);
  var firstFieldValue = firstField.val();
  var fileNameArr = firstFieldValue.split(/[\\/]/);
  var fileName =  fileNameArr[fileNameArr.length-1];
  var fileTypeArr = firstFieldValue.split('.');
  var fileType = fileTypeArr[fileTypeArr.length-1];
  var fileTypeName = $.inArray(fileType, pic_ext)>-1 ? 'изображение' : $.inArray(fileType, doc_ext)>-1 ? 'документ' : 'архив';
  var fileIcn = $.inArray(fileType, pic_ext)>-1 ? 'pic' : $.inArray(fileType, doc_ext)>-1 ? 'doc' : 'arch';
  
  if(firstFieldValue == ''){
    return;
  }
  
  if($.inArray(fileType, exts)>-1){
    var fileName = "\n"+'<div id="fileRow'+filesCount+'" class="item">'
      +"\n\t"+'<div class="left '+fileIcn+'">'+fileName+'<br>'
      +"\n\t\t"+'<small>тип: <span class="green">'+fileTypeName+'</span></small>'
      +"\n\t"+'</div>'
      +"\n\t"+'<div class="right"><a class="delete" href="#delete" onclick="delAttachFile('+filesCount+');return false;">Удалить</a></div>'
      +"\n\t"+'<div class="clear"></div>'
      +"\n"+'</div>';
    
    if(firstFieldValue.length>0){
      $('#fileFields').prepend('<div id="fileField'+(filesCount+1)+'"><input type="file" name="file[]" value="" /></div>');
      $('#fileNames').parent('div').show();
      $('#fileNames').append(fileName);
      firstFieldRow.hide();
      filesCount++;
    }
  }else{
    alert('Тип файла не поддерживается');
  }
}



function delAttachFile(index){
  //alert(index);
  $('#fileRow'+index).remove();
  $('#fileField'+index).remove();
  if($('div.item','#fileNames').size()==0){
    $('#fileNames').parent('div').hide();
  }
  //$(elem).parents('div.item').remove();
}



$(document).ready(function(){
	$('input.datepicker').datepicker({
	  dateFormat: 'dd.mm.yy',
		//showAnim: 'slideDown',
		showOn: 'both',
		buttonImage: '/img/icn_calendar.gif',
		buttonImageOnly: true,
		changeMonth: true,
    changeYear: true,
    yearRange: '-10:+10'
	});
	$('select.iefixselect').selectIeFix();
});



