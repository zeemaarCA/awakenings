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
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,500,500i,600,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css' />
  <link rel="stylesheet" href="../assets/css/mobile.min.css?<?php echo date('YmdHis'); ?>">
  <link rel="stylesheet" href="../assets/css/modals.min.css?<?php echo date('YmdHis'); ?>">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.1/animate.min.css' />
  <link rel="stylesheet" href="../../assets/css/button.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' />
  <script type="text/javascript">
    if (screen.width >= 699) {
      window.location = "../../index.php";
    }
  </script>
</head>
<?php include '../modals_inner.php'; ?>

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
      $article_tag = $row_article_detail['article_tag'];
      $article_desc = $row_article_detail['article_text'];
      $article_image = $row_article_detail['featured_image'];
      $posted_at = $row_article_detail['posted_at'];
      $tags = $article_tag;
      $dt = new DateTime($posted_at);
      $timestamp = strtotime($posted_at);
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
            <span><?php echo $dt->format('Y-m-d'); ?></span>
          </div>
          <div class="title">
            <h3><?php echo $article_title; ?></h3>
          </div>
          <div class="description">
            <?php echo $article_desc; ?>
          </div>
          <div class="tag">
            <p>Tags:</p>
            <?php
            $str_arr = explode(",", $tags);
            foreach ($str_arr as $out) {
              echo '<span><i class="fa fa-tag"></i> ' . $out . '</span>';
            }
            ?>
          </div>
        </div>
      </div>

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Add Comment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Comments</a>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="comments">
            <form method="post" action="../comments.php">
              <h2>Your Comments :</h2>
              <div class="row">
                <input id="name" class="form-control" type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                <div class="form-group col-lg-6">
                  <label for="name">Your Name</label>
                  <input id="name" class="form-control" type="text" name="c_name">
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Your Email</label>
                  <input id="email" class="form-control" type="email" name="c_email">
                </div>
              </div>
              <div class="form-group">
                <label for="comment">Your Comment</label>
                <textarea name="c_comment" id="comment" class="form-control" cols="30" rows="4"></textarea>
              </div>
              <button class="comment-btn" name="submit_comment" type="submit">Post</button>
            </form>
          </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="comments_preview">
            <div class="row">
              <?php
              $get_article_comment = "SELECT * FROM comments WHERE article_id = '$article_id'";
              $run_article_comment = mysqli_query($con, $get_article_comment);

              while ($row_article_comment = mysqli_fetch_array($run_article_comment)) {
                $article_comment_id = $row_article_comment['article_id'];
                $c_name = $row_article_comment['c_name'];
                $c_email = $row_article_comment['c_email'];
                $c_comment = $row_article_comment['c_comment'];
                $posted_comment_at = $row_article_comment['posted_at'];
                $timestamp_comment = strtotime($posted_comment_at);
                $comment_time = strtotime($posted_comment_at);



              ?>
                <div class="col-12">
                  <div class="card card-white post border-0">
                    <div class="post-heading">
                      <div class="float-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                      </div>
                      <div class="float-left meta">
                        <div class="title h5">
                          <a href="#"><b><?php echo $c_name; ?></b></a>
                          write a comment.
                        </div>
                        <h6 class="text-muted time"><?php echo date('d/m/Y', $comment_time); ?></h6>
                      </div>
                    </div>
                    <div class="post-description">
                      <p><?php echo $c_comment; ?></p>

                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
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
      $timestamp = strtotime($posted_at);
    ?>
      <div class="random-posts">
        <a href="article_detail.php?article_id=<?php echo $article_id ?>">
          <div class="feature-img">
            <div class="bg-img" style="background: url(../../includes/article_images/<?php echo $article_image; ?>)">
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
    <!-- footer -->
    <?php include '../footer-inner.php'; ?>
  </div>
  <?php include '../scripts-inner.php'; ?>



</body>

</html>