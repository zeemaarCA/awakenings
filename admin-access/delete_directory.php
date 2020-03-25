<!-- delete product from database -->
<?php
include '../includes/conn.php';
if (isset($_GET['del'])) {
  $directory_id = $_GET['del'];
  $delete_article = "DELETE FROM holistic_posts WHERE id = '$directory_id'";
  $run_delete = mysqli_query($con, $delete_article);
  if ($run_delete) {
    echo "<script>window.open('view_directory.php', '_self')</script>";
  }
}

?>