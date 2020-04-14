<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include 'head.php';
include '../functions.php';
$directory_id = $_GET['edit'];

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
          <li class="breadcrumb-item active">Edit Directory</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header>
          <h1 class="h3 display">Edit Directory</h1>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Edit Directory</h4>
              </div>
              <?php
              $get_directory = "SELECT * FROM holistic_posts WHERE id = '$directory_id'";
              $run_directory = mysqli_query($con, $get_directory);

              while ($row_directory = mysqli_fetch_array($run_directory)) {
                $directory_id = $row_directory['id'];
                $directory_image = $row_directory['post_img'];
                $directory_title = $row_directory['post_name'];
                $directory_text = $row_directory['post_detail'];
                $directory_dir = $row_directory['dir_name'];

              ?>
                <div class="card-body">
                  <p>Fill all the fields.</p>
                  <form action="edit_directory_script.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="directory_id" value="<?php echo $directory_id; ?>">
                    <div class="form-group">
                      <label>Directory Title</label>
                      <input type="text" placeholder="Directory Name" name="directory_title" value="<?php echo $directory_title; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Directory Name</label>
                      <select class="form-control" name="dir_name">
                        <option value="<?php echo $directory_dir ?>"><?php echo $directory_dir ?></option>
                        <?php
                        $get_sub_cats = "SELECT * FROM holistic_directory";
                        $run_sub_cats = mysqli_query($con, $get_sub_cats);

                        while ($row_sub_cats = mysqli_fetch_array($run_sub_cats)) {
                          $dir_sub_id = $row_sub_cats['dir_id'];
                          $dir_sub_title = $row_sub_cats['dir_name'];
                          // echo "<option value='$cat_id'>$article_main_cat</option>";
                          echo "<option value='$dir_sub_id'>$dir_sub_title</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Choose new image</label>
                          <input type="file" placeholder="Image" name="directory_image" value="<?php echo $directory_image ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Directory Image</label>
                          <img class="img-thumbnail" src="../includes/holistic_images/<?php echo $directory_image ?>" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Directory Description</label>
                      <textarea name="article_desc" class="form-control" value=""><?php echo $directory_text; ?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="update_directory" value="Update Dirctory" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>