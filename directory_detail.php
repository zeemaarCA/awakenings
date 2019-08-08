<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'functions.php';
include 'head.php';
include 'modals.php';
$dir_id = $_GET['dir_id'];
?>

<body>

  <div class="container header">
    <div class="row">
      <img src="assets/img/footer-logo.png" alt="">
      <?php include 'menu.php'; ?>
    </div>
  </div>
  <?php
  $get_dir_name = "SELECT * FROM holistic_directory WHERE dir_id = $dir_id";
  $run_dir_name = mysqli_query($con, $get_dir_name);

  while ($row_dir_name = mysqli_fetch_array($run_dir_name)) {
    $dir_title = $row_dir_name['dir_name'];
    ?>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="directory.php">Holistic Directory</a></li>
          <li class="breadcrumb-item" aria-current="page"><?php echo $dir_title; ?></li>
        </ol>
      </nav>
    </div>
  <?php } ?>
  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <div class="container aw-latest-img px-0">
          <div class="row align-items-center">
            <div class="col-lg-7 offset-lg-5 align-self-center">
              <h3>Listing Category <br />
                <?php echo $dir_title; ?></h3>
            </div>
          </div>
        </div>
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
          <div class="review-box">
            <div class="row">
              <div class="col-lg-2">
                <img src="includes/holistic_images/<?php echo $post_img; ?>" alt="">
              </div>
              <div class="col-lg-9">
                <h2><?php echo $post_name; ?></h2>
                <div><?php echo $post_detail; ?></div>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-3">
        <?php include 'right_column.php'; ?>
      </div>
    </div>
  </div>
  <div class="container color-bg">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>For more information and to book your appointment please call: 800 ALLIED (255433)</li>
          <li>Phone: 04 3328111 / 04 3329928</li>
          <li>Fax: 04 3328222
          </li>
          <li>www.facebook.com/AlliedMedCenter
          </li>
          <li>www.instagram.com/alliedmedicalcenter
          </li>
          <li>Email: dubai-adc@allieddiagnostics.net</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>related post</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>
  <div class="container related-post">
    <div class="row">
      <div class="col-lg-4">
        <img src="assets/img/girl-cake.jpg" alt="">
        <div class="box">
          <span class="green-b">body</span>
        </div>
        <div class="top-pics-heading">
          <h4>Food Allergy or Food Intolerance?</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <img src="assets/img/girl-air.jpg" alt="">
        <div class="box">
          <span class="orange-b">meditation</span>
        </div>
        <div class="top-pics-heading">
          <h4>10 easy ways to practice Mindfulness</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <img src="assets/img/girl-cake.jpg" alt="">
        <div class="box">
          <span class="green-b">body</span>
        </div>
        <div class="top-pics-heading">
          <h4>To live longer, cleanse now</h4>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>


</body>

</html>