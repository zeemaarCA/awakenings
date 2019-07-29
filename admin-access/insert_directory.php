<?php
include '../includes/conn.php';

if (isset($_POST['insert_directory'])) {
  $dir_name = $_POST['dir_name'];

  $insert_dir = "INSERT INTO holistic_directory (dir_name) VALUES ('$dir_name')";


  $insert_directory = mysqli_query($con, $insert_dir);
  if ($insert_directory) {
    echo "<script>alert('Directory has been posted successfully!')</script>";
    echo "<script>window.open('holistic_directory.php', '_self')</script>";
  }
  else {
    echo 'problem';
  }
}
