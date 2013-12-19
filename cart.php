<?php

// start a session
session_start();

// connect to the database
require '../08-adminArea/includes/dbConnect.inc.php';

// include the products-array
require 'includes/products-array.inc.php';

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/


// show the screen only if the user is a registered user
if($customer_info['level'] == "reg"){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Shopping Cart => Cart</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div class="topnav">
		<a href="../08-adminArea">Home</a> |
		<a href="catalog.php">Continue Shopping</a> |
		<a href="checkout.php">Checkout</a> |
		<a href="../08-adminArea/home.php?action=logout">Logout</a>
	</div>
	
	<div class="content">
	
		<?php 
		
			if(isset($_GET["removeArrayIndex"])){
				
				if(@$ordered_products[$_GET["removeArrayIndex"]]["product_id"] == $_GET["productId"]){

					unset($ordered_products[$_GET["removeArrayIndex"]]);
					$ordered_products = array_values($ordered_products);
				
					echo "<div style='font-weight:bold;color:green;text-align:center'>" . $_GET["productName"] . " is Removed From Cart</div>";
				
				}
					
			}
		
		?>
		
		<div class="cart">
		
			<?php $i = 0; $total = 0; $shipping = 0; ?>
			<?php foreach($_SESSION["ordered_products"] as $x){ ?>
				
				<div class="product">
					<div class="col1"><div class="img_div"><img class="img" src="<?php echo $productsArray[$x["productsarray_arrayIndex"]]["image_url"] ?>"></div></div>
					<div class="col2">
						<div class="name"><?php echo  $productsArray[$x["productsarray_arrayIndex"]]["product_name"] ?></div>
						<div class="id_sku"><span class="id">Product ID: <?php echo $productsArray[$x["productsarray_arrayIndex"]]["product_id"] ?></span><span class="sku">SKU: <?php echo $productsArray[$x["productsarray_arrayIndex"]]["sku"] ?></span></div>
						<div class="size_color"><span class="size">Size: <?php echo $productsArray[$x["productsarray_arrayIndex"]]["size"] ?></span><span class="color">Color: <?php echo $productsArray[$x["productsarray_arrayIndex"]]["color"] ?></span></div>
						<div class="description"><?php echo $productsArray[$x["productsarray_arrayIndex"]]["description"] ?></div>	
					</div>
					<div class="col3">
						<div class="price_shipping"><span class="price"><?php echo $productsArray[$x["productsarray_arrayIndex"]]["price"] ?> INR</span><span class="shipping"><?php echo $productsArray[$x["productsarray_arrayIndex"]]["shipping_charge"] ?> Shipping</span></div>
						<div class="addtocart"><a href="cart.php?removeArrayIndex=<?php echo $i; ?>&productId=<?php echo $productsArray[$x["productsarray_arrayIndex"]]["product_id"] ?>&productName=<?php echo  $productsArray[$x["productsarray_arrayIndex"]]["product_name"] ?>">Remove From Cart</a></div>	
					</div>
				</div>
			
			<?php $i++; $total += $productsArray[$x["productsarray_arrayIndex"]]["price"]; $shipping += $productsArray[$x["productsarray_arrayIndex"]]["shipping_charge"]; ?>
			<?php } ?>
		
			<div class="totals">
				<?php $tax = $total/10; $gt = $total + $shipping + $tax ?>
				Sub Total = <?php echo $total ?><br>
				Shipping = <?php echo $shipping ?><br>
				Miscellaneous = 0 <br>
				Tax = <?php echo $tax; ?><br>
				Grand Total = <?php echo $gt; ?>	
				<?php $order_info["subtotal"] = $total; $order_info["shipping_charge"] = $shipping; $order_info["tax"] = $tax; $order_info["grand_total"] = $gt; ?>	
			</div>
						
		</div>
		
		<div style="clear:both">&nbsp;</div>
	</div>
	
</body>
</html>

<?php }else {
	echo "You are not a Registered Customer! You can't see this screen (even if you are admin or root). Go Back!!";
} ?>