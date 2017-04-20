var angle = 0;
function galleryspin(sign) { 
  spinner = document.querySelector("#spinner");
  if (!sign) { 
    angle = angle + 60; 
  } else { 
    angle = angle - 60; 
  }
  spinner.setAttribute("style","-webkit-transform: rotateY("+ angle +"deg); -moz-transform: rotateY("+ angle +"deg); transform: rotateY("+ angle +"deg);");
}

$(document).ready(function(){

  //on scroll video blur
  $(".op_div").slideUp();
  $(window).scroll(function(e) {
      var distanceScrolled = $(this).scrollTop();
      $('#top_vd').css('-webkit-filter', 'blur('+distanceScrolled/45+'px)');
  
    if($(window).scrollTop() > $(".vd-box-text").height()){
      $("#nav_header").addClass("hd_Cl");
      $(".vd-box-text").fadeOut('6000');
    }
    if($(window).scrollTop() < $(".vd-box-text").height()){
      if($("#nav_header").hasClass("hd_Cl")){
        $("#nav_header").removeClass("hd_Cl");
        $(".vd-box-text").fadeIn('3000'); 
      }
    }
    // if($(window).scrollTop()>=$('.box-text_rt, .box-text_lt').position().top){
    //  $('.box-text_rt, .box-text_lt').prop('class','wow fadeInDown');
  //    }
  });
  //on click div toggle
  $(document).on("click",".arrow_div",function(){
    $(this).hide();
    $(this).siblings(".op_div").slideToggle();
    $('html,body').animate({
        scrollTop: $(this).siblings(".op_div").offset().top},
        'slow');
  });
  $("p").mouseenter(function(){
    $(this).addClass('animated bounce');
  });
  $("p").mouseleave(function(){
    $(this).removeClass('animated bounce');
  });
  $(document).on("click",".glyphicon-menu-up",function(e){
    e.preventDefault();
    $(this).parent().parent().parent().slideUp();
    $(this).parent().parent().parent().siblings().find(".arrow_div").show();
  });


});


  var angle = 0;
function galleryspin(sign) { 
  spinner = document.querySelector("#spinner");
  if (!sign) { 
    angle = angle + 45; 
  } else { 
    angle = angle - 45; 
  }
  spinner.setAttribute("style","-webkit-transform: rotateY("+ angle +"deg); -moz-transform: rotateY("+ angle +"deg); transform: rotateY("+ angle +"deg);");
}

$(document).ready(function(){

  //on scroll video blur
  $(".op_div").slideUp();
  $(window).scroll(function(e) {
      var distanceScrolled = $(this).scrollTop();
      $('#top_vd').css('-webkit-filter', 'blur('+distanceScrolled/45+'px)');
  
    if($(window).scrollTop() > $(".vd-box-text").height()){
      $("#nav_header").addClass("hd_Cl");
      $(".vd-box-text").fadeOut('6000');
    }
    if($(window).scrollTop() < $(".vd-box-text").height()){
      if($("#nav_header").hasClass("hd_Cl")){
        $("#nav_header").removeClass("hd_Cl");
        $(".vd-box-text").fadeIn('3000'); 
      }
    }
    // if($(window).scrollTop()>=$('.box-text_rt, .box-text_lt').position().top){
    //  $('.box-text_rt, .box-text_lt').prop('class','wow fadeInDown');
  //    }
  });
  //on click div toggle
  $(document).on("click",".arrow_div",function(){
    $(this).hide();
    $(this).siblings(".op_div").slideToggle();
    $('html,body').animate({
        scrollTop: $(this).siblings(".op_div").offset().top},
        'slow');
  });
  $("p").mouseenter(function(){
    $(this).addClass('animated bounce');
  });
  $("p").mouseleave(function(){
    $(this).removeClass('animated bounce');
  });
  $(document).on("click",".glyphicon-menu-up",function(e){
    e.preventDefault();
    $(this).parent().parent().parent().slideUp();
    $(this).parent().parent().parent().siblings().find(".arrow_div").show();
  });


});


  