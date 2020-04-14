<!-- delete product from database -->
<?php
include '../includes/conn.php';
if (isset($_GET['del'])) {
  $event_id = $_GET['del'];
  $delete_article = "DELETE FROM events WHERE event_id = '$event_id'";
  $run_delete = mysqli_query($con, $delete_article);
  if ($run_delete) {
    echo "<script>window.open('view_events.php', '_self')</script>";
  }
}

?>