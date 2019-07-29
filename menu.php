<nav>
  <ul>
    <li><a href="index.php">home</a></li>
    <li>
      <div class="dropdown">
        <button class="dropbtn">Body, Mind, Healing</button> <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
          <a href="category/mind.php">mind</a>
          <a href="category/body.php">body</a>
          <a href="category/spirit.php">spirit</a>
          <a href="category/lifestyle.php">lifestyle</a>
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
  <form method="post" name="" action="search.php">
    <div id="find">
      <input name="search-query" id="search-icon" class="nav-search" type="search" placeholder="Search">
    </div>
  </form>
</nav>

<div id="search">
  <button type="button" class="close">×</button>
  <form action="search.php" name="test" method="post">
    <h3>Serach for...</h3>
    <input type="search" value="" name="search-query" placeholder="type keyword(s) here" />
    <button type="submit" name="search-trigger" class="btn">Go for Search</button>
  </form>
</div>