<?php
session_start();
include_once 'dbh.inc.php';
if (isset($_POST['btnplaceorder'])) {
	if (isset($_SESSION['modORalt'])) {
		$modoralt = $_SESSION['modORalt'];
		if ($modoralt == "modification") {
			$ordertype = "Modification";
			$orderQuantity = 1;
			$orderStatus = "Open";
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
			$ordertype = "Alteration";
			$orderQuantity = 1;
			$orderStatus = "Open";
			$orderDate = date("Y-m-d h:i:sa");
			$userid = $_SESSION['userId'];
			$type = "Alteration";
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
	elseif (isset($_SESSION['bikecart'])) {
		$ordertype = "bike";

		$orderStatus = "Processing";
		$orderDate = date("Y-m-d h:i:sa");
		$userid = $_SESSION['userId'];

		$total_price = 0;
		foreach($_SESSION['bikecart'] as $item)
		{
			
		}
		
		$del_method = $_SESSION['del_method'];
		$pay_type = "cash on delivery";
		foreach($_SESSION['new_b_p_address'] as $value)
		{
			$address = $value['new_b_p_hname'] . ", " . $value['new_b_p_pcode'] . ", " . $value['new_b_p_country'];
			$fullname = $value['new_b_p_fname'] . " " .  $value['new_b_p_lname'];
		}

		foreach ($_SESSION['bikecart'] as $item) {
			$price = $item['price'];
			$orderQuantity = $item['quantity'];
			$multipliedprice = $price*$orderQuantity;
			$total_price+=$multipliedprice;
		}
		$assigned = "";
		$idvendor = "";
		$vendoridsql = "SELECT * FROM bikes WHERE part_id = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $vendoridsql)) 
		{
			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $part_bike_id_assign);
			mysqli_stmt_execute($stmt);
			$result3 = mysqli_stmt_get_result($stmt);
			while ($row = mysqli_fetch_assoc($result3)) {
				$assigned = $row['idUsers'];
			}
		}
		$ordertablesql = "INSERT INTO order_table (order_type, order_status, order_date, idUsers, assigned_vendor) VALUES (?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $ordertablesql)) 
		{
			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sssss", $ordertype, $orderStatus, $orderDate, $userid, $assigned);
			mysqli_stmt_execute($stmt);
			$orderid = $conn->insert_id;
			$_SESSION["order_id"] = $orderid;


			foreach ($_SESSION['bikecart'] as $item) 
			{
				$title = $item['title'];
				$price = $item['price'];
				$order_summ = $title . ", " . $price . " Rs.";
				$part_bike_id = $item['product_id'];
				$orderQuantity = $item['quantity'];

				$orderitems = "INSERT INTO order_items (order_id, Order_price, Order_total_price, Order_quantity, Order_type_ID, Order_Address) VALUES (?, ?, ?, ?, ?, ?)";
				if (!mysqli_stmt_prepare($stmt, $orderitems)) 
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "ssssss", $orderid, $multipliedprice, $total_price, $orderQuantity, $part_bike_id, $address);
					mysqli_stmt_execute($stmt);
				}
			}
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
				unset($_SESSION['bikecart']);
				header("Location: ../orderconfirmation.php?order=success");
			}
		}
	}
	else{
		$ordertype = "parts";

		$orderStatus = "Processing";
		$orderDate = date("Y-m-d h:i:sa");
		$userid = $_SESSION['userId'];

		$total_price = 0;
		foreach($_SESSION['cart'] as $item)
		{
			
		}
		
		$del_method = $_SESSION['del_method'];
		$pay_type = "cash on delivery";
		foreach($_SESSION['new_b_p_address'] as $value)
		{
			$address = $value['new_b_p_hname'] . ", " . $value['new_b_p_pcode'] . ", " . $value['new_b_p_country'];
			$fullname = $value['new_b_p_fname'] . " " .  $value['new_b_p_lname'];
		}

		foreach ($_SESSION['cart'] as $item) {
			$price = $item['price'];
			$orderQuantity = $item['quantity'];
			$multipliedprice = $price*$orderQuantity;
			$total_price+=$multipliedprice;
		}
		foreach ($_SESSION['cart'] as $item) 
		{
			$part_bike_id_assign = $item['product_id'];
		}
		$assigned = "";
		$idvendor = "";
		$vendoridsql = "SELECT * FROM spare_parts WHERE part_id = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $vendoridsql)) 
		{
			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $part_bike_id_assign);
			mysqli_stmt_execute($stmt);
			$result3 = mysqli_stmt_get_result($stmt);
			while ($row = mysqli_fetch_assoc($result3)) {
				$assigned = $row['idUsers'];
			}
		}
		$ordertablesql = "INSERT INTO order_table (order_type, order_status, order_date, idUsers, assigned_vendor) VALUES (?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $ordertablesql)) 
		{
			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sssss", $ordertype, $orderStatus, $orderDate, $userid, $assigned);
			mysqli_stmt_execute($stmt);
			$orderid = $conn->insert_id;
			$_SESSION["order_id"] = $orderid;


			foreach ($_SESSION['cart'] as $item) 
			{
				$title = $item['title'];
				$price = $item['price'];
				$order_summ = $title . ", " . $price . " Rs.";
				$part_bike_id = $item['product_id'];
				$orderQuantity = $item['quantity'];
				$multipliedprice = $price*$orderQuantity;
				echo "multiplied price".$multipliedprice . " " . "total price" . $total_price;

				$orderitems = "INSERT INTO order_items (order_id, Order_price, Order_total_price, Order_quantity, Order_type_ID, Order_Address) VALUES (?, ?, ?, ?, ?, ?)";
				if (!mysqli_stmt_prepare($stmt, $orderitems)) 
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "ssssss", $orderid, $multipliedprice, $total_price, $orderQuantity, $part_bike_id, $address);
					mysqli_stmt_execute($stmt);
				}
				$total_order_summ .= $order_summ;
			}
			$invoicesql = "INSERT INTO invoice (order_id, uidUsers, user_address, delivery_method, order_summary, payment_type, billing_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
			if (!mysqli_stmt_prepare($stmt, $invoicesql)) 
			{
				echo "SQL statement failed";
			}
			else
			{	
						// echo $orderid . $fullname . $address . $del_method . $order_summ . $pay_type . $address;
				mysqli_stmt_bind_param($stmt, "sssssss", $orderid, $fullname, $address, $del_method, $total_order_summ, $pay_type, $address);
				mysqli_stmt_execute($stmt);
				unset($_SESSION['cart']);
				header("Location: ../orderconfirmation.php?order=success");
			}
		}	
	}
}