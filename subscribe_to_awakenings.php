<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
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
        <li class="breadcrumb-item" aria-current="page">Subscribe to Awakenings</li>
      </ol>
    </nav>
  </div>
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>Subscribe to Awakenings</h1>
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
        <div class="about_us">
          <p>Don’t miss your copy of Awakenings Middle East magazine – your guide to wellness and healthy living in the UAE. You can buy it for yourself or as a gift for a loved one or friend (it won’t die like flowers and isn’t fattening like chocolates!)</p>
          <br>
          <p>3 issues for $15 for delivery in the UAE</p>
          <br>
          <p>Just click the ‘Buy Now’ button below… off you go then… 🙂</p>
          <br>
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="zmt@gmail.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Power Max + Products">
            <input type="hidden" name="item_number" value="1">
            <input type="hidden" name="amount" value="15">

            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value="http://excaliburgold.de/max-power/paypal_success.php">
            <input type="hidden" name="cancel_return" value="http://excaliburgold.de/max-power/paypal_cancel.php">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="0">

            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">

          </form>
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