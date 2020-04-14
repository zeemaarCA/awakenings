<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include '../functions.php';
include 'head.php';
include 'modals.php';
?>

<body>
  <?php include 'menu.php'; ?>
  <div class="body-wrapper">
    <div class="posts-heading">
      <h2>Events</h2>
    </div>
    <?php
    $get_event = "SELECT * FROM events order by posted_at ASC";
    $run_event = mysqli_query($con, $get_event);
    while ($row_event = mysqli_fetch_array($run_event)) {
      $event_id = $row_event['event_id'];
      $event_title = $row_event['event_title'];
      $event_detail = $row_event['event_detail'];
      $event_image = $row_event['event_image'];
      $posted_at = $row_event['posted_at'];
      $trim_desc = (strlen($event_detail) > 100) ? substr($event_detail, 0, 150) . '...' : $event_detail;
      $dt = new DateTime($posted_at);
      $timestamp = strtotime($posted_at);
    ?>
      <div class="random-posts">
        <a href="event_detail.php?event_id=<?php echo $event_id ?>">
          <div class="feature-img">
            <div class="bg-img" style="background: url(../includes/event_images/<?php echo rawurlencode($event_image); ?>)">
            </div>
          </div>
          <div class="feature-text">

            <div class="title">
              <h3><?php echo $event_title ?></h3>
            </div>
            <div class="date">
              <span class="article_date">
                <?php echo date('d/m/Y', $timestamp); ?>
              </span>
            </div>
          </div>
        </a>
      </div>
    <?php
    }
    ?>

    <?php include 'footer.php'; ?>
  </div>
  <?php include 'scripts.php'; ?>


</body>

</html>