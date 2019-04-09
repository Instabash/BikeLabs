<?php

session_start();

unset($_SESSION["pkg1"]);
unset($_SESSION["pkg2"]);
unset($_SESSION["pkg3"]);
unset($_SESSION['pkg4']);
unset($_SESSION["modspecs"]);

if(isset($_POST['btnmod']))
{
	$model = $_POST['modmodelselect'];
	$year = $_POST['modyearselect'];
	$make = $_POST['modmakeselect'];
	$selectedpkg = $_POST['radiopkg'];

	$_SESSION['modspecs']['model'] = $model;
	$_SESSION['modspecs']['year'] = $year;
	$_SESSION['modspecs']['make'] = $make;

	if ($selectedpkg == "pkg1") {
		// $_SESSION['pkg1'] = $pkg1array;
		// var_dump(count($_SESSION['pkg1']);
		// echo "You have selected package 1";
		header("Location: ../pages/modify/Modspecs.php?pkg=1");
	}
	elseif ($selectedpkg == "pkg2") {
		// $_SESSION['pkg2'] = $pkg2array;
		// var_dump(count($_SESSION['pkg1']);
		// echo "You have selected package 2";
		header("Location: ../pages/modify/Modspecs.php?pkg=2");
	}
	elseif ($selectedpkg == "pkg3") {
		// $_SESSION['pkg3'] = $pkg3array;
		// var_dump(count($_SESSION['pkg1']);
		// echo $_POST['radiopkg'];
		header("Location: ../pages/modify/Modspecs.php?pkg=3");
	}
	elseif ($selectedpkg == "2") {
		$ctmpts = array();
		foreach ($_POST['select2'] as $selectedOption)
		{
			$ctmpts[] = $selectedOption;
		}
		$_SESSION['pkg4'] = $ctmpts;
		// foreach($_SESSION['pkg4'] as $key=>$value)
		// {
		// 	 echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
		// }
		header("Location: ../pages/modify/Modspecs.php?pkg=custom");
	}
}