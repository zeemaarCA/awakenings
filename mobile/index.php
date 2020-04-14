<!DOCTYPE html>

<body lang="en">

  <?php
  session_start();
  include 'head.php';
  include 'modals.php';
  include '../functions.php';
  $guest_id = session_id();
  $_SESSION['guest_id'] = $guest_id;
  ?>

  <body>
    <!-- <div class="pre-loader">
      <img class="img-fluid" src="../assets/img/footer-logo.png" alt="">
      <div class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div> -->
    <?php
    include 'menu.php';
    ?>

    <div class="body-wrapper">
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
                <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
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
                <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
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
      <!-- -------------------------------------------- -->

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
            if (!isset($_SESSION['customer_name'])) {
              guest_cart();
          ?>
              <div class="col-12 col-sm-8 col-md-6 col-lg-4 p-0 my-3">
                <div class="card">
                  <div class="card-img-div">
                    <a id="single_image" class="d-block" href="../includes/product_images/<?php echo $pro_image; ?>"><img class="card-img" src="../includes/product_images/<?php echo $pro_image; ?>" alt=""></a>
                    <button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
                    <a href="index.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
                    <?php wishlist_guest(); ?>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $pro_title; ?></h4>
                    <div class="buy d-flex justify-content-between align-items-center">
                      <div class="price">
                        <h5 class="mt-4 numeric">&dollar;<?php echo $pro_price; ?></h5>
                      </div>
                      <a href="index.php?add_cart=<?php echo $pro_id; ?>" class="btn btn-custom mt-3 trigger-toast"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } else {
              cart();
            ?>
              <div class="col-12 col-sm-8 col-md-6 col-lg-4 p-0 my-3">
                <div class="card">
                  <div class="card-img-div">
                    <a id="single_image" class="d-block" href="../includes/product_images/<?php echo $pro_image; ?>"><img class="card-img" src="../includes/product_images/<?php echo $pro_image; ?>" alt=""></a>
                    <button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $pro_title; ?></h4>
                    <div class="buy d-flex justify-content-between align-items-center">
                      <div class="price">
                        <h5 class="mt-4 numeric">&dollar;<?php echo $pro_price; ?></h5>
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
                <span><?php echo $article_main_cat ?></span><span><?php echo $article_sub_cat ?></span>
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
      <div class="posts-heading">
        <h2>Awakened<span class="gold"> Magazines</span></h2>
        <div class="row">
          <div class="col-4">
            <a href="../assets/pdf/AWAKENINGS_ISSUE_16_ONLINE.pdf"><img src="../assets/img/magzine-5.jpg" alt="">
            </a>
          </div>
          <div class="col-4">
            <a href="../assets/pdf/AwakeningsMag_Issue_15.pdf"><img src="../assets/img/magzine-2.jpg" alt="">
            </a>
          </div>
          <div class="col-4">
            <a href="../assets/pdf/AwakeningsMag_Issue_14.pdf"><img src="../assets/img/magzine-3.jpg" alt="">
            </a>
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