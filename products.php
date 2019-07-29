<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'head.php';
include 'functions.php';
?>

<body>
  <?php
  include 'header_inner.php';
  ?>
  <!-- header end-->

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
  <!-- tabs -->
  <!-- products page -->
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>Products</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>
  <?php

  if (isset($_GET['add_cart'])) {
    cart();
  }

  ?>
  <div class="container products-section all-pro">
    <div class="row">
      <div class="cat-btns">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item col-lg-3">
            <a class="nav-link active" data-toggle="tab" href="#candles">candles</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#tarrot-cards">tarrot cards</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#healing-bracelets">healing bracelets</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#essentials-oil">essentials oils</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#crystals">crystals</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#healing-crystals">healing crystals</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#protection-stones">protection stones</a>
          </li>
          <li class="nav-item col-lg-3">
            <a class="nav-link" data-toggle="tab" href="#angel-cards">angel cards</a>
          </li>
        </ul>

      </div>
    </div>
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

            if (!isset($_SESSION['customer_name'])) {
              ?>
              <div class="col-lg-4 pro-box">
                <div class="single-product">
                  <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                  <h3><?php echo $pro_title; ?></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                  <h4>&dollar;<?php echo $pro_price; ?></h4>
                  <a href="javascript:void()" class="trigger-toast">
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

              ?>
              <div class="col-lg-4 pro-box">
                <div class="single-product">
                  <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                  <h3><?php echo $pro_title; ?></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
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
  <script src="assets/js/jquery-slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/owl.carousel.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/my.js"></script>

</body>

</html>