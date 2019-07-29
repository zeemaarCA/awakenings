<?php
include '../includes/conn.php';

if (isset($_POST['insert_article'])) {
  $article_title = $_POST['article_title'];
  $article_main_cat = $_POST['article_main_cat'];
  $article_sub_cat = $_POST['article_sub_cat'];
  $article_desc = $_POST['article_desc'];
  // getting images
  $article_image = $_FILES['article_image']['name'];
  $article_image_tmp = $_FILES[ 'article_image']['tmp_name'];

  move_uploaded_file($article_image_tmp,"../includes/article_images/$article_image");


  $insert_article = "INSERT INTO articles (article_title,article_main_cat,article_sub_cat,article_text,featured_image) VALUES ('$article_title','$article_main_cat','$article_sub_cat','$article_desc','$article_image')";


  $insert_arc = mysqli_query($con, $insert_article);
  if ($insert_arc) {
    echo "<script>alert('Article has been posted successfully!')</script>";
    echo "<script>window.open('add_article.php', '_self')</script>";
  }
}
