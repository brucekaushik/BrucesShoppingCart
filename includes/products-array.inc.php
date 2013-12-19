<?php

$productsQuery = "select * from ShoppingCartProducts";
$productsRes = mysql_query($productsQuery, $c);

while ($productsRow = mysql_fetch_array($productsRes, MYSQL_ASSOC)){
	$productsArray[] = $productsRow;
}

/*
print "<pre>";
print_r($productsArray);
print "</pre>";
//*/


?>