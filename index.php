<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
session_start();
include 'head.php';
include 'modals.php';
include 'functions.php';
?>

<body>
	<!-- header -->
	<header>
		<?php
		include 'header.php';
		?>
	</header>
	<!-- header end-->
	<!-- Awakened Latest -->

	<div class="container c-f-2 awakened-last">
		<div class="row align-items-center">
			<div class="col-lg-3 col-12">
				<h1>Awakened Latest</h1>
			</div>
			<div class="col-lg-9 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
	</div>

	<div class="container pl-0 awakened-last-imgs">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<?php
					$get_article = "SELECT * FROM articles order by RAND() LIMIT 4";
					$run_article = mysqli_query($con, $get_article);
					while ($row_article = mysqli_fetch_array($run_article)) {
						$article_id = $row_article['article_id'];
						$article_title = $row_article['article_title'];
						$article_main_cat = $row_article['article_main_cat'];
						$article_sub_cat = $row_article['article_sub_cat'];
						$article_desc = $row_article['article_text'];
						$article_image = $row_article['featured_image'];
						$posted_at = $row_article['posted_at'];
						$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 150) . '...' : $article_desc;
						?>
						<div class="col-lg-6 pr-0">
							<div class="main-page-bg-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
							<div class="box">
								<span class="green-b"><?php echo $article_main_cat ?></span>
							</div>
							<div class="top-pics-heading border-right">
								<h1><?php echo $article_title ?></h1>
								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>"><i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
			<div class="col-lg-4 pr-0">
				<div class="top-right-list">
					<h2>search holistic directory</h2>
					<ul>
						<?php
						$get_dir = "SELECT * FROM holistic_directory ORDER BY RAND() LIMIT 6";
						$run_dir = mysqli_query($con, $get_dir);

						while ($row_dir = mysqli_fetch_array($run_dir)) {
							$dir_id = $row_dir['dir_id'];
							$dir_title = $row_dir['dir_name'];

							?>
							<li><a href="directory_detail.php?dir_id=<?php echo $dir_id ?>"><?php echo $dir_title; ?></a></li>
						<?php } ?>
						<li><a href="directory.php">more</a></li>
					</ul>
				</div>
				<div class="right-side-img">
					<img src="assets/img/right-side-img.jpg" alt="">
				</div>

			</div>
		</div>
	</div>
	<!-- Awakened Latest end -->

	<!-- awakening events -->
	<!-- <div class="container awakened-last events">
		<div class="row align-items-center">
			<div class="col-lg-3 col-12">
				<h1>Awakened Events</h1>
			</div>
			<div class="col-lg-9 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="events-items">
			<div class="row align-items-center">
				<div class="col-lg-4">
					<img src="assets/img/event1.png" alt="">
					<h4>Title</h4>
					<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, dolorem consectetur ea perferendis vel aut.</h6>
					<button>Intrested</button>
				</div>
				<div class="col-lg-4">
					<img src="assets/img/event2.png" alt="">

					<h4>Title</h4>
					<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, dolorem consectetur ea perferendis vel aut.</h6>
					<button>Intrested</button>
				</div>
				<div class="col-lg-4">
					<img src="assets/img/event3.png" alt="">
					
					<h4>Title</h4>
					<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, dolorem consectetur ea perferendis vel aut.</h6>
					<button>Intrested</button>
				</div>
			</div>
		</div>
	</div> -->
	<!-- awakening events -->

	<!-- signup form -->
	<div class="container signup-form">
		<div class="row">
			<div class="col-lg-12">
				<h2>sign up now for your chance to <span class="bold-font">win a night's stay</span><br>for 2 at the retreat palm dubai MGallery by sofitel</h2>
				<form class="login-form" id="myForm" action="" method="POST">
					<input type="email" name="user_email" class="my-form" placeholder="Enter your Email" id="user_email">
					<span id="uemail"></span>
					<input type="text" name="user_first_name" class="my-form" placeholder="First Name" id="user_first_name">
					<span id="ufname"></span>
					<input type="text" name="user_last_name" class="my-form" placeholder="Last Name" id="user_last_name">
					<span id="ulname"></span>
					<input type="submit" class="btn-sub" name="submit" id="submit" value="Subscribe">
					<div id="message"></div>
				</form>
			</div>
		</div>
	</div>
	<!-- signup form end-->
	<div class="container c-f-2 awakened-last mini-nav-sec">
		<div class="row align-items-center">
			<div class="col-lg-3 col-12">
				<h1>Awakened Body</h1>
			</div>
			<div class="col-lg-9 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-lg-6">
				<div class="mini-nav">
					<ul>
						<li><a href="category/body.php">all</a></li>
						<li><a href="category/beauty.php">beauty</a></li>
						<li><a href="category/fitness.php">fitness</a></li>
						<li><a href="category/nutrition.php">nutrition</a></li>
						<li><a href="category/weight-loss.php.php">weight-loss</a></li>
						<li><a href="category/yoga.php">yoga</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 pr-0">
				<div class="center-girl-sec">
					<img src="assets/img/center-girl.jpg" alt="">
					<div class="center-girl-title">
						<h1>A Surgery-Free Micro Lift with Ultherapy&reg;</h1>
						<div class="arrow-right">
							<a href="category/article_detail.php?article_id=12" <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 pl-0">
				<div class="mini-slider-outer">
					<div class="mini-slider">
						<?php
						$get_article = "SELECT * FROM articles WHERE article_main_cat = 'body'  order by RAND() LIMIT 4";
						$run_article = mysqli_query($con, $get_article);
						while ($row_article = mysqli_fetch_array($run_article)) {
							$article_id = $row_article['article_id'];
							$article_title = $row_article['article_title'];
							$article_main_cat = $row_article['article_main_cat'];
							$article_sub_cat = $row_article['article_sub_cat'];
							$article_desc = $row_article['article_text'];
							$article_image = $row_article['featured_image'];
							$posted_at = $row_article['posted_at'];
							$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 150) . '...' : $article_desc;
							?>
							<div>
								<div class="main-page-body-sec-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>

								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<h2><?php echo $article_title ?></h2>
								</a>
							</div>
						<?php
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- mind and spirit -->
	<div class="container c-f-2 awakened-last mini-nav-sec-2">
		<div class="row align-items-center" style="margin: -23px 0 2rem 0;">
			<div class="col-lg-4 col-12 pl-0">
				<h1>Awakened Mind & Spirit</h1>
			</div>
			<div class="col-lg-8 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 pr-0">
				<div class="mini-slider-outer">
					<div class="mini-slider">
						<?php
						$get_article = "SELECT * FROM articles WHERE article_main_cat = 'mind'  order by RAND() LIMIT 4";
						$run_article = mysqli_query($con, $get_article);
						while ($row_article = mysqli_fetch_array($run_article)) {
							$article_id = $row_article['article_id'];
							$article_title = $row_article['article_title'];
							$article_main_cat = $row_article['article_main_cat'];
							$article_sub_cat = $row_article['article_sub_cat'];
							$article_desc = $row_article['article_text'];
							$article_image = $row_article['featured_image'];
							$posted_at = $row_article['posted_at'];
							$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 150) . '...' : $article_desc;
							?>
							<div>
								<div class="main-page-body-sec-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<h2><?php echo $article_title ?></h2>
								</a>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-8 pl-0">
				<div class="center-girl-sec">
					<img src="assets/img/center-girl-2.jpg" alt="">
					<div class="center-girl-title">
						<h1>How To Get The Universe On Your Side</h1>
						<div class="arrow-right">
							<a href="category/article_detail.php?article_id=94"> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- mind and spirit end-->
	<!-- .new-arrivals -->
	<div class="container c-f-2 awakened-last">
		<div class="row align-items-center">
			<div class="col-lg-4 col-12">
				<h1>Awakened New arrivals</h1>
			</div>
			<div class="col-lg-8 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="products-sec">
			<div class="row">
				<?php
				$get_pro = "SELECT * FROM products";
				$run_pro = mysqli_query($con, $get_pro);
				while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['product_id'];
					$pro_cat = $row_pro['product_cat'];
					$pro_title = $row_pro['product_title'];
					$pro_price = $row_pro['product_price'];
					$pro_desc = $row_pro['product_desc'];
					$pro_image = $row_pro['product_image'];
					cart();
					if (!isset($_SESSION['customer_name'])) {
						?>
						<div class="col">
							<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
							<div class="row">
								<div class="col-lg-12">
									<h4><?php echo $pro_title; ?></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 px-0">
									<a href="javascript:void(0)" class="trigger-toast">
										<div class="ui vertical animated button" tabindex="0">
											<div class="hidden content">add to cart</div>
											<div class="visible content">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
									</a>
								</div>
								<div class="col-lg-6 px-0 border-top">
									<h5>&dollar;<?php echo $pro_price; ?></h5>
								</div>
							</div>
						</div>
					<?php
					} else {
						?>
						<div class="col">
							<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
							<div class="row">
								<div class="col-lg-12">
									<h4><?php echo $pro_title; ?></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 px-0">
									<a href="index.php?add_cart=<?php echo $pro_id; ?>">
										<div class="ui vertical animated button" tabindex="0">
											<div class="hidden content">add to cart</div>
											<div class="visible content">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
									</a>
								</div>
								<div class="col-lg-6 px-0 border-top">
									<h5>&dollar;<?php echo $pro_price; ?></h5>
								</div>
							</div>
						</div>
					<?php
					}
				} ?>
			</div>
		</div>
	</div>
	<!-- .new-arrivals end-->
	<!-- lifestyle -->
	<div class="container c-f-2 awakened-last mini-nav-sec">
		<div class="row align-items-center" style="margin: -23px 0 2rem 0;">
			<div class="col-lg-4 col-12">
				<h1>Awakened Lifestyle</h1>
			</div>
			<div class="col-lg-8 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 pr-0">
				<div class="center-girl-sec">
					<img src="assets/img/lemon.jpg" alt="">
					<div class="center-girl-title">
						<h1>Top 10 Green Picks for A Healthy Body</h1>
						<div class="arrow-right">
							<a href="category/article_detail.php?article_id=14"> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 pl-0">
				<div class="mini-slider-outer">
					<div class="mini-slider">
						<?php
						$get_article = "SELECT * FROM articles WHERE article_main_cat = 'eco&lifestyle'  order by RAND() LIMIT 4";
						$run_article = mysqli_query($con, $get_article);
						while ($row_article = mysqli_fetch_array($run_article)) {
							$article_id = $row_article['article_id'];
							$article_title = $row_article['article_title'];
							$article_main_cat = $row_article['article_main_cat'];
							$article_sub_cat = $row_article['article_sub_cat'];
							$article_desc = $row_article['article_text'];
							$article_image = $row_article['featured_image'];
							$posted_at = $row_article['posted_at'];
							$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 150) . '...' : $article_desc;
							?>
							<div>
								<div class="main-page-body-sec-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<h2><?php echo $article_title ?></h2>
								</a>
							</div>
						<?php
						}
						?>
					</div>
					<div class="arrow-right">
						<i class="fa fa-arrow-right"></i>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- lifestyle end-->

	<!-- shop -->
	<div class="container c-f-2 awakened-last">
		<div class="row align-items-center">
			<div class="col-lg-3 col-12">
				<h1>Awakened shop</h1>
			</div>
			<div class="col-lg-9 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="products-sec">
			<div class="row">
				<?php
				$get_pro = "SELECT * FROM products";
				$run_pro = mysqli_query($con, $get_pro);
				while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['product_id'];
					$pro_cat = $row_pro['product_cat'];
					$pro_title = $row_pro['product_title'];
					$pro_price = $row_pro['product_price'];
					$pro_desc = $row_pro['product_desc'];
					$pro_image = $row_pro['product_image'];
					cart();
					if (!isset($_SESSION['customer_name'])) {
						?>
						<div class="col">
							<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
							<div class="row">
								<div class="col-lg-12">
									<h4><?php echo $pro_title; ?></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 px-0">
									<a href="javascript:void(0)" class="trigger-toast">
										<div class="ui vertical animated button" tabindex="0">
											<div class="hidden content">add to cart</div>
											<div class="visible content">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
									</a>
								</div>
								<div class="col-lg-6 px-0 border-top">
									<h5>&dollar;<?php echo $pro_price; ?></h5>
								</div>
							</div>
						</div>
					<?php
					} else {
						?>
						<div class="col">
							<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
							<div class="row">
								<div class="col-lg-12">
									<h4><?php echo $pro_title; ?></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 px-0">
									<a href="index.php?add_cart=<?php echo $pro_id; ?>">
										<div class="ui vertical animated button" tabindex="0">
											<div class="hidden content">add to cart</div>
											<div class="visible content">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
									</a>
								</div>
								<div class="col-lg-6 px-0 border-top">
									<h5>&dollar;<?php echo $pro_price; ?></h5>
								</div>
							</div>
						</div>
					<?php
					}
				} ?>
			</div>
		</div>
	</div>
	<!-- shop end-->

	<!-- .magzines -->

	<div class="container c-f-2 awakened-last">
		<div class="row align-items-center">
			<div class="col-lg-3 col-12">
				<h1 style="white-space:nowrap">Awakened Magazines</h1>
			</div>
			<div class="col-lg-9 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid px-0 bg-blue">
		<div class="container">
			<div class="mini-slider-outer">
				<div class="responsive-slide">
					<div class="new-arrivals-magzine">
						<h4>aWAKENINGS NEW iSSUE</h4>
						<img src="assets/img/magzine-1.jpg" alt="">
					</div>
					<div>
						<h4>JAN - FEB 2018</h4>
						<img src="assets/img/magzine-2.jpg" alt="">
					</div>
					<div>
						<h4>DEC - JAN 2018</h4>
						<img src="assets/img/magzine-3.jpg" alt="">
					</div>
					<div>
						<h4>OCT - NOV 2018</h4>
						<img src="assets/img/magzine-4.jpg" alt="">
					</div>
					<div>
						<h4>JAN - FEB 2018</h4>
						<img src="assets/img/magzine-2.jpg" alt="">
					</div>
					<div>
						<h4>DEC - JAN 2018</h4>
						<img src="assets/img/magzine-3.jpg" alt="">
					</div>
					<div>
						<h4>OCT - NOV 2018</h4>
						<img src="assets/img/magzine-4.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="magzine-note mt-3">
					<p>Don't miss your copy of Awakenings Middle East magazine - your guide to wellness and healthy living in the UAE. You can buy it for yourself or as a gift for a loved one or friend.</p>
					<br>
					<p>Not sure if we need to have subscribe and advertise with us near the top somewhere...</p>
				</div>
			</div>
			<!-- <div class="magzine-btns text-center">
				<div class="row">
					<div class="col-lg-4">
						<a href="#">subscribe</a>
					</div>
					<div class="col-lg-4">
						<a href="#">Read Online</a>
					</div>
					<div class="col-lg-4">
						<a href="#">Media Pack</a>
					</div>
				</div>
			</div> -->
		</div>
	</div>
	<!-- .magzines end-->
	<?php include 'footer.php'; ?>
	<?php include 'scripts.php'; ?>



</body>

</html>