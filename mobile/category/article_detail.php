<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../../functions.php';

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
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/mobile.min.css">
  <link rel="stylesheet" href="../../assets/css/animate.css">
  <link rel="stylesheet" href="../../assets/css/button.min.css">
  <link rel="stylesheet" href="../../assets/css/hover-min.css">
  <link rel="stylesheet" href="../../assets/css/slick.css">
  <link rel="stylesheet" href="../../assets/css/slick-theme.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' />
</head>
<?php include '../../modals_inner.php'; ?>

<body>
  <?php
  function getAddress()
  {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  }

  ?>
  <?php include '../menu-inner.php'; ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2>Article <span class="gold">detail</span></h2>
    </div>
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
      <div class="detail-post">
        <div class="feature-img">
          <img class="img-fluid" src="../../includes/article_images/<?php echo $article_image; ?>" alt="">
        </div>
        <div class="feature-text">
          <div class="categories">
            <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
          </div>
          <div class="date">
            <span><?php echo $posted_at ?></span>
          </div>
          <div class="title">
            <h3><?php echo $article_title; ?></h3>
          </div>
          <div class="description">
            <?php echo $article_desc; ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="posts-heading">
      <h2>related <span class="gold">articles</span></h2>
    </div>
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
      <div class="random-posts">
        <div class="feature-img">
          <img class="img-fluid" src="../../includes/article_images/<?php echo $article_image; ?>" alt="">
        </div>
        <div class="feature-text">
          <div class="title">
            <h3><?php echo $article_title ?></h3>
          </div>
          <div class="categories">
            <span><?php echo $article_main_cat ?></span>
          </div>
          <div class="date">
            <span>12-04-2020</span>
          </div>
          <hr>
          <div class="read-more">
            <a href="article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <!-- footer -->
    <?php include '../footer-inner.php'; ?>
  </div>
  <?php include '../scripts-inner.php'; ?>



</body>

</html>