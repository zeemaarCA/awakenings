<?php
include '../includes/conn.php';

if (isset($_POST['insert_post'])) {
  $post_title = $_POST['post_title'];
  $dir_cat = $_POST['dir_cat'];
  $post_desc = $_POST['article_desc'];
  // getting images
  $featured_image = $_FILES['featured_image']['name'];
  $featured_image_tmp = $_FILES['featured_image']['tmp_name'];

  move_uploaded_file($featured_image_tmp,"../includes/holistic_images/$featured_image");

  $post_image = $_FILES['post_image']['name'];
  $post_image_tmp = $_FILES['post_image']['tmp_name'];

  move_uploaded_file($post_image_tmp, "../includes/holistic_images/$post_image");


  $insert_post = "INSERT INTO holistic_posts (featured_img, post_img, post_name, post_detail, dir_name) VALUES ('$featured_image','$post_image','$post_title','$post_desc','$dir_cat')";


  $insert_arc = mysqli_query($con, $insert_post);
  if ($insert_arc) {
    echo "<script>alert('Post has been posted successfully!')</script>";
    echo "<script>window.open('holistic_directory.php', '_self')</script>";
  }
}
