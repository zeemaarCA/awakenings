<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'functions.php';
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
        <li class="breadcrumb-item"><a href="#">Body</a></li>
        <li class="breadcrumb-item" aria-current="page">Food Allergy or Food Intolerance?</li>
      </ol>
    </nav>
  </div>



  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <div class="body-heading">
          <h1>awakened body main</h1>
          <div class="mini-nav">
            <ul>
              <li><a href="#">all</a></li>
              <li><a href="#">beauty</a></li>
              <li><a href="#">fitness</a></li>
              <li><a href="#">nutrition</a></li>
              <li><a href="#">weight-loss</a></li>
              <li><a href="#">yoga</a></li>
            </ul>
          </div>
        </div>
        <div class="container aw-latest-img px-0">
          <img src="assets/img/body-hand.jpg" alt="">
        </div>
        <?php
        $get_article = "SELECT * FROM articles order by posted_at DESC";
        $run_article = mysqli_query($con, $get_article);

        while ($row_article = mysqli_fetch_array($run_article)) {
          $article_id = $row_article['article_id'];
          $article_title = $row_article['article_title'];
          $article_main_cat = $row_article['article_main_cat'];
          $article_sub_cat = $row_article['article_sub_cat'];
          $article_desc = $row_article['article_text'];
          $article_image = $row_article['featured_image'];
          $posted_at = $row_article['posted_at'];
          ?>
          <div class="full-body-content">
            <div class="row">
              <div class="col-lg-5">
                <img src="includes/article_images/<?php echo $article_image; ?>" alt="">
              </div>
              <div class="col-lg-7">
                <div class="body-lower-content">
                  <h2><?php echo $article_title ?></h2>
                  <i><?php echo $posted_at ?></i>
                  <div class="categories-article">
                    <span class="badge badge-pill badge-success text-white"><?php echo $article_main_cat ?></span>
                    <span class="badge badge-pill badge-warning text-white"><?php echo $article_sub_cat ?></span>
                  </div>
                  <p><?php echo $article_desc ?></p>
                  <a href="#">read more</a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <div class="full-body-content">
          <div class="row">
            <div class="col-lg-5">
              <img src="assets/img/girl-air.jpg" alt="">
            </div>
            <div class="col-lg-7">
              <div class="body-lower-content">
                <h2>10 Easy Ways To Practice Mindfulness</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ad, saepe. Tempore deleniti vel ipsam a modi possimus quam temporibus animi! Corrupti ad eos, suscipit non distinctio aut vero quidem laborum vel laudantium. Amet in, totam error temporibus sapiente, dolor aut ratione est maxime officiis? Officiis, eos, ut? Excepturi, rerum?</p>
                <a href="#">read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="full-body-content">
          <div class="row">
            <div class="col-lg-5">
              <img src="assets/img/fruit.jpg" alt="">
            </div>
            <div class="col-lg-7">
              <div class="body-lower-content">
                <h2>To Live Longer, Cleanse Now!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ad, saepe. Tempore deleniti vel ipsam a modi possimus quam temporibus animi! Corrupti ad eos, suscipit non distinctio aut vero quidem laborum vel laudantium. Amet in, totam error temporibus sapiente, dolor aut ratione est maxime officiis? Officiis, eos, ut? Excepturi, rerum?</p>
                <a href="#">read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="full-body-content">
          <div class="row">
            <div class="col-lg-5">
              <img src="assets/img/meat.jpg" alt="">
            </div>
            <div class="col-lg-7">
              <div class="body-lower-content">
                <h2>the ketogenic way of life</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ad, saepe. Tempore deleniti vel ipsam a modi possimus quam temporibus animi! Corrupti ad eos, suscipit non distinctio aut vero quidem laborum vel laudantium. Amet in, totam error temporibus sapiente, dolor aut ratione est maxime officiis? Officiis, eos, ut? Excepturi, rerum?</p>
                <a href="#">read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="full-body-content">
          <div class="row">
            <div class="col-lg-5">
              <img src="assets/img/group.jpg" alt="">
            </div>
            <div class="col-lg-7">
              <div class="body-lower-content">
                <h2>can your mind heal your body</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ad, saepe. Tempore deleniti vel ipsam a modi possimus quam temporibus animi! Corrupti ad eos, suscipit non distinctio aut vero quidem laborum vel laudantium. Amet in, totam error temporibus sapiente, dolor aut ratione est maxime officiis? Officiis, eos, ut? Excepturi, rerum?</p>
                <a href="#">read more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="right-img-directory">
          <img src="assets/img/right-side-img.jpg" alt="">
          <img src="assets/img/right-side-img.jpg" class="mt-3" alt="">
          <img src="assets/img/right-side-img.jpg" class="mt-3" alt="">
          <img src="assets/img/right-side-img.jpg" class="mt-3" alt="">
        </div>
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
        <img src="assets/img/body1.jpg" alt="">
        <div class="top-pics-heading">
          <h4>anti ageing tips</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <img src="assets/img/body2.jpg" alt="">
        <div class="top-pics-heading">
          <h4>the year of the dog</h4>
        </div>
      </div>
      <div class="col-lg-4">
        <img src="assets/img/body3.jpg" alt="">
        <div class="top-pics-heading">
          <h4>how to get the universe on your side</h4>
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