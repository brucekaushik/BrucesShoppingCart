<?php

require 'includes/products-array.inc.php';

?>

<form id="add-product" action="admin-interface.php?action=editProdSubmission&arrayIndex=<?php echo $_GET["arrayIndex"] ?>" method="post">
	<table> 
		<tr>
			<td>Product Id</td>
			<td><?php echo $productsArray[$_GET["arrayIndex"]]["product_id"] ?><input name="product_id" type="hidden" value="<?php echo $productsArray[$_GET["arrayIndex"]]["product_id"] ?>"></td>
		</tr>
		<tr>
			<td>SKU</td>
			<td><input name="sku" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["sku"] ?>"></td>
		</tr>
		<tr>
			<td>Product Name</td>
			<td><input name="product_name" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["product_name"] ?>"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input name="description" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["description"] ?>"></td>
		</tr>
		<tr>
			<td>Image Url</td>
			<td><input name="image_url" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["image_url"] ?>"></td>
		</tr>
		<tr>
			<td>Active?</td>
			<td><input name="active" type="checkbox" <?php if($productsArray[$_GET["arrayIndex"]]["active"] == "yes"){echo "checked='checked'";}?> ></td>
		</tr>
		<tr>
			<td>Size</td>
			<td><input name="size" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["size"] ?>"></td>
		</tr>
		<tr>
			<td>Color</td>
			<td><input name="color" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["color"] ?>"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input name="price" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["price"] ?>"></td>
		</tr>
		<tr>
			<td>Shipping Charge</td>
			<td><input name="shipping_charge" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["shipping_charge"] ?>"></td>
		</tr>
		<tr>
			<td>Category</td>
			<td><input name="category" type="text" value="<?php echo $productsArray[$_GET["arrayIndex"]]["category"] ?>"></td>
		</tr>
	</table>
	<input type="submit" value="Save Changes">
</form>