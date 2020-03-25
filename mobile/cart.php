<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
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
      <h2>My <span class="gold">cart</span></h2>
    </div>
    <?php

    if (isset($_GET['add_cart'])) {
      cart();
    }
    ?>
    <div class="wrap cf">
      <div class="heading cf">
        <form class="w-100" action="" method="post" enctype="multipart/form-data">
          <a href="products.php" class="continue">Continue Shopping</a>
      </div>
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
          if (!isset($_SESSION['customer_name'])) {
            $get_items = "SELECT * FROM cart WHERE guest_id = '" . $_SESSION['guest_id'] . "'";
          } else {
            $get_items = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
          }
          $run_items = mysqli_query($con, $get_items);
          $count_items = mysqli_num_rows($run_items);
          $cart_item_qty = $count_items;
          if ($cart_item_qty == 0) {
          ?>
            <li class="items even">
              <div class="infoWrap">
                <img class="img-fluid" src="../assets/img/empty-cart.png" alt="">
              </div>
            </li>
          <?php } else {

          ?>
            <?php
            $total = 0;
            global $con;
            $ip = getIp();
            if (!isset($_SESSION['customer_name'])) {
              $sel_price = "SELECT * FROM cart WHERE guest_id = '" . $_SESSION['guest_id'] . "'";
            } else {
              $sel_price = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
            }
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
                      <p class="numeric">
                        <input type="hidden" name="pro_id_cart_qty[]" value="<?php echo $pro_id; ?>">
                        <input type="number" name="qty[]" min="1" class="qty" value="<?php echo $qtyd ?>"> x &dollar;<?php echo $single_price; ?> = &dollar;<?php echo $total_qty_price; ?></p>

                    </div>
                    <div class="cartSection removeWrap">
                      <a href="cart.php?del=<?php echo $pro_id; ?>" onClick="return confirm('Delete This item?')" class="remove" name="del_product"> <i class="fa fa-times"></i></a>
                    </div>
                  </div>
                </li>
            <?php }
            }
            ?>
        </ul>
      </div>
      <div class="subtotal cf">
        <input type="submit" class="primary-btn" name="update_cart" value="update cart">
        <ul class="pl-0">
          <!-- <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>

          <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>

          <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li> -->
          <li class="totalRow final"><span class="label">Total</span><span class="value numeric">&dollar;<?php echo $total; ?></span></li>
          <li class="totalRow"><a href="checkout.php" class="btnn continue">Checkout</a></li>
        </ul>
        </form>
      </div>
    </div>
  <?php } ?>
  <?php
  $ip = getIp();
  if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    if (!isset($_SESSION['customer_id'])) {
      $delete_product = "DELETE FROM cart WHERE p_id = '$del_id' AND guest_id = '" . $_SESSION['guest_id'] . "'";
    } else {
      $delete_product = "DELETE FROM cart WHERE p_id = '$del_id' AND c_id = '" . $_SESSION['customer_id'] . "'";
    }
    $run_delete = mysqli_query($con, $delete_product);
    if ($run_delete) {
      echo "<script>window.open('cart.php', '_self')</script>";
    }
  }
  ?>
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>
</body>
</html>