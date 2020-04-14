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
          <li class="breadcrumb-item active">All Products</li>
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
                <h4>All Products</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Edit <i class="fa fa-edit"></i></th>
                        <th>Delete <i class="fa fa-trash"></i></th>
                      </tr>
                    </thead>
                    <?php
                    $get_pro = "SELECT * FROM products";
                    $run_pro = mysqli_query($con, $get_pro);

                    while ($row_pro = mysqli_fetch_array($run_pro)) {
                      $pro_id = $row_pro['product_id'];
                      $pro_cat = $row_pro['product_cat'];
                      $pro_title = $row_pro['product_title'];
                      $pro_price = $row_pro['product_price'];
                      $pro_desc = $row_pro['product_desc'];
                      $pro_image = $row_pro['product_image'];
                      cart();

                      ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $pro_id; ?></th>
                          <td><img src="../includes/product_images/<?php echo $pro_image; ?>" alt="" class="table_pro_img_admin"></td>
                          <td><?php echo $pro_title; ?></td>
                          <td>&euro;<?php echo $pro_price; ?></td>
                          <td><a href="edit_product.php?edit=<?php echo $pro_id; ?>" class="edit-icon"><i class="fa fa-edit"></i></td>
                          <td><a href="delete_product.php?del=<?php echo $pro_id; ?>" onClick="return confirm('Delete This item?')" class="del-icon"><i class="fa fa-trash"></i></td>
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