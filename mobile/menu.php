    <div class="container nav-top">
      <div class="logo-top">
        <a href="index.php"><img class="img-fluid" src="../assets/img/footer-logo.png" alt=""></a>
      </div>
    </div>
    <div class="button_container animated" id="toggle"><span class="top"></span><span class="middle"></span><span class="bottom"></span></div>
    <div class="overlay" id="overlay">
      <nav class="overlay-menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="category/body.php">Body &nbsp;&nbsp; </a> <i class="fas fa-caret-down mb-nav onee"></i>
            <ul class="mobile-nav s-onee">
              <li><a href="category/mind.php">Mind</a></li>
              <li><a href="category/meditation.php">Meditation</a></li>
              <li><a href="category/yoga.php">Yoga</a></li>
              <li><a href="category/nutrition.php">Nutrition</a></li>
              <li><a href="category/weight-loss.php">Weight-loss</a></li>
              <li><a href="category/fitness.php">Fitness</a></li>
              <li><a href="category/beauty.php">Beauty</a></li>
              <li><a href="category/mediumship.php">Mediumship</a></li>
              <li><a href="category/spirituality.php">Spirituality & Energy healing</a></li>
            </ul>
          </li>
          <li><a href="category/mind.php">Mind</a></li>
          <li><a href="category/lifestyle.php">Lifestyle &nbsp;&nbsp; </a> <i class="fas fa-caret-down mb-nav twoo"></i>
            <ul class="mobile-nav s-twoo">
              <li><a href="category/cars.php">cars</a></li>
              <li><a href="category/gadgets.php">gadgets</a></li>
              <li><a href="category/homelife.php">home life</a></li>
              <li><a href="category/mums-and-babies.php">mums and babies</a></li>
              <li><a href="category/business.php">business</a></li>
              <li><a href="category/environment.php">environment</a></li>
              <li><a href="category/holistic-eating-out.php">holistic eating out</a></li>
              <li><a href="category/travel.php">travel</a></li>
            </ul>
          </li>
          <li><a href="events.php">Events</a></li>
          <li><a href="directory.php">UAE directory</a></li>
          <li><a href="products.php">shop</a></li>
          <li><a href="about-us.php">about us &nbsp;&nbsp;</a> <i class="fas fa-caret-down mb-nav threee"></i>
            <ul class="mobile-nav s-threee">
              <li><a href="contact_us.php">contact us</a></li>
              <li><a href="write_for_us.php">write for us</a></li>
            </ul>
          </li>
          <li><a href="cart.php">cart</a></li>
          <?php if (!isset($_SESSION['customer_name'])) {
          ?>

            <li><a href="javascript:void(0)" class="modal-link-login">Login</a></li>

          <?php } else {

          ?>
            <li><a class="homer" href="profile.php"><?php echo $_SESSION['customer_name']; ?></a>
            </li>
            <li><a href="logout.php">Logout</a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    <div class="container">
      <div class="search-top animated">
        <img src="../assets/img/search-icon.png" class="search-icon" alt="">
      </div>
    </div>

    <!-- mobile-menu -->

    <div id="search">
      <button type="button" class="close">×</button>
      <form action="search.php" name="test" method="post">
        <h3>Search for...</h3>
        <input type="text" value="" name="search-query" placeholder="type keyword(s) here" autofocus />
        <button type="submit" name="search-trigger" class="btn">Search</button>
      </form>
    </div>