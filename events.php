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
        <li class="breadcrumb-item" aria-current="page">Events</li>
      </ol>
    </nav>
  </div>
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>UAE Events</h1>
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
          <p>Contents</p>
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