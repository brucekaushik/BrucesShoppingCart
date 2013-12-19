<?php

require 'includes/products-array.inc.php';

?>

<div class="products-list">
<?php $i = 0; ?>
<?php foreach($productsArray as $x){ ?>

	<div class="product">
		<table>
			<tr>
				<td>Product Name</td>
				<td><?php echo $x["product_name"] ?></td>
			</tr>
			<tr>
				<td>Product ID</td>
				<td><?php echo $x["product_id"] ?></td>
			</tr>
			<tr>
				<td>SKU</td>
				<td><?php echo $x["sku"] ?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php echo $x["description"] ?></td>
			</tr>
			<tr>
				<td>Image URL</td>
				<td><?php echo $x["image_url"] ?></td>
			</tr>
			<tr>
				<td>Active</td>
				<td><?php echo $x["active"] ?></td>
			</tr>
			<tr>
				<td>Size</td>
				<td><?php echo $x["size"] ?></td>
			</tr>
			<tr>
				<td>Color</td>
				<td><?php echo $x["color"] ?></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><?php echo $x["price"] ?></td>
			</tr>
			<tr>
				<td>Shipping Charge</td>
				<td><?php echo $x["shipping_charge"] ?></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><?php echo $x["category"] ?></td>
			</tr>
			<tr>
				<td><a href="admin-interface.php?action=editProd&arrayIndex=<?php echo $i; ?>&id=<?php echo $x["product_id"] ?>">Edit</a></td>
				<td><a href="admin-interface.php?action=delProd&arrayIndex=<?php echo $i; ?>&id=<?php echo $x["product_id"] ?>" onclick=" return confirm('are you sure you want to delete this product?')">Delete</a></td>
			</tr>
		</table>	
	</div>	

<?php $i++; ?>
<?php } ?>
<div style="clear: both">&nbsp;</div>
</div>