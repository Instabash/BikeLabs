<?php
require 'dbh.inc.php';
session_start();
if (isset($_POST['pwd-reset-submit'])) {
	
	$oldpassword = $_POST['oldpass'];
	$newPassword = $_POST['newpass'];
	$newPasswordRepeat = $_POST['connewpass'];

	$uppercase = preg_match('@[A-Z]@', $newPassword);
	$lowercase = preg_match('@[a-z]@', $newPassword);
	$number    = preg_match('@[0-9]@', $newPassword);

	if(empty($oldpassword) || empty($newPassword) || empty($newPasswordRepeat))
	{
		header("Location: /BikeLabs/pages/user/user-reset-pass.php?error=emptyfields");
		exit();
	}

	if(!$uppercase || !$lowercase || !$number || strlen($newPassword) < 7)
	{
		header("Location: /BikeLabs/pages/user/user-reset-pass.php?error=pwdstr");
		exit();
	}
	elseif ($newPassword !== $newPasswordRepeat) {
		header("Location: /BikeLabs/pages/user/user-reset-pass.php?error=passwordcheck");
		exit();
	}
	elseif($newPassword == $oldpassword)
	{
		header("Location: /BikeLabs/pages/user/user-reset-pass.php?error=pwdchange");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE uidUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			header("Location: /BikeLabs/pages/user/user-reset-pass.php?error=sqlerror1");
			exit();
		}
		else
		{
			$username = $_SESSION['userUId'];
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result))
			{
				$pwdCheck = password_verify($oldpassword, $row['pwdUsers']);
				if ($pwdCheck == false) 
				{
					header("Location: /BikeLabs/pages/user/user-reset-pass.php?error=wrongpwd");
					exit();
				}
				elseif ($pwdCheck == true) 
				{
					$sql = "UPDATE users SET pwdUsers = ? WHERE uidUsers = ?";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) 
					{
						header("Location: ../index.php?error=sqlerror2");
						exit();
					}
					else
					{
						$hashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $username);
						mysqli_stmt_execute($stmt);
						header("Location: /BikeLabs/pages/user/user-reset-pass.php?success");
						exit();
					}
				}
			}
		}
	}
}
elseif (isset($_POST['pwd-reset-submit-vendor'])) {
	
	$oldpassword = $_POST['oldpass'];
	$newPassword = $_POST['newpass'];
	$newPasswordRepeat = $_POST['connewpass'];

	$username = $_POST['vid'];
	$uppercase = preg_match('@[A-Z]@', $newPassword);
	$lowercase = preg_match('@[a-z]@', $newPassword);
	$number    = preg_match('@[0-9]@', $newPassword);

	if(empty($oldpassword) || empty($newPassword) || empty($newPasswordRepeat))
	{
		header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=emptyfields");
		exit();
	}
	elseif ($newPassword !== $newPasswordRepeat) {
		header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=passwordcheck");
		exit();
	}
	elseif(!$uppercase || !$lowercase || !$number || strlen($newPassword) < 7)
	{
		header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=pwdstr");
		exit();
	}
	
	elseif($newPassword == $oldpassword)
	{
		header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=pwdchange");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE idUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=sqlerror1");
			exit();
		}
		else
		{
			
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result))
			{
				$pwdCheck = password_verify($oldpassword, $row['pwdUsers']);
				if ($pwdCheck == false) 
				{
					header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=wrongpwd");
					exit();
				}
				elseif ($pwdCheck == true) 
				{
					$sql = "UPDATE users SET pwdUsers = ? WHERE uidUsers = ?";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) 
					{
						header("Location: /BikeLabs/pages/admin/vendor-reset-pass.php?vid=$username&error=sqlerror2");
						exit();
					}
					else
					{
						$hashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $username);
						mysqli_stmt_execute($stmt);
						header("Location: /BikeLabs/pages/admin/admin-vendor.php?change=success");
						exit();
					}
				}
			}
		}
	}
}