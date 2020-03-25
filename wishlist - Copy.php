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
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Wishlist</li>
      </ol>
    </nav>
  </div>
  <?php

  if (isset($_GET['add_wishlist'])) {
    wishlist();
  }


  ?>
  <div class="container shopping-cart">
    <div class="container c-f-2 awakened-last">
      <div class="row align-items-center">
        <div class="col-lg-3 col-12">
          <h1>Wishlist</h1>
        </div>
        <div class="col-lg-9 col-12">
          <div class="heading-line">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $get_items = "SELECT * FROM wishlist WHERE c_id = '" . $_SESSION['customer_id'] . "'";
      $run_items = mysqli_query($con, $get_items);
      $count_items = mysqli_num_rows($run_items);
      $cart_item_qty = $count_items;
      if ($cart_item_qty == 0) {

      ?>
        <div class="content-box">
          <div class="box-title">
            <h3>Wishlist</h3>
          </div>
          <div class="row text-center">
            <div class="col-lg-12">
              <!-- <p>Your shopping cart is empty.</p> -->
              <img class="img-fluid w-50" src="assets/img/empty-cart.png" alt="">
            </div>
            <div class="col-lg-12">
              <a href="products.php">Add products to Wishlist</a>
            </div>
          </div>
        </div>
      <?php } else {

      ?>
    </div>
    <div class="row">
      <div class="table-responsive border">
        <form class="w-100" action="" method="post" enctype="multipart/form-data">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" width="50%" class="pl-4">product</th>
                <th scope="col" class="text-center">price</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <?php
            $total = 0;
            global $con;
            $ip = getIp();
            $sel_price = "SELECT * FROM wishlist WHERE c_id = '" . $_SESSION['customer_id'] . "'";
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
                <tbody>
                  <tr>
                    <td data-toggle="modal" data-target="#cart-item-des-popup"><img src="includes/product_images/<?php echo $product_image; ?>" alt="">
                      <h4><?php echo $product_title; ?></h4>
                    </td>
                    <td class="text-center">&dollar;<?php echo $single_price; ?></td>

                    <td width="10%"><a href="wishlist.php?del=<?php echo $pro_id; ?>" onClick="return confirm('Delete This item?')" name="del_product" <i class="fa fa-times"></i></a></td>
                  </tr>
              <?php }
            } ?>
                </tbody>
          </table>
      </div>
    </div>

    </form>
  </div>


<?php } ?>
<!-- all-modals -->
<div style="height:36px;"></div>
<?php
$ip = getIp();
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
    $delete_product = "DELETE FROM wishlist WHERE p_id = '$del_id' AND c_id = '" . $_SESSION['customer_id'] . "'";
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