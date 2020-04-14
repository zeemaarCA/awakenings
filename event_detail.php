<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'functions.php';

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
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,900|Open+Sans:300,400,600,700|Roboto:300,400,500,500i,700" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css' />
  <link rel="stylesheet" href="assets/custom/all.min.css?<?php echo date('YmdHis'); ?>">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.1/animate.min.css' />
  <link rel="stylesheet" href="assets/css/button.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css' />
  <script type="text/javascript">
    if (screen.width <= 699) {
      window.location = "mobile/index.php";
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
  <div class="container header">
    <div class="row">
      <img src="assets/img/footer-logo.png" alt="">
      <?php include 'menu.php'; ?>
    </div>
  </div>
  <?php
  $event_name = "SELECT * FROM events WHERE event_id = '$event_id'";
  $event_name = mysqli_query($con, $event_name);

  while ($event_name = mysqli_fetch_array($event_name)) {
    $event_title = $event_name['event_title'];
  ?>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="events.php">Events</a></li>
          <li class="breadcrumb-item" aria-current="page"><?php echo $event_title; ?></li>
        </ol>
      </nav>
    </div>
  <?php } ?>
  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <?php
        $get_event_detail = "SELECT * FROM events WHERE event_id = '$event_id'";
        $run_event_detail = mysqli_query($con, $get_event_detail);

        while ($row_event_detail = mysqli_fetch_array($run_event_detail)) {
          $event_id = $row_event_detail['event_id'];
          $event_title = $row_event_detail['event_title'];
          $event_detail = $row_event_detail['event_detail'];
          $event_image = $row_event_detail['event_image'];
          $posted_at = $row_event_detail['posted_at'];
          $timestamp = strtotime($posted_at);


        ?>
          <div class="review-box">
            <div class="row">
              <div class="col-lg-12">
                <img src="includes/event_images/<?php echo $event_image; ?>" alt="">
                <h2><?php echo $event_title; ?></h2>
                <div><?php echo $event_detail; ?></div>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-3">
        <?php include 'right_column.php' ?>
      </div>
    </div>
  </div>
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>



</body>

</html>