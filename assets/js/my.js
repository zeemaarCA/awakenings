
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
       c_code: {
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


});

$('.mini-slider').slick({
  dots: true
});

$('.responsive-slide').slick({
   infinite: true,
     slidesToShow: 4,
     slidesToScroll: 4
});