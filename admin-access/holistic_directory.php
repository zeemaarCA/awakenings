<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include '../includes/conn.php';
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>

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
          <li class="breadcrumb-item active">Add New Post</li>
        </ul>
      </div>
    </div>
    <section class="forms">
      <div class="container-fluid">
        <!-- Page Header-->
        <br>
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Add New Post</h4>
              </div>
              <div class="card-body">
                <p>Fill all the fields.</p>
                <form action="insert_holistic_post.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Featured Image</label>
                    <input type="file" placeholder="Image" name="featured_image" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Post Image</label>
                    <input type="file" placeholder="Image" name="post_image" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" placeholder="Title" name="post_title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Post category</label>
                    <select class="form-control" name="dir_cat">
                      <option value="">Select category</option>
                      <?php
                      $get_dir_cats = "SELECT * FROM holistic_directory";
                      $run_dir_cats = mysqli_query($con, $get_dir_cats);

                      while ($row_dir_cats = mysqli_fetch_array($run_dir_cats)) {
                        $cat_dir_id = $row_dir_cats['dir_id'];
                        $cat_dir_title = $row_dir_cats['dir_name'];
                        echo "<option value='$cat_dir_id'>$cat_dir_title</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Article Body</label>
                    <textarea name="article_desc" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="insert_post" value="Post" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Add Holistic Directory</h4>
              </div>
              <div class="card-body text-center">
                <form action="insert_directory.php" method="post">
                  <div class="form-group">
                    <label>Directory Name</label>
                    <input type="text" placeholder="Name" name="dir_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="insert_directory" value="Add Directory" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>
    <script>
      CKEDITOR.replace('post_desc');
    </script>

</html>