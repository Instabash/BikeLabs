<?php

if(isset($_POST['signup-submit']))
{
	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	// $phone = $_POST['phone'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$usertype = 0;

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);

	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($fname) || empty($lname))
	{
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email."&fname=".$fname."&lname=".$lname);
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) 
	{
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
	{
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
	{
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}
	elseif(!$uppercase || !$lowercase || !$number || strlen($password) < 7)
	{
		header("Location: ../signup.php?error=pwdstr&uid=".$username."&mail=".$email."&fname=".$fname."&lname=".$lname);
		exit();
	}
	elseif ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else
	{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0)
			{
				header("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();
			}
			else
			{
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, User_fname, User_lname, User_type) VALUES (?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) 
				{
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else
				{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $hashedPwd, $fname, $lname, $usertype);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
  				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
} 
elseif(isset($_POST['signup-vendor']))
{
	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$phone = $_POST['phone'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$address = $_POST['address'];
	$usertype = 2;
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($address) || empty($phone))
	{
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=emptyfields&uid=".$username."&mail=".$email."&address=".$address."&phone=".$phone);
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) 
	{
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=invalidmailuid");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
	{
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=invalidmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/", $phone)) 
	{
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=invalidphone&uid=".$username."&mail=".$email."&address=".$address);
		exit();
	}
	elseif(!$uppercase || !$lowercase || !$number || strlen($password) < 7)
	{
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=pwdstr&uid=".$username."&mail=".$email."&address=".$address."&phone=".$phone.$password);
		exit();
	}
	elseif ($password !== $passwordRepeat) {
		header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=passwordcheck&uid=".$username."&mail=".$email."&address=".$address."&phone=".$phone);
		exit();
	}
	else
	{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0)
			{
				header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=usertaken&mail=".$email);
				exit();
			}
			else
			{
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, User_Address, User_Contact, User_type) VALUES (?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) 
				{
					header("Location: /BikeLabs/pages/admin/admin-vendor.php?error=sqlerror");
					exit();
				}
				else
				{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $hashedPwd, $address, $phone, $usertype);
					mysqli_stmt_execute($stmt);
					header("Location: /BikeLabs/pages/admin/admin-vendor.php?signup=success");
					exit();
  				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else
{
	header("Location: ../signup.php");
	exit();
}