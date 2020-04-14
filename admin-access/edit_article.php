<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:index.php?msg=Please Login First');
}
include 'head.php';
include '../functions.php';
$article_id = $_GET['edit'];

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
          <li class="breadcrumb-item active">Edit Article</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header>
          <h1 class="h3 display">Edit Article</h1>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Edit Article</h4>
              </div>
              <?php
              $get_article = "SELECT * FROM articles WHERE article_id = '$article_id'";
              $run_article = mysqli_query($con, $get_article);

              while ($row_article = mysqli_fetch_array($run_article)) {
                $article_id = $row_article['article_id'];
                $article_title = $row_article['article_title'];
                $article_main_cat = $row_article['article_main_cat'];
                $article_sub_cat = $row_article['article_sub_cat'];
                $article_page_name = $row_article['page_name'];
                $article_tag = $row_article['article_tag'];
                $article_text = $row_article['article_text'];
                $article_image = $row_article['featured_image'];
                $posted_at = $row_article['posted_at'];

              ?>
                <div class="card-body">
                  <p>Fill all the fields.</p>
                  <form action="edit_article_script.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Choose new image</label>
                          <input type="file" placeholder="Image" name="article_image" value="<?php echo $article_image ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Product Image</label>
                          <img class="img-thumbnail" src="../includes/article_images/<?php echo $article_image ?>" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Article Title</label>
                      <input type="text" placeholder="Product Name" name="article_title" value="<?php echo $article_title; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Article Main Category</label>
                      <select class="form-control" name="article_main_cat">
                        <option value="<?php echo $article_main_cat ?>"><?php echo $article_main_cat ?></option>
                        <?php
                        $get_cats = "SELECT * FROM article_categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                          $cat_id = $row_cats['article_cat_id'];
                          $cat_title = $row_cats['article_main_cat'];
                          // echo "<option value='$cat_id'>$article_main_cat</option>";
                          echo "<option value='$cat_title'>$cat_title</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Article Sub Category</label>
                      <select class="form-control" name="article_sub_cat">
                        <option value="<?php echo $article_sub_cat ?>"><?php echo $article_sub_cat ?></option>
                        <?php
                        $get_sub_cats = "SELECT * FROM article_sub_categories";
                        $run_sub_cats = mysqli_query($con, $get_sub_cats);

                        while ($row_sub_cats = mysqli_fetch_array($run_sub_cats)) {
                          $cat_sub_id = $row_sub_cats['article_cat_sub_id'];
                          $cat_sub_title = $row_sub_cats['article_sub_cat'];
                          // echo "<option value='$cat_id'>$article_main_cat</option>";
                          echo "<option value='$cat_sub_title'>$cat_sub_title</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Article Page Name</label>
                      <select class="form-control" name="page_name">
                        <option value="<?php echo $article_page_name ?>"><?php echo $article_page_name ?></option>
                        <?php
                        $get_page_name = "SELECT * FROM article_page_name";
                        $run_page_name = mysqli_query($con, $get_page_name);

                        while ($row_page_name = mysqli_fetch_array($run_page_name)) {
                          $page_id = $row_page_name['page_id'];
                          $page_name = $row_page_name['page_name'];
                          echo "<option value='$page_name'>$page_name</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Article Tags</label>
                          <input type="text" name="article_tag" class="form-control" placeholder="Separate with commas" value="<?php echo $article_tag ?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Article Date</label>
                          <input type="text" name="posted_at" class="form-control" placeholder="Date" value="<?php echo $posted_at ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Article Description</label>
                      <textarea name="article_desc" class="form-control" value=""><?php echo $article_text; ?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="update_article" value="Update Article" class="btn btn-primary">
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