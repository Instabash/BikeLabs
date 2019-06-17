<?php 
session_start();
include_once 'dbh.inc.php';

$user = $_SESSION['userId'];
$currtime = $timestamp = date('Y-m-d G:i:s');
if (isset($_POST['chat-btn'])) {
	
	$vendor = $_POST['vendor-id'];
	
	
	echo $vendor;
	// header("Location: ../pages/chat.php?usertoid=$userid&partid=$partid");
}

// if (isset($_POST['chatmsg'])) {
// 	$chatmsg = $_POST['chatmsg'];
// 	$usertoid = $_POST['usertoid'];
// 	$partid = $_POST['partid'];
// 	$sql = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, time_stamp, part_id) VALUES (?, ?, ?, ?, ?);";
// 	$test = 0;
// 	$stmt = mysqli_stmt_init($conn);
// 	if (!mysqli_stmt_prepare($stmt, $sql)) 
// 	{
// 		echo "SQL statement failed";
// 	}	
// 	else
// 	{
// 		mysqli_stmt_bind_param($stmt, "sssss", $usertoid , $user, $chatmsg, $currtime, $partid);
// 		echo $chatmsg;
// 		mysqli_stmt_execute($stmt);
// 		header("Location: ../pages/chat.php");
// 	}
// }

