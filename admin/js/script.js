/* 
	(c) Mediaweb Studio 
*/

//if(typeof(jQuery)!='undefined'){


$.fn.ddMenu = function(){
  $(this).each(function(){
    var menu = $('ul:first',this);
    $(this).hover(function(){
      menu.show();
    },function(){
      menu.hide();
    });
  });
}


$.fn.tabs = function(){
  var parent = $(this);
  var tabNav = $('ul:first',this);
  var tabContent = $('div.tab-content',this);
  $('a',tabNav).each(function(i){
    $(this).click(function(){
      $('li',tabNav).removeClass('active');
      $('li',tabNav).eq(i).addClass('active');
      tabContent.hide();
      tabContent.eq(i).show();
      return false;
    });
  });
}



$(document).ready(function(){

  $('div.dd-menu').ddMenu();
  $('#tabs').tabs();
  
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
  
});

//}

