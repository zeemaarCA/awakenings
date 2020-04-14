<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include 'head.php';
include '../functions.php';
?>

<body>
  <!-- Side Navbar -->
  <?php
  include 'nav.php';
  ?>
  <div class="page">

    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="dashboard.php" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Awakenings</strong></div>
              </a></div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

              <!-- username -->
              <li class="nav-item"><a href="javascript:void(0)" class="nav-link logout"> <span class="d-none d-sm-inline-block"><?php echo $_SESSION['user_email']; ?></span><i class="fa fa-user"></i></a></li>
              <!-- Log out-->
              <li class="nav-item"><a href="backend/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Counts Section -->
    <section class="dashboard-counts section-padding">
      <div class="container-fluid">
        <div class="row">
          <!-- Count item widget-->
          <div class="col-xl-3 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-user"></i></div>
              <div class="name"><strong class="text-uppercase">New Customers</strong>
                <div class="count-number"><?php echo total_customers(); ?></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-3 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-padnote"></i></div>
              <div class="name"><strong class="text-uppercase">Product Orders</strong>
                <div class="count-number"><?php echo total_orders(); ?></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-3 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-check"></i></div>
              <div class="name"><strong class="text-uppercase">Total articles</strong>
                <div class="count-number"><?php echo total_articles(); ?></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-xl-3 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-bill"></i></div>
              <div class="name"><strong class="text-uppercase">Total Payments</strong>
                <div class="count-number"><?php echo total_payments(); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Header Section-->
    <hr>
    <!-- Statistics Section-->
    <section class="statistics">
      <div class="container-fluid">
        <div class="row d-flex">
          <div class="col-lg-6">
            <!-- Income-->
            <div class="card income text-center">
              <div class="icon"><i class="icon-line-chart"></i></div>
              <div class="number"><?php echo total_price_sum(); ?></div><strong class="text-primary">All Income</strong>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- User Actibity-->
            <div class="card income text-center">
              <div class="icon"><i class="icon-padnote"></i></div>
              <div class="number"><?php echo total_directories(); ?></div><strong class="text-primary">Holistic Posts</strong>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Updates Section -->

    <!-- footer -->
    <?php include 'footer.php'; ?>

    <!-- footer -->

</body>

</html>