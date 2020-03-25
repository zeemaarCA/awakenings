<?php
session_start();
include 'includes/conn.php';
function getIp()
{
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  return $ip;
}

if (isset($_POST['add_cart'])) {
  global $con;
  $ip = getIp();
  $pro_id = $_POST['pro_id_modal'];
  $cart_quantity = $_POST['cart_quantity'];

  $check_pro = "SELECT * FROM cart WHERE c_id='" . $_SESSION['customer_id'] . "' AND p_id='$pro_id'";


  $run_check = mysqli_query($con, $check_pro);
  if (mysqli_num_rows($run_check) > 0) {
    echo "<script>window.open('cart.php', '_self')</script>";
  } else {
    $get_price_for_cart = "SELECT product_price FROM products WHERE product_id='$pro_id'";

    $run_get_price_for_cart = mysqli_query($con, $get_price_for_cart);
    $cart_item_price_array = mysqli_fetch_array($run_get_price_for_cart);
    $cart_item_price = $cart_item_price_array['product_price'];

    $guest_id = session_id();


    $insert_pro = "INSERT INTO cart (c_id,p_id,cart_price,ip_add,qty) VALUES ('" . $_SESSION['customer_id'] . "','$pro_id','$cart_item_price','$ip','$cart_quantity')";

    $run_pro = mysqli_query($con, $insert_pro);

    echo "<script>window.open('cart.php', '_self')</script>";
  }
}

if (isset($_POST['add_cart_guest'])) {
  global $con;
  $ip = getIp();
  $pro_id = $_POST['pro_id_modal'];
  $cart_quantity = $_POST['cart_quantity'];

  $check_pro = "SELECT * FROM cart WHERE guest_id='" . $_SESSION['guest_id'] . "' AND p_id='$pro_id'";


  $run_check = mysqli_query($con, $check_pro);
  if (mysqli_num_rows($run_check) > 0) {
    echo "<script>window.open('cart.php', '_self')</script>";
  } else {
    $get_price_for_cart = "SELECT product_price FROM products WHERE product_id='$pro_id'";

    $run_get_price_for_cart = mysqli_query($con, $get_price_for_cart);
    $cart_item_price_array = mysqli_fetch_array($run_get_price_for_cart);
    $cart_item_price = $cart_item_price_array['product_price'];

    $guest_id = session_id();


    $insert_pro = "INSERT INTO cart (guest_id,p_id,cart_price,ip_add,qty) VALUES ('" . $_SESSION['guest_id'] . "','$pro_id','$cart_item_price','$ip','$cart_quantity')";

    $run_pro = mysqli_query($con, $insert_pro);

    echo "<script>window.open('cart.php', '_self')</script>";
  }
}

?>