<?php

// start a session
session_start();

//*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

if($customer_info['level'] == "reg"){
	printf("<script>location.href='catalog.php'</script>");
}elseif ($customer_info['level'] == "admin" || $customer_info['level'] == "root"){
	printf("<script>location.href='admin-interface.php'</script>");
}

?>