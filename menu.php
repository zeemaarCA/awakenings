<nav>
  <ul>
    <li><a href="index.php">home</a></li>
    <li>
      <div class="dropdown">
        <a href="category/body.php"><button class="dropbtn">Body</button> <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a href="category/meditation.php">Meditation</a>
          <a href="category/yoga.php">Yoga</a>
          <a href="category/nutrition.php">Nutrition</a>
          <a href="category/weight-loss.php">Weight-loss</a>
          <a href="category/fitness.php">Fitness</a>
          <a href="category/beauty.php">Beauty</a>
          <a href="category/mediumship.php">Mediumship</a>
          <a href="category/spirituality.php">Spirituality & Energy healing</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown">
        <a href="category/lifestyle.php"><button class="dropbtn">EcoLife & Style</button> <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a href="category/cars.php">cars</a>
          <a href="#">gadgets</a>
          <a href="#">home life</a>
          <a href="#">mums and babies</a>
          <a href="category/business.php">business</a>
          <a href="#">environment</a>
          <a href="#">holistic eating out</a>
          <a href="#">travel</a>
        </div>
      </div>
    </li>
    <li><a href="directory.php">uae holistic directory</a></li>
    <li><a href="products.php">shop</a></li>
    <li>
      <div class="dropdown">
        <button class="dropbtn">About us</button> <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
          <a href="#">events</a>
          <a href="#">about us</a>
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
          <button class="dropbtn"><a href="profile.php"><?php echo $_SESSION['customer_name']; ?></a></button> <i class="fa fa-caret-down"></i>
          <div class="dropdown-content">
            <a href="logout.php">Logout</a>
          </div>
        </div>
      </li>
    <?php } ?>
    <?php if (!isset($_SESSION['customer_name'])) {
      echo "";
    } else {
      ?>
      <li><a href="cart.php"><i class="fa fa-cart-arrow-down"></i><span class="cart-qty"><?php echo total_items(); ?></span></a></li>
    <?php
    }
    ?>
    <li><i class="fa fa-search" id="search-icon"></i></li>
  </ul>
</nav>

<div id="search">
  <button type="button" class="close">×</button>
  <form action="search.php" name="test" method="post">
    <h3>Serach for...</h3>
    <input type="text" value="" name="search-query" placeholder="type keyword(s) here" autofocus />
    <button type="submit" name="search-trigger" class="btn">Go for Search</button>
  </form>
</div>