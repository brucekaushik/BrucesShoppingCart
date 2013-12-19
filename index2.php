<?php

// start a session
session_start();

// variables
$ses_username = $_SESSION['username'];

unset($_SESSION['app_name']);
unset($_SESSION['verify_back_to']);
unset($_SESSION['action']);

//*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

require '../BrucesAdminArea/includes/dbConnect.inc.php';

$userDetailsQuery = "select * from AdminArea where username='$ses_username'";
$userDetailsRes = mysql_query($userDetailsQuery, $c);
$userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC);

//*
echo "<pre>";
print_r($userDetailsRow);
echo "</pre>";
//*/

$customer_info = array(
	"customer_id" => $userDetailsRow['user_id'],
	"customer_name" => $userDetailsRow["full_name"],
	"username" => $userDetailsRow["username"],
	"level" => $userDetailsRow["level"]
);

$order_info = array();
$ordered_products = array();

// register session variable
$_SESSION['customer_info'] = $customer_info;
$_SESSION['order_info'] = $order_info;
$_SESSION['ordered_products'] = $ordered_products;

// redirect to home page
header ("Location: home.php");

?>