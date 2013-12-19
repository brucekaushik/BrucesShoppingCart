<?php

// start a session
session_start();

// connect to the database
require '../08-adminArea/includes/dbConnect.inc.php';

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/


// show the screen only if the user is an admin
if($customer_info['level'] == "admin"){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Shopping Cart Admin Interface</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div class="topnav">
		<a href="../08-adminArea">Home</a> |
		<a href="admin-interface.php?action=addProd">Add Product</a> |
		<a href="admin-interface.php?action=listProd">List Products</a> |
		<a href="admin-interface.php?action=viewOrders">View Orders</a> |
		<a href="../08-adminArea/home.php?action=logout">Logout</a>
	</div>
	
	<div class="content">
		
		<?php 
		
			if(isset($_GET['action'])){

				switch ($_GET['action']){

					case "addProd":
						
						require 'includes/add-product.inc.php';
						
					break;
					
					case "listProd":
						
						require 'includes/list-products.inc.php';
						
					break;
						
					case "editProd":
						
						require 'includes/edit-product.inc.php';
						
					break;
						
					case "delProd":
						
						require 'includes/delete-product.inc.php';

					break;
					
					case "addProdSubmission":
					
						require 'includes/add-product-submission.inc.php';
					
					break;
					
					case "editProdSubmission":
							
						require 'includes/edit-product-submission.inc.php';
							
					break;
					
					case "viewOrders":
							
						require 'includes/view-orders.inc.php';
							
					break;
										
				}

			}
				
			
		?>
		
	</div>
	
</body>
</html>

<?php }else {
	echo "You are not an admin..!! Go Back!!";
} ?>