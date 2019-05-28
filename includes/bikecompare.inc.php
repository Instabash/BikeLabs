<?php
include_once 'dbh.inc.php';
session_start();
unset($_SESSION['bikespecs']);
if (isset($_POST['cmpsubmit'])) {
	
	$Bike1Make = $_POST['category'];
	$Bike1Model = $_POST['choices'];
	$Bike2Make = $_POST['category2'];
	$Bike2Model = $_POST['choices2'];

	$sql = "SELECT * FROM bikes WHERE bike_brand IN ('$Bike1Make', '$Bike2Make') AND bike_model IN ('$Bike1Model', '$Bike2Model');";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
		echo "SQL statement failed";
	}
	else
	{
		$arraybike = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while($row = mysqli_fetch_assoc($result)) {
			$bike_id = $row['bike_id'];
			$results[] = $row['bike_id'];
			$arraystring = "bike1=" . $results[0] . "&bike2=" . $results[1];
			header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			
		}
	}	
}