<?php

// start a session
session_start();

// connect to the database
require '../BrucesAdminArea/includes/dbConnect.inc.php';

if(isset($_POST["checkout_button"])){

	// for convinience sake
	$customer_id = $_POST["customer_id"];
	$order_subtotal = $_POST["order_subtotal"];
	$shipping_charge = $_POST["shipping_charge"];
	$tax_charge = $_POST["tax_charge"];
	$misc_charge = $_POST["misc_charge"];
	$order_grand_total = $_POST["order_grand_total"];
	$order_date = $_POST["order_date"];
	$order_time = $_POST["order_time"];
	$shopping_type = $_POST["shopping_type"];
	$payment_method = $_POST["payment_method"];
	$message = $_POST["message"];
	$processed = $_POST["processed"];
	$complete = $_POST["complete"];
	$billing_customer_name = $_POST["billing_customer_name"];
	$billing_company_name = $_POST["billing_company_name"];
	$billing_address = $_POST["billing_address"];
	$billing_city = $_POST["billing_city"];
	$billing_state = $_POST["billing_state"];
	$billing_country = $_POST["billing_country"];
	$billing_postal_code = $_POST["billing_postal_code"];
	$billing_phone = $_POST["billing_phone"];
	$billing_email = $_POST["billing_email"];
	$shipping_customer_name = $_POST["shipping_customer_name"];
	$shipping_company_name = $_POST["shipping_company_name"];
	$shipping_address = $_POST["shipping_address"];
	$shipping_city = $_POST["shipping_city"];
	$shipping_state = $_POST["shipping_state"];
	$shipping_country = $_POST["shipping_country"];
	$shipping_postal_code = $_POST["shipping_postal_code"];
	$shipping_phone = $_POST["shipping_phone"];
	$shipping_email = $_POST["shipping_email"];
	$cc_type = $_POST["cc_type"];
	$cc_name = $_POST["cc_name"]; 
	$cc_number = $_POST["cc_number"];
	$cc_exp_month = $_POST["cc_exp_month"];
	$cc_exp_year = $_POST["cc_exp_year"];
	$comments = $_POST["comments"];
	
	
	// validations
	
	
	// insert order details into database
	
	$insert_order_details_query = "INSERT INTO ShoppingCartOrders SET " . "customer_id='$customer_id', shopping_type='$shopping_type', " . 
	"billing_customer_name='$billing_customer_name', billing_company_name='$billing_company_name', billing_address='$billing_address', billing_city='$billing_city', billing_state='$billing_state', billing_postal_code='$billing_postal_code', billing_country='$billing_country', billing_phone='$billing_phone', billing_email='$billing_email', " .
	"shipping_customer_name='$shipping_customer_name', shipping_company_name='$shipping_company_name', shipping_address='$shipping_address', shipping_city='$shipping_city', shipping_state='$shipping_state', shipping_postal_code='$shipping_postal_code', shipping_country='$shipping_country', shipping_phone='$shipping_phone', shipping_email='$shipping_email', " .
	"cc_type='$cc_type', cc_name='$cc_name', cc_number='$cc_number', cc_exp_month='$cc_exp_month', cc_exp_year='$cc_exp_year', " .
	"order_subtotal='$order_subtotal', shipping_charge='$shipping_charge', tax_charge='$tax_charge', misc_charge='$misc_charge', order_grand_total='$order_grand_total', order_time='$order_time', order_date='$order_date', " .
	"payment_method='$payment_method', comments='$comments', message='$message', processed='$processed', complete='$complete'";
	
	$res = mysql_query($insert_order_details_query, $c); //or die(mysql_error());
	
	if(@!$res){
		echo "your order has failed, try again<br>";
	}else {
	
		// insert order items into the database, recursively
	
		$order_id = mysql_insert_id();
		
		foreach($_SESSION["ordered_products"] as $x){
			
		
			$orderitem_product_id = $x["product_id"];
			$product_name = $x["product_name"];
			$price = $x["price"];
			$description = $x["description"];
			$shipping_charge = $x["shipping_charge"];
			
			
			$insert_order_items_query = "INSERT INTO ShoppingCartOrderItems SET " .
			"order_id='$order_id', orderitem_product_id='$orderitem_product_id', product_name='$product_name', price='$price', description='$description', shipping_charge='$shipping_charge'";
			
			$res = mysql_query($insert_order_items_query, $c); //or die(mysql_error());
			
			if(@!$res){
				$failed = "set";
			}
			
		}
		
		unset($_SESSION["ordered_products"]);
		
		if(isset($failed)){
			echo "Your order has failed, try again later!";
		}else{
			echo "<b>Your order has been received, your product will be deliver in 7 working business days</b><br><br>";
			echo "<a href='index2.php'>Click here to go to Catalog</a>";
		}
	
	}
	


}
?>
