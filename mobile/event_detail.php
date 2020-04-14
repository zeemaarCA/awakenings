<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../functions.php';

$event_id = $_GET['event_id'];
?>

<head>
  <base href="" />
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php
  $event_id = $_GET['event_id'];
  $get_event_name = "SELECT * FROM events WHERE event_id = '$event_id'";
  $run_event_name = mysqli_query($con, $get_event_name);

  while ($row_event_name = mysqli_fetch_array($run_event_name)) {
    $event_title = $row_event_name['event_title'];
  ?>
    <title><?php echo $event_title; ?></title>
  <?php } ?>
  <link rel="shortcut icon" type="image/png" href="../favicon.ico" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,500,500i,600,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css' />
  <link rel="stylesheet" href="assets/css/mobile.min.css?<?php echo date('YmdHis'); ?>">
  <link rel="stylesheet" href="assets/css/modals.min.css?<?php echo date('YmdHis'); ?>">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.1/animate.min.css' />
  <link rel="stylesheet" href="../assets/css/button.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' />
  <script type="text/javascript">
    if (screen.width >= 699) {
      window.location = "../index.php";
    }
  </script>
</head>
<?php include 'modals.php'; ?>

<body>
  <?php
  function getAddress()
  {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  }

  ?>
  <?php include 'menu.php'; ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2>Event <span class="gold">detail</span></h2>
    </div>
    <?php
    $get_event_detail = "SELECT * FROM events WHERE event_id = '$event_id'";
    $run_event_detail = mysqli_query($con, $get_event_detail);

    while ($row_event_detail = mysqli_fetch_array($run_event_detail)) {
      $event_id = $row_event_detail['event_id'];
      $event_title = $row_event_detail['event_title'];
      $event_detail = $row_event_detail['event_detail'];
      $event_image = $row_event_detail['event_image'];
      $posted_at = $row_event_detail['posted_at'];
      $dt = new DateTime($posted_at);
      $timestamp = strtotime($posted_at);
    ?>
      <div class="detail-post">
        <div class="feature-img">
          <img class="img-fluid" src="../includes/event_images/<?php echo $event_image; ?>" alt="">
        </div>
        <div class="feature-text">
          <div class="date">
            <span><?php echo $dt->format('Y-m-d'); ?></span>
          </div>
          <div class="title">
            <h3><?php echo $event_title; ?></h3>
          </div>
          <div class="description">
            <?php echo $event_detail; ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- footer -->
    <?php include 'footer.php'; ?>
  </div>
  <?php include 'scripts.php'; ?>



</body>

</html>