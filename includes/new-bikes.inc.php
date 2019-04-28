<?php
session_start();

include_once 'dbh.inc.php';
if (isset($_POST['images'])) 
{
	$Title = $_POST['bktitle'];
	$Brand = $_POST['bkbrand'];
	$Model = $_POST['bkmodel'];
	$Year = $_POST['bkyear'];
	$Description = $_POST['bkdescription'];
	$Price = $_POST['bkprice'];
	$user = $_SESSION['userId'];
	
	$sql = "INSERT INTO bikes (bike_name, bike_brand, bike_model, bikeyear, bike_price, bike_desc, idUsers) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
		echo "SQL statement failed";
	}	
	else
	{
		mysqli_stmt_bind_param($stmt, "sssssss", $Title, $Brand, $Model, $Year, $Price, $Description, $user);
		mysqli_stmt_execute($stmt);
		$bk_id = $conn->insert_id;
	}

	for($i=0;$i<count(json_decode($_POST['images']));$i++){
		$j = json_decode($_POST['images']);

		$fileName = $j[$i]->FileName;
		//$fileTmpName = $_FILES["files"]["tmp_name"][$i];
		$fileSize =  $j[$i]->FileSizeInBytes;
		//$fileError = $_FILES["files"]['error'][$i];
		//$fileType = $_FILES["files"]['type'][$i];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');	

		$thumbnail = $i;

		// if (empty($Title) || empty($Condition) || empty($Description) || empty($Price) || empty($HomeName) || empty($PostCode) || empty($CountryReg) || empty($Phone))
		// {
		// 	header("Location: ../postad.php?error=empty");
		// 	exit();
		// }
		// else
		// {
			if (in_array($fileActualExt, $allowed)) 
			{
				// if ($fileError === 0) 
				// {
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
								// move_uploaded_file($fileTmpName, $fileDestination);
								header("Location: /BikeLabs/pages/admin/admin-bikes.php?success");
										// print_r($ad_date);	
							}
						}
					}
					else
					{
						echo "Your file is too big";
					}
				// }
				// else 
				// {
				// 	echo "There was an error uploading your file";
				// }
			}
			else
			{
				echo "You cannot upload files of this type";

			}
		// }
	}
}
?>