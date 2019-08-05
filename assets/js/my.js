
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