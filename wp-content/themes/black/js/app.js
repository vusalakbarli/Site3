$(document).ready(function () {
  $('article').prependTo($('.main-text'));
  $('article h1').appendTo($('.for-h'));

  //menu toggle
  $(".nav-toggle").click(function () {
    burgerChange();
    $(".header-nav-list").slideToggle("fast");
    // $('.header').toggleClass('menu-collapsed').addClass('fixed');
  });

  function burgerChange() {
    if ($(".header-nav-list").css("display") == "block") {
      $(".burger_top").css({ transform: "none" });
      $(".burger_bottom").css({ transform: "none" });
      $(".burger_meat").css({ opacity: "1" });
      // $("body").css( "overflow-y", "auto" );
    } else {
      $(".burger_top").css({ transform: "translateY(12px) rotate(45deg)" });
      $(".burger_bottom").css({ transform: "translateY(-8px) rotate(-45deg)" });
      $(".burger_meat").css({ opacity: "0" });
      // $("body").css( "overflow-y", "hidden" );
    }
  }

  $('.post-preview_slider').slick({
    slidesToShow: 3,
    autoplay: false,
    slidesToScroll: 1,
    appendArrows: $('.post-preview_slider-arrows .container'),
    responsive: [
      {
        breakpoint:1241,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint:821,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });

  var elements = document.getElementsByTagName("INPUT");
  for (var i = 0; i < elements.length; i++) {
    elements[i].oninvalid = function(e) {
      e.target.setCustomValidity("");
      if (!e.target.validity.valid) {
        e.target.setCustomValidity("Please fill the contact form correctly");
      }
    };
    elements[i].oninput = function(e) {
      e.target.setCustomValidity("");
    };
  }

});