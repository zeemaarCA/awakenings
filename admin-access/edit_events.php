<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include 'head.php';
include '../functions.php';
$event_id = $_GET['edit'];

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
          <li class="breadcrumb-item active">Edit Events</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header>
          <h1 class="h3 display">Edit Events</h1>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Edit Events</h4>
              </div>
              <?php
              $get_event = "SELECT * FROM events WHERE event_id = '$event_id'";
              $run_event = mysqli_query($con, $get_event);

              while ($row_event = mysqli_fetch_array($run_event)) {
                $event_id = $row_event['event_id'];
                $event_title = $row_event['event_title'];
                $event_detail = $row_event['event_detail'];
                $event_image = $row_event['event_image'];
                $posted_at = $row_event['posted_at'];

              ?>
                <div class="card-body">
                  <p>Fill all the fields.</p>
                  <form action="edit_events_script.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Choose new image</label>
                          <input type="file" placeholder="Image" name="event_image" value="<?php echo $event_image ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Event Image</label>
                          <img class="img-thumbnail" src="../includes/event_images/<?php echo $event_image ?>" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Event Title</label>
                      <input type="text" placeholder="Product Name" name="event_title" value="<?php echo $event_title; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Event Detail</label>
                      <textarea name="article_desc" class="form-control" value=""><?php echo $event_detail; ?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="update_event" value="Update Event" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
    if (isset($_POST['update_product'])) {

      //getting the text data from the fields

      // $update_id = $pro_id;

      $product_title = $_POST['product_title'];
      $product_cat = $_POST['product_cat'];
      $product_price = $_POST['product_price'];
      $product_desc = $_POST['product_desc'];

      //getting the image from the field
      $product_image = $_FILES['product_image']['name'];
      $product_image_tmp = $_FILES['product_image']['tmp_name'];

      move_uploaded_file($product_image_tmp, "../includes/product_images/$product_image");

      $update_product = "UPDATE products SET product_cat='$product_cat', product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image' WHERE product_id='$pro_id'";

      $run_product = mysqli_query($con, $update_product);

      if ($run_product) {

        echo "<script>alert('Product has been updated!')</script>";

        echo "<script>window.open('tables.php', '_self')</script>";
      }
    }
    ?>
    <?php include 'footer.php'; ?>
</body>

</html>