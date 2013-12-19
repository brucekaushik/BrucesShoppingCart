<?php

// start a session
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

require '../08-adminArea/includes/dbConnect.inc.php';

$userDetailsQuery = "select * from AdminArea where username='$ses_username'";
$userDetailsRes = mysql_query($userDetailsQuery, $c);
$userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC);

echo "<pre>";
print_r($userDetailsRow);
echo "</pre>";

$customer_info = array(
	"customer_id" => $userDetailsRow['user_id'],
	"customer_name" => $userDetailsRow["full_name"],
	"username" => $userDetailsRow["username"],
	"level" => $userDetailsRow["level"]
);

$order_info = array();
$ordered_products = array();

// register session variable
session_register("customer_info");
session_register("order_info");
session_register("ordered_products");

// redirect to home page
header ("Location: home.php");

?>