<?php
session_start();

include_once 'dbh.inc.php';
if (isset($_POST['images'])) 
{
	$Title = $_POST['sptitle'];
	$Description = $_POST['spdescription'];
	$Price = $_POST['spprice'];
	$user = $_SESSION['userId'];

	if (empty($Title) || empty($Description) || empty($Price))
	{
		echo json_encode(0);
		exit();
	}
	elseif (strlen($Description) < 20) 
	{
		echo json_encode(1);
		exit();
	}
	elseif ($Price > 1000000 || $Price < 50) 
	{
		echo json_encode(2);
		exit();
	}
	else{
		$sql = "INSERT INTO spare_parts (part_name, part_description, part_price, idUsers) VALUES (?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{
			mysqli_stmt_bind_param($stmt, "ssss", $Title, $Description, $Price, $user);
			mysqli_stmt_execute($stmt);
			$sp_id = $conn->insert_id;
		}

		if (empty(json_decode($_POST['images']))) 
		{
			echo json_encode(3);
			exit();
		}
		else
		{
			for($i=0;$i<count(json_decode($_POST['images']));$i++){
				$j = json_decode($_POST['images'], true);
				$fileName = $j[$i]['FileName'];
				$fileSize =  $j[$i]['FileSizeInBytes'];
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

							$sqlimage = "INSERT INTO spare_part_images (part_id, part_image_name, part_image_thumb) VALUES (?, ?, ?)";
							if (!mysqli_stmt_prepare($stmt, $sqlimage)) 
							{
								echo "SQL statement failed";
							}	
							else
							{
								mysqli_stmt_bind_param($stmt, "sss", $sp_id, $fileNameNew, $thumbnail);
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
		echo json_encode(4);
		exit();
	}
}
?>