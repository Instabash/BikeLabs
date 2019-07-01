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
elseif (isset($_POST['save'])) {
	
	// $count = $_POST['count'];
	// for ($i=0; $i < $count; $i++) { 
	// 	${"txtname" . $i} = 'var: ' . $i;
	// }
	// $pkgget = $_POST['remove2'];
	// $sql = "UPDATE modaltpackages SET map_pkg_".$pkg." = '0' WHERE map_id = {$pkgget}";
	// $r = mysqli_query($conn, $sql);
	// if ($r) {
	// 	header("Location: 	../pages/admin/admin-edit.php?pkgmod=$pkg");
	// }
	// else{
	// 	echo "sql error";
	// }
}