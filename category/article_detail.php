<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../functions.php';

$article_id = $_GET['article_id'];
?>

<head>
  <base href="" />
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php
  $article_id = $_GET['article_id'];
  $get_article_name = "SELECT * FROM articles WHERE article_id = '$article_id'";
  $run_article_name = mysqli_query($con, $get_article_name);

  while ($row_article_name = mysqli_fetch_array($run_article_name)) {
    $article_title = $row_article_name['article_title'];
    ?>
    <title><?php echo $article_title; ?></title>
  <?php } ?>
  <link rel="shortcut icon" type="image/png" href="../favicon.ico" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,900|Open+Sans:300,400,600,700|Roboto:300,400,500,500i,700" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/custom/style.min.css">
  <link rel="stylesheet" href="../assets/custom/products.min.css">
  <link rel="stylesheet" href="../assets/custom/checkout.min.css">
  <link rel="stylesheet" href="../assets/custom/other.min.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/button.min.css">
  <link rel="stylesheet" href="../assets/css/hover-min.css">
  <link rel="stylesheet" href="../assets/css/slick.css">
  <link rel="stylesheet" href="../assets/css/slick-theme.css">
  <link rel="stylesheet" href="../fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
</head>

<body>

  <div class="container header">
    <div class="row">
      <img src="../assets/img/footer-logo.png" alt="">
      <?php include '../menu-inner.php'; ?>
    </div>
  </div>
  <?php
  $get_article_name = "SELECT * FROM articles WHERE article_id = '$article_id'";
  $run_article_name = mysqli_query($con, $get_article_name);

  while ($row_article_name = mysqli_fetch_array($run_article_name)) {
    $article_title = $row_article_name['article_title'];
    ?>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="directory.php">Category</a></li>
          <li class="breadcrumb-item" aria-current="page"><?php echo $article_title; ?></li>
        </ol>
      </nav>
    </div>
  <?php } ?>
  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <?php
        $get_article_detail = "SELECT * FROM articles WHERE article_id = '$article_id'";
        $run_article_detail = mysqli_query($con, $get_article_detail);

        while ($row_article_detail = mysqli_fetch_array($run_article_detail)) {
          $article_id = $row_article_detail['article_id'];
          $article_title = $row_article_detail['article_title'];
          $article_main_cat = $row_article_detail['article_main_cat'];
          $article_sub_cat = $row_article_detail['article_sub_cat'];
          $article_desc = $row_article_detail['article_text'];
          $article_image = $row_article_detail['featured_image'];
          $posted_at = $row_article_detail['posted_at'];

          ?>
          <div class="review-box">
            <div class="row">
              <div class="col-lg-12">
                <img src="../includes/article_images/<?php echo $article_image; ?>" alt="">
                <div class="categories-article mt-3">
                  <span class="badge badge-pill badge-success text-white"><?php echo $article_main_cat ?></span>
                  <span class="badge badge-pill badge-warning text-white"><?php echo $article_sub_cat ?></span>
                  <span><i><?php echo $posted_at ?></i></span>
                </div>
                <h2><?php echo $article_title; ?></h2>
                <div><?php echo $article_desc; ?></div>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-3">
        <div class="right-img-directory">
          <img src="../assets/img/right-side-img.jpg" alt="">
          <img src="../assets/img/right-side-img.jpg" class="mt-3" alt="">
          <img src="../assets/img/right-side-img.jpg" class="mt-3" alt="">
          <img src="../assets/img/right-side-img.jpg" class="mt-3" alt="">
        </div>
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
      <?php
      $get_article = "SELECT * FROM articles order by RAND() LIMIT 3";
      $run_article = mysqli_query($con, $get_article);
      while ($row_article = mysqli_fetch_array($run_article)) {
        $article_id = $row_article['article_id'];
        $article_title = $row_article['article_title'];
        $article_main_cat = $row_article['article_main_cat'];
        $article_sub_cat = $row_article['article_sub_cat'];
        $article_desc = $row_article['article_text'];
        $article_image = $row_article['featured_image'];
        $posted_at = $row_article['posted_at'];
        $trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 150) . '...' : $article_desc;
        ?>
        <div class="col-lg-4">
          <img src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          <div class="box">
            <span class="green-b"><?php echo $article_main_cat ?></span>
          </div>
          <div class="top-pics-heading">
            <a href="article_detail.php?article_id=<?php echo $article_id ?>">
              <h4><?php echo $article_title ?></h4>
            </a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <!-- footer -->
  <?php include '../footer_inner.php'; ?>
  <?php include '../scripts-inner.php'; ?>



</body>

</html>