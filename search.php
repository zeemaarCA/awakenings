<?php
session_start();
include 'functions.php';
if (isset($_POST['search-trigger'])) {
  $search = mysqli_real_escape_string($con, $_POST['search-query']);
  $sql = "SELECT * FROM holistic_posts WHERE post_name LIKE '%$search%' OR post_detail LIKE '%$search%'";
  $search_result = mysqli_query($con, $sql);
  $search_query_result = mysqli_num_rows($search_result);

  if ($search_query_result > 0) {
    while ($search_row = mysqli_fetch_assoc($search_result)) {
      echo '<div class="review-box">
            <div class="row">
              <div class="col-lg-2">
                <img src="includes/holistic_images/' . $search_row["post_img"] . '" alt="">
              </div>
              <div class="col-lg-9">
                <h2>' . $search_row["post_name"] . '</h2>
                <div>' . $search_row["post_detail"] . '</div>
              </div>

            </div>
          </div>';
    }
  } else {
    echo "There are no results matching your search!";
  }
}

?>



<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
include 'head.php';
?>

<body>

  <div class="container header">
    <div class="row">
      <img src="assets/img/footer-logo.png" alt="">
      <?php include 'menu.php'; ?>
    </div>
  </div>

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="directory.php">Holistic Directory</a></li>
        <li class="breadcrumb-item" aria-current="page">Search</li>
      </ol>
    </nav>
  </div>

  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">

        <?php
        if (isset($_POST['search-query'])) {
          $search = mysqli_real_escape_string($con, $_POST['search-query']);
          $sql = "SELECT * FROM holistic_posts WHERE post_name LIKE '%$search%' OR post_detail LIKE '%$search%'";
          $search_result = mysqli_query($con, $sql);
          $search_query_result = mysqli_num_rows($search_result);

          if ($search_query_result > 0) {
            while ($search_row = mysqli_fetch_assoc($search_result)) {
              $dir_id = $search_row['id'];
              $featured_img = $search_row['featured_img'];
              $post_img = $search_row['post_img'];
              $post_name = $search_row['post_name'];
              $post_detail = $search_row['post_detail'];
              $dir_name = $search_row['dir_name'];

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
            <?php }
          } else {
            echo "There are no results matching your search!";
          }
        } ?>
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
  <?php include 'footer.php'; ?>
  <script src="assets/js/jquery-slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/owl.carousel.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/my.js"></script>

</body>

</html>