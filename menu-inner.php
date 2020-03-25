<nav>
  <ul>
    <li><a href="../index.php">home</a></li>
    <li>
      <div class="dropdown">
        <a href="body.php"><button class="dropbtn">Body</button> <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a href="mind.php">Mind</a>
          <a href="meditation.php">Meditation</a>
          <a href="yoga.php">Yoga</a>
          <a href="nutrition.php">Nutrition</a>
          <a href="weight-loss.php">Weight-loss</a>
          <a href="fitness.php">Fitness</a>
          <a href="beauty.php">Beauty</a>
          <a href="mediumship.php">Mediumship</a>
          <a href="spirituality.php">Spirituality & Energy healing</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown">
        <a href="lifestyle.php"><button class="dropbtn">EcoLife & Style</button> <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a href="cars.php">cars</a>
          <a href="gadgets.php">gadgets</a>
          <a href="homelife.php">home life</a>
          <a href="mums-and-babies.php">mums and babies</a>
          <a href="business.php">business</a>
          <a href="environment.php">enviroment</a>
          <a href="holistic-eating-out.php">holistic eating out</a>
          <a href="travel.php">travel</a>
        </div>
      </div>
    </li>
    <li><a href="../directory.php">uae holistic directory</a></li>
    <li><a href="../products.php">shop</a></li>
    <li>
      <div class="dropdown">
        <a href="../about_us.php"><button class="dropbtn">About us</button> <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a href="../contact_us.php">contact us</a>
          <a href="../write_for_us.php">write for us</a>
          <a href="../advertise.php">advertise with awakenings</a>
        </div>
      </div>
    </li>
    <?php if (!isset($_SESSION['customer_name'])) {
      ?>
      <li><a href="javascript:void(0)" data-toggle="modal" data-target="#login">Login</a></li>
    <?php } else {

      ?>
      <li>
        <div class="dropdown">
          <button class="dropbtn"><a href="../profile.php"><?php echo $_SESSION['customer_name']; ?></a></button> <i class="fa fa-caret-down"></i>
          <div class="dropdown-content">
            <a href="../logout.php">Logout</a>
          </div>
        </div>
      </li>
    <?php } ?>
      <li><a href="../cart.php"><i class="fa fa-cart-arrow-down"></i></a></li>
    <li><i class="fa fa-search search-icon" id="search-icon"></i></li>
  </ul>

</nav>
<!-- mobile-menu -->
<div class="nav_mobile">
  <div class="d-flex justify-content-between">
    <a id="resp-menu" class="responsive-menu col-3 text-left ml-3" href="#"><i class="fa fa-reorder"></i></a>
    <?php if (!isset($_SESSION['customer_name'])) {
      echo "";
    } else {
      ?>
      <a id="resp-menu" class="responsive-menu col-4" href="../cart.php"><i class="fa fa-cart-arrow-down"></i> Cart</a>
      <?php
    }
    ?>
    <a id="resp-menu" class="responsive-menu col-2" href="#"><i class="fa fa-search search-icon"></i></a>
  </div>

  <ul class="menu">
    <li><a class="homer" href="../index.php"><i class="fa fa-home"></i> HOME</a>
    </li>
    <li><a class="homer" href="javascript:void(0)">Body <i class="fa fa-caret-down"></i></a>
      <ul class="sub-menu">
        <li><a href="body.php">Body</a></li>
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
    <li><a class="homer" href="javascript:void(0)">EcoLife & Style <i class="fa fa-caret-down"></i></a>
      <ul class="sub-menu">
        <li><a href="lifestyle.php">EcoLife & Style</a></li>
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
    <li><a href="../directory.php">uae holistic directory</a></li>
    <li><a href="../products.php">shop</a></li>
    <li><a class="homer" href="javascript:void(0)">About us <i class="fa fa-caret-down"></i></a>
      <ul class="sub-menu">
        <li><a href="../about_us.php">about us</a></li>
        <li><a href="../contact_us.php">Contact us</a></li>
        <li><a href="../subscribe_to_awakenings.php">subscribe to awakenings</a></li>
        <li><a href="../write_for_us.php">write for us</a></li>
        <li><a href="../advertise.php">advertise with awakenings</a></li>
        <li><a href="../events.php">UAE events</a></li>
      </ul>
    </li>
    <?php if (!isset($_SESSION['customer_name'])) {
      ?>
      <li><a href="javascript:void(0)" data-toggle="modal" data-target="#login">Login</a></li>
    <?php } else {

      ?>
      <li><a class="homer" href="javascript:void(0)"><?php echo $_SESSION['customer_name']; ?> <i class="fa fa-caret-down"></i></a>
        <ul class="sub-menu">
          <li><a href="../profile.php"><?php echo $_SESSION['customer_name']; ?></a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </li>
    <?php } ?>
  </ul>
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
