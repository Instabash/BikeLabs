<?php
session_start();

include_once 'dbh.inc.php';
include_once 'constants.inc.php';
if (isset($_POST['images'])) 
{
	$ad_id = $_GET['adid'];
	$Condition = $_POST['bkcondition'];
	$Make = $_POST['bkmake'];
	$CountryReg = $_POST['bkcountryregion'];

	if ($Condition == "0") {
		$Condition = "";
	}
	if ($Make == "0") {
		$Make = "";
	}
	if ($CountryReg == "0") {
		$CountryReg = "";
	}

	//----------------constant checking-------------//
	$object = new constantsinc();

	$accConds = $object ->bikeConds;
	$accMakes = $object ->bikeMakes;
	$accCountry = $object ->addCountry;
	
	if (!in_array($Condition, $accConds)) 
	{
	    echo json_encode(8);
		exit();
	}
	elseif (!in_array($Make, $accMakes)) 
	{
	    echo json_encode(9);
		exit();
	}
	elseif (!in_array($CountryReg, $accCountry)) 
	{
	   	echo json_encode(10);
		exit();
	}
	//----------------constant checking-------------//

	$Year = $_POST['bkyear'];
	$Description = $_POST['bkdescription'];
	$Price = $_POST['bkprice'];
	$HomeName = $_POST['bkhomename'];
	$PostCode = $_POST['bkpcode'];
	$Phone = $_POST['bkphone'];

	$ad_type = "bike";
	$ad_date = date('Y-m-d H:i:s');
	$user = $_SESSION['userId'];
	
	if (empty($Condition) || empty($Description) || empty($Price) || empty($HomeName) || empty($PostCode) || empty($CountryReg) || empty($Phone) || empty($Make) || empty($Year))
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
	elseif (!preg_match("/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/", $Phone)) {
		echo json_encode(4);
		exit();
	}
	elseif (!preg_match("/^\\d{5}$/", $PostCode)) {
		echo json_encode(5);
		exit();
	}
	else
	{
		if (empty(json_decode($_POST['images']))) {
			echo json_encode(6);
			exit();
		}
		else
		{
			$sql = "UPDATE post_ad SET ad_price=?, ad_description=?, ad_condition=?, ad_user_hname=?, ad_user_pcode=?, ad_user_country=?, ad_user_phone=?, bike_make=?, bike_year=? WHERE ad_id = ?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) 
			{
				echo "SQL statement failed";
				exit();
			}	
			else
			{
				mysqli_stmt_bind_param($stmt, "ssssssssss", $Price, $Description, $Condition, $HomeName, $PostCode, $CountryReg, $Phone, $Make, $Year, $ad_id);
				mysqli_stmt_execute($stmt);
			}
			
			$delimage = "DELETE FROM post_ad_images WHERE ad_id = ?;";
			if (!mysqli_stmt_prepare($stmt, $delimage)) 
			{
				echo "SQL statement failed";
				exit();
			}	
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $ad_id);
				mysqli_stmt_execute($stmt);
			}
			for($i=0;$i<count(json_decode($_POST['images']));$i++)
			{
				$j = json_decode($_POST['images'], true);
				$fileName = $j[$i]['FileName'];
				$fileSize =  $j[$i]['FileSizeInBytes'];
				$ArrayType = $j[$i]['ArrayType'];
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

						$sql = "SELECT * FROM post_ad";

						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "SQL statement failed";
							exit();
						}
						else
						{
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);
							$rowCount = mysqli_num_rows($result);
							$setImageOrder = $rowCount + 1;

							$sqlimage = "INSERT INTO post_ad_images (ad_id, ad_image_name, ad_image_thumb) VALUES (?, ?, ?)";
							if (!mysqli_stmt_prepare($stmt, $sqlimage)) 
							{
								echo "SQL statement failed";
								exit();
							}	
							else
							{
								mysqli_stmt_bind_param($stmt, "sss", $ad_id, $fileNameNew, $thumbnail);
								mysqli_stmt_execute($stmt);
								file_put_contents($fileDestination, base64_decode($j[$i]['Content']));
							}
						}
					}
					else
					{
						continue;
					}
				}
				else
				{
					continue;
				}
			}
		}
		echo json_encode(7);
		exit();
	}
}
?>