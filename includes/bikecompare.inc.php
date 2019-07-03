<?php
include_once 'dbh.inc.php';
session_start();
unset($_SESSION['bikespecs']);
if (isset($_POST['cmpsubmit'])) {
	
	$Bike1Make = trim($_POST['category2']);
	$Bike1Model = trim($_POST['choices2']);
	$Bike2Make = trim($_POST['category']);
	$Bike2Model = trim($_POST['choices']);
	$currentid = $_POST['currentid'];
	// echo $Bike1Make;
	// echo $Bike1Model;
	// echo $Bike2Make;
	// echo $Bike2Model;
	// $sql = "SELECT * FROM bikes WHERE bike_brand IN ('$Bike1Make', '$Bike2Make') AND bike_model IN ('$Bike1Model', '$Bike2Model');";
	$sqlbike1 = "SELECT * FROM bikes WHERE bike_id = $currentid;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sqlbike1)) 
	{
		echo "SQL statement failed";
	}
	else
	{
		$arraybike = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while($row = mysqli_fetch_assoc($result)) {
			$bike1_id = $row['bike_id'];
			// $results[] = $row['bike_id'];
			// $arraystring = "bike1=" . $results[0] . "&bike2=" . $results[1];
			// header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			
		}
	}	
	$sqlbike2 = "SELECT * FROM bikes WHERE bike_brand = '$Bike2Make' AND bike_model = '$Bike2Model';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sqlbike2)) 
	{
		echo "SQL statement failed";
	}
	else
	{
		$arraybike = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while($row = mysqli_fetch_assoc($result)) {
			$bike2_id = $row['bike_id'];
			// $results[] = $row['bike_id'];
			// $arraystring = "bike1=" . $results[0] . "&bike2=" . $results[1];
			// header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			
		}
	}
	if ($bike1_id == 0 || $bike2_id == 0) {
		// if ($bike1_id == 0) {
		// 	$bikeid = $bike2_id;
		// }
		// elseif ($bike2_id == 0) {
		// 	$bikeid = $bike1_id;
		// }

		header("Location: ../pages/new-bikes/new-bikes.php?bikeid=".$currentid."");
	}
	else{
		// echo $bike1_id;
		// echo $bike2_id;
		echo $arraystring = "bike1=" . $bike1_id . "&bike2=" . $bike2_id;
		header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			
	}
	// echo $bike1_id;
	// echo "\n";
	// echo $bike2_id;
	
}
elseif (isset($_POST['cmpsubmit2'])) {
	$Bike1Make = trim($_POST['category2']);
	$Bike1Model = trim($_POST['choices2']);
	$Bike2Make = trim($_POST['category']);
	$Bike2Model = trim($_POST['choices']);

	$sqlbike1 = "SELECT * FROM bikes WHERE bike_brand = '$Bike1Make' AND bike_model = '$Bike1Model';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sqlbike1)) 
	{
		echo "SQL statement failed";
	}
	else
	{
		$arraybike = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while($row = mysqli_fetch_assoc($result)) {
			$bike1_id = $row['bike_id'];
		}
	}
	$sqlbike2 = "SELECT * FROM bikes WHERE bike_brand = '$Bike2Make' AND bike_model = '$Bike2Model';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sqlbike2)) 
	{
		echo "SQL statement failed";
	}
	else
	{
		$arraybike = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while($row = mysqli_fetch_assoc($result)) {
			$bike2_id = $row['bike_id'];	
		}
	}
	if ($bike1_id == 0 || $bike2_id == 0) {
		header("Location: ../pages/new-bikes/bikecompare.php?error");
	}
	elseif ($bike1_id == $bike2_id) {
		header("Location: ../pages/new-bikes/bikecompare.php?error=same");
	}
	else{
		echo $arraystring = "bike1=" . $bike1_id . "&bike2=" . $bike2_id;
		header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			
	}
	echo $bike1_id;
	echo $bike2_id;
}
