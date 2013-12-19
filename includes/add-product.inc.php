<form id="add-product" action="admin-interface.php?action=addProdSubmission" method="post">
	<table>
		<!-- 
		<tr>
			<td>Product Id</td>
			<td><input name="product_id" type="text" value=""></td>
		</tr>
		 -->
		<tr>
			<td>SKU</td>
			<td><input name="sku" type="text" value=""></td>
		</tr>
		<tr>
			<td>Product Name</td>
			<td><input name="product_name" type="text" value=""></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input name="description" type="text" value=""></td>
		</tr>
		<tr>
			<td>Image Url</td>
			<td><input name="image_url" type="text" value=""></td>
		</tr>
		<tr>
			<td>Active?</td>
			<td><input name="active" type="checkbox" value=""></td>
		</tr>
		<tr>
			<td>Size</td>
			<td><input name="size" type="text" value=""></td>
		</tr>
		<tr>
			<td>Color</td>
			<td><input name="color" type="text" value=""></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input name="price" type="text" value=""></td>
		</tr>
		<tr>
			<td>Shipping Charge</td>
			<td><input name="shipping_charge" type="text" value=""></td>
		</tr>
		<tr>
			<td>Category</td>
			<td><input name="category" type="text" value=""></td>
		</tr>
	</table>
	<input type="submit" value="Add Product">
</form>