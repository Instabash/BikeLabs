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

	if ($model == "" || $year == "" || $make == "") {
		header("Location: ../modification.php?error=emptyfields");
		exit();
	}
	elseif($selectedpkg == "")
	{
		header("Location: ../modification.php?error=nopkgselected");
		exit();
	}

	$_SESSION['modspecs']['model'] = $model;
	$_SESSION['modspecs']['year'] = $year;
	$_SESSION['modspecs']['make'] = $make;

	if ($selectedpkg == "pkg1") {
		header("Location: ../pages/modify/Modspecs.php?pkg=1");
	}
	elseif ($selectedpkg == "pkg2") {
		header("Location: ../pages/modify/Modspecs.php?pkg=2");
	}
	elseif ($selectedpkg == "pkg3") {
		header("Location: ../pages/modify/Modspecs.php?pkg=3");
	}
	elseif ($selectedpkg == "2") {
		$ctmpts = array();
		foreach ($_POST['select2'] as $selectedOption)
		{
			$ctmpts[] = $selectedOption;
		}
		$_SESSION['pkg4'] = $ctmpts;
		header("Location: ../pages/modify/Modspecs.php?pkg=custom");
	}
}