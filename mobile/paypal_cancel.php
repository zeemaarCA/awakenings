<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
include '../functions.php';
include 'head.php';
include 'modals.php';
?>


<body>
  <?php include 'menu.php'; ?>
  <div class="body-wrapper">

    <!-- products section -->
    <div class="posts-heading">
      <h2>about <span class="gold">us</span></h2>
    </div>
    <div class="container about_us_block info-para">
      <div class="paypal-results">
        <div class="paypal-notification">
          <div class="success-img">
            <img src="../assets/img/paypal_canel_icon.png" alt="" class="mb-3">
            <h3>Payment was cancelled</h3>
          </div>
          <h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
          <p>Your Payment was not successful, Please go to our shop and try again.</p>
          <a href="products.php" class="primary-btn">Go to Shop</a>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>
  </div>
  <?php include 'scripts.php'; ?>


</body>

</html>