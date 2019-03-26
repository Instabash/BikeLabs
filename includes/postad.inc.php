
	<!-- // if(isset($_POST['submit_image']))
	// {
	// 	for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
	// 	{
	// 		$uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
	// 		$folder="images/";
	// 		move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder".$_FILES["upload_file"]["name"][$i]);
	// 	}
	// 	exit();
	// }
-->
<?php
session_start();
include_once 'dbh.inc.php';
if (isset($_POST['spsubmit'])) 
{
	$Title = $_POST['sptitle'];
	$Condition = $_POST['spcondition'];
	$Description = $_POST['spdescription'];
	$Price = $_POST['spprice'];
	$HomeName = $_POST['sphomename'];
	$PostCode = $_POST['sppcode'];
	$CountryReg = $_POST['spcountryregion'];
	$Phone = $_POST['spphone'];
	$ad_type = "sparepart";
	$ad_date = date('Y-m-d H:i:s');
	$user = $_SESSION['userId'];
	
	$sql = "INSERT INTO post_ad (ad_title, ad_type, ad_date, ad_price, ad_description, idUsers, ad_condition, ad_user_hname, ad_user_pcode, ad_user_country, ad_user_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
		echo "SQL statement failed";
	}	
	else
	{
		mysqli_stmt_bind_param($stmt, "sssssssssss", $Title, $ad_type, $ad_date, $Price, $Description, $user, $Condition, $HomeName, $PostCode, $CountryReg, $Phone);
		mysqli_stmt_execute($stmt);
		$ad_id = $conn->insert_id;
	}

	for($i=0;$i<count($_FILES["files"]["name"]);$i++){

		$fileName = $_FILES["files"]['name'][$i];
		$fileTmpName = $_FILES["files"]["tmp_name"][$i];
		$fileSize = $_FILES["files"]['size'][$i];
		$fileError = $_FILES["files"]['error'][$i];
		$fileType = $_FILES["files"]['type'][$i];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');	

		if (empty($Title) || empty($Condition) || empty($Description) || empty($Price) || empty($HomeName) || empty($PostCode) || empty($CountryReg) || empty($Phone))
		{
			header("Location: ../postad.php?error=empty");
			exit();
		}
		else
		{
			if (in_array($fileActualExt, $allowed)) 
			{
				if ($fileError === 0) 
				{
					if ($fileSize < 500000) 
					{
						$fileNameNew = uniqid('', true).'.'.$fileActualExt;
						$fileDestination = '../images/sparepartimg/' . $fileNameNew;

						$sql = "SELECT * FROM post_ad";

						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "SQL statement failed";
						}
						else
						{
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);
							$rowCount = mysqli_num_rows($result);
							$setImageOrder = $rowCount + 1;

							$sqlimage = "INSERT INTO post_ad_images (ad_id, ad_image_name) VALUES (?, ?)";
							if (!mysqli_stmt_prepare($stmt, $sqlimage)) 
							{
								echo "SQL statement failed";
							}	
							else
							{
								mysqli_stmt_bind_param($stmt, "ss", $ad_id, $fileNameNew);
								mysqli_stmt_execute($stmt);
								move_uploaded_file($fileTmpName, $fileDestination);
								header("Location: ../postad.php?uploadsuccess");
										// print_r($ad_date);	
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
					echo "There was an error uploading your file";
				}
			}
			else
			{
				echo "You cannot upload files of this type";

			}
		}
	}
}
?>