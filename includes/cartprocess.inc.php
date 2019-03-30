<?php
include_once 'dbh.inc.php';
session_start();
if(!empty($_POST["quant"])) {
	$quantity = $_POST["quant"];
	$part_id = $_GET["partid"];
	$sql = "SELECT * FROM post_ad WHERE ad_id='$part_id'";
	$result = mysqli_query($conn, $sql);
	$stmt = mysqli_stmt_init($conn);
	$imgnamesql = "SELECT ad_image_name FROM post_ad_images WHERE ad_id = {$_GET["partid"]};";

	if(!mysqli_stmt_prepare($stmt, $imgnamesql))
	{
		echo "SQL statement failed";
	}
	else
	{
		mysqli_stmt_execute($stmt);
		$result1 = mysqli_stmt_get_result($stmt);

		while ($row1 = mysqli_fetch_assoc($result1)) 
		{
			$default_img = $row1['ad_image_name'];
		}			
	}

	if($row = mysqli_fetch_assoc($result))
	{
		$title = $row['ad_title'];
		$price = $row['ad_price'];
	}

	$_SESSION['cart'][] = array(
		'product_id' => $part_id,
		'title' => $title,
		'price' => $price,
		'default_img' => $default_img,
		'quantity' => $quantity);

	header("Location: ../cart.php?partid=$part_id");
	}