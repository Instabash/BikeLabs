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

		$spec1 = $specrow['bike_name'];
		$spec2 = $specrow['bike_model'];
		$spec3 = $specrow['bike_type'];
		$spec5 = $specrow['bike_price'];
		$spec6 = $specrow['bike_desc'];

		$_SESSION['spec1'] = $spec1;
		$_SESSION['spec2'] = $spec2;
		$_SESSION['spec3'] = $spec3;
		$_SESSION['spec5'] = $spec5;
		$_SESSION['spec6'] = $spec6;

		$_SESSION['imagename'] = $imageName;


		
		header('Location: ../modification.php?form=filled');

		exit();

	}
}