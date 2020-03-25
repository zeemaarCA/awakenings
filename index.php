<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
session_start();

include 'head.php';
include 'modals.php';
include 'functions.php';
$guest_id = session_id();
$_SESSION['guest_id'] = $guest_id;
// echo $guest_id;
// echo (!isset($_SESSION['customer_id'])) ? $guest_id : $_SESSION['customer_id'];

?>

<body>
	<div class="pre-loader">
		<img class="img-fluid" src="assets/img/main-logo.png" alt="">
		<div class="lds-roller">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
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
			<div class="col-lg-3-custom col-12">
				<h1>Awakened Latest</h1>
			</div>
			<div class="col-lg-9-custom col-12">
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
						$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 200) . '...' : $article_desc;
						$string_x = strip_tags($trim_desc);
						$string_y = trim($string_x);
						$timestamp = strtotime($posted_at);
					?>
						<div class="col-lg-6 pr-0 col-md-6">
							<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
								<div class="main-page-bg-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)">
									<div class="date-line date_font">
										<?php echo date('d/m/Y', $timestamp); ?>
										<?php
										$get_comments = "SELECT * FROM comments WHERE article_id = $article_id ";
										$run_comments = mysqli_query($con, $get_comments);
										$count_comments = mysqli_num_rows($run_comments);

										?>
										<i class="fa fa-comment float-right pr-2"> <?php echo $count_comments; ?></i>
									</div>
								</div>
							</a>
							<div class="box">
								<span class="green-b"><?php echo $article_main_cat ?></span>
							</div>
							<div class="top-pics-heading">
								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<h1><?php echo $article_title ?></h1>
								</a>
								<p><?php echo $string_y; ?></p>

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
						$get_dir = "SELECT * FROM holistic_directory ORDER BY RAND() LIMIT 14";
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

			</div>
		</div>
	</div>
	<!-- Awakened Latest end -->
	<div class="container c-f-2 awakened-last mini-nav-sec">
		<div class="row align-items-center">
			<div class="col-lg-3-custom col-12">
				<h1>Awakened Body</h1>
			</div>
			<div class="col-lg-9-custom col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-lg-6 col-12">
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
			<div class="col-lg-8 col-md-6 pr-0 padding-default">
				<div class="center-girl-sec">
					<a href="category/article_detail.php?article_id=12"><img src="assets/img/center-girl.jpg" alt=""></a>
					<div class="center-girl-title">
						<a href="category/article_detail.php?article_id=12">
							<h1>A Surgery-Free Micro Lift with Ultherapy&reg;</h1>
						</a>
						<div class="arrow-right">
							<a href="category/article_detail.php?article_id=12"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 pl-0 padding-default">
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
							$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 410) . '...' : $article_desc;
							$string_x = strip_tags($trim_desc);
							$string_y = trim($string_x);
						?>
							<div>
								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<div class="main-page-body-sec-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
								</a>

								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<h2><?php echo $article_title ?></h2>
								</a>
								<p><?php echo $string_y; ?></p>
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
			<div class="col-lg-4-custom-3 col-12 pl-0">
				<h1>Awakened Mind & Spirit</h1>
			</div>
			<div class="col-lg-8-custom-3 col-12 px-0">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 pr-0 padding-default">
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
							$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 410) . '...' : $article_desc;
							$string_x = strip_tags($trim_desc);
							$string_y = trim($string_x);
						?>
							<div>
								<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
									<div class="main-page-body-sec-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
									<h2><?php echo $article_title ?></h2>
								</a>
								<p><?php echo $string_y; ?></p>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 pl-0 padding-default">
				<div class="center-girl-sec">
					<a href="category/article_detail.php?article_id=94">
						<img src="assets/img/center-girl-2.jpg" alt="">
						<div class="center-girl-title">
							<h1>How To Get The Universe On Your Side</h1>
					</a>
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
			<div class="col-lg-4-custom-4 pl-0 col-12">
				<h1 class="ml-3">Awakened New arrivals</h1>
			</div>
			<div class="col-lg-8-custom-4 col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="products-sec">
			<div class="row">
				<?php
				$get_pro = "SELECT * FROM products LIMIT 4";
				$run_pro = mysqli_query($con, $get_pro);
				while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['product_id'];
					$pro_cat = $row_pro['product_cat'];
					$pro_title = $row_pro['product_title'];
					$pro_price = $row_pro['product_price'];
					$pro_desc = $row_pro['product_desc'];
					$pro_image = $row_pro['product_image'];

					if (!isset($_SESSION['customer_name'])) {
						guest_cart();
				?>
						<div class="col-lg-3 col-12 col-md-6 border">
							<div class="product-box">
								<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
								<button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
								<a href="index.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
								<?php wishlist_guest(); ?>
							</div>
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
						</form>
					<?php
					} else {
						cart();
					?>
						<div class="col-lg-3 col-12 col-md-6 border">
							<div class="product-box">
								<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
								<button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
								<a href="wishlist.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
								<?php wishlist(); ?>
							</div>
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
			<div class="col-lg-4-custom-5 pl-0 col-12">
				<h1>Awakened Lifestyle</h1>
			</div>
			<div class="col-lg-8-custom-5 col-12 px-0">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-6 pr-0 padding-default">
				<div class="center-girl-sec">
					<a href="category/article_detail.php?article_id=14">
						<img src="assets/img/lemon.jpg" alt="">
						<div class="center-girl-title">
							<h1>Top 10 Green Picks for A Healthy Body</h1>
					</a>
					<div class="arrow-right">
						<a href="category/article_detail.php?article_id=14"> <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 pl-0 padding-default">
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
						$trim_desc = (strlen($article_desc) > 100) ? substr($article_desc, 0, 410) . '...' : $article_desc;
						$string_x = strip_tags($trim_desc);
						$string_y = trim($string_x);
					?>
						<div>
							<a href="category/article_detail.php?article_id=<?php echo $article_id ?>">
								<div class="main-page-body-sec-img" style="background: url(includes/article_images/<?php echo $article_image; ?>)"></div>
								<h2><?php echo $article_title ?></h2>
							</a>
							<p><?php echo $string_y; ?></p>
						</div>
					<?php
					}
					?>
				</div>
			</div>

		</div>
	</div>
	</div>
	<!-- lifestyle end-->

	<!-- shop -->
	<div class="container c-f-2 awakened-last">
		<div class="row align-items-center">
			<div class="col-lg-3-custom col-12">
				<h1>Awakened shop</h1>
			</div>
			<div class="col-lg-9-custom col-12">
				<div class="heading-line">
				</div>
			</div>
		</div>
		<div class="products-sec">
			<div class="row">
				<?php
				$get_pro = "SELECT * FROM products LIMIT 4";
				$run_pro = mysqli_query($con, $get_pro);
				while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['product_id'];
					$pro_cat = $row_pro['product_cat'];
					$pro_title = $row_pro['product_title'];
					$pro_price = $row_pro['product_price'];
					$pro_desc = $row_pro['product_desc'];
					$pro_image = $row_pro['product_image'];

					if (!isset($_SESSION['customer_name'])) {
						guest_cart();
				?>
						<div class="col-lg-3 col-12 col-md-6 border">
							<div class="product-box">
								<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
								<button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
								<a href="index.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
								<?php wishlist_guest(); ?>
							</div>
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
					} else {
						cart();
					?>
						<div class="col-lg-3 col-12 col-md-6 border">
							<div class="product-box">
								<img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
								<button class="view_pro_btn" name="view_pro" id="<?php echo $pro_id; ?>">View</button>
								<a href="wishlist.php?add_wishlist=<?php echo $pro_id; ?>" class="wishlist_btn" name="view_pro" id="<?php echo $pro_id; ?>" data-toggle="tooltip" data-html="true" title="Add to wishlist"><i class="fa fa-heart"></i></a>
								<?php wishlist(); ?>
							</div>
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
			<div class="col-lg-4-custom-2 pl-0 col-12">
				<h1 style="white-space:nowrap" class="ml-3">Awakened Magazines</h1>
			</div>
			<div class="col-lg-8-custom-2 col-12">
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

						<a href="assets/pdf/AWAKENINGS_ISSUE_16_ONLINE.pdf"><img src="assets/img/magzine-5.jpg" alt="">
						</a>
					</div>
					<div>

						<a href="assets/pdf/AwakeningsMag_Issue_15.pdf"><img src="assets/img/magzine-2.jpg" alt="">
						</a>
					</div>
					<div>
						
						<a href="assets/pdf/AwakeningsMag_Issue_14.pdf"><img src="assets/img/magzine-3.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- .magzines end-->
	<?php include 'footer.php'; ?>
	<?php include 'scripts.php'; ?>



</body>

</html>