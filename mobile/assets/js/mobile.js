$('#toggle').click(function () {
  $(this).toggleClass('active');
  $('#overlay').toggleClass('open');
});

$('.mb-nav.onee').click(function () {
  $('.mobile-nav.s-onee').toggleClass('open');
  $('.mobile-nav.s-twoo').removeClass('open');
  $('.mobile-nav.s-threee').removeClass('open');
});
$('.mb-nav.twoo').click(function () {
  $('.mobile-nav.s-twoo').toggleClass('open');
  $('.mobile-nav.s-onee').removeClass('open');
  $('.mobile-nav.s-threee').removeClass('open');
});
$('.mb-nav.threee').click(function () {
  $('.mobile-nav.s-threee').toggleClass('open');
  $('.mobile-nav.s-twoo').removeClass('open');
  $('.mobile-nav.s-onee').removeClass('open');
});
setTimeout(function () {
  $(document).ready(function () {
    $(".pre-loader").addClass('loader-end');
    $(".lds-roller").addClass('loader-end');
  });
}, 2000);

$(document).ready(function () {
  $('.view_pro_btn').click(function () {
    var product_id = $(this).attr("id");

    $.ajax({
      url: "product_modal.php",
      method: "post",
      data: {
        product_id: product_id
      },
      success: function (data) {
        $("#pro_detail").html(data);
        $('#product_detail').modal("show");
      }

    });


  });
});

(function ($) {
  'use strict';
  var form = $('.contact__form'),
    message = $('.contact__msg'),
    form_data;
  // Success function
  function done_func(response) {
    message.fadeIn().removeClass('alert-danger').addClass('alert-success');
    message.text(response);
    setTimeout(function () {
      message.fadeOut();
    }, 2000);
    form.find('input:not([type="submit"]), textarea').val('');
  }
  // fail function
  function fail_func(data) {
    message.fadeIn().removeClass('alert-success').addClass('alert-success');
    message.text(data.responseText);
    setTimeout(function () {
      message.fadeOut();
    }, 2000);
  }

  form.submit(function (e) {
    e.preventDefault();
    form_data = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form_data
      })
      .done(done_func)
      .fail(fail_func);
  });

})(jQuery);

// $('.nav-top').toggleClass('fixed', $(window).scrollTop() > 50);
$(window).bind('scroll', function () {
  if ($(window).scrollTop() > 150) {
    $('.nav-top').addClass('fixed');
    $('.button_container').addClass('d-block');
    $('.button_container').addClass('slideInLeft');
    $('.search-top').addClass('d-block');
    $('.search-top').addClass('slideInRight');
    $('.body-wrapper').addClass('t-120');
  } else {
    $('.nav-top').removeClass('fixed');
    $('.button_container').removeClass('d-block');
    $('.search-top').removeClass('d-block');
    $('.body-wrapper').removeClass('t-120');
  }
});

// on-particles
// $(function () {
//   $('.feature-text').onScreen({
//     tolerance: 10,
//     toggleClass: false,
//     doIn: function () {
//       $('.feature-text').addClass('darker-bg');
//     },
//     doOut: function () {
//       $('.feature-text').removeClass('darker-bg');
//     }
//   });
// });