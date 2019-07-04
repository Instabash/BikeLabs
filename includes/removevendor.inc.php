<?php
require 'dbh.inc.php';

if (isset($_POST['submit-remove'])) {
	if(!empty($_POST['rem-vendor-check'])) {
		foreach($_POST['rem-vendor-check'] as $check) {
			$sql = "DELETE FROM users WHERE idUsers=?;";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) 
			{
				header("Location: ../index.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $check);
				mysqli_stmt_execute($stmt);
				header("Location: /BikeLabs/pages/admin/admin-vendor.php?removalsuccess");
			}
		}
	}
	else{
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=selectvendor");
	}
}