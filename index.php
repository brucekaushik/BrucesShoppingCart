<?php

session_start();

$_SESSION['verify_back_to'] = "../BrucesShoppingCart/index2.php";
$_SESSION['app_name'] = "Bruce's Shopping Cart";

// redirect to home page
header ("Location: ../BrucesAdminArea/index.php?action=VerifyLogin");

?>
