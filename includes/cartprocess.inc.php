<?php
include_once 'dbh.inc.php';
session_start();

if(isset($_POST['cartBtn-bikes']))
{
	$bike_id = $_GET["bikeid"];

	// echo $bike_id;
	$sql = "SELECT * FROM bikes WHERE bike_id='$bike_id'";

	$result = mysqli_query($conn, $sql);
	$stmt = mysqli_stmt_init($conn);

	$imgnamesql = "SELECT bike_image_name FROM b_images WHERE bike_id = {$_GET["bikeid"]} AND bike_image_thumb = '0';";

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
			$default_img = $row1['bike_image_name'];
		}			
	}

	if($row = mysqli_fetch_assoc($result))
	{
		$title = $row['bike_name'];
		$price = $row['bike_price'];
	}
	// echo $title;
	$_SESSION['cart'][] = array(
		'product_id' => $bike_id,
		'title' => $title,
		'price' => $price,
		'default_img' => $default_img);
	header("Location: ../cart.php?bikeid=$bike_id");
}

elseif (isset($_POST['buyBtn-bikes'])) {
	if(!empty($_POST["quant"])) {
		$quantity = $_POST["quant"];
		$part_id = $_GET["partid"];
		$sql = "SELECT * FROM post_ad WHERE ad_id='$part_id'";
		$result = mysqli_query($conn, $sql);
		$stmt = mysqli_stmt_init($conn);
		$imgnamesql = "SELECT ad_image_name FROM post_ad_images WHERE ad_id = {$_GET["partid"]} AND ad_image_thumb = '0';";

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

		header("Location: ../addresscon.php?partid=$part_id");
	}
}

elseif(isset($_POST['cartBtn-parts']))
{
	if(!empty($_POST["quant"])) {
		$quantity = $_POST["quant"];
		$part_id = $_GET["partid"];
		$sql = "SELECT * FROM post_ad WHERE ad_id='$part_id'";
		$result = mysqli_query($conn, $sql);
		$stmt = mysqli_stmt_init($conn);
		$imgnamesql = "SELECT ad_image_name FROM post_ad_images WHERE ad_id = {$_GET["partid"]} AND ad_image_thumb = '0';";

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
}

elseif (isset($_POST['buyBtn-parts'])) {
	if(!empty($_POST["quant"])) {
		$quantity = $_POST["quant"];
		$part_id = $_GET["partid"];
		$sql = "SELECT * FROM post_ad WHERE ad_id='$part_id'";
		$result = mysqli_query($conn, $sql);
		$stmt = mysqli_stmt_init($conn);
		$imgnamesql = "SELECT ad_image_name FROM post_ad_images WHERE ad_id = {$_GET["partid"]} AND ad_image_thumb = '0';";

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

		header("Location: ../addresscon.php?partid=$part_id");
	}
}

if (isset($_POST['removeItem'])) {
	foreach($_SESSION['cart'] as $key => $item) {
		if ($_GET["partid"] == $item['product_id']) {
			unset($_SESSION["cart"][$key]);	
		}
		header("Location: ../cart.php?$cartId");
	}
}


