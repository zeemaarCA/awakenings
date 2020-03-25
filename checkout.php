<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
session_start();
include 'functions.php';
include 'modals.php';
include 'head.php';
if (isset($_POST['update_cart'])) {
  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pro_id_cart_qty = $_POST['pro_id_cart_qty'];
    $array = array_combine($pro_id_cart_qty, $qty);
    foreach ($array as $i => $q) {
      $single_fetch_price = "SELECT product_price FROM products WHERE product_id = '$i'";
      $run_single_fetch_price = mysqli_query($con, $single_fetch_price);
      $product_pricex = mysqli_fetch_assoc($run_single_fetch_price);

      $final_total_price_db = $q * $product_pricex['product_price'];
      $update_qty = "UPDATE cart SET qty = '$q', cart_price = '$final_total_price_db' WHERE p_id = '$i' AND c_id = '" . $_SESSION['customer_id'] . "'";
      $run_qty = mysqli_query($con, $update_qty);
    }
    // header("location: cart.php?mes=Update cart sucessfully");
    echo ("<script>location.href = 'cart.php?mes=Update cart sucessfully'</script>");
    $total = $total * $qtyd;
  }
}

?>

<body>
  <!-- all-modals -->
  <!-- cart confirmation modal-->
  <div class="modal fade" id="cartConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container cartConfirm-content text-center">
            <div class="row">
              <div class="col-lg-12">
                <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
                <h2>order confirmation</h2>
                <img src="assets/img/cart-confirm-img.png" alt="">
                <p>Order number <span>1500820048</span> is now confirmed
                  You can check your order and its progress at any time.
                  By logging into your account</p>
                <p>We have emailed you the order details for your convenience.</p>
                <p>If you have any queries please contact us.</p>
                <p><span>This order is covered by our 100% No Quibble Money Back Guarantee</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'header_inner.php'; ?>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> YOU ARE AT</li>
        <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
        <li class="breadcrumb-item" aria-current="page">Checkout</li>
      </ol>
    </nav>
  </div>

  <div class="container c-f-2 awakened-last">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12">
        <h1>Checkout</h1>
      </div>
      <div class="col-lg-9 col-12">
        <div class="heading-line">
        </div>
      </div>
    </div>
  </div>
  <?php
  if (!isset($_SESSION['customer_name']) && !isset($_SESSION['guest_name'])) {
  ?>
    <div class="container guest-address">
      <div class="box-head">
        <div class="row">
          <div class="col-lg-12 col-12">
            <img src="assests/img/van.png" alt="">
            <h3>SHIPPING ADDRESS</h3>
            <h4>Continue as guest OR <a href="javascript:void(0)" data-toggle="modal" data-target="#login">Login</a></h4>
          </div>
        </div>
      </div>
      <div class="row border p-3 mb-5">
        <div class="col-lg-6">
          <form method="post" action="guest_register.php">
            <div class="form-group">
              <label for="fullName">Your Name</label>
              <input id="fullName" class="form-control" type="text" placeholder="Full name" name="guest_name">
            </div>
            <div class="form-group">
              <label for="country">Country</label>
              <select class="form-control" name="guest_country" title="Please select something!">
                <option value="" selected>Your Country...</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antartica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo">Congo, the Democratic Republic of the</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                <option value="Croatia">Croatia (Hrvatska)</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="France Metropolitan">France, Metropolitan</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                <option value="Holy See">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran (Islamic Republic of)</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                <option value="Korea">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia, Federated States of</option>
                <option value="Moldova">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint LUCIA">Saint LUCIA</option>
                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia (Slovak Republic)</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                <option value="Span">Spain</option>
                <option value="SriLanka">Sri Lanka</option>
                <option value="St. Helena">St. Helena</option>
                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Viet Nam</option>
                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Yugoslavia">Yugoslavia</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
            <div class="form-group">
              <label for="number">Phone No.</label>
              <input id="number" class="form-control" type="number" name="guest_phone" placeholder="Your Number">
            </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="email">Your Email</label>
            <input id="email" class="form-control" type="email" placeholder="Email" name="guest_email">
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input id="city" class="form-control" type="text" name="guest_city" placeholder="City">
          </div>
          <div class="form-group">
            <label for="address">Full Address</label>
            <input id="address" class="form-control" type="text" name="guest_address" placeholder="Shipping Address">
          </div>
          <!-- <a href="guest_register.php" class="btn" name="guest_register-btn">Save Address</a> -->
          <button type="submit" class="btn" name="guest_register_btn">Save Address</button>
          </form>
        </div>
      </div>
    </div>

  <?php
  } else {
    echo '';
  }

  ?>

  <div class="container shopping-cart">
    <div class="row">
      <div class="table-responsive border">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" width="50%" class="pl-4">product</th>
              <th scope="col" class="text-center">price</th>
              <th scope="col" class="text-center">quantity</th>
              <th scope="col" class="text-center">total</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <?php
          $total = 0;
          global $con;
          $ip = getIp();
          if (!isset($_SESSION['customer_name'])) {
            $sel_price = "SELECT * FROM cart WHERE guest_id = '" . $_SESSION['guest_id'] . "'";
          } else {
            $sel_price = "SELECT * FROM cart WHERE c_id = '" . $_SESSION['customer_id'] . "'";
          }
          $run_price = mysqli_query($con, $sel_price);
          while ($p_price = mysqli_fetch_array($run_price)) {
            $pro_id = $p_price['p_id'];
            $qtyd = $p_price['qty'];
            // echo $qtyd;
            $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
            $run_pro_price = mysqli_query($con, $pro_price);
            while ($pp_price = mysqli_fetch_array($run_pro_price)) {
              $product_price = array($pp_price['product_price']);
              $single_price = $pp_price['product_price'];
              $product_title = $pp_price['product_title'];
              $product_image = $pp_price['product_image'];
              $total_qty_price = $single_price * $qtyd;
              $values = array_sum($product_price);
              $mega_total = $values * $qtyd;
              $total += $mega_total;

          ?>
              <tbody>
                <tr>
                  <td data-toggle="modal" data-target="#cart-item-des-popup"><img src="includes/product_images/<?php echo $product_image; ?>" alt="">
                    <h4><?php echo $product_title; ?></h4>
                  </td>
                  <td class="text-center">&dollar;<?php echo $single_price; ?></td>
                  <td width="14%" class="text-center">
                    <div class="container px-0">
                      <input type="number" name="qty[]" class="form-control input-number-2 c-in-2" min="1" value="<?php echo $qtyd ?>" readonly="true">
                    </div>
                  </td>
                  <td class="text-center">&dollar;<?php echo $total_qty_price; ?></td>
                </tr>
            <?php }
          } ?>
              </tbody>
        </table>
      </div>
    </div>
    <div class="row border">
      <div class="col-lg-6 hide-sm">&nbsp;</div>
      <div class="col-lg-6">
        <div class="row combine-r-total">
          <div class="col-lg-6 col-6">
            <h2>CART SUBTOTAL</h2>
            <h2>delivery</h2>
            <h1>ORDER TOTAL</h1>
          </div>
          <div class="col-lg-6 col-6">
            <h2 class="text-right">&dollar;<?php echo $total; ?></h2>
            <h2 class="text-right">&dollar;0</h2>
            <h1 class="text-right">&dollar;<?php echo $total; ?></h1>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="container c-box-1n2">
    <div class="row">
      <div class="col-lg-5 px-0">
        <div class="box-head">
          <div class="row">
            <div class="col-lg-12 col-12">
              <img src="assests/img/van.png" alt="">
              <h3>SHIPPING ADDRESS</h3>
            </div>
          </div>
        </div>
        <div class="box-border">
          <!-- <a href="profile.php">edit</a> -->
          <h4>current shopping address</h4>
          <ul>
            <?php
            if (!isset($_SESSION['customer_email']) && !isset($_SESSION['guest_name'])) {
              echo 'No address yet';
            } else if (!isset($_SESSION['customer_name'])) {
              $get_guest = "SELECT * FROM guests WHERE guest_email = '" . $_SESSION['guest_email'] . "'";
              $run_guest = mysqli_query($con, $get_guest);

              while ($row_guest = mysqli_fetch_array($run_guest)) {
                $guest_id = $row_guest['guest_id'];
                $guest_name = $row_guest['guest_name'];
                $guest_email = $row_guest['guest_email'];
                $guest_country = $row_guest['guest_country'];
                $guest_city = $row_guest['guest_city'];
                $guest_phone = $row_guest['guest_phone'];
                $guest_address = $row_guest['guest_address'];
            ?>
                <li><?php echo $guest_name; ?></li>
                <li><?php echo $guest_email; ?></li>
                <li><?php echo $guest_city; ?></li>
                <li><?php echo $guest_country; ?></li>
                <li><?php echo $guest_phone; ?></li>
                <li><?php echo $guest_address; ?></li>
              <?php }
            } else {

              $get_customer = "SELECT * FROM customers WHERE customer_email = '" . $_SESSION['customer_email'] . "'";
              $run_customer = mysqli_query($con, $get_customer);

              while ($row_customer = mysqli_fetch_array($run_customer)) {
                $customer_id = $row_customer['customer_id'];
                $customer_name = $row_customer['customer_name'];
                $customer_email = $row_customer['customer_email'];
                $customer_country = $row_customer['customer_country'];
                $customer_city = $row_customer['customer_city'];
                $customer_contact = $row_customer['customer_contact'];
                $customer_address = $row_customer['customer_address'];
              ?>
                <li><?php echo $customer_name; ?></li>
                <li><?php echo $customer_email; ?></li>
                <li><?php echo $customer_city; ?></li>
                <li><?php echo $customer_country; ?></li>
                <li><?php echo $customer_contact; ?></li>
                <li><?php echo $customer_address; ?></li>
            <?php
              }
            }
            ?>

          </ul>
        </div>
      </div>
      <div class="col-lg-1">&nbsp;</div>
      <div class="col-lg-1">&nbsp;</div>
      <div class="col-lg-5 px-0">
        <div class="box-head">
          <div class="row">
            <div class="col-lg-12 col-12">
              <h3>payment method</h3>
            </div>
          </div>
        </div>
        <div class="box-border n-height">
          <img src="assets/img/checkoutb1.png" class="mt-3" alt="">
          <h4 class="ml-3">PAYPAL</h4>
        </div>
      </div>
    </div>
  </div>


  <?php
  if (!isset($_SESSION['customer_email'])) {

  ?>
    <div class="container six-check">
      <div class="row">
        <div class="col-lg-6 col-12 px-0">
          <a href="cart.php" class="back-btn w_100 d-none d-sm-block">back</a>
        </div>
        <div class="col-lg-6 col-12 px-0">
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right w_100">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="zmt@gmail.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Awakenings Products">
            <input type="hidden" name="item_number" value="<?php echo $pro_id ?>">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">

            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value="http://alovep.xyz/paypal_success.php">
            <input type="hidden" name="cancel_return" value="http://alovep.xyz/paypal_cancel.php">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="0">

            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">

          </form>
        </div>
      </div>
    </div>
  <?php
  } else {
  ?>
    <div class="container six-check">
      <div class="row">
        <div class="col-lg-6 col-12 px-0">
          <a href="cart.php" class="back-btn w_100 d-none d-sm-block">back</a>
        </div>
        <div class="col-lg-6 col-12 px-0">
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right w_100">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="zmt@gmail.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Awakenings Products">
            <input type="hidden" name="item_number" value="<?php echo $pro_id ?>">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">

            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value="http://alovep.xyz/paypal_success.php">
            <input type="hidden" name="cancel_return" value="http://alovep.xyz/paypal_cancel.php">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="0">

            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">

          </form>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <div style="height:36px;"></div>
  <!-- footer -->
  <?php include 'footer.php'; ?>
  <?php include 'scripts.php'; ?>

</body>

</html>