<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'functions.php';
include 'head.php';
include 'modals.php';
?>

<body>
  <?php include 'header_inner.php'; ?>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item" aria-current="page">Events</li>
      </ol>
    </nav>
  </div>
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>UAE Events</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>

  <div class="container aw-latest-text">
    <div class="row">
      <div class="col-lg-9 px-0">
        <div class="row">
          <?php
          $get_event = "SELECT * FROM events order by posted_at ASC";
          $run_event = mysqli_query($con, $get_event);
          while ($row_event = mysqli_fetch_array($run_event)) {
            $event_id = $row_event['event_id'];
            $event_title = $row_event['event_title'];
            $event_detail = $row_event['event_detail'];
            $event_image = $row_event['event_image'];
            $posted_at = $row_event['posted_at'];
            $trim_desc = (strlen($event_detail) > 100) ? substr($event_detail, 0, 200) . '...' : $event_detail;
            $string_x = strip_tags($trim_desc);
            $string_y = trim($string_x);
            $timestamp = strtotime($posted_at);

          ?>
            <div class="col-lg-6">
              <div class="full-body-content">
                <div class="row">
                  <div class="col-lg-12">
                    <a href="event_detail.php?event_id=<?php echo $event_id ?>">
                      <div class="article-bg-img" style="background: url(includes/event_images/<?php echo rawurlencode($event_image); ?>)">
                        <div class="date-line date_font">
                          <?php echo date('d/m/Y', $timestamp); ?>
                        </div>
                      </div>
                    </a>
                    <div class="body-lower-content">
                      <a href="event_detail.php?event_id=<?php echo $event_id ?>">
                        <h2><?php echo $event_title ?></h2>
                        <p class="mt-3"><?php echo $string_y; ?></p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <?php include 'right_column.php' ?>
      </div>
    </div>
  </div>
  <div style="height:36px;"></div>
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>


</body>

</html>