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

  $("#myForm").on("submit",function(e){

   e.preventDefault();
    $('#user_email').html('');
    $('#user_first_name').html('');
    $('#user_last_name').html('');
    $('#message').html('');

    var user_email = $("#user_email").val();
    var user_first_name = $("#user_first_name").val();
    var user_last_name = $('#user_last_name').val();

    if ($("#user_email").val()==""){
      $("#uemail").css("color", "red");
               $("#uemail").html("Please enter Email.");
               $("#uemail").css("color", "red");
      $("#user_email").css("border", "1px solid grey");
      $("#user_email").focus();
             }
    else if ($("#user_first_name").val()==""){
              $("#ufname").html("Please enter Name.");
               $("#ufname").css("color", "red");
      $("#user_first_name").css("border", "1px solid grey");
      $("#user_first_name").focus();
        }
        else if ($("#user_last_name").val() == "") {
              $("#ulname").html("Please enter mobile.");
               $("#ulname").css("color", "red");
               $("#user_last_name").css("border", "1px solid grey");
              $("#user_last_name").focus();
        }

      else
      {
           $.ajax({
            type:"POST",
            url:"subscribe.php",
            data:{"user_email":user_email,"user_first_name":user_first_name,"user_last_name":user_last_name},
            success:function(result){
             if(result==0){
                $("#message").html("Technical error");
                 $("#message").css("color", "red");
                }
                else{
                $("#message").html("Thank you for subscribe");
               $("#message").css("color", "white");
               $('#myForm').trigger("reset");
           }
          }

    });

}




  });

   $('#customer_signup').validate({ // initialize the plugin
     rules: {
       c_name: {
         required: true
       },
       c_email: {
         required: true,
         email: true
       },
       c_pass: {
         required: true,
         minlength: 6

       },
       c_country: {
         required: true
       },
       c_city: {
         required: true
       },
       c_contact: {
         required: true

       },
       c_address: {
         required: true

       }
     },
     messages: {}
   });

   $('#customer_login').validate({
     rules: {
       email: {
         required: true,
         email: true
       },
       pass: {
         required: true
       }
     }
   });

   $('#admin_login').validate({
     rules: {
       email: {
         required: true,
         email: true
       },
       password: {
         required: true
       }
     }
   });


   $('#change_password').validate({
     rules: {
       old_password: {
         required: true,
         minlength: 6
       },
       new_password: {
         required: true,
         minlength: 6
       },
       confirm_password: {
         required: true,
         minlength: 6
       }
     }
   });

   $('#change_profile').validate({
     rules: {
       customer_name: {
         required: true
       },
       customer_country: {
         required: true
       },
       customer_city: {
         required: true
       },
       customer_contact: {
         required: true
       },
       customer_address: {
         required: true

       }
     }
   });

    // full page search
$(function () {
  $('.search-icon').on('click', function (event) {
    event.preventDefault();
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
  });

  $('#search, #search button.close').on('click keyup', function (event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
      $(this).removeClass('open');
    }
  });


});

$('.mini-slider').slick({
  dots: true
});

$('.responsive-slide').slick({
   infinite: true,
     slidesToShow: 3,
     slidesToScroll: 4
});

	var touch 	= $('#resp-menu');
	var menu 	= $('.menu');

	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
  });

  setTimeout(function () {
    $(document).ready(function () {
      $(".pre-loader").addClass('loader-end');
      $(".lds-roller").addClass('loader-end');
    });
  }, 1500);


$(document).ready(function () {
  $('.view_pro_btn').click(function () {
    var product_id = $(this).attr("id");

    $.ajax({
      url: "product_modal.php",
      method: "post",
      data: { product_id: product_id },
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
$(document).ready(function () {

  /* This is basic - uses default settings */

  $("a#single_image").fancybox();

  /* Using custom settings */

  $("a#inline").fancybox({
    'hideOnContentClick': true
  });

  /* Apply fancybox to multiple items */

  $("a.group").fancybox({
    'transitionIn': 'elastic',
    'transitionOut': 'elastic',
    'speedIn': 600,
    'speedOut': 200,
    'overlayShow': false
  });

});

