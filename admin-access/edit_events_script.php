<?php
include '../includes/conn.php';
if(isset($_POST['update_event'])){

  //getting the text data from the fields

  $event_id = $_POST['event_id'];
  $event_title = $_POST['event_title'];

  $event_detail = $_POST['article_desc'];

  $event_image = $_FILES['event_image']['name'];
  $event_image_tmp = $_FILES['event_image']['tmp_name'];

  if ($event_image_tmp != "") {
    move_uploaded_file($event_image_tmp, "../includes/event_images/$event_image");
    $update_event = "UPDATE events SET event_image='$event_image',event_title='$event_title',event_detail='$event_detail' WHERE event_id='$event_id'";
    if (!$update_event) {
      printf("Error: %s\n", mysqli_error($con));
      exit();
    }
  } else {
    $update_event = "UPDATE events SET event_title='$event_title',event_detail='$event_detail' WHERE event_id='$event_id'";
  }





  $run_event = mysqli_query($con, $update_event);

  if($run_event){

    echo "<script>alert('Event has been updated!')</script>";
    echo "<script>window.open('view_events.php', '_self')</script>";
  } else {
    echo 'Error';
  }

}
