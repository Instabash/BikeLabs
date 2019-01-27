<?php
session_start();
if(isset($_POST['btnmod1']))
{
	include_once 'dbh.inc.php';
	$model = $_POST['modmodelselect'];
	$year = $_POST['modyearselect'];

	if($model == "Choose..." || $year == "Choose...")
	{
		header("Location: ../modification.php?form=empty");
		exit();
	}
	else{
		$imagesql = "SELECT bike_img_name FROM b_images WHERE bikemodel='$model' AND bikeyear = '$year'";
		$specssql = "SELECT * FROM bikes WHERE bike_model = '$model' AND bikeyear = '$year'";

		$imgresult = mysqli_query($conn, $imagesql);
		$specresult = mysqli_query($conn, $specssql);

		$imgrow = mysqli_fetch_assoc($imgresult);
		$specrow = mysqli_fetch_assoc($specresult);

		$imageName = $imgrow['bike_img_name'];

		$_SESSION['spec1'] = $specrow['bike_name'];
		$_SESSION['spec2'] = $specrow['bike_model'];
		$_SESSION['spec3'] = $specrow['bike_type'];
		$_SESSION['spec5'] = $specrow['bike_price'];
		$_SESSION['spec6'] = $specrow['bike_desc'];
		header("Location: ../modification.php");
		exit();

	}
}