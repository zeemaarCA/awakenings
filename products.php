<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'head.php';
include 'functions.php';
include 'modals.php';
?>

<body>
  <?php
  include 'header_inner.php';
  ?>
  <!-- header end-->
  <!-- tabs -->
  <!-- products page -->
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-2 col-12">
        <h1>Products</h1>
      </div>
      <div class="col-lg-10 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>
  <?php

  // if (isset($_GET['add_cart'])) {
  //   cart();
  // }

  //
  ?>
  <div class="container products-section all-pro">
    <div class="tab-content">
      <div class="tab-pane active" id="candles">
        <div class="row">
          <?php
          $get_pro = "SELECT * FROM products";
          $run_pro = mysqli_query($con, $get_pro);

          while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_desc = $row_pro['product_desc'];
            $pro_image = $row_pro['product_image'];
            $trim_title = (strlen($pro_title) > 1) ? substr($pro_title, 0, 30) . '...' : $pro_title;
            $string_x = strip_tags($trim_title);
            $string_y = trim($string_x);

            if (!isset($_SESSION['customer_name'])) {
              guest_cart();
          ?>
              <div class="col-lg-4 pro-box">
                <div class="single-product">
                  <div class="product-box">
                    <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                    <button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
                    <a href="index.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
                    <?php wishlist_guest(); ?>

                  </div>
                  <h3><?php echo $string_y; ?></h3>
                  <h4>&dollar;<?php echo $pro_price; ?></h4>
                  <a href="products.php?add_cart=<?php echo $pro_id; ?>">
                    <div class="ui vertical animated button" tabindex="0">
                      <div class="hidden content">add to cart</div>
                      <div class="visible content">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            <?php
            } else {
              isset($_SESSION['customer_name']);
              cart();
            ?>
              <div class="col-lg-4 pro-box">
                <div class="single-product">
                  <div class="product-box">
                    <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                    <button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
                    <a href="wishlist.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
                    <?php wishlist(); ?>
                  </div>
                  <h3><?php echo $string_y; ?></h3>
                  <h4>&dollar;<?php echo $pro_price; ?></h4>
                  <a href="products.php?add_cart=<?php echo $pro_id; ?>">
                    <div class="ui vertical animated button" tabindex="0">
                      <div class="hidden content">add to cart</div>
                      <div class="visible content">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
          <?php }
          } ?>
        </div>
      </div>
      <div class="tab-pane" id="healing-bracelets">
        <div class="row">
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <img src="assests/img/2anim.png" alt="">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="essentials-oil">
        <div class="row">
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="crystals">
        <div class="row">
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="healing-crystals">
        <div class="row">
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>


      <div class="tab-pane" id="protection-stones">
        <div class="row">
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="angel-cards">
        <div class="row">
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 pro-box">
            <div class="single-product">
              <img src="assets/img/products/Cabochons-Natural.jpg" alt="">
              <h3>Product name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <h4>&dollar;15</h4>
              <a href="#">
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">add to cart</div>
                  <div class="visible content">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  <!-- tabs end-->

  <div class="container products-section">

  </div>
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>


</body>

</html>