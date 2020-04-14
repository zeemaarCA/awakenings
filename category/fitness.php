<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../functions.php';
include '../head_inner.php';
include '../modals_inner.php';
?>

<body>
  <div class="container header">
    <div class="row">
      <img src="../assets/img/footer-logo.png" alt="">
      <?php include '../menu-inner.php'; ?>
    </div>
  </div>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item"><a href="#">Fitness</a></li>
      </ol>
    </nav>
  </div>
  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <div class="body-heading">
          <h1 class="browsing">Browsing : &nbsp; fitness</h1>
        </div>
        <div class="row">
          <?php
          $get_article = "SELECT * FROM articles WHERE third_page = 'fitness'  order by posted_at ASC";
          $run_article = mysqli_query($con, $get_article);
          while ($row_article = mysqli_fetch_array($run_article)) {
            $article_id = $row_article['article_id'];
            $article_title = $row_article['article_title'];
            $article_main_cat = $row_article['article_main_cat'];
            $article_sub_cat = $row_article['article_sub_cat'];
            $article_desc = $row_article['article_text'];
            $article_image = $row_article['featured_image'];
            $posted_at = $row_article['posted_at'];
            $trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 200) . '...' : $article_desc;
            $string_x = strip_tags($trim_desc);
            $string_y = trim($string_x);
            $timestamp = strtotime($posted_at);
          ?>
            <div class="col-lg-6">
              <div class="full-body-content">
                <div class="row">
                  <div class="col-lg-12">
                    <a href="article_detail.php?article_id=<?php echo $article_id ?>">
                      <div class="article-bg-img" style="background: url(../includes/article_images/<?php echo $article_image; ?>)">
                        <div class="date-line date_font">
                          <?php echo date('d/m/Y', $timestamp); ?>
                          <?php
                          $get_comments = "SELECT * FROM comments WHERE article_id = $article_id ";
                          $run_comments = mysqli_query($con, $get_comments);
                          $count_comments = mysqli_num_rows($run_comments);

                          ?>
                          <i class="fa fa-comment float-right pr-2"> <?php echo $count_comments; ?></i>
                        </div>
                      </div>
                    </a>
                    <div class="box">
                      <span class="green-b"><?php echo $article_main_cat ?></span>
                    </div>
                    <div class="body-lower-content">
                      <a href="article_detail.php?article_id=<?php echo $article_id ?>">
                        <h2><?php echo $article_title ?></h2>
                        <p class="mt-3"><?php echo $string_y; ?></p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <?php include 'right_column.php' ?>
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
          <a href="article_detail.php?article_id=<?php echo $article_id ?>">
            <img src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          </a>
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

  <?php include '../footer_inner.php'; ?>
  <?php include '../scripts-inner.php'; ?>


</body>

</html>