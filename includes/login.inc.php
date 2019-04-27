<?php

if (isset($_POST['login-submit'])) 
{
	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid'];
	$password= $_POST['pwd'];

	if (empty($mailuid) || empty($password)) 
	{
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result))
			{
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if ($pwdCheck == false) 
				{
					header("Location: ../index.php?error=wrongpwd2");
					exit();
				}
				elseif ($pwdCheck == true) 
				{
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUId'] = $row['uidUsers'];
					$_SESSION['usertype'] = $row['User_type'];
					if (isset($_SESSION['curr_page'])) {
						header("Location: ../..".$_SESSION['curr_page']);
				    }
				    else{
				    	$_SESSION['current_page'] = $_SERVER['HTTP_REFERER'];
				    	if ($row['User_type'] == 1) {
							header("Location: /BikeLabs/pages/admin/admindash.php");
						}
						else{
				    		 header("Location: ". $_SESSION['current_page']. "?usertype=".$row['User_type']);
				    	}
				    }
					exit();
				}
				else
				{
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
			}
			else
			{
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}
}
else
{
	header("Location: ../index.php");
	exit();
}