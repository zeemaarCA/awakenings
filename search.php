<?php
session_start();
include 'functions.php';
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
        <li class="breadcrumb-item"><a href="directory.php">Articles</a></li>
        <li class="breadcrumb-item" aria-current="page">Search</li>
      </ol>
    </nav>
  </div>

  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <div class="body-heading">
          <h1>awakened Posts</h1>
        </div>
        <div class="row">

          <?php
          if (isset($_POST['search-trigger'])) {
            $search = mysqli_real_escape_string($con, $_POST['search-query']);
            $sql = "SELECT * FROM articles WHERE article_title LIKE '%$search%'";
            $search_result = mysqli_query($con, $sql);
            $search_query_result = mysqli_num_rows($search_result);

            if ($search_query_result > 0) {
              while ($search_row = mysqli_fetch_assoc($search_result)) {
                $article_id = $search_row['article_id'];
                $article_title = $search_row['article_title'];
                $article_main_cat = $search_row['article_main_cat'];
                $article_sub_cat = $search_row['article_sub_cat'];
                $article_image = $search_row['featured_image'];
                $posted_at = $search_row['posted_at'];

                ?>
                <div class="col-lg-6">
                  <div class="full-body-content">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="article-bg-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
                        <div class="body-lower-content">
                          <h2><?php echo $article_title ?></h2>
                          <i><?php echo $posted_at ?></i>
                          <div class="categories-article">
                            <span class="badge badge-pill badge-success text-white"><?php echo $article_main_cat ?></span>
                            <span class="badge badge-pill badge-warning text-white"><?php echo $article_sub_cat ?></span>
                          </div>
                          <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read Article</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }
            } else {
              echo "There are no results matching your search!";
            }
          } ?>
        </div>
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
  <?php include 'scripts.php'; ?>


</body>

</html>