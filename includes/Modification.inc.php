<?php
// session_start();
	
	include_once 'dbh.inc.php';
	$model = $_POST['model'];  
	$year = $_POST['year'];
	
	
		$imagesql = "SELECT bike_img_name FROM b_images WHERE bikemodel='$model' AND bikeyear = '$year'";
		$specssql = "SELECT * FROM bikes WHERE bike_model = '$model' AND bikeyear = '$year'";

		$imgresult = mysqli_query($conn, $imagesql);
		$specresult = mysqli_query($conn, $specssql);

		$imgrow = mysqli_fetch_assoc($imgresult);
		$specrow = mysqli_fetch_assoc($specresult);

		$imageName = $imgrow['bike_img_name'];

		$spec1 = $specrow['bike_name'];
		$spec2 = $specrow['bike_model'];
		$spec3 = $specrow['bike_type'];
		$spec5 = $specrow['bike_price'];
		$spec6 = $specrow['bike_desc'];
?>
