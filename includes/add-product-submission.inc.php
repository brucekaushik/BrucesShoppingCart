<?php

require 'includes/products-array.inc.php';
require 'includes/serverSideValidation.inc.php'; // for server side validation


// for convinience
$sku = $_POST["sku"];
$product_name = $_POST["product_name"];
$description = $_POST["description"];
$image_url = $_POST["image_url"];
if(isset($_POST["active"])){
	$active = "yes";	
}else{
	$active = "no";
}
$size = $_POST["size"];
$color = $_POST["color"];
$price = $_POST["price"];
$shipping_charge = $_POST["shipping_charge"];
$category = $_POST["category"];


// general bad input validation
$sku = validate_string($sku);
$product_name = validate_string($product_name);
$description = validate_string($description);
$size = validate_string($size);
$color = validate_string($color);
$price = validate_price($price);
$shipping_charge = validate_price($shipping_charge);
$category = validate_string($category);


// validate inputs
$sku = validate_sku($productsArray,$sku);
$image_url = validate_imgurl($image_url);

// if there are bad inputs, display errors
// otherwise insert the product into the database
switch ("bad input"){
	
	case $sku:
		
		echo "<br>Bad input in SKU field<br>";
		$form = "display";
		
	case $product_name:
		
		echo "<br>Bad input in Product Name field<br>";
		$form = "display";
		
	case $description:
	
		echo "<br>Bad input in Description field<br>";
		$form = "display";
		
	case $image_url:
		
		echo "<br>Bad input in Image Url field<br>";
		$form = "display";
		
	case $size:
		
		echo "<br>Bad input in Size field<br>";
		$form = "display";
		
	case $color:
		
		echo "<br>Bad input in Color field<br>";
		$form = "display";
		
	case $price:
		
		echo "<br>Bad input in Price field<br>";
		$form = "display";
		
	case $shipping_charge:
		
		echo "<br>Bad input in Shipping Charge field<br>";
		$form = "display";
		
	case $category:
		
		echo "<br>Bad input in Category field<br><br>";
		$form = "display";
		
	break;
		
	default:
		
		if($sku == "sku already exists"){
				
			echo "<br>SKU Already Exists<br><br>";
			$form = "display";
				
		}else {
		
			$dataInsert = "INSERT INTO ShoppingCartProducts SET sku='$sku',product_name='$product_name',description='$description',image_url='$image_url',active='$active',size='$size',color='$color',price='$price',shipping_charge='$shipping_charge',category='$category'";
			mysql_query($dataInsert, $c) or die ("some problem adding the product");
			print "<div style='color: green; font-weight:bold;' class='centeralign'><br><br>Product Added.</div>";
		
		}
				
		// product_id 	sku 	product_name 	description 	image_url 	active 	size 	color 	price 	shipping_charge 	category
}

// display form if the $form is set, i.e display if there are bad inputs
if(isset($form)){
	require 'includes/add-product.inc.php';
}

?>