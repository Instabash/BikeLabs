<?php
session_start();
unset($_SESSION['altcart']);
if (isset($_POST['btnalt2'])) {
	$selectedpkg = $_SESSION['packageselected'];
	$specified = $_POST['customspecifytxtarea'];
	if ($selectedpkg == 1) {
		$price = 3000;
		$paint = $_POST['modpaintselect'];
		// if (isset($_POST['select2'])) 
		// {
		// 	$ctmpts = array();
		// 	foreach ($_POST['select2'] as $selectedOption)
		// 	{
		// 		$ctmpts[] = $selectedOption;
		// 	}
		// }
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'description' => $specified,
			'price' => $price);
		
		// print_r($_SESSION['modcart']);
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 2) {
		$price = 5000;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		// if (isset($_POST['select2'])) 
		// {
		// 	$ctmpts = array();
		// 	foreach ($_POST['select2'] as $selectedOption)
		// 	{
		// 		$ctmpts[] = $selectedOption;
		// 	}
		// }
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'theme' => $theme,
			'description' => $specified,
			'price' => $price);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 3) {
		$price = 8000;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		// if (isset($_POST['select2'])) 
		// {
		// 	$ctmpts = array();
		// 	foreach ($_POST['select2'] as $selectedOption)
		// 	{
		// 		$ctmpts[] = $selectedOption;
		// 	}
		// }
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'theme' => $theme,
			'description' => $specified,
			'price' => $price);
		
		header("Location: ../addresscon.php");
	}
}