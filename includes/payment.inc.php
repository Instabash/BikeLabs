<?php
session_start();
if (isset($_POST['btnplaceorder'])) {
	if (isset($_SESSION['modspecs'])) {
		include_once 'dbh.inc.php';

		$ordertype = "Modification";
		$orderQuantity = 1;
		$orderStatus = "Pending approval";
		$orderDate = date("Y-m-d h:i:sa");
		$userid = $_SESSION['userId'];
		$type = "Modification";
		$make = $_SESSION['modspecs']['make'];
		$model = $_SESSION['modspecs']['model'];
		$year = $_SESSION['modspecs']['year'];
		$package = $_SESSION['packageselected'];
		$selectedparts = "";
		foreach($_SESSION['modaddress'] as $value)
		{
			$address = $value['modadhname'] . ", " . $value['modadpcode'] . ", " . $value['modadcountry'];
		}
		foreach ($_SESSION['modcart'] as $item) 
		{
			if ($package == 1) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
			}

			if ($package == 2) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$theme = $item['theme'];
			}

			if ($package == 3) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$theme = $item['theme'];
			}

			if ($package == "custom") {
				$paint = $item['paint'];
				$theme = $item['theme'];
				$description = $item['description'];
				$price = $item['price'];

				foreach($_SESSION['pkg4'] as $key=>$value)
				{
					$selectedparts .=  $value . ", ";
				}
			}
		}

		$modaltsql = "INSERT INTO modalt (modalttype, modaltbikemodel, modaltbikeyear, modaltpkg, modaltselectedpts, modaltselectedtheme, modaltselectedpaint , modaltdescription	, modaltprice, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $modaltsql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{
			mysqli_stmt_bind_param($stmt, "ssssssssss", $make, $model, $year, $package, $selectedparts, $theme, $paint, $description, $price, $userid);
			mysqli_stmt_execute($stmt);
			$modaltid = $conn->insert_id;

			$ordertablesql = "INSERT INTO order_table (order_type, order_status, order_date, idUsers) VALUES (?, ?, ?, ?)";
			if (!mysqli_stmt_prepare($stmt, $ordertablesql)) 
			{
				echo "SQL statement failed";
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "ssss", $ordertype, $orderStatus, $orderDate, $userid);
				mysqli_stmt_execute($stmt);
				$orderid = $conn->insert_id;

				$orderitems = "INSERT INTO order_items (order_id, Order_price, Order_quantity, Order_type_ID, Order_Address) VALUES (?, ?, ?, ?, ?)";
				if (!mysqli_stmt_prepare($stmt, $orderitems)) 
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "sssss", $orderid, $price, $orderQuantity, $modaltid, $address);
					mysqli_stmt_execute($stmt);
					header("Location: ../orderconfirmation.php?order=success");
				}
			}	
		}

		



		
		// echo "make: " . $make; echo "<br>";
		// echo "model: " . $model; echo "<br>";
		// echo "year: " . $year; echo "<br>";
		// echo "package: " . $package; echo "<br>";
		// echo "paint: " . $paint; echo "<br>";
		// echo "price: " . $price; echo "<br>";
		// echo "description: " . $description; echo "<br>";
		// echo "theme: " . $theme; echo "<br>";
		// echo "selectedparts: " . $selectedparts; echo "<br>";
		// echo "address: " .$address;
	}
}