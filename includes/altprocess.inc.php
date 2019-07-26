<?php

session_start();

unset($_SESSION["pkg1"]);
unset($_SESSION["pkg2"]);
unset($_SESSION["pkg3"]);
unset($_SESSION['pkg4']);
unset($_SESSION["altspecs"]);

if(isset($_POST['btnalt']))
{
	include_once 'constants.inc.php';

	$model = $_POST['altmodelselect'];
	$year = $_POST['altyearselect'];
	$make = $_POST['altmakeselect'];
	$selectedpkg = $_POST['radiopkg'];

	//----------------constant checking-------------//
	$object = new constantsinc();

	$accModels = $object ->bikeModels;
	$accMakes = $object ->bikeMakes;
	
	if (!in_array($model, $accModels)) 
	{
		header("Location: ../alteration.php?error=error");
		exit();
	}
	elseif (!in_array($make, $accMakes)) 
	{
		header("Location: ../alteration.php?error=error");
		exit();
	}
	//----------------constant checking-------------//
	
	if ($model == "" || $year == "" || $make == "") {
		header("Location: ../alteration.php?error=emptyfields");
		exit();
	}
	elseif ($year<1990 || $year>date("Y")) {
		header("Location: ../modification.php?error=invalidyear");
		exit();
	}
	elseif($selectedpkg == "")
	{
		header("Location: ../alteration.php?error=nopkgselected");
		exit();
	}

	$_SESSION['altspecs']['model'] = $model;
	$_SESSION['altspecs']['year'] = $year;
	$_SESSION['altspecs']['make'] = $make;

	if ($selectedpkg == "pkg1") {
		header("Location: ../pages/alter/Altspecs.php?pkg=1");
	}
	elseif ($selectedpkg == "pkg2") {
		header("Location: ../pages/alter/Altspecs.php?pkg=2");
	}
	elseif ($selectedpkg == "pkg3") {
		header("Location: ../pages/alter/Altspecs.php?pkg=3");
	}
	elseif ($selectedpkg == "2") {
		if (empty($_POST['select2'])) {
			header("Location: ../modification.php?error=nopkgselected");
			exit();
		}
		else{
			$ctmpts = array();
			foreach ($_POST['select2'] as $selectedOption)
			{
				$ctmpts[] = $selectedOption;
			}
			$_SESSION['pkg4'] = $ctmpts;
			header("Location: ../pages/alter/Altspecs.php?pkg=custom");
		}
	}
}
