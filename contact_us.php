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
        <li class="breadcrumb-item" aria-current="page">Contact Us</li>
      </ol>
    </nav>
  </div>
  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>Contact Us</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>

  <div class="container about_us_block">
    <div class="row">
      <div class="col-lg-9">
        <div class="about_us">
          <p><i>Awakenings Middle East</i> magazine was launched on 1 December 2012. A quarterly title in print and digital formats, its mission is to the be the guide to holistic and healthy living in the UAE.</p>
          <br>

          <p>The idea behind Awakenings magazine, as well as its website, Facebook page, Meet-up group, and other platforms, is to provide a focal point for the fast-growing wellbeing, fitness and alternative health community in the UAE.</p>
          <br>
          <p>About 10,000 copies are distributed throughout the UAE. About 5,000 print copies go to individual subscribers and another 5,000 are spread through the public space via the retail space (supermarkets, book shops etc) as well as medical clinics and alternative health centres; mind & body-related businesses and shops; spas, hotels; yoga and Pilates studios; fitness centres; health food shops, etc.</p>
          <br>
          <p>Subscription is available via the website.</p>
          <br>
          <p>The magazine is published by MBS GROUP FZLLE (license number NMC-ML-02-F03) and is approved by the National Media Council of the UAE.</p>
          <br>
          <p>MBS Group FZLLE<br>DubaiMob. 050 4507149<br>Email: mbsgroupme@gmail.com</p>
          <br>
          <p><b>Now, meet the team…</b></p>
          <br>
          <p><b>Publisher & Editor: Sharon Taylor</b></p>
          <p>Tel. +971 (0)50 450 7149<br>sharon@awakeningsme.com<br><i>Contact Sharon for anything and everything to do with the magazine – if you have a great story idea and you want to write for us or if you want to buy advertising space or advertorial for your business, get in touch! We’d love to hear from you…</i></p>
          <br>
          <p><b>Social Media Manager & Sub Editor: Reema Aidasani</b></p>
          <p>Tel. +971 (0)56 725 0908<br>reema@awakeningsme.com<br>Contact Reema for social media ideas or queries or editorial.</p>
          <p><b>Online content: Sharon Taylor</b><br>sharon@awakeningsme.com<br><i>Again, contact Sharon if you want your business listed on the directory or an event uploading to the calendar or to have something promoted on our Facebook page</i></p>
          <a href="about_us.php">To find out even more about us, click here…</a>
        </div>
        <div class="contact_form">
          <h2>Contact us</h2>
          <!-- Starting of ajax contact form -->
          <form class="contact__form" method="post" action="mail.php">
            <!-- Starting of successful form message -->
            <div class="row">
              <div class="col-12">
                <div class="alert alert-success contact__msg" style="display: none" role="alert">
                  Your message was sent successfully.
                </div>
              </div>
            </div>
            <!-- Ending of successful form message -->

            <!-- Element of the ajax contact form -->
            <div class="row">
              <div class="col-md-6 form-group">
                <input name="name" type="text" class="form-control" placeholder="Name" required>
              </div>
              <div class="col-md-6 form-group">
                <input name="email" type="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="col-md-6 form-group">
                <input name="phone" type="text" class="form-control" placeholder="Phone" required>
              </div>
              <div class="col-md-6 form-group">
                <input name="subject" type="text" class="form-control" placeholder="Subject" required>
              </div>
              <div class="col-12 form-group">
                <textarea name="message" class="form-control" rows="3" placeholder="Message" required></textarea>
              </div>
              <div class="col-12">
                <input name="submit" type="submit" class="contact_form_btn" value="Send Message">
              </div>
            </div>
          </form>
          <!-- Ending of ajax contact form -->
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