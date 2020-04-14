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
              <div class="col-lg-9 border-0">
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
          <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
            <img src="includes/article_images/<?php echo $article_image; ?>" alt="">
          </a>
          <div class="box">
            <span class="green-b"><?php echo $article_main_cat ?></span>
          </div>
          <div class="top-pics-heading">
            <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
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
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>


</body>

</html>