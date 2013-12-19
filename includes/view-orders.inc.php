<?php

$view_orders_query = "SELECT * FROM ShoppingCartOrders";
$view_orders_res = mysql_query($view_orders_query);

while ($view_orders_row = mysql_fetch_array($view_orders_res)){
	$ordersArray[] = $view_orders_row;
}

//*
print "<pre>";
print_r($ordersArray);
print "</pre>";
//*/

?> 