<?php
include_once 'dbh.inc.php';
session_start();
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
			// $bike_id = $row['bike_id'];
			// $arraybike = array();
			// array_push($arraybike, $bike_id);
			$arraystring = "bike1=" . $results[0] . "&bike2=" . $results[1];
			// print_r($arraybike);

			$sql2 = "SELECT * FROM bikespecs WHERE bike_id = {$row['bike_id']};";

			if(!mysqli_stmt_prepare($stmt, $sql2))
			{
				echo "SQL statement failed";
			}
			else
			{
				mysqli_stmt_execute($stmt);
				$result1 = mysqli_stmt_get_result($stmt);

				while($row1 = mysqli_fetch_assoc($result1)) 
				{
					$eng_type = $row1['bike_engine_type'];
					$bore_str = $row1['bike_bore_stroke'];
					$trans = $row1['bike_transmission'];
					$starting = $row1['bike_starting'];
					$frame = $row1['bike_frame'];
					$dimensions = $row1['bike_dimensions'];
					$petrol_cap = $row1['bike_petrol_cap'];
					$f_tyre = $row1['bike_f_tyre'];
					$b_tyre = $row1['bike_b_tyre'];
					$dry_weight = $row1['bike_dry_weight'];
				}
				$_SESSION['bikespecs']['bike_id']= array(
					'bike_id' => $bike_id, 
					'eng_type' => $eng_type,
					'bore_str' => $bore_str,
					'trans' => $trans,
					'starting' => $starting,
					'frame' => $frame,
					'dimensions' => $dimensions,
					'petrol_cap' => $petrol_cap,
					'f_tyre' => $f_tyre,
					'b_tyre' => $b_tyre,
					'dry_weight' => $dry_weight);
				header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			
			}
		}	
	}
}

// $bike_id = $row['bike_id'];
// $arraybike = array();
// array_push($arraybike, $bike_id);
// $arraystring = "bike1=" . $arraybike[0] . "&bike2=" . $arraybike[1];

// $eng_type = $row1['bike_engine_type'];
// $bore_str = $row1['bike_bore_stroke'];
// $trans = $row1['bike_transmission'];
// $starting = $row1['bike_starting'];
// $frame = $row1['bike_frame'];
// $dimensions = $row1['bike_dimensions'];
// $petrol_cap = $row1['bike_petrol_cap'];
// $f_tyre = $row1['bike_f_tyre'];
// $b_tyre = $row1['bike_b_tyre'];
// $dry_weight = $row1['bike_dry_weight'];
// 					// echo $row1['bike_engine_type'];

// $_SESSION['bikespecs'][$bike_id]= array(
// 	'eng_type' => $eng_type,
// 	'bore_str' => $bore_str,
// 	'trans' => $trans,
// 	'starting' => $starting,
// 	'frame' => $frame,
// 	'dimensions' => $dimensions,
// 	'petrol_cap' => $petrol_cap,
// 	'f_tyre' => $f_tyre,
// 	'b_tyre' => $b_tyre,
// 	'dry_weight' => $dry_weight);
// 					// print_r($_SESSION['bikespecs']);
// echo $arraystring;
// header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			





// $bike_id = $row['bike_id'];
// 			$arraybike = array();
// 			array_push($arraybike, $bike_id);
// 			// $arraystring = "bike1=" . $arraybike[0] . "&bike2=" . $arraybike[1];
// 			print_r($arraybike);

// 			$sql2 = "SELECT * FROM bikespecs WHERE bike_id = {$row['bike_id']};";

// 			if(!mysqli_stmt_prepare($stmt, $sql2))
// 			{
// 				echo "SQL statement failed";
// 			}
// 			else
// 			{
// 				mysqli_stmt_execute($stmt);
// 				$result1 = mysqli_stmt_get_result($stmt);

// 				while($row1 = mysqli_fetch_assoc($result1)) 
// 				{
// 					$eng_type = $row1['bike_engine_type'];
// 					$bore_str = $row1['bike_bore_stroke'];
// 					$trans = $row1['bike_transmission'];
// 					$starting = $row1['bike_starting'];
// 					$frame = $row1['bike_frame'];
// 					$dimensions = $row1['bike_dimensions'];
// 					$petrol_cap = $row1['bike_petrol_cap'];
// 					$f_tyre = $row1['bike_f_tyre'];
// 					$b_tyre = $row1['bike_b_tyre'];
// 					$dry_weight = $row1['bike_dry_weight'];
// 				}
// 				$_SESSION['bikespecs'][$bike_id]= array(
// 					'eng_type' => $eng_type,
// 					'bore_str' => $bore_str,
// 					'trans' => $trans,
// 					'starting' => $starting,
// 					'frame' => $frame,
// 					'dimensions' => $dimensions,
// 					'petrol_cap' => $petrol_cap,
// 					'f_tyre' => $f_tyre,
// 					'b_tyre' => $b_tyre,
// 					'dry_weight' => $dry_weight);
				// header("Location: ../pages/new-bikes/bikecompare/comparetemp.php?$arraystring");			