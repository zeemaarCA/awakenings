<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?loginmsg=Please Login First to add items in cart');
  echo "<script>window.open('index.php?loginmsg=Please Login First to add items in cart','_self')</script>";
}
include '../functions.php';
include 'head.php';
include 'modals.php';
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
  <?php include 'menu.php'; ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2>checkout</h2>
    </div>
    <?php

    if (isset($_GET['add_cart'])) {
      cart();
    }


    ?>
    <div class="wrap cf">
      <p class="bg-gold text-white p-2 d-none
       <?php if (@$_GET['mes']) {
          echo 'd-block';
        }; ?>">
        <?php if (@$_GET['mes']) {

          echo "Cart has been successfully upadated";
        }; ?></p>
      <div class="cart">
        <ul class="cartWrap p-0">
          <?php
          $get_items = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
          $run_items = mysqli_query($con, $get_items);
          $count_items = mysqli_num_rows($run_items);
          $cart_item_qty = $count_items;
          if ($cart_item_qty == 0) {

          ?>
            <li class="items even">

              <div class="infoWrap">
                <p>Your cart is empty.</p>
              </div>
            </li>
          <?php } else {

          ?>
            <?php
            $total = 0;
            global $con;
            $ip = getIp();
            $sel_price = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
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
                <li class="items even">
                  <div class="infoWrap">
                    <div class="cartSection info">

                      <img src="../includes/product_images/<?php echo $product_image; ?>" alt="" class="itemImg" />
                      <h3><?php echo $product_title; ?></h3>

                      <p>
                        <input type="hidden" name="pro_id_cart_qty[]" value="<?php echo $pro_id; ?>">
                        <input type="number" name="qty[]" min="1" class="qty" value="<?php echo $qtyd ?>" readonly="true"> x &dollar;<?php echo $single_price; ?> = &dollar;<?php echo $total_qty_price; ?></p>


                    </div>
                  </div>
                </li>
          <?php }
            }
          } ?>
          <!--<li class="items even">Item 2</li>-->

        </ul>
      </div>

      <div class="subtotal cf float-none">
        <ul class="pl-0">
          <!-- <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>
          
          <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>
          
          <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li> -->
          <li class="totalRow final"><span class="label">Total</span><span class="value w-10">&dollar;<?php echo $total; ?></span></li>
        </ul>
      </div>
      <div class="posts-heading">
        <h2>Shipping <span class="gold">address</span></h2>
      </div>
      <div class="wrap cf">

        <div class="cart">

          <ul class="cartWrap pl-0">

            <li class="items even">

              <div class="infoWrap">
                <div class="cartSection">
                  <a href="profile.php">edit</a>
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
            </li>



          </ul>
        </div>
      </div>
      <div class="posts-heading">
        <h2>payment <span class="gold">method</span></h2>
      </div>
      <div class="wrap cf">

        <div class="cart">

          <ul class="cartWrap pl-0">

            <li class="items even">

              <div class="infoWrap">
                <div class="cartSection">
                  <img src="../assets/img/checkoutb1.png" class="mt-3" alt="">
                </div>

              </div>
            </li>



          </ul>
        </div>
      </div>
      <div class="container six-check">
        <div class="row">
          <div class="col-lg-6 col-6 px-0">
            <a href="cart.php" class="back-btn w_100 d-sm-block">back</a>
          </div>
          <div class="col-lg-6 col-6 px-0">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right w_100">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="zmt@gmail.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="Power Max + Products">
              <input type="hidden" name="item_number" value="<?php echo $pro_id ?>">
              <input type="hidden" name="amount" value="<?php echo $total; ?>">

              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="return" value="http://zeemaar.com/paypal_success.php">
              <input type="hidden" name="cancel_return" value="http://zeemaar.com/paypal_cancel.php">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">

              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">

            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>

</body>

</html>