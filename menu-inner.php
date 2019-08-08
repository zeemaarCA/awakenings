<nav>
  <ul>
    <li><a href="../index.php">home</a></li>
    <li>
      <div class="dropdown">
        <a href="body.php"><button class="dropbtn">Body</button> <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
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
          <a href="../contact_us.php">about us</a>
          <a href="../subscribe_to_awakenings.php">subscribe to awakenings</a>
          <a href="../write_for_us.php">write for us</a>
          <a href="../advertise.php">advertise with awakenings</a>
          <a href="../events.php">UAE events</a>
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
    <?php if (!isset($_SESSION['customer_name'])) {
      echo "";
    } else {
      ?>
      <li><a href="../cart.php"><i class="fa fa-cart-arrow-down"></i><span class="cart-qty"><?php echo total_items(); ?></span></a></li>
    <?php
    }
    ?>
    <li><i class="fa fa-search" id="search-icon"></i></li>
  </ul>

</nav>

<div id="search">
  <button type="button" class="close">×</button>
  <form action="../search.php" name="test" method="post">
    <h3>Search for...</h3>
    <input type="text" value="" name="search-query" placeholder="type keyword(s) here" autofocus />
    <button type="submit" name="search-trigger" class="btn">Go for Search</button>
  </form>
</div>