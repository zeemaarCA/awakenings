<?php
include '../includes/conn.php';
if(isset($_POST['update_article'])){

  //getting the text data from the fields

  $article_id = $_POST['article_id'];
  $article_title = $_POST['article_title'];
  $article_main_cat = $_POST['article_main_cat'];
  $article_sub_cat = $_POST['article_sub_cat'];
  $page_name = $_POST['page_name'];
  
  $article_desc = $_POST['article_desc'];


  $update_article = "UPDATE articles SET article_title='$article_title',article_main_cat='$article_main_cat',article_sub_cat='$article_sub_cat', page_name= '$page_name', article_text= '$article_desc' WHERE article_id='$article_id'";



  $run_article = mysqli_query($con, $update_article);

  if($run_article){

    echo "<script>alert('Article has been updated!')</script>";
    echo "<script>window.open('view_article.php', '_self')</script>";
  } else {
    echo 'naa bai naaa';
  }

}
