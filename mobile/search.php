<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
include '../functions.php';
include 'head.php';
include '../modals_inner.php';

?>

<body>
  <?php include 'menu.php'; ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2>Search <span>results</span></h2>
    </div>
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
          $article_desc = $search_row['article_text'];
          $posted_at = $search_row['posted_at'];
          $trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 150) . '...' : $article_desc;
          $dt = new DateTime($posted_at);
          $timestamp = strtotime($posted_at);

    ?>
          <div class="random-posts">
            <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
              <div class="feature-img">
                <div class="bg-img" style="background: url(../includes/article_images/<?php echo $article_image; ?>)">
                </div>
              </div>
              <div class="feature-text">
                <div class="title">
                  <h3><?php echo $article_title ?></h3>
                </div>
                <div class="categories">
                  <span><?php echo $article_main_cat ?></span>
                </div>
                <div class="date">
                  <span class="article_date">
                    <?php echo date('d/m/Y', $timestamp); ?>
                  </span>
                </div>
              </div>
            </a>
          </div>
    <?php }
      } else {
        echo "There are no results matching your search!";
      }
    } ?>
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
      $dt = new DateTime($posted_at);
      $timestamp = strtotime($posted_at);
    ?>
      <div class="random-posts">
        <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
          <div class="feature-img">
            <div class="bg-img" style="background: url(../includes/article_images/<?php echo $article_image; ?>)">
            </div>
          </div>
          <div class="feature-text">
            <div class="title">
              <h3><?php echo $article_title ?></h3>
            </div>
            <div class="categories">
              <span><?php echo $article_main_cat ?></span>
            </div>
            <div class="date">
              <span class="article_date">
                <?php echo date('d/m/Y', $timestamp); ?>
              </span>
            </div>
          </div>
        </a>
      </div>
    <?php
    }
    ?>
    <?php include 'footer.php'; ?>
  </div>
  <?php include 'scripts.php'; ?>


</body>

</html>