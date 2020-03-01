<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../functions.php';
include 'head.php';
include '../modals.php';
$dir_id = $_GET['dir_id'];
?>

<body>
  <?php include 'menu.php'; ?>

  <?php
  $get_dir_name = "SELECT * FROM holistic_directory WHERE dir_id = $dir_id";
  $run_dir_name = mysqli_query($con, $get_dir_name);

  while ($row_dir_name = mysqli_fetch_array($run_dir_name)) {
    $dir_title = $row_dir_name['dir_name'];
  ?>

  <?php } ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2><?php echo $dir_title; ?></h3>
      </h2>
    </div>
    <div class="container aw-latest-text">
      <div class="row">
        <div class="col-lg-9 px-0">
          <?php
          $get_dir_detail = "SELECT * FROM holistic_posts WHERE dir_name = $dir_id";
          $run_dir_detail = mysqli_query($con, $get_dir_detail);

          while ($row_dir_detail = mysqli_fetch_array($run_dir_detail)) {
            $dir_id = $row_dir_detail['id'];
            $featured_img = $row_dir_detail['featured_img'];
            $post_img = $row_dir_detail['post_img'];
            $post_name = $row_dir_detail['post_name'];
            $post_detail = $row_dir_detail['post_detail'];
            $dir_name = $row_dir_detail['dir_name'];

          ?>
            <div class="detail-post">
              <div class="feature-img">
                <img class="img-fluid" src="../includes/holistic_images/<?php echo $post_img; ?>" alt="">
              </div>
              <div class="feature-text">
                <div class="title">
                  <h3><?php echo $post_name; ?></h3>
                </div>
                <div class="description">
                  <?php echo $post_detail; ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php include 'footer.php'; ?>
  </div>
  <?php include 'scripts.php'; ?>


</body>

</html>