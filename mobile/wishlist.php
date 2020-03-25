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
    <div class="posts-heading">
      <h2>My <span class="gold">Wishlist</span></h2>
    </div>
    <?php

if (isset($_GET['add_wishlist'])) {
  wishlist();
}
    ?>
    <div class="wrap cf">
      <div class="heading cf">
        <form class="w-100" action="" method="post" enctype="multipart/form-data">
          <a href="products.php" class="continue">Continue Shopping</a>
      </div>
      <div class="cart">
        <ul class="cartWrap p-0">
          <?php
          if (!isset($_SESSION['customer_name'])) {
            $get_items = "SELECT * FROM wishlist WHERE guest_id = '" . $_SESSION['guest_id'] . "'";
          } else {
            $get_items = "SELECT * FROM wishlist WHERE c_id = '" . $_SESSION['customer_id'] . "'";
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
              $sel_price = "SELECT * FROM wishlist WHERE guest_id = '" . $_SESSION['guest_id'] . "'";
            } else {
              $sel_price = "SELECT * FROM wishlist WHERE c_id = '" . $_SESSION['customer_id'] . "'";
            }
            $run_price = mysqli_query($con, $sel_price);
            while ($p_price = mysqli_fetch_array($run_price)) {
              $pro_id = $p_price['p_id'];

              // echo $qtyd;
              $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
              $run_pro_price = mysqli_query($con, $pro_price);
              while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                $product_price = array($pp_price['product_price']);
                $single_price = $pp_price['product_price'];
                $product_title = $pp_price['product_title'];
                $product_image = $pp_price['product_image'];
            ?>
                <li class="items even">
                  <div class="infoWrap">
                    <div class="cartSection info">
                      <img src="../includes/product_images/<?php echo $product_image; ?>" alt="" class="itemImg" />
                      <h3><?php echo $product_title; ?></h3>

                    </div>
                    <div class="cartSection removeWrap">
                      <a href="wishlist.php?del=<?php echo $pro_id; ?>" onClick="return confirm('Delete This item?')" class="remove" name="del_product"> <i class="fa fa-times"></i></a>
                    </div>
                  </div>
                </li>
            <?php }
            }
            ?>
        </ul>
      </div>
      <div class="subtotal cf">

        </form>
      </div>
    </div>
  <?php } ?>
  <?php
  $ip = getIp();
  if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    if (!isset($_SESSION['customer_id'])) {
      $delete_product = "DELETE FROM wishlist WHERE p_id = '$del_id' AND guest_id = '" . $_SESSION['guest_id'] . "'";
    } else {
      $delete_product = "DELETE FROM wishlist WHERE p_id = '$del_id' AND c_id = '" . $_SESSION['customer_id'] . "'";
    }

    $run_delete = mysqli_query($con, $delete_product);
    if ($run_delete) {
      echo "<script>window.open('wishlist.php', '_self')</script>";
    }
  }
  ?>
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>
</body>

</html>