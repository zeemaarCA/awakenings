    <div class="container nav-top">
      <div class="logo-top">
        <a href="../index.php"><img class="img-fluid" src="../../assets/img/footer-logo.png" alt=""></a>
      </div>
    </div>
    <div class="button_container" id="toggle"><span class="top"></span><span class="middle"></span><span class="bottom"></span></div>
    <div class="overlay" id="overlay">
      <nav class="overlay-menu">
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="body.php">Body &nbsp;&nbsp; </a> <i class="fas fa-caret-down mb-nav onee"></i>
            <ul class="mobile-nav s-onee">
              <li><a href="meditation.php">Meditation</a></li>
              <li><a href="yoga.php">Yoga</a></li>
              <li><a href="nutrition.php">Nutrition</a></li>
              <li><a href="weight-loss.php">Weight-loss</a></li>
              <li><a href="fitness.php">Fitness</a></li>
              <li><a href="beauty.php">Beauty</a></li>
              <li><a href="mediumship.php">Mediumship</a></li>
              <li><a href="spirituality.php">Spirituality & Energy healing</a></li>
            </ul>
          </li>

          <li><a href="lifestyle.php">eco &amp; lifestyle &nbsp;&nbsp; </a> <i class="fas fa-caret-down mb-nav twoo"></i>
            <ul class="mobile-nav s-twoo">
              <li><a href="cars.php">cars</a></li>
              <li><a href="gadgets.php">gadgets</a></li>
              <li><a href="homelife.php">home life</a></li>
              <li><a href="mums-and-babies.php">mums and babies</a></li>
              <li><a href="business.php">business</a></li>
              <li><a href="environment.php">environment</a></li>
              <li><a href="holistic-eating-out.php">holistic eating out</a></li>
              <li><a href="travel.php">travel</a></li>
            </ul>
          </li>
          <li><a href="../directory.php">UAE holistic directory</a></li>
          <li><a href="../products.php">shop</a></li>
          <li><a href="../about-us.php">about us &nbsp;&nbsp;</a> <i class="fas fa-caret-down mb-nav threee"></i>
            <ul class="mobile-nav s-threee">
              <li><a href="../contact_us.php">contact us</a></li>
              <li><a href="../write_for_us.php">write for us</a></li>
            </ul>
          </li>
          <li><a href="../cart.php">cart</a></li>
          <?php if (!isset($_SESSION['customer_name'])) {
          ?>

            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#login">Login</a></li>
          <?php } else {

          ?>
            <li><a class="homer" href="../profile.php"><?php echo $_SESSION['customer_name']; ?></a>
            </li>
            <li><a href="../logout.php">Logout</a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    <div class="container">
      <div class="search-top">
        <i class="fas fa-search search-icon"></i>
      </div>
    </div>

    <!-- mobile-menu -->

    <div id="search">
      <button type="button" class="close">×</button>
      <form action="../search.php" name="test" method="post">
        <h3>Search for...</h3>
        <input type="text" value="" name="search-query" placeholder="type keyword(s) here" autofocus />
        <button type="submit" name="search-trigger" class="btn">Go for Search</button>
      </form>
    </div>