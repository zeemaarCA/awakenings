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
      <div class="col-lg-4">
        <img src="../assets/img/girl-cake.jpg" alt="">
        <div class="box">
          <span class="green-b">body</span>
        </div>
        <div class="top-pics-heading">
          <h4>Food Allergy or Food Intolerance?</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <img src="../assets/img/girl-air.jpg" alt="">
        <div class="box">
          <span class="orange-b">meditation</span>
        </div>
        <div class="top-pics-heading">
          <h4>10 easy ways to practice Mindfulness</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <img src="../assets/img/girl-cake.jpg" alt="">
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
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-items">
            <h3>RETURNS, REFUNDS AND EXCHANGES</h3>
            <a href="#">Click here for our policy on returns and
              subscription cancellations</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-items">
            <h3>TERMS AND CONDITIONS</h3>
            <a href="#">Click here for our Terms and Conditions</a>
            <div class="contact-us-btn">
              <a href="#"><i class="fa fa-phone"></i> contact us</a>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="footer-items">
            <h3>PRIVACY POLICY</h3>
            <a href="#">Click here for our Terms and Conditions</a>
            <hr>
            <div class="news-letter">
              <h3>newsletter</h3>
              <input type="email" placeholder="Your Email">
              <button>subscribe</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-7">
          <img src="../assets/img/footer-logo.png" alt="">
          <div class="social-icons">
            <a href="#" class="hvr-grow-rotate" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="hvr-grow-rotate" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="hvr-grow-rotate" title="Instagram"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
        <div class="col-lg-5">
          &nbsp;
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright&copy; Awakenings Magazine</p>
          <p>All rights reserved. No part of this publication may be reproduced, distributed, or transmitted in any form or by any means, including photocopying, recording, or other electronic or mechanical methods, without the prior written permission of the publisher.</p>

        </div>
      </div>
    </div>
  </footer>
  <!-- footer -->
  <script src="../assets/js/jquery-slim.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/wow.min.js"></script>
  <script src="../assets/js/slick.min.js"></script>
  <script src="../assets/js/my.js"></script>

</body>

</html>