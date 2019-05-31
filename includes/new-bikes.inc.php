<?php
session_start();

include_once 'dbh.inc.php';
if (isset($_POST['images'])) 
{
	// $Title = $_POST['bktitle'];
	$Brand = $_POST['bkbrand'];
	$Model = $_POST['bkmodel'];
	$Year = $_POST['bkyear'];

	if ($Brand == "0") {
		$Brand = "";
	}
	if ($Model == "0") {
		$Model = "";
	}

	$EngineType = $_POST['bkengine'];
	$BoreStroke = $_POST['bkborestroke'];
	$Transmission = $_POST['bktrans'];
	$Starting = $_POST['bkstart'];
	$Frame = $_POST['bkframe'];
	$Dimensions = $_POST['bkdim'];
	$PetrolCap = $_POST['bkpetcap'];
	$TyreFront = $_POST['bkftyre'];
	$TyreBack = $_POST['bkbtyre'];
	$DryWeight = $_POST['bkdweight'];

	$Description = $_POST['bkdescription'];
	$Price = $_POST['bkprice'];
	$user = $_SESSION['userId'];
	

	if (empty($Brand) || empty($Model) || empty($Year) || empty($EngineType) || empty($BoreStroke) || empty($Transmission) || empty($Starting) || empty($Frame) || empty($Dimensions) || empty($PetrolCap) || empty($TyreFront) || empty($TyreBack) || empty($DryWeight) || empty($Description) || empty($Price)) 
	{
		echo json_encode(0);
		exit();
	}
	elseif($Year < 1900 || $Year > date("Y"))
	{
		echo json_encode(1);
		exit();
	}
	elseif (strlen($Description)<20) 
	{
		echo json_encode(2);
		exit();
	}
	elseif ($Price > 5000000 || $Price < 5000) 
	{
		echo json_encode(3);
		exit();
	}
	else
	{
		$sql = "INSERT INTO bikes (bike_brand, bike_model, bikeyear, bike_price, bike_desc, idUsers) VALUES (?, ?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{
			mysqli_stmt_bind_param($stmt, "ssssss", $Brand, $Model, $Year, $Price, $Description, $user);
			mysqli_stmt_execute($stmt);
			$bk_id = $conn->insert_id;
			$sql2 = "INSERT INTO bikespecs (bike_engine_type, bike_bore_stroke, bike_transmission, bike_starting, bike_frame, bike_dimensions, bike_petrol_cap, bike_f_tyre, bike_b_tyre, bike_dry_weight, bike_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
			if (!mysqli_stmt_prepare($stmt, $sql2)) 
			{
				echo "SQL statement failed";
			}	
			else
			{
				mysqli_stmt_bind_param($stmt, "sssssssssss", $EngineType, $BoreStroke, $Transmission, $Starting, $Frame, $Dimensions, $PetrolCap, $TyreFront, $TyreBack, $DryWeight, $bk_id);
				mysqli_stmt_execute($stmt);
			}
		}

		for($i=0;$i<count(json_decode($_POST['images']));$i++){
			$j = json_decode($_POST['images']);

			$fileName = $j[$i]->FileName;
			$fileSize =  $j[$i]->FileSizeInBytes;

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));
			$allowed = array('jpg', 'jpeg', 'png');	

			$thumbnail = $i;
			if (in_array($fileActualExt, $allowed)) 
			{
				if ($fileSize < 5000000) 
				{
					$fileNameNew = uniqid('', true).'.'.$fileActualExt;
					$fileDestination = '../images/sparepartimg/' . $fileNameNew;

					$sql = "SELECT * FROM spare_parts";

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement failed";
					}
					else
					{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

						$sqlimage = "INSERT INTO b_images (bike_id, bike_image_name, bike_image_thumb) VALUES (?, ?, ?)";
						if (!mysqli_stmt_prepare($stmt, $sqlimage)) 
						{
							echo "SQL statement failed";
						}	
						else
						{
							mysqli_stmt_bind_param($stmt, "sss", $bk_id, $fileNameNew, $thumbnail);
							mysqli_stmt_execute($stmt);
							file_put_contents($fileDestination, base64_decode($j[$i]->Content));
						}
					}
				}
				else
				{
					echo "Your file is too big";
				}
			}
			else
			{
				echo "You cannot upload files of this type";

			}
		}
		echo json_encode(4);
		exit();
	}
}
?>