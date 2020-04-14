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
				<li class="breadcrumb-item" aria-current="page">Paypal Success</li>
			</ol>
		</nav>
	</div>
	<div class="container c-f-2 awakened-last">
		<div class="row align-items-center">
			<div class="col-lg-3 col-12">
				<h1>Paypal Result</h1>
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
				<div class="container paypal-results">
					<?php
					$total = 0;

					global $con;

					$ip = getIp();

					$sel_price = "select * from cart where ip_add='$ip'";

					$run_price = mysqli_query($con, $sel_price);

					while ($p_price = mysqli_fetch_array($run_price)) {

						$pro_id = $p_price['p_id'];
						$qtyd = $p_price['qty'];


						$pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
						$run_pro_price = mysqli_query($con, $pro_price);
						while ($pp_price = mysqli_fetch_array($run_pro_price)) {
							$product_price = array($pp_price['product_price']);
							$single_price = $pp_price['product_price'];
							$product_id = $pp_price['product_id'];
							$product_title = $pp_price['product_title'];
							$total_qty_price = $single_price * $qtyd;
							$values = array_sum($product_price);
							$mega_total = $values * $qtyd;
							$total += $mega_total;
						}
					}

					// getting Quantity of the product
					$get_qty = "select * from cart where p_id='$pro_id'";

					$run_qty = mysqli_query($con, $get_qty);

					$row_qty = mysqli_fetch_array($run_qty);

					$qty = $row_qty['qty'];
					$single_price *= $qty;


					// this is about the customer
					if (!isset($_SESSION['customer_email'])) {
						$guest = $_SESSION['guest_email'];

						$get_g = "select * from guests where guest_email='$guest'";

						$run_g = mysqli_query($con, $get_g);

						$row_g = mysqli_fetch_array($run_g);

						$guest_id = $row_g['guest_id'];
						$guest_email = $row_g['guest_email'];
						$guest_name = $row_g['guest_name'];
					} else {
						$user = $_SESSION['customer_email'];

						$get_c = "select * from customers where customer_email='$user'";

						$run_c = mysqli_query($con, $get_c);

						$row_c = mysqli_fetch_array($run_c);

						$c_id = $row_c['customer_id'];
						$c_email = $row_c['customer_email'];
						$c_name = $row_c['customer_name'];
					}

					//payment details from paypal


					$amount = $_GET['amt'];

					$currency = $_GET['cc'];

					$trx_id = $_GET['tx'];

					// $invoice = mt_rand();

					$seed = str_split('abcdefghijklmnopqrstuvwxyz'
						. 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
						. '0123456789'); // and any other characters
					shuffle($seed); // probably optional since array_is randomized; this may be redundant
					$invoice = '';
					foreach (array_rand($seed, 8) as $k) $invoice .= $seed[$k];

					if ($trx_id) {
						if (!isset($_SESSION['customer_email'])) {
							$cart_items = "select * from cart where guest_id='$guest_id'";
						} else {

							$cart_items = "select * from cart where c_id='$c_id'";
						}
						$run_cart_items = mysqli_query($con, $cart_items);
						while ($cart_items_item = mysqli_fetch_array($run_cart_items)) {
							$xpro_id = $cart_items_item['p_id'];
							$xcustomer_id = $cart_items_item['c_id'];
							$xguest_id = $cart_items_item['guest_id'];
							$xqty = $cart_items_item['qty'];
							$xprice = $cart_items_item['cart_price'];
						}

						// inserting the order into table
						$insert_order = "insert into orders (p_id, c_id,guest_id, qty, single_order_price, invoice_no, order_date,status) values ('$xpro_id','$xcustomer_id','$xguest_id','$xqty','$xprice','$invoice',NOW(),'in Progress')";

						$run_order = mysqli_query($con, $insert_order);

						//inserting the payment to table

						$insert_payment = "insert into payments (invoice_id,amount,single_payment_price,customer_id,guest_id,product_id,trx_id,currency,payment_date) values ('$invoice','$amount','$xprice','$xcustomer_id','$xguest_id','$xpro_id','$trx_id','$currency',NOW())";
						$run_payment = mysqli_query($con, $insert_payment);
						// insert multiple orders into database
						$insert_multiple_orders = "insert into orders_main (p_id, c_id,guest_id, customer_name, product_name, qty, order_date) values ('$pro_id','$c_id','$guest_id','$c_name','$product_title','$qty', NOW())";


						$run_main_order = mysqli_query($con, $insert_multiple_orders);

						// create notifcations


						//removing the products from cart
						if (!isset($_SESSION['customer_email'])) {
							$empty_cart = "DELETE FROM cart WHERE guest_id = '$guest_id'";
							$run_cart = mysqli_query($con, $empty_cart);
						} else {
							$empty_cart = "DELETE FROM cart WHERE c_id = $c_id";
							$run_cart = mysqli_query($con, $empty_cart);
						}
					}

					if ($trx_id) {

					?>

						<div class="paypal-notification">
							<div class="success-img">
								<img src="assets/img/paypal_success_icon.png" alt="" class="mb-3">
								<h3>Thank You...!</h3>
							</div>
							<?php
							if (!isset($_SESSION['customer_email'])) {
							?>
								<h2>Dear <?php echo $_SESSION['guest_name']; ?></h2>
							<?php
							} else {
							?>
								<h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
							<?php
							}
							?>
							<p>Your Payment was successful, Please go to your account to see your order
								history.</p>
							<a href="profile.php" class="btn-paypal">Go to your account</a>
						</div>
					<?php } else {
					?>

						<div class="paypal-notification">
							<div class="success-img">
								<img src="assets/img/paypal_canel_icon.png" alt="">
								<h3>Payment was failed</h3>

							</div>
							<h2>Dear <?php echo $_SESSION['customer_name'] && $_SESSION['guest_name'] ?></h2>
							<p>Your Payment was not successful, Please go to our shop and try again..</p>
							<a href="products.php" class="primary-btn">Go to Shop</a>
						</div>

					<?php } ?>
				</div>
			</div>
			<div class="col-lg-3">
				<?php include 'right_column.php' ?>
			</div>
		</div>
	</div>

	<?php
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <sharon@awakeningsme.com>' . "\r\n";

	$subject = "Order Details";

	$message = "
			<html>
			<p>

			Hello dear <b style='color:blue;'>Dear Customer</b> you have ordered some products on our website awakeningsme.com, please find your order details, your order will be processed shortly. Thank you!</p>

			<table width='600' align='center' bgcolor='#FFCC99' border='2'>

			<tr align='center'><td colspan='6'><h2>Your Order Details from Vigorizante</h2></td></tr>

			<tr align='center'>
			<th><b>S.N</b></th>
			<th><b>Product Name</b></th>
			<th><b>Quantity</b></th>
			<th><b>Paid Amount</th></th>
			<th>Invoice No</th>
			</tr>

			<tr align='center'>
			<td>1</td>
			<td>$product_title</td>
			<td>$qty</td>
			<td>$amount</td>
			<td>$invoice</td>
			</tr>

			</table>

			<h3> Thank you for your order @ - Awakenings</h3>

			</html>

			";

	if(mail($c_email, $subject, $message, $headers)){
		echo 'mail sent';
	}else {
		echo 'mail not sent';
	}


	?>
	<div style="height:36px;"></div>
	<!-- footer -->
	<?php include 'footer.php'; ?>
	<?php include 'scripts.php'; ?>


</body>

</html>