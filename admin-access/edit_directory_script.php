<?php
include '../includes/conn.php';
if(isset($_POST['update_directory'])){

  //getting the text data from the fields

  $directory_id = $_POST['directory_id'];
  $directory_title = $_POST['directory_title'];
  $dir_name = $_POST['dir_name'];
  $directory_desc = $_POST['article_desc'];

  $directory_image = $_FILES['directory_image']['name'];
  $directory_image_tmp = $_FILES['directory_image']['tmp_name'];

  if ($directory_image_tmp != "") {
    move_uploaded_file($directory_image_tmp, "../includes/holistic_images/$directory_image");

    $update_directory = "UPDATE holistic_posts SET post_img='$directory_image', post_name= '$directory_title', post_detail='$directory_desc, dir_name='$dir_name' WHERE id='$directory_id'";
    if (!$update_directory) {
      printf("Error: %s\n", mysqli_error($con));
      exit();
    }
  } else {
    $update_directory = "UPDATE holistic_posts SET post_name= '$directory_title', post_detail='$directory_desc', dir_name='$dir_name' WHERE id='$directory_id'";
  }





  $run_directory = mysqli_query($con, $update_directory);

  if($run_directory){

    echo "<script>alert('Directory has been updated!')</script>";
    echo "<script>window.open('view_directory.php', '_self')</script>";
  } else {
    echo 'Error';
  }

}
