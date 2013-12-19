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
if($customer_info['level'] == "reg"){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Shopping Cart => Catalog</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div class="topnav">
		<a href="../BrucesAdminArea">Home</a> |
		<a href="cart.php">View Cart</a> |
		<a href="../BrucesAdminArea/home.php?action=logout">Logout</a>
	</div>
	
	<div class="content">
	
		<?php 
		
			// we can only keep track of product id and get the product info, since we are using products array on the cart page
			// but we are doing this just for the sake of practice
		
			if(isset($_GET["id"])){

				if(count($_SESSION["ordered_products"]) == 0){
					$ordered_products[] = array(
							"productsarray_arrayIndex" => $_GET["arrayIndex"],
							"product_id" => $productsArray[$_GET["arrayIndex"]]["product_id"],
							"product_name" => $productsArray[$_GET["arrayIndex"]]["product_name"],
							"price" => $productsArray[$_GET["arrayIndex"]]["price"],
							"shipping_charge" => $productsArray[$_GET["arrayIndex"]]["shipping_charge"],
							"description" => $productsArray[$_GET["arrayIndex"]]["description"]
					);
					
					echo "<div style='font-weight:bold;color:green;text-align:center'>" . $productsArray[$_GET["arrayIndex"]]["product_name"] . " is Added To Cart</div>";
				}else{

					foreach ($_SESSION["ordered_products"] as $x){
						
						if($x["product_id"] == $_GET["id"]){
							
							$match = "found";

						}
						
					}
					
					if(!isset($match)){

						$ordered_products[] = array(
							"productsarray_arrayIndex" => $_GET["arrayIndex"],
					 		"product_id" => $productsArray[$_GET["arrayIndex"]]["product_id"],
					 		"product_name" => $productsArray[$_GET["arrayIndex"]]["product_name"],
					 		"price" => $productsArray[$_GET["arrayIndex"]]["price"],
					 		"shipping_charge" => $productsArray[$_GET["arrayIndex"]]["shipping_charge"],
					 		"description" => $productsArray[$_GET["arrayIndex"]]["description"]
						);
						
						echo "<div style='font-weight:bold;color:green;text-align:center'>" . $productsArray[$_GET["arrayIndex"]]["product_name"] . " is Added To Cart</div>";
						
					}

				}
				
			}
		
		?>
		
		<div class="catalog">
		<?php $i = 0; ?>
		<?php foreach($productsArray as $x){ ?>
			
			<?php if($x["active"] == "yes"){ ?>
			
				<div class="product">
					<div class="name"><?php echo $x["product_name"] ?></div>
					<div class="img_div"><img class="img" src="<?php echo $x["image_url"] ?>"></div>
					<div class="id_sku"><span class="id">Product ID: <?php echo $x["product_id"] ?></span><span class="sku">SKU: <?php echo $x["sku"] ?></span></div>
					<div class="size_color"><span class="size">Size: <?php echo $x["size"] ?></span><span class="color">Color: <?php echo $x["color"] ?></span></div>
					<div class="description"><?php echo $x["description"] ?></div>
					<div class="price_shipping"><span class="price"><?php echo $x["price"] ?> INR</span><span class="shipping"><?php echo $x["shipping_charge"] ?> Shipping</span></div>
					<div class="addtocart"><a href="catalog.php?arrayIndex=<?php echo $i; ?>&id=<?php echo $x["product_id"] ?>">Add To Cart</a></div>
				</div>
			
			<?php } ?>	
		
		<?php $i++; ?>
		<?php } ?>
						
		</div>
		
		<div style="clear:both">&nbsp;</div>
	</div>
	
</body>
</html>

<?php }else {
	echo "You are not a Registered Customer! You can't see this screen (even if you are admin or root). Go Back!!";
} ?>