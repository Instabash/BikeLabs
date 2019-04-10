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
		}
		$_SESSION['modcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'description' => $specified,
			'price' => $price,
			'default_img' => $default_img);
		
		// print_r($_SESSION['modcart']);
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
		}
		$_SESSION['modcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'theme' => $theme,
			'description' => $specified,
			'price' => $price,
			'default_img' => $default_img);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == "custom") {
		$removeJCPrice = 700;
		$reflectorPrice = 1200;
		$hidprice = 2000;
		$removeMudgPrice = 700;
		$shortmeterPrice = 900; 
		$removehlightPrice = 700;
		$bodypaintPrice = 2300;
		$themePrice = 4000;

		$priceSum = 0;

		foreach($_SESSION['pkg4'] as $key=>$value)
		{	
			 // echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
			if ($value == "Remove jump cover") {
				$priceSum+=$removeJCPrice;
			}
			if ($value == "Reflectors") {
				$priceSum+=$reflectorPrice;
			}
			if ($value == "HID Lights") {
				$priceSum+=$hidprice;
			}
			if ($value == "Remove mudguard") {
				$priceSum+=$removeMudgPrice;
			}
			if ($value == "Short meter") {
				$priceSum+=$shortmeterPrice;
			}	
			if ($value == "Remove headlight holders") {
				$priceSum+=$removehlightPrice;
			}
			if ($value == "Body paint (User defined)") {
				$priceSum+=$bodypaintPrice;
			}
			if ($value == "Add theme (User defined)") {
				$priceSum+=$themePrice;
			}
		}
		// echo $priceSum;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		$specified = $_POST['customspecifytxtarea'];
		$selectedpkg = $_SESSION['packageselected'];
		$_SESSION['modcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'paint' => $paint,
			'theme' => $theme,
			'description' => $specified,
			'price' => $priceSum,
			'default_img' => $default_img);
		header("Location: ../addresscon.php");
	}
}