<?php

// start a session
session_start();

// connect to the database
require '../BrucesAdminArea/includes/dbConnect.inc.php';

// include the products-array
require 'includes/products-array.inc.php';

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

// show the screen only if the user is a registered user
if(@$customer_info['level'] == "reg"){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Shopping Cart => Checkout</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	
	<div class="topnav">
		<a href="../BrucesAdminArea">Home</a> |
		<a href="cart.php">View Cart</a> |
		<a href="../BrucesAdminArea/home.php?action=logout">Logout</a>
	</div>
	
	<div class="content">
	
		<center><b>Fill The Details Below</b></center><br><br>
		<center><div>Validation yet to be done at the backend</div></center>
	
		<form id="add-product" action="process-order.php" method="post">
		
			<input name="checkout_button" type="hidden" value="clicked">
			<input name="customer_id" type="hidden" value="<?php echo $customer_info["customer_id"]; ?>">
			<input name="order_subtotal" type="hidden" value="<?php echo $order_info["subtotal"]; ?>">
			<input name="shipping_charge" type="hidden" value="<?php echo $order_info["shipping_charge"]; ?>">
			<input name="tax_charge" type="hidden" value="<?php echo $order_info["tax"]; ?>">
			<input name="misc_charge" type="hidden" value="0">
			<input name="order_grand_total" type="hidden" value="<?php echo $order_info["grand_total"]; ?>">
			<input name="order_date" type="hidden" value="<?php echo date("Y/m/d"); ?>">
			<input name="order_time" type="hidden" value="<?php echo date('H:i:s');; ?>">
			<input name="shopping_type" type="hidden" value="not applicable">
			<input name="payment_method" type="hidden" value="not applicable">
			<input name="message" type="hidden" value="not applicable">
			<input name="processed" type="hidden" value="yet to process">
			<input name="complete" type="hidden" value="yet to complete">
			<table>
				<!-- 
				<tr>
					<td></td>
					<td></td>
				</tr>
				 -->
				<div><b>Customer Information</b></div><br>
				<tr>
					<td>Customer Name</td>
					<td><input name="billing_customer_name" type="text" value="Billing Customer 1"></td>
				</tr>			
				<tr>
					<td>Company Name</td>
					<td><input name="billing_company_name" type="text" value="Billing Company 1"></td>
				</tr>
			</table>
			<table>
				<br><br></b><div><b>Billing Information</b></div><br>
				<tr>
					<td>Billing Address</td>
					<td><input name="billing_address" type="text" value="Billing Address 1"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input name="billing_city" type="text" value="Billing City 1"></td>
				</tr>
				<tr>
					<td>State</td>
					<td><input name="billing_state" type="text" value="Billing State 1"></td>
				</tr>
				<tr>
					<td>Coutry</td>
					<td><input name="billing_country" type="text" value="Billing Country 1"></td>
				</tr>
				<tr>
					<td>Postal Code</td>
					<td><input name="billing_postal_code" type="text" value="000000"></td>
				</tr>
				
				<tr>
					<td>Phone</td>
					<td><input name="billing_phone" type="text" value="9999999999"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name="billing_email" type="text" value="billingemail@noaddress.com"></td>
				</tr>
			</table>
			<table>
				<br><br><div><b>Shipping Information</b></div><br>
				<tr>
					<td>Customer Name</td>
					<td><input name="shipping_customer_name" type="text" value="Shipping Customer 1"></td>
				</tr>			
				<tr>
					<td>Company Name</td>
					<td><input name="shipping_company_name" type="text" value="Shipping Company 1"></td>
				</tr>
				<tr>
					<td>Shipping Address</td>
					<td><input name="shipping_address" type="text" value="Shipping Address 1"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input name="shipping_city" type="text" value="Shipping City 1"></td>
				</tr>
				<tr>
					<td>State</td>
					<td><input name="shipping_state" type="text" value="Shipping State 1"></td>
				</tr>
				<tr>
					<td>Coutry</td>
					<td><input name="shipping_country" type="text" value="Shipping Country 1"></td>
				</tr>
				<tr>
					<td>Postal Code</td>
					<td><input name="shipping_postal_code" type="text" value="000000"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input name="shipping_phone" type="text" value="9999999999"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name="shipping_email" type="text" value="shippingemail@noaddress.com"></td>
				</tr>
			</table>
			<table>
				<br><br><div><b>Credit Card Details</b></div><br>
				<tr>
					<td>Card Type</td>
					<td><input name="cc_type" type="text" value="Visa"></td>
				</tr>
				<tr>
					<td>Name On Card</td>
					<td><input name="cc_name" type="text" value="Customer 1"></td>
				</tr>
				<tr>
					<td>16 Digit Card Number</td>
					<td><input name="cc_number" type="text" value="1111222233334444"></td>
				</tr>
				<tr>
					<td>Expiry Month & Year</td>
					<td><input name="cc_exp_month" type="text" value="01">(MM)<input name="cc_exp_year" type="text" value="2013">(YYYY)</td>
				</tr>
			</table>
			<table>
				<br><br><div><b>Other Details</b></div><br>
				<tr>
					<td>Comments</td>
					<td><textarea name="comments">No Comments</textarea></td>
				</tr>			
			</table>
			<br><br><input type="submit" value="Checkout">
		</form>

	</div>
</body>
</html>

<?php }else{
	echo "You are not a Registered Customer! You can't see this screen (even if you are admin or root). Go Back!!";
} ?>