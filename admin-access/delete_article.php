<!-- delete product from database -->
<?php
include '../includes/conn.php';
if (isset($_GET['del'])) {
  $article_id = $_GET['del'];
  $delete_article = "DELETE FROM articles WHERE article_id = '$article_id'";
  $run_delete = mysqli_query($con, $delete_article);
  if ($run_delete) {
    echo "<script>window.open('view_article.php', '_self')</script>";
  }
}

?>