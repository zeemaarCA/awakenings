<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'functions.php';
include 'head.php';
?>

<body>

  <div class="container header">
    <div class="row">
      <img src="assets/img/footer-logo.png" alt="">
      <?php include 'menu.php'; ?>
    </div>
  </div>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">UAE holistic directory</li>
      </ol>
    </nav>
  </div>

  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9">
        <div class="directory">
          <h2>UAE holistic directory</h2>
          <form action="">
            <i id="filtersubmit" class="fa fa-search"></i>
            <input type="search" name="" value="" class="search-d" id="myInput" placeholder="Search" autofocus>
          </form>
          <ul id="myList">
            <?php
            $get_dir = "SELECT * FROM holistic_directory";
            $run_dir = mysqli_query($con, $get_dir);

            while ($row_dir = mysqli_fetch_array($run_dir)) {
              $dir_id = $row_dir['dir_id'];
              $dir_title = $row_dir['dir_name'];

              ?>
              <li><a href="directory_detail.php?dir_id=<?php echo $dir_id ?>"><?php echo $dir_title; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-3">
        <?php include 'right_column.php' ?>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>