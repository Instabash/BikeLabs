<?php
session_start();
unset($_SESSION['altcart']);
include_once 'dbh.inc.php';

$sql = "SELECT * FROM modaltpackages WHERE map_pkg_1 = 1 AND map_type = 'alteration'";
$result = mysqli_query($conn, $sql);
$pkg1price = 0;
while ($row = mysqli_fetch_assoc($result)) 
{
	$pkg1price += $row['map_price'];
}
$sql = "SELECT * FROM modaltpackages WHERE map_pkg_2 = 1 AND map_type = 'alteration'";
$result = mysqli_query($conn, $sql);
$pkg2price = 0;
while ($row = mysqli_fetch_assoc($result)) 
{
	$pkg2price += $row['map_price'];
}
$sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1 AND map_type = 'alteration'";
$result = mysqli_query($conn, $sql);
$pkg3price = 0;
while ($row = mysqli_fetch_assoc($result)) 
{
	$pkg3price += $row['map_price'];
}
$sql = "SELECT * FROM modaltpackages WHERE map_pkg_4 = 1 AND map_type = 'alteration'";
$result = mysqli_query($conn, $sql);
$pkg4price = 0;
while ($row = mysqli_fetch_assoc($result)) 
{
	foreach($_SESSION['pkg4'] as $key=>$value)
	{	
		if ($value == $row['map_name']) 
		{
			$pkg4price+=$row['map_price'];
		}
	}
}
if (isset($_POST['btnalt2'])) {
	$selectedpkg = $_SESSION['packageselected'];
	$specified = $_POST['customspecifytxtarea'];
	if ($selectedpkg == 1) {
		$paint = $_POST['modpaintselect'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $pkg1price);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 2) {
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $pkg2price);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 3) {
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $pkg3price);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == "custom") {

		$specified = $_POST['customspecifytxtarea'];
		$selectedpkg = $_SESSION['packageselected'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $pkg4price);
		header("Location: ../addresscon.php");
		// echo $pkg4price;
	}
}