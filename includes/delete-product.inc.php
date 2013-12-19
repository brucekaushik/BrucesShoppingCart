<?php

require 'includes/products-array.inc.php';

$product_id = $_GET["id"];

$delete = "DELETE FROM ShoppingCartProducts WHERE product_id='$product_id'";
mysql_query($delete, $c) or die ("some problem adding the product");
print "<div style='color: green; font-weight:bold;' class='centeralign'><br><br>Product Has Been Deleted.</div>";


?>