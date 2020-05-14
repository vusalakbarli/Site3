$(document).ready(function () {
  $('article').prependTo($('.main-text'));
  $('article h1').appendTo($('.for-h'));

  //menu toggle
  $(".nav-toggle").click(function () {
    burgerChange();
    $(".header-nav").slideToggle("fast");
  });

  function burgerChange() {
    if ($(".header-nav").css("display") == "block") {
      $(".burger_top").css({
        transform: "none"
      });
      $(".burger_bottom").css({
        transform: "none"
      });
      $(".burger_meat").css({
        opacity: "1"
      });
    } else {
      $(".burger_top").css({
        transform: "translateY(12px) rotate(45deg)"
      });
      $(".burger_bottom").css({
        transform: "translateY(-8px) rotate(-45deg)"
      });
      $(".burger_meat").css({
        opacity: "0"
      });
    }
  }



  $('.akkordeon-header').click(function(){
    $(this).next().slideToggle();
    $(this).toggleClass('open');
  });

});