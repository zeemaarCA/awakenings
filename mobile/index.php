<!DOCTYPE html>

<body lang="en">
  <?php
  session_start();
  include 'head.php';
  include 'modals.php';
  include '../functions.php';
  ?>

  <body>
    <?php
    include 'menu.php';
    ?>

    <div class="body-wrapper">
      <?php
      $get_article = "SELECT * FROM articles order by RAND() LIMIT 4";
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
            <img class="img-fluid" src="../includes/article_images/<?php echo $article_image; ?>" alt="">
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
              <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

      <!-- latest-posts start -->
      <div class="posts-heading">
        <h2>latest <span class="gold">posts</span></h2>
      </div>
      <?php
      $get_article = "SELECT * FROM articles order by posted_at DESC LIMIT 2";
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
            <img class="img-fluid" src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          </div>
          <div class="feature-text">
            <div class="title">
              <h3><?php echo $article_title ?></h3>
            </div>
            <div class="categories">
              <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
            </div>
            <div class="date">
              <span><?php echo $posted_at ?></span>
            </div>
            <hr>
            <div class="read-more">
              <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <!-- latest-posts end -->
      <!-- random categories -->
      <div class="posts-heading">
        <h2>Body</h2>
      </div>
      <?php
      $get_article = "SELECT * FROM articles WHERE article_main_cat = 'body' order by RAND() LIMIT 2";
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
            <img class="img-fluid" src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          </div>
          <div class="feature-text">
            <div class="title">
              <h3><?php echo $article_title ?></h3>
            </div>
            <div class="categories">
              <span><?php echo $article_main_cat ?></span>
            </div>
            <div class="date">
              <span><?php echo $posted_at ?></span>
            </div>
            <hr>
            <div class="read-more">
              <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

      <!-- ---------------------------------------------- -->

      <div class="posts-heading">
        <h2>mind</h2>
      </div>
      <?php
      $get_article = "SELECT * FROM articles WHERE article_main_cat = 'mind' order by RAND() LIMIT 2";
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
            <img class="img-fluid" src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          </div>
          <div class="feature-text">
            <div class="title">
              <h3><?php echo $article_title ?></h3>
            </div>
            <div class="categories">
              <span><?php echo $article_main_cat ?></span>
            </div>
            <div class="date">
              <span><?php echo $posted_at ?></span>
            </div>
            <hr>
            <div class="read-more">
              <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <!-- ------------------------------------------------- -->
      <div class="posts-heading">
        <h2>Beauty</h2>
      </div>
      <?php
      $get_article = "SELECT * FROM articles WHERE article_sub_cat = 'beauty' order by RAND() LIMIT 2";
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
            <img class="img-fluid" src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          </div>
          <div class="feature-text">
            <div class="title">
              <h3><?php echo $article_title ?></h3>
            </div>
            <div class="categories">
              <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
            </div>
            <div class="date">
              <span><?php echo $posted_at ?></span>
            </div>
            <hr>
            <div class="read-more">
              <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <!-- -------------------------------------------- -->
      <!-- toast -->
      <div class="container-toast">
        <div class="rectangle">
          <div class="notification-text">
            <i class="fa fa-exclamation-circle"></i>
            <span>&nbsp;&nbsp;Please Login First to add item.&nbsp;&nbsp;</span><i class="fa fa-times" id="close-trigger"></i>
          </div>
        </div>
      </div>
      <!-- toast -->

      <!-- random categories -->
      <!-- products section -->
      <div class="posts-heading">
        <h2>Our <span class="gold">shop</span></h2>
      </div>
      <div class="container product-mobile">
        <div class="row">
          <?php
          $get_pro = "SELECT * FROM products LIMIT 4";
          $run_pro = mysqli_query($con, $get_pro);
          while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_desc = $row_pro['product_desc'];
            $pro_image = $row_pro['product_image'];
            cart();
            if (!isset($_SESSION['customer_name'])) {
          ?>
              <div class="col-12 col-sm-8 col-md-6 col-lg-4 p-0 my-3">
                <div class="card">
                  <img class="card-img" src="../includes/product_images/<?php echo $pro_image; ?>" alt="">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $pro_title; ?></h4>
                    <p class="card-text">
                      <?php echo $pro_desc; ?></p>
                    <div class="buy d-flex justify-content-between align-items-center">
                      <div class="price">
                        <h5 class="mt-4">&dollar;<?php echo $pro_price; ?></h5>
                      </div>
                      <a href="javascript:void(0)" class="btn btn-custom mt-3 trigger-toast"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } else {
            ?>
              <div class="col-12 col-sm-8 col-md-6 col-lg-4 p-0 my-3">
                <div class="card">
                  <img class="card-img" src="../includes/product_images/<?php echo $pro_image; ?>" alt="">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $pro_title; ?></h4>
                    <p class="card-text">
                      <?php echo $pro_desc; ?></p>
                    <div class="buy d-flex justify-content-between align-items-center">
                      <div class="price">
                        <h5 class="mt-4">&dollar;<?php echo $pro_price; ?></h5>
                      </div>
                      <a href="index.php?add_cart=<?php echo $pro_id; ?>" class="btn btn-custom mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          } ?>
        </div>
      </div>
      <!-- products section end -->

      <div class="posts-heading">
        <h2>healing</h2>
      </div>

      <?php
      $get_article = "SELECT * FROM articles WHERE article_sub_cat = 'healing' order by RAND() LIMIT 2";
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
            <img class="img-fluid" src="../includes/article_images/<?php echo $article_image; ?>" alt="">
          </div>
          <div class="feature-text">
            <div class="title">
              <h3><?php echo $article_title ?></h3>
            </div>
            <div class="categories">
              <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
            </div>
            <div class="date">
              <span><?php echo $posted_at ?></span>
            </div>
            <hr>
            <div class="read-more">
              <a href="category/article_detail.php?article_id=<?php echo $article_id ?>">read more</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <!-- holistic-directory -->
      <div class="posts-heading">
        <h2>holistic <span class="gold">directory</span></h2>
      </div>
      <div class="container holistic-directory">
        <div class="row">
          <?php
          $get_dir = "SELECT * FROM holistic_directory ORDER BY RAND() LIMIT 8";
          $run_dir = mysqli_query($con, $get_dir);

          while ($row_dir = mysqli_fetch_array($run_dir)) {
            $dir_id = $row_dir['dir_id'];
            $dir_title = $row_dir['dir_name'];

          ?>
            <div class="col-12 px-0">
              <div class="single-directory">
                <a href="directory_detail.php?dir_id=<?php echo $dir_id ?>">
                  <h4><?php echo $dir_title; ?></h4>
                </a>
              </div>
            </div>
          <?php
          }
          ?>

          <div class="col-12 px-0">
            <div class="bg-none">
              <a href="directory.php">
                <h4>See all</h4>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- holistic-directory end -->

      <?php
      include 'footer.php';


      ?>







    </div>

  </body>
  <?php
  include 'scripts.php';
  ?>
</body>

</html>