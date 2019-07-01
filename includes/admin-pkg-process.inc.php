<?php

$pkg = $_POST['pkg'];
include_once 'dbh.inc.php';
if (isset($_POST['remove1'])) {
	$pkgget = $_POST['remove1'];
	$sql = "UPDATE modaltpackages SET map_pkg_".$pkg." = '0' WHERE map_id = {$pkgget}";
	$r = mysqli_query($conn, $sql);
	if ($r) {
		header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg");
	}
	else{
		echo "sql error";
	}
	// echo $sql;
}
elseif (isset($_POST['remove2'])) {
	$pkgget = $_POST['remove2'];
	$sql = "UPDATE modaltpackages SET map_pkg_".$pkg." = '0' WHERE map_id = {$pkgget}";
	$r = mysqli_query($conn, $sql);
	if ($r) {
		header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg");
	}
	else{
		echo "sql error";
	}
	
}
elseif (isset($_POST['remove3'])) {
	$pkgget = $_POST['remove3'];
	$sql = "UPDATE modaltpackages SET map_pkg_".$pkg." = '0' WHERE map_id = {$pkgget}";
	$r = mysqli_query($conn, $sql);
	if ($r) {
		header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg");
	}
	else{
		echo "sql error";
	}
}
elseif (isset($_POST['remove4'])) {
	$pkgget = $_POST['remove4'];
	$sql = "UPDATE modaltpackages SET map_pkg_".$pkg." = '0' WHERE map_id = {$pkgget}";
	$r = mysqli_query($conn, $sql);
	if ($r) {
		header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg");
	}
	else{
		echo "sql error";
	}
}
elseif (isset($_POST['save1'])) {
	$txtName = $_POST['txtName'];
	$txtPrice = $_POST['txtPrice'];
	$enable = 1;
	$type = "modification";
	echo $txtName;
	echo $txtPrice;
	$sql = "INSERT INTO modaltpackages (map_name, map_price, map_pkg_1, map_type) VALUES (?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
		header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg&error");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "ssss", $txtName, $txtPrice, $enable, $type);
		mysqli_stmt_execute($stmt);
		header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg");
		exit();
	}
}