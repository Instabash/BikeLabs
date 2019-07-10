<?php
require 'dbh.inc.php';
//------------------------------------ASSIGN JOB (ADMIN)--------------------------------------------------------//
if (isset($_POST['submit-job'])) {
	if (!empty($_POST['vendor-select'])) {
		if(!empty($_POST['order-check'])) {
			$selectedvendor = $_POST['vendor-select'];
			foreach($_POST['order-check'] as $check) {
				$sql = "SELECT * FROM users WHERE User_type = '2' AND uidUsers = '$selectedvendor';";
				$result = mysqli_query($conn, $sql);
				if($row = mysqli_fetch_assoc($result))
				{
					$sql2 = "UPDATE order_table SET order_status = 'Processing', assigned_vendor = '$selectedvendor' WHERE order_id = '$check'";
					$result2 = mysqli_query($conn, $sql2);
					header("Location: /BikeLabs/pages/admin/admin-jobs.php?successr");	
					exit();
					// echo "success";
				}
				else{
					header("Location: /BikeLabs/pages/admin/admin-jobs.php?error");	
					exit();
					// echo "failed";
				}
			}
		}
		else
		{
			header("Location: /BikeLabs/pages/admin/admin-jobs.php?error=order");
			exit();
		}
	}
	else
	{
		header("Location: /BikeLabs/pages/admin/admin-jobs.php?error=vendor");
		exit();
	}
}
//----------------------------------------------APPROVE PART AND BIKE ORDER (ADMIN) ----------------------------------------------//
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
// ---------------------------------------------------- APPROVE PART AND BIKE ORDER (VENDOR) ------------------------------------------//
elseif (isset($_POST['vendor-appr-order'])) {
	
	if(!empty($_POST['vendor-appr-check'])) {
		foreach($_POST['vendor-appr-check'] as $check) {
			$sql = "UPDATE order_table SET order_status = 'Approved' WHERE order_id = '$check'";
			$result = mysqli_query($conn, $sql);
			header("Location: /BikeLabs/pages/vendor/vendor-orders.php?successr");
		}
	}
	else
	{
		header("Location: /BikeLabs/pages/vendor/vendor-orders.php?error=order");
		exit();
	}
	
}
//------------------------------------------------------ PROCESS ORDER MOD/ALT (VENDOR) ----------------------------------------------------//
elseif (isset($_POST['vendor-proc-order'])) {
	if(!empty($_POST['vendor-proc-check'])) {
		foreach($_POST['vendor-proc-check'] as $check) {
			$sql = "UPDATE order_table SET order_status = 'Processed' WHERE order_id = '$check'";
			$result = mysqli_query($conn, $sql);
			header("Location: /BikeLabs/pages/vendor/vendor-modalt.php?successr");
		}
	}
	else
	{
		header("Location: /BikeLabs/pages/vendor/vendor-modalt.php?error=order");
		exit();
	}
}
elseif (isset($_POST['vendor-close-order'])) {
	
	if(!empty($_POST['vendor-close-check'])) {
		foreach($_POST['vendor-close-check'] as $check) {
			$sql = "UPDATE order_table SET order_status = 'Approved' WHERE order_id = '$check'";
			$result = mysqli_query($conn, $sql);
			header("Location: /BikeLabs/pages/vendor/vendor-modaltprocessed.php?successr");
		}
	}
	else
	{
		header("Location: /BikeLabs/pages/vendor/vendor-modaltprocessed.php?error=order");
		exit();
	}
	
}