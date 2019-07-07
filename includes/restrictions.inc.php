<?php

function logged_in(){	
	if(!isset($_SESSION['userUId']))
	{
		$current_page = $_SERVER['REQUEST_URI'];
		$_SESSION['curr_page'] = $current_page;	
		header("Location: /BikeLabs/LoginOrRegister.php");
		exit();
	}
}

function signup_restrict()
{
	if (isset($_SESSION['userUId'])) {
		header("Location: /BikeLabs/index.php");
		exit();
	}
}

function admin_protect(){
	$userId = $_SESSION['userId'];
	if (is_admin($userId) === false) {
		header("Location: /BikeLabs/index.php");
		exit();
	}
}

function is_admin($user_id)
{
	require 'dbh.inc.php';
	$user_id = (int)$user_id;
	$query = "SELECT * FROM users WHERE idUsers = ? AND User_type = 1";
	$stmt = mysqli_stmt_init($conn);
	// echo $user_id;
	if (!mysqli_stmt_prepare($stmt, $query)) 
	{
		header("Location: /BikeLabs/index.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if($resultCheck > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}

function user_protect(){
	$userId = $_SESSION['userId'];
	if (is_user($userId) === false) {
		header("Location: /BikeLabs/index.php");
		exit();
	}
}

function is_user($user_id)
{
	require 'dbh.inc.php';
	$user_id = (int)$user_id;
	$query = "SELECT * FROM users WHERE idUsers = ? AND User_type = 0";
	$stmt = mysqli_stmt_init($conn);
	// echo $user_id;
	if (!mysqli_stmt_prepare($stmt, $query)) 
	{
		header("Location: /BikeLabs/index.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if($resultCheck > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}

function vendor_protect(){
	$userId = $_SESSION['userId'];
	if (is_vendor($userId) === false) {
		header("Location: /BikeLabs/index.php");
		exit();
	}
}

function is_vendor($user_id)
{
	require 'dbh.inc.php';
	$user_id = (int)$user_id;
	$query = "SELECT * FROM users WHERE idUsers = ? AND User_type = 2";
	$stmt = mysqli_stmt_init($conn);
	// echo $user_id;
	if (!mysqli_stmt_prepare($stmt, $query)) 
	{
		header("Location: /BikeLabs/index.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if($resultCheck > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}

function redirect()
{
	$current_page = $_SERVER['REQUEST_URI'];
	$_SESSION['curr_page'] = $current_page;	
}