<?php
require 'dbh.inc.php';

if (isset($_POST['submit-job'])) {
	if (!empty($_POST['vendor-select'])) {
		if(!empty($_POST['order-check'])) {
			$selectedvendor = $_POST['vendor-select'];
			foreach($_POST['order-check'] as $check) {
				$sql = "UPDATE order_table SET order_status = 'Approved', assigned_vendor = '$selectedvendor' WHERE order_id = '$check'";
				$result = mysqli_query($conn, $sql);
				header("Location: /BikeLabs/pages/admin/admin-jobs.php?successr");
			}
		}
		else
		{
			header("Location: /BikeLabs/pages/admin/admin-orders.php?error=order");
			exit();
		}
	}
	else
	{
		header("Location: /BikeLabs/pages/admin/admin-orders.php?error=vendor");
		exit();
	}
}
elseif (isset($_POST['admin-appr-order'])) {
	
		if(!empty($_POST['admin-appr-check'])) {
			foreach($_POST['admin-appr-check'] as $check) {
				$sql = "UPDATE order_table SET order_status = 'Approved' WHERE order_id = '$check'";
				$result = mysqli_query($conn, $sql);
				header("Location: /BikeLabs/pages/admin/admin-orders.php?successr");
			}
		}
		else
		{
			header("Location: /BikeLabs/pages/admin/admin-orders.php?error=order");
			exit();
		}
	
}