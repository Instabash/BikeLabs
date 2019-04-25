<?php
session_start();
$modoralt = $_SESSION['modORalt'];

if (isset($_POST['btnplaceorder'])) {
	if ($modoralt == "modification") {
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
		$del_method = $_SESSION['del_method'];
		$order_summ = $ordertype . ", Package : " . $package . ",";
		$pay_type = "cash on delivery";
		foreach($_SESSION['modaddress'] as $value)
		{
			$address = $value['modadhname'] . ", " . $value['modadpcode'] . ", " . $value['modadcountry'];
			$fullname = $value['modadfname'] . " " .  $value['modadlname'];
		}
		foreach ($_SESSION['modcart'] as $item) 
		{
			if ($package == 1) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$ordersumm1 = "Remove jump cover,Reflectors,Remove mudguard,Body paint (User defined)";
				$order_summ .= $ordersumm1;
			}

			if ($package == 2) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$theme = $item['theme'];
				$ordersumm2 = "Remove jump cover,Reflectors,HID Lights,Remove mudguard,Add theme (User defined),Body paint (User defined)";
				$order_summ .= $ordersumm2;
			}

			if ($package == 3) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$theme = $item['theme'];
				$ordersumm3 = "Remove jump cover,Reflectors,HID Lights,Remove mudguard,Short meter,Remove headlight holders,Body paint (User defined),Add theme (User defined)";
				$order_summ .= $ordersumm3;
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
				$order_summ .= $selectedparts;
			}
		}

		$modaltsql = "INSERT INTO modalt (modalttype, modaltmake, modaltbikemodel, modaltbikeyear, modaltpkg, modaltselectedpts, modaltselectedtheme, modaltselectedpaint , modaltdescription	, modaltprice, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $modaltsql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{
			mysqli_stmt_bind_param($stmt, "sssssssssss",$ordertype, $make, $model, $year, $package, $selectedparts, $theme, $paint, $description, $price, $userid);
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
				$_SESSION["order_id"] = $orderid;
				
				$orderitems = "INSERT INTO order_items (order_id, Order_price, Order_quantity, Order_type_ID, Order_Address) VALUES (?, ?, ?, ?, ?)";
				if (!mysqli_stmt_prepare($stmt, $orderitems)) 
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "sssss", $orderid, $price, $orderQuantity, $modaltid, $address);
					mysqli_stmt_execute($stmt);

					$invoicesql = "INSERT INTO invoice (order_id, uidUsers, user_address, delivery_method, order_summary, payment_type, billing_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
					if (!mysqli_stmt_prepare($stmt, $invoicesql)) 
					{
						echo "SQL statement failed";
					}
					else
					{	
						mysqli_stmt_bind_param($stmt, "sssssss", $orderid, $fullname, $address, $del_method, $order_summ, $pay_type, $address);
						mysqli_stmt_execute($stmt);
						unset($_SESSION['modcart']);
						header("Location: ../orderconfirmation.php?order=success");
					}
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
	elseif ($modoralt == "alteration") {
		include_once 'dbh.inc.php';

		$ordertype = "Alteration";
		$orderQuantity = 1;
		$orderStatus = "Pending approval";
		$orderDate = date("Y-m-d h:i:sa");
		$userid = $_SESSION['userId'];
		$type = "Modification";
		$make = $_SESSION['altspecs']['make'];
		$model = $_SESSION['altspecs']['model'];
		$year = $_SESSION['altspecs']['year'];
		$package = $_SESSION['packageselected'];
		$selectedparts = "";
		$del_method = $_SESSION['del_method'];
		$order_summ = $ordertype . ", Package : " . $package . ",";
		$pay_type = "cash on delivery";
		foreach($_SESSION['altaddress'] as $value)
		{
			$address = $value['altadhname'] . ", " . $value['altadpcode'] . ", " . $value['altadcountry'];
			$fullname = $value['altadfname'] . " " .  $value['altadlname'];
		}
		foreach ($_SESSION['altcart'] as $item) 
		{
			if ($package == 1) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$ordersumm1 = "Remove jump cover,Reflectors,Remove mudguard,Body paint (User defined)";
				$order_summ .= $ordersumm1;
			}

			if ($package == 2) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$theme = $item['theme'];
				$ordersumm2 = "Remove jump cover,Reflectors,HID Lights,Remove mudguard,Add theme (User defined),Body paint (User defined)";
				$order_summ .= $ordersumm2;
			}

			if ($package == 3) {
				$paint = $item['paint'];
				$description = $item['description'];
				$price = $item['price'];
				$theme = $item['theme'];
				$ordersumm3 = "Remove jump cover,Reflectors,HID Lights,Remove mudguard,Short meter,Remove headlight holders,Body paint (User defined),Add theme (User defined)";
				$order_summ .= $ordersumm3;
			}
		}

		$modaltsql = "INSERT INTO modalt (modalttype, modaltmake, modaltbikemodel, modaltbikeyear, modaltpkg, modaltselectedpts, modaltselectedtheme, modaltselectedpaint, modaltdescription, modaltprice, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $modaltsql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{
			mysqli_stmt_bind_param($stmt, "sssssssssss",$ordertype, $make, $model, $year, $package, $selectedparts, $theme, $paint, $description, $price, $userid);
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
				$_SESSION["order_id"] = $orderid;
				
				$orderitems = "INSERT INTO order_items (order_id, Order_price, Order_quantity, Order_type_ID, Order_Address) VALUES (?, ?, ?, ?, ?)";
				if (!mysqli_stmt_prepare($stmt, $orderitems)) 
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "sssss", $orderid, $price, $orderQuantity, $modaltid, $address);
					mysqli_stmt_execute($stmt);

					$invoicesql = "INSERT INTO invoice (order_id, uidUsers, user_address, delivery_method, order_summary, payment_type, billing_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
					if (!mysqli_stmt_prepare($stmt, $invoicesql)) 
					{
						echo "SQL statement failed";
					}
					else
					{	
						// echo $orderid . $fullname . $address . $del_method . $order_summ . $pay_type . $address;
						mysqli_stmt_bind_param($stmt, "sssssss", $orderid, $fullname, $address, $del_method, $order_summ, $pay_type, $address);
						mysqli_stmt_execute($stmt);
						header("Location: ../orderconfirmation.php?order=success");
					}
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