<?php
include '../includes/conn.php';

if (isset($_POST['insert_events'])) {
  $events_title = $_POST['events_title'];
  $events_desc = $_POST['article_desc'];
  // getting images
  $events_image = $_FILES['events_image']['name'];
  $events_image_tmp = $_FILES['events_image']['tmp_name'];

  move_uploaded_file($events_image_tmp,"../includes/event_images/$events_image");


  $insert_events = "INSERT INTO events (event_image,event_title,event_detail) VALUES ('$events_image','$events_title','$events_desc')";


  $insert_eve = mysqli_query($con, $insert_events);
  if ($insert_eve) {
    echo "<script>alert('Event has been posted successfully!')</script>";
    echo "<script>window.open('add_events.php', '_self')</script>";
  }
}
