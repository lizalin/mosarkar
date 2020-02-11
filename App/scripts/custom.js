$(document).ready(function(){
// Tool Tip
    $('[data-toggle="tooltip"]').tooltip();
// Tool Tip



// Date picker
$('.datepicker').datepicker({
format: "dd-M-yyyy",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
});
// Date picker





// Btn web effect

$(".btn").click(function (e) {
  

  $(".ripple").remove();

  var posX = $(this).offset().left,
      posY = $(this).offset().top,
      buttonWidth = $(this).width(),
      buttonHeight =  $(this).height();
  
  
  $(this).prepend("<span class='ripple'></span>");

  
 
  if(buttonWidth >= buttonHeight) {
    buttonHeight = buttonWidth;
  } else {
    buttonWidth = buttonHeight; 
  }
  
 
  var x = e.pageX - posX - buttonWidth / 2;
  var y = e.pageY - posY - buttonHeight / 2;
  
 
  
  $(".ripple").css({
    width: buttonWidth,
    height: buttonHeight,
    top: y + 'px',
    left: x + 'px'
  }).addClass("rippleEffect");
});

// Btn web effect

// view password btn
    $('.passwordshowbtn').on('click',function(){
         $(this).find('i').toggleClass("icon-eye1 icon-eye-off1");
              var inputpass = $('.password').attr("type");
            
              if (inputpass == "password") {
               $('.password').attr("type","text");
              } else {
                $('.password').attr("type", "password");
              }
      });

// view password btn


// Search panel
$('.searchopen').on('click',function(){
$('.search-sec').slideToggle('open');
$(this).find('i').toggleClass('icon-up-arrow icon-angle-arrow-down')
})
// Search panel

// Setting link
$('.setting-link').on('click', function(){
  $('.setting-box').addClass('on');
})
// Setting link

// Logout madal
$('.logout').click(function(){

    $('.logout-modal').addClass('show')
})


$('.nologout').click(function(){
    $('.logout-modal').removeClass('show') 
})
// Logout madal

$('#backIcon').click(function(){
  window.history.back();
})


// Logout madal

});



