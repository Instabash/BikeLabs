<?php

session_start();

unset($_SESSION["pkg1"]);
unset($_SESSION["pkg2"]);
unset($_SESSION["pkg3"]);
unset($_SESSION["altspecs"]);
if(isset($_POST['btnalt']))
{
	$model = $_POST['altmodelselect'];
	$year = $_POST['altyearselect'];
	$make = $_POST['altmakeselect'];
	$selectedpkg = $_POST['altradiopkg'];

	$_SESSION['altspecs']['model'] = $model;
	$_SESSION['altspecs']['year'] = $year;
	$_SESSION['altspecs']['make'] = $make;
	
	if ($selectedpkg == "pkg1") {
		// $_SESSION['pkg1'] = $pkg1array;
		// var_dump(count($_SESSION['pkg1']);
		// echo "You have selected package 1";
		header("Location: ../pages/alter/Altspecs.php?pkg=1");
	}
	elseif ($selectedpkg == "pkg2") {
		// $_SESSION['pkg2'] = $pkg2array;
		// var_dump(count($_SESSION['pkg1']);
		// echo "You have selected package 2";
		header("Location: ../pages/alter/Altspecs.php?pkg=2");
	}
	elseif ($selectedpkg == "pkg3") {
		// $_SESSION['pkg3'] = $pkg3array;
		// var_dump(count($_SESSION['pkg1']);
		// echo $_POST['radiopkg'];
		header("Location: ../pages/alter/Altspecs.php?pkg=3");
	}
}
