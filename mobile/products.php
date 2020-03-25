<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../functions.php';
include 'head.php';
include 'modals.php';
?>

<body>
  <?php include 'menu.php'; ?>

  <div class="body-wrapper">

    <!-- products section -->
    <div class="posts-heading">
      <h2>Our <span class="gold">shop</span></h2>
    </div>
    <div class="container product-mobile">
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
            guest_cart();
        ?>
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 p-0 my-3">
              <div class="card">
                <div class="card-img-div">
                  <img class="card-img" src="../includes/product_images/<?php echo $pro_image; ?>" alt="">
                  <button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
                  <a href="index.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
                  <?php wishlist_guest(); ?>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $pro_title; ?></h4>
                  <p class="card-text">
                    <?php echo $pro_desc; ?></p>
                  <div class="buy d-flex justify-content-between align-items-center">
                    <div class="price">
                      <h5 class="mt-4 numeric">&dollar;<?php echo $pro_price; ?></h5>
                    </div>
                    <a href="products.php?add_cart=<?php echo $pro_id; ?>" class="btn btn-custom mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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
                  <img class="card-img" src="../includes/product_images/<?php echo $pro_image; ?>" alt="">
                  <button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
                  <a href="wishlist.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
                  <?php wishlist(); ?>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $pro_title; ?></h4>
                  <p class="card-text">
                    <?php echo $pro_desc; ?></p>
                  <div class="buy d-flex justify-content-between align-items-center">
                    <div class="price">
                      <h5 class="mt-4 numeric">&dollar;<?php echo $pro_price; ?></h5>
                    </div>
                    <a href="products.php?add_cart=<?php echo $pro_id; ?>" class="btn btn-custom mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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
    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>

</body>

</html>