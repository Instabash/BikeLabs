<?php
include 'dbh.inc.php';
if (isset($_POST['mksold'])) {
	$part_id = $_GET['partid'];

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

		$sqlimg = "DELETE FROM post_ad_images WHERE "
	}
}