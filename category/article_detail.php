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
  <link rel="stylesheet" href="../assets/custom/responsiveness.min.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/button.min.css">
  <link rel="stylesheet" href="../assets/css/hover-min.css">
  <link rel="stylesheet" href="../assets/css/slick.css">
  <link rel="stylesheet" href="../assets/css/slick-theme.css">
  <link rel="stylesheet" href="../fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
  <script type="text/javascript">
    if (screen.width <= 699) {
      window.location = "../mobile/index.php";
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
          $article_tag = $row_article_detail['article_tag'];
          $article_desc = $row_article_detail['article_text'];
          $article_image = $row_article_detail['featured_image'];
          $posted_at = $row_article_detail['posted_at'];
          $tags = $article_tag;
          $timestamp = strtotime($posted_at);


        ?>
          <div class="review-box">
            <div class="row">
              <div class="col-lg-12">
                <img src="../includes/article_images/<?php echo $article_image; ?>" alt="">
                <div class="categories-article mt-3">
                  <span class="badge badge-pill bg-gold text-white"><?php echo $article_main_cat ?></span>
                  <span class="badge badge-pill bg-gold text-white"><?php echo $article_sub_cat ?></span>
                </div>
                <h2><?php echo $article_title; ?></h2>
                <div><?php echo $article_desc; ?></div>
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
        <hr>
        <div class="row align-items-center sharing_article">
          <div class="col-lg-4">
            <h4 class="my-0">Share this article via:</h4>
          </div>
          <div class="col-lg-8">
            <div class="share-icons float-right">
              <a href="https://www.addtoany.com/add_to/facebook?linkurl=<?php echo getAddress();  ?>&amp;linkname=Awakenings" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:#3b5998"></a>
              <a href="https://www.addtoany.com/add_to/twitter?linkurl=<?php echo getAddress();  ?>&amp;linkname=Awakenings" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:#55acee"></a>
              <a href="https://www.addtoany.com/add_to/pinterest?linkurl=<?php echo getAddress();  ?>&amp;linkname=Awakenings" target="_blank"><img src="https://static.addtoany.com/buttons/pinterest.svg" width="32" height="32" style="background-color:#bd081c"></a>
              <a href="https://www.addtoany.com/add_to/linkedin?linkurl=<?php echo getAddress();  ?>&amp;linkname=Awakenings" target="_blank"><img src="https://static.addtoany.com/buttons/linkedin.svg" width="32" height="32" style="background-color:#0077b5"></a>
              <a href="https://www.addtoany.com/add_to/tumblr?linkurl=<?php echo getAddress();  ?>&amp;linkname=Awakenings" target="_blank"><img src="https://static.addtoany.com/buttons/tumblr.svg" width="32" height="32" style="background-color:#00405d"></a>
              <a href="https://www.addtoany.com/add_to/email?linkurl=<?php echo getAddress();  ?>&amp;linkname=Awakenings" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:#dc4e41"></a>
            </div>
          </div>

        </div>
        <hr>
      </div>
      <div class="col-lg-3">
        <?php include '../right_column.php' ?>
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
  <!-- footer -->
  <?php include '../footer_inner.php'; ?>
  <?php include '../scripts-inner.php'; ?>



</body>

</html>