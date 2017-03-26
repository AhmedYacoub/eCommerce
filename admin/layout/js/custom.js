
$(document).ready(function(){
  $(this).children().find(".btn1").fadeOut(0);
  $(this).children().find(".btn2").fadeOut(0);
});

$(".section").hover(function(){
    $(this).children().find(".btn1").fadeToggle(1000);
    $(this).children().find(".btn2").fadeToggle(1000);
  });

$("#userArrow").click(function(){
  	$("#userSection").slideToggle("slow");
  });

  $("#catArrow").click(function(){
  	$("#itemSection").slideToggle("slow");
  });
