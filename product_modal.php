<?php
session_start();

include 'functions.php';
if (isset($_POST['product_id'])) {
     $output = '';

     $get_pro = "SELECT * FROM products WHERE product_id = '" . $_POST["product_id"] . "'";
     $run_pro = mysqli_query($con, $get_pro);
     $output .= '
          <div class="table-responsive">
           <table class="table table-bordered">';

     while ($row_pro = mysqli_fetch_array($run_pro)) {
          $pro_id = $row_pro['product_id'];
          $pro_cat = $row_pro['product_cat'];
          $pro_title = $row_pro['product_title'];
          $pro_price = $row_pro['product_price'];
          $pro_desc = $row_pro['product_desc'];
          $pro_image = $row_pro['product_image'];




          if (!isset($_SESSION['customer_name'])) {
               $sp_session_btn="
                     <button type='submit' name='add_cart_guest' class='modal-cart-btn'>Add to cart</button>
               ";

 }else{
               $sp_session_btn = "
                     <button type='submit' name='add_cart' class='modal-cart-btn'>Add to cart</button>
               ";
}

          $output .= '
                <tr>
                     <td width="30%"><label><b>Product Image</b></label></td>
                     <td width="70%"><img src=includes/product_images/' . $row_pro["product_image"] . '></td>
                </tr>
                <tr>
                     <td width="30%"><label><b>Product Name</b></label></td>
                     <td width="70%">' . $row_pro["product_title"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label><b>Product Price</b></label></td>
                     <td width="70%">$' . $row_pro["product_price"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label><b>Product Description</b></label></td>
                     <td width="70%">' . $row_pro["product_desc"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label><b>Product Category</b></label></td>
                     <td width="70%">' . $row_pro["product_cat"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label><b>Quantity</b></label></td>
                     <td width="70%">
                     <form action="modal_cart.php" method="post">
                    <input type="number" name="cart_quantity" value="1" class="form-control w-18 d-inline">
                    <input type="hidden" name="pro_id_modal" value="' . $pro_id . '">
                  '. $sp_session_btn.'


                    <a href="index.php?add_wishlist=' . $pro_id . '" class="modal-cart-btn" name="view_pro" id=" ' . $pro_id . ' " data-toggle="tooltip" data-html="true" title="Add to wishlist">Add to wishlist</a></td>
                    </form>
                    </tr>
                ';
     }
     $output .= "</table></div>";
     echo $output;
}
?>