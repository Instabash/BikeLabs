<?php
	// if (isset($_POST['spsubmit'])) {

	// 	$Title = $_POST['sptitle'];
	// 	$Condition = $_POST['spcondition'];
	// 	$Description = $_POST['spdescription'];
	// 	$Price = $_POST['spprice'];
	// 	$HomeName = $_POST['sphomename'];
	// 	$PostCode = $_POST['sppcode'];
	// 	$CountryReg = $_POST['spcountryregion'];
	// 	$Phone = $_POST['spphone'];

	// 	$file = $_FILES['files[]'];

	// 	$fileName = $file['name'];
	// 	$fileTmpName = $file['tmp_name'];
	// 	$fileSize = $file['size'];
	// 	$fileError = $file['error'];
	// 	$fileType = $file['type'];

	// 	$fileExt = explode('.', $fileName);
	// 	$fileActualExt = strtolower(end($fileExt));

	// 	$allowed = array('jpg', 'jpeg', 'png');

	// 	if (in_array($fileActualExt, $allowed)) {
	// 		if ($fileError === 0) {
	// 			if ($fileSize < 10000) {
	// 				$fileNameNew = uniqid('', true).'.'.$fileActualExt;
	// 				$fileDestination = 'images/sparepartimg' . $fileNameNew;
	// 				if (empty($Title) || empty($Condition) || empty($Description) || empty($Price) || empty($HomeName) || empty($PostCode) || empty($CountryReg) || empty($Phone))
	// 				{
	// 					header("Location: ../postad.php?error=empty");
	// 					exit();
	// 				}
	// 				else
	// 				{
	// 					$sql = "INSERT INTO ";
	// 				}
	// 				// move_uploaded_file($fileTmpName, $fileDestination);
	// 				// header("Location: ../index.php?uploadsuccess");
	// 			}
	// 			else
	// 			{
	// 				echo "Your file is too big";
	// 			}
	// 		}
	// 		else {
	// 			echo "There was an error uploading your file";
	// 		}
	// 	}
	// 	else
	// 	{
	// 		echo "You cannot upload files of this type";

	// 	}
	// }
?>
























<!-- <?php

//include_once 'dbh.inc.php';

$spaartsql //= "SELECT * FROM spare_parts";
$spartresult// = mysqli_query($conn, $spaartsql);
$resultcheck //= mysqli_num_rows($spartresult);
$spartIdarray //= array();
$spartNamearray //= array();
$spartDescarray //= array();
$spartPricearray //= array();
$spartCatarray// = array();
$spartTypearray //= array();

//if($resultcheck > 0)
{
	//while ($row = mysqli_fetch_assoc($spartresult))
	{
	//	$spartIdarray[] = $row['part_id'];
	//	$spartNamearray[] = $row['part_name'];
	//	$spartDescarray[] = $row['part_desc'];
	//	$spartPricearray[] = $row['part_price'];
	//	$spartCatarray[] = $row['part_category'];
	//	$spartTypearray[] = $row['part_type'];
//
		$postid = $spartIdarray;
		$postname = $spartNamearray;
		$postdesc = $spartDescarray;
		$postprice = $spartPricearray;
		$postcat = $spartCatarray;
		$posttype = $spartTypearray; 	
	}
	
	
}


?> -->
<!-- 
for ($i=0; $i < count($spartIdarray); $i++) { 
		echo $postid[$i]."<br>";
		echo $postname[$i]."<br>";
		echo $postdesc[$i]."<br>";
		echo $postprice[$i]."<br>";
		echo $postcat[$i]."<br>";
		echo $posttype[$i]."<br>";
	} -->