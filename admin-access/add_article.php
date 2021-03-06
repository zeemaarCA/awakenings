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
          <li class="breadcrumb-item active">Add New Article</li>
        </ul>
      </div>
    </div>
    <section class="forms">
      <div class="container-fluid">
        <!-- Page Header-->
        <br>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Add New Article</h4>
              </div>
              <div class="card-body">
                <p>Fill all the fields.</p>
                <form action="insert_article.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Article Title</label>
                    <input type="text" placeholder="Title" name="article_title" class="form-control">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Article main category</label>
                        <select class="form-control" name="article_main_cat">
                          <option value="">Select main category</option>
                          <?php
                          $get_article_cats = "SELECT * FROM article_categories";
                          $run_article_cats = mysqli_query($con, $get_article_cats);

                          while ($row_article_cats = mysqli_fetch_array($run_article_cats)) {
                            $cat_article_id = $row_article_cats['article_cat_id'];
                            $cat_article_title = $row_article_cats['article_main_cat'];
                            echo "<option value='$cat_article_title'>$cat_article_title</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Article sub category</label>
                        <select class="form-control" name="article_sub_cat">
                          <option value="">Select sub category</option>
                          <?php
                          $get_article_sub_cats = "SELECT * FROM article_sub_categories";
                          $run_article_sub_cats = mysqli_query($con, $get_article_sub_cats);

                          while ($row_article_sub_cats = mysqli_fetch_array($run_article_sub_cats)) {
                            $cat_article_sub_id = $row_article_sub_cats['article_cat_sub_id'];
                            $cat_article_sub_title = $row_article_sub_cats['article_sub_cat'];
                            echo "<option value='$cat_article_sub_title'>$cat_article_sub_title</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Page Name</label>
                        <select class="form-control" name="article_page_name">
                          <option value="">Select Page Name</option>
                          <?php
                          $get_article_page_name = "SELECT * FROM article_page_name";
                          $run_article_page_name = mysqli_query($con, $get_article_page_name);

                          while ($row_article_page_name = mysqli_fetch_array($run_article_page_name)) {
                            $cat_article_page_id = $row_article_page_id['page_id'];
                            $cat_article_page_name = $row_article_page_name['page_name'];
                            echo "<option value='$cat_article_page_name'>$cat_article_page_name</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Featured Image</label>
                        <input type="file" placeholder="Image" name="article_image" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Article Tags</label>
                    <input type="text" name="article_tag" class="form-control" placeholder="Separate with commas">
                  </div>
                  <div class="form-group">
                    <label>Article Body</label>
                    <textarea name="article_desc" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="insert_article" value="Post Article" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>

</html>