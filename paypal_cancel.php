<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?loginmsg=Please Login First to add items in cart');
  echo "<script>window.open('index.php?loginmsg=Please Login First to add items in cart','_self')</script>";
}
include 'functions.php';
include 'head.php';
include 'modals.php';
?>

<body>
  <?php include 'header_inner.php'; ?>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item" aria-current="page">Paypal Cancel</li>
      </ol>
    </nav>
  </div>
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>Paypal Result</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>

  <div class="container about_us_block">
    <div class="row">
      <div class="col-lg-9">
        <div class="container paypal-results">
          <div class="paypal-section">
            <div class="container text-center">
              <div class="row justify-content-center">
                <section class="cart-section" id="targrtLink">
                  <div class="container paypal-results">
                    <div class="paypal-notification">
                      <div class="success-img">
                        <img src="assets/img/paypal_canel_icon.png" alt="">
                        <h3>Payment was cancelled</h3>
                      </div>
                      <h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
                      <p>Your Payment was not successful, Please go to our shop and try again.</p>
                      <a href="products.php" class="primary-btn">Go to Shop</a>
                    </div>
                  </div>
                </section>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <?php include 'right_column.php' ?>
      </div>
    </div>
  </div>
  <div style="height:36px;"></div>
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>


</body>

</html>