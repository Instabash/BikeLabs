<?php

session_start();

unset($_SESSION["pkg1"]);
unset($_SESSION["pkg2"]);
unset($_SESSION["pkg3"]);
unset($_SESSION['pkg4']);
unset($_SESSION["modspecs"]);

if(isset($_POST['btnmod']))
{
	include_once 'constants.inc.php';

	$model = $_POST['modmodelselect'];
	$year = $_POST['modyearselect'];
	$make = $_POST['modmakeselect'];
	$selectedpkg = $_POST['radiopkg'];

	$object = new constantsinc();

	$accModels = $object ->bikeModels;
	$accMakes = $object ->bikeMakes;
	
	if (!in_array($model, $accModels)) 
	{
	    header("Location: ../modification.php?error=error");
		exit();
	}
	elseif (!in_array($make, $accMakes)) 
	{
	    header("Location: ../modification.php?error=error");
		exit();
	}
		
	if ($model == "" || $year == "" || $make == "") {
		header("Location: ../modification.php?error=emptyfields");
		exit();
	}
	elseif ($year<1990 || $year>date("Y")) {
		header("Location: ../modification.php?error=invalidyear");
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