<?php
session_start();
unset($_SESSION['modcart']);
if (isset($_POST['btnmod2'])) {
	$default_img = "modcartimg.png";
	$selectedpkg = $_SESSION['packageselected'];
	$specified = $_POST['customspecifytxtarea'];
	if ($selectedpkg == 1) {
		$price = 3000;
		$paint = $_POST['modpaintselect'];
		if (isset($_POST['select2'])) 
		{
			$ctmpts = array();
			foreach ($_POST['select2'] as $selectedOption)
			{
				$ctmpts[] = $selectedOption;
			}
		$_SESSION['modcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'description' => $specified,
			'ctmpts' => $ctmpts,
			'price' => $price,
			'default_img' => $default_img);
		}
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 2) {
		$price = 5000;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		if (isset($_POST['select2'])) 
		{
			$ctmpts = array();
			foreach ($_POST['select2'] as $selectedOption)
			{
				$ctmpts[] = $selectedOption;
			}
		$_SESSION['modcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'theme' => $theme,
			'description' => $specified,
			'ctmpts' => $ctmpts,
			'price' => $price,
			'default_img' => $default_img);
		}
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 3) {
		$price = 8000;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		$specified = $_POST['customspecifytxtarea'];
		$selectedpkg = $_SESSION['packageselected'];
		$_SESSION['modcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'theme' => $theme,
			'description' => $specified,
			'price' => $price,
			'default_img' => $default_img);
		header("Location: ../addresscon.php");
	}
}