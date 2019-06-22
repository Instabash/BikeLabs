<?php
session_start();
unset($_SESSION['altcart']);
if (isset($_POST['btnalt2'])) {
	$selectedpkg = $_SESSION['packageselected'];
	$specified = $_POST['customspecifytxtarea'];
	if ($selectedpkg == 1) {
		$price = 3000;
		$paint = $_POST['modpaintselect'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $price);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 2) {
		$price = 5000;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $price);
		
		header("Location: ../addresscon.php");
	}
	if ($selectedpkg == 3) {
		$price = 8000;
		$paint = $_POST['modpaintselect'];
		$theme = $_POST['modthemeselect'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $price);
		
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
			if ($value == "Chain Spocket") {
				$priceSum+=$removeJCPrice;
			}
			if ($value == "Carburetor") {
				$priceSum+=$reflectorPrice;
			}
			if ($value == "Silencer") {
				$priceSum+=$hidprice;
			}
			if ($value == "Remove filter pipe") {
				$priceSum+=$removeMudgPrice;
			}
			if ($value == "Piston") {
				$priceSum+=$shortmeterPrice;
			}	
			if ($value == "Weights") {
				$priceSum+=$removehlightPrice;
			}
			if ($value == "Head Cylinder") {
				$priceSum+=$bodypaintPrice;
			}
		}
		$specified = $_POST['customspecifytxtarea'];
		$selectedpkg = $_SESSION['packageselected'];
		$_SESSION['altcart'][] = array(
			'selectedpkg' => $selectedpkg,
			'description' => $specified,
			'price' => $priceSum);
		header("Location: ../addresscon.php");
	}
}