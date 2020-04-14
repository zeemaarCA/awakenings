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
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">All Payments</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header>
          <h1 class="h3 display">Tables </h1>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>All Payments</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Customer/Guest Email</th>
                        <th>Product (S)</th>
                        <th>Paid Amount</th>
                        <th>Transaction ID</th>
                        <th>Currency</th>
                        <th>Total</th>
                        <th>Payment Date</th>
                      </tr>
                    </thead>
                    <?php
                    $get_payment = "select * from payments";

                    $run_payment = mysqli_query($con, $get_payment);

                    $i = 0;

                    while ($row_payment = mysqli_fetch_array($run_payment)) {

                      $amount = $row_payment['amount'];
                      $per_item_price = $row_payment['single_payment_price'];
                      $trx_id = $row_payment['trx_id'];
                      $currency = $row_payment['currency'];
                      $payment_date = $row_payment['payment_date'];
                      $pro_id = $row_payment['product_id'];
                      $c_id = $row_payment['customer_id'];
                      $guest_id = $row_payment['guest_id'];

                      $i++;

                      $get_pro = "select * from products where product_id='$pro_id'";
                      $run_pro = mysqli_query($con, $get_pro);

                      $row_pro = mysqli_fetch_array($run_pro);

                      $pro_image = $row_pro['product_image'];
                      $pro_title = $row_pro['product_title'];

                      $get_c = "select * from customers where customer_id='$c_id'";
                      $run_c = mysqli_query($con, $get_c);

                      $row_c = mysqli_fetch_array($run_c);

                      $c_email = $row_c['customer_email'];

                      $get_g = "select * from guests where guest_id='$guest_id'";
                      $run_g = mysqli_query($con, $get_g);

                      $row_g = mysqli_fetch_array($run_g);
                      $g_email = $row_g['guest_email'];
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $g_email; echo $c_email ?></td>
                          <td>
                            <?php echo $pro_title; ?></td>
                          <td>$<?php echo $per_item_price; ?></td>
                          <td><?php echo $trx_id; ?></td>
                          <td><?php echo $currency; ?></td>
                          <td>$<?php echo $amount; ?></td>
                          <td><?php echo $payment_date; ?></td>
                        </tr>
                      </tbody>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>