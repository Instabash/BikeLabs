<?php
include 'dbh.inc.php';
if (isset($_POST['mksold'])) {
	$part_id = $_GET['ad_id'];

	$sql = "DELETE FROM post_ad_images WHERE ad_id = ?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
		echo "SQL statement failed";
	}	
	else
	{	
		mysqli_stmt_bind_param($stmt, "s", $part_id);
		mysqli_stmt_execute($stmt);
		$sql = "DELETE FROM post_ad WHERE ad_id = ?;";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{	
			mysqli_stmt_bind_param($stmt, "s", $part_id);
			mysqli_stmt_execute($stmt);
			header("Location: ../pages/user/user-ads.php?success");
		}
	}
}
elseif (isset($_POST['remove-bike'])) {
	$part_id = $_GET['part_id'];
	$sqlimg = "DELETE FROM b_images WHERE bike_id = ?;";
	
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sqlimg)) 
	{
		header("Location: ../pages/admin/admin-bike-parts.php?error=sqlerror");
		exit();
	}
	else
	{	
		mysqli_stmt_bind_param($stmt, "s", $part_id);
		mysqli_stmt_execute($stmt);

		$sql = "DELETE FROM bikespecs WHERE bike_id = ?;";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{	
			mysqli_stmt_bind_param($stmt, "s", $part_id);
			mysqli_stmt_execute($stmt);
			$sql = "DELETE FROM bikes WHERE bike_id = ?;";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) 
			{
				echo "SQL statement failed";
			}	
			else
			{	
				mysqli_stmt_bind_param($stmt, "s", $part_id);
				mysqli_stmt_execute($stmt);
				header("Location: ../pages/admin/admin-bike-parts.php?success");
			}
			
		}
	}
}
elseif (isset($_POST['remove-part'])) {
	$part_id = $_GET['part_id'];
	$sqlimg = "DELETE FROM spare_part_images WHERE part_id = ?;";
	
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sqlimg)) 
	{
		header("Location: ../pages/admin/admin-bike-parts.php?error=sqlerror");
		exit();
	}
	else
	{	
		mysqli_stmt_bind_param($stmt, "s", $part_id);
		mysqli_stmt_execute($stmt);

		$sql = "DELETE FROM spare_parts WHERE part_id = ?;";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			echo "SQL statement failed";
		}	
		else
		{	
			mysqli_stmt_bind_param($stmt, "s", $part_id);
			mysqli_stmt_execute($stmt);
			header("Location: ../pages/admin/admin-bike-parts.php?success");
		}
	}
}