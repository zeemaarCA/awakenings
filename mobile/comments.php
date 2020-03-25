<?php
include '../functions.php';
if (isset($_POST['submit_comment'])) {



  $article_id = $_POST['article_id'];
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_comment = mysqli_real_escape_string($con, $_POST['c_comment']);

  $insert_comment = "INSERT INTO comments (article_id,c_name,c_email,c_comment) VALUES ('$article_id','$c_name','$c_email','$c_comment')";


  $insert_comm = mysqli_query($con, $insert_comment);
  if ($insert_comm) {
    echo "<script>alert('Comment has been posted successfully!')</script>";
    echo "<script>window.open('category/article_detail.php?article_id=$article_id', '_self')</script>";
  }
}
