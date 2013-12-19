<?php

// start a session
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if($customer_info['level'] == "reg"){
	header ("Location: catalog.php");
}elseif ($customer_info['level'] == "admin" || $customer_info['level'] == "root"){
	header ("Location: admin-interface.php");
}

?>