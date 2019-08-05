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
if (isset($_POST['update_cart'])) {
  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pro_id_cart_qty = $_POST['pro_id_cart_qty'];
    $array = array_combine($pro_id_cart_qty, $qty);
    foreach ($array as $i => $q) {
      $single_fetch_price = "SELECT product_price FROM products WHERE product_id = '$i'";
      $run_single_fetch_price = mysqli_query($con, $single_fetch_price);
      $product_pricex = mysqli_fetch_assoc($run_single_fetch_price);

      $final_total_price_db = $q * $product_pricex['product_price'];
      $update_qty = "UPDATE cart SET qty = '$q', cart_price = '$final_total_price_db' WHERE p_id = '$i' AND c_id = '" . $_SESSION['customer_id'] . "'";
      $run_qty = mysqli_query($con, $update_qty);
    }
    // header("location: cart.php?mes=Update cart sucessfully");
    echo ("<script>location.href = 'cart.php?mes=Update cart sucessfully'</script>");
    $total = $total * $qtyd;
  }
}

?>

<body>
  <!-- all-modals -->
  <!-- cart confirmation modal-->
  <div class="modal fade" id="cartConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container cartConfirm-content text-center">
            <div class="row">
              <div class="col-lg-12">
                <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
                <h2>order confirmation</h2>
                <img src="assets/img/cart-confirm-img.png" alt="">
                <p>Order number <span>1500820048</span> is now confirmed
                  You can check your order and its progress at any time.
                  By logging into your account</p>
                <p>We have emailed you the order details for your convenience.</p>
                <p>If you have any queries please contact us.</p>
                <p><span>This order is covered by our 100% No Quibble Money Back Guarantee</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'header_inner.php'; ?>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
        <li class="breadcrumb-item" aria-current="page">Checkout</li>
      </ol>
    </nav>
  </div>

  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>Checkout</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>
  <div class="container shopping-cart">
    <div class="row">
      <div class="table-responsive border">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" width="50%" class="pl-4">product</th>
              <th scope="col" class="text-center">price</th>
              <th scope="col" class="text-center">quantity</th>
              <th scope="col" class="text-center">total</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <?php
          $total = 0;
          global $con;
          $ip = getIp();
          $sel_price = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "' ";
          $run_price = mysqli_query($con, $sel_price);
          while ($p_price = mysqli_fetch_array($run_price)) {
            $pro_id = $p_price['p_id'];
            $qtyd = $p_price['qty'];
            // echo $qtyd;
            $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
            $run_pro_price = mysqli_query($con, $pro_price);
            while ($pp_price = mysqli_fetch_array($run_pro_price)) {
              $product_price = array($pp_price['product_price']);
              $single_price = $pp_price['product_price'];
              $product_title = $pp_price['product_title'];
              $product_image = $pp_price['product_image'];
              $total_qty_price = $single_price * $qtyd;
              $values = array_sum($product_price);
              $mega_total = $values * $qtyd;
              $total += $mega_total;

              ?>
              <tbody>
                <tr>
                  <td data-toggle="modal" data-target="#cart-item-des-popup"><img src="includes/product_images/<?php echo $product_image; ?>" alt="">
                    <h4><?php echo $product_title; ?></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At optio debitis mollitia veniam ut rem distinctio iste ea repellat, fugiat.</p>
                  </td>
                  <td class="text-center">&dollar;<?php echo $single_price; ?></td>
                  <td width="14%" class="text-center">
                    <div class="container">
                      <input type="number" name="qty[]" class="form-control input-number-2 c-in-2" min="1" value="<?php echo $qtyd ?>" readonly="true">
                    </div>
                  </td>
                  <td class="text-center">&dollar;<?php echo $total_qty_price; ?></td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row border">
      <div class="col-lg-6 hide-sm">&nbsp;</div>
      <div class="col-lg-6">
        <div class="row combine-r-total">
          <div class="col-lg-6 col-6">
            <h2>CART SUBTOTAL</h2>
            <h2>delivery</h2>
            <h1>ORDER TOTAL</h1>
          </div>
          <div class="col-lg-6 col-6">
            <h2 class="text-right">&dollar;<?php echo $total; ?></h2>
            <h2 class="text-right">&dollar;0</h2>
            <h1 class="text-right">&dollar;<?php echo $total; ?></h1>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="container c-box-1n2">
    <div class="row">
      <div class="col-lg-5 px-0">
        <div class="box-head">
          <div class="row">
            <div class="col-lg-12 col-12">
              <img src="assests/img/van.png" alt="">
              <h3>SHIPPING ADDRESS</h3>
            </div>
          </div>
        </div>
        <div class="box-border">
          <a href="#">edit</a>
          <h4>current shopping address</h4>
          <ul>
            <?php
            $get_customer = "SELECT * FROM customers WHERE customer_email = '" . $_SESSION['customer_email'] . "'";
            $run_customer = mysqli_query($con, $get_customer);

            while ($row_customer = mysqli_fetch_array($run_customer)) {
              $customer_id = $row_customer['customer_id'];
              $customer_name = $row_customer['customer_name'];
              $customer_email = $row_customer['customer_email'];
              $customer_country = $row_customer['customer_country'];
              $customer_city = $row_customer['customer_city'];
              $customer_contact = $row_customer['customer_contact'];
              $customer_address = $row_customer['customer_address'];
              ?>
              <li><?php echo $customer_name; ?></li>
              <li><?php echo $customer_email; ?></li>
              <li><?php echo $customer_city; ?></li>
              <li><?php echo $customer_country; ?></li>
              <li><?php echo $customer_contact; ?></li>
              <li><?php echo $customer_address; ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-1">&nbsp;</div>
      <div class="col-lg-1">&nbsp;</div>
      <div class="col-lg-5 px-0">
        <div class="box-head">
          <div class="row">
            <div class="col-lg-12 col-12">
              <h3>payment method</h3>
            </div>
          </div>
        </div>
        <div class="box-border n-height">
          <img src="assets/img/checkoutb1.png" class="mt-3" alt="">
          <h4 class="ml-3">PAYPAL</h4>
        </div>
      </div>
    </div>
  </div>



  <div class="container six-check">
    <div class="row">
      <div class="col-lg-6 col-6 px-0">
        <a href="#" class="back-btn">back</a>
      </div>
      <div class="col-lg-6 col-6 px-0">
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right">
          <input type="hidden" name="cmd" value="_xclick">
          <input type="hidden" name="business" value="zmt@gmail.com">
          <input type="hidden" name="lc" value="US">
          <input type="hidden" name="item_name" value="Power Max + Products">
          <input type="hidden" name="item_number" value="<?php echo $pro_id ?>">
          <input type="hidden" name="amount" value="<?php echo $total; ?>">

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
  </div>


  <div style="height:36px;"></div>
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>
  
</body>

</html>