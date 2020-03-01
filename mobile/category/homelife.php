<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../../functions.php';
include '../head_inner.php';
include '../modals_inner.php';
?>

<body>
  <?php include '../menu-inner.php'; ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2>homelife</h2>
    </div>
    <?php
    $get_article = "SELECT * FROM articles WHERE page_name = 'homelife'  order by posted_at ASC";
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
          <div class="categories">
            <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
          </div>
          <div class="date">
            <span><?php echo $posted_at ?></span>
          </div>
          <div class="title">
            <h3><?php echo $article_title ?></h3>
          </div>
          <div class="read-more">
            <a href="article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
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

    <?php include '../footer-inner.php'; ?>
  </div>
  <?php include '../scripts-inner.php'; ?>


</body>

</html>