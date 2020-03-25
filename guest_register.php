<?php
session_start();
include 'functions.php';
if(isset($_POST['guest_register_btn'])){


  $guest_name = $_POST['guest_name'];
  $guest_email = $_POST['guest_email'];
  $guest_country = $_POST['guest_country'];
  $guest_city = $_POST['guest_city'];
  $guest_phone = $_POST['guest_phone'];
  $guest_address = $_POST['guest_address'];



  $insert_guest = "insert into guests (guest_id,guest_name,guest_email,guest_country,guest_city,guest_phone,guest_address) values ('" . $_SESSION['guest_id'] . "','$guest_name','$guest_email','$guest_country','$guest_city','$guest_phone','$guest_address')";

  $_SESSION['guest_name']=$guest_name;
  $_SESSION['guest_email']=$guest_email;
  $_SESSION['guest_country']=$guest_country;
  $_SESSION['guest_city']=$guest_city;
  $_SESSION['guest_phone']=$guest_phone;
  $_SESSION['guest_address']=$guest_address;
  $insert_guest = mysqli_query($con, $insert_guest);

  if ($insert_guest) {
    echo "<script>alert('Address has been added!')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
  }
  else {

  }


  }
