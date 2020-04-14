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
          <li class="breadcrumb-item active">All Directories</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header>
          <h1 class="h3 display">All Directories</h1>
        </header>
        <div class="row">
          <?php
          $get_directory = "SELECT * FROM holistic_posts";
          $run_directory = mysqli_query($con, $get_directory);

          while ($row_directory = mysqli_fetch_array($run_directory)) {
            $directory_id = $row_directory['id'];
            $directory_title = $row_directory['post_name'];

          ?>
            <div class="col-lg-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $directory_title ?></h5>
                  <a href="edit_directory.php?edit=<?php echo $directory_id; ?>" class="btn btn-default"><i class="fa fa-edit"></i>Edit</a>
                  <a href="delete_directory.php?del=<?php echo $directory_id; ?>" onClick="return confirm('Delete This item?')" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>