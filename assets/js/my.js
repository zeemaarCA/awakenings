
new WOW().init();

$(document).ready(function () {
  $(".overlay, .tanker, nav").hover(function () {
    $(".top-img").css("opacity", "0");
  }, function () {
    $(".top-img").css("opacity", "1");
  });
});
// trigger-toast
$('.trigger-toast').click(function () {
  $('.container-toast').addClass('visi-visible');
  $('.rectangle').addClass('anim-toast');
  $('.notification-text').addClass('anim-text');
});

$('#close-trigger').click(function () {
  $('.container-toast').removeClass('visi-visible');
  $('.rectangle').removeClass('anim-toast');
  $('.notification-text').removeClass('anim-text');
});

    // trigger-toast

    // full page search
$(function () {
  $('#search-icon').on('click', function (event) {
    event.preventDefault();
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
  });

  $('#search, #search button.close').on('click keyup', function (event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
      $(this).removeClass('open');
    }
  });

  $('form').submit(function (event) {
    event.preventDefault();
    return false;
  });
});
    // full page search

document.onkeydown = function (evt) {
  var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
  if (keyCode == 13) {
    //your function call here
    document.test.submit();
  }
};

$('.mini-slider').slick({
  dots: true
});

$('.responsive-slide').slick({
   infinite: true,
     slidesToShow: 4,
     slidesToScroll: 4
});