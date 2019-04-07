<?php

session_start();

unset($_SESSION["pkg1"]);
unset($_SESSION["pkg2"]);
unset($_SESSION["pkg3"]);
unset($_SESSION["modspecs"]);

if(isset($_POST['altmod']))
{
	$model = $_POST['altmodelselect'];
	$year = $_POST['altyearselect'];
	$make = $_POST['altmakeselect'];
	// if (isset($_POST['select2'])) 
	// {
	// 	if (isset($_SESSION['modspecs'])) 
	// 	{
	// 		unset($_SESSION['modspecs']);
	// 	}

	// 	$ctmpts = array();
	// 	foreach ($_POST['select2'] as $selectedOption)
	// 	{
	// 		$ctmpts[] = $selectedOption;
	// 	}

	// 	$_SESSION['modspecs']['model'] = $model;
	// 	$_SESSION['modspecs']['year'] = $year;
	// 	$_SESSION['modspecs']['make'] = $make;
	// 	$_SESSION['modspecs']['custom'] = $ctmpts;

	// 	// print_r($_SESSION['modspecs']);
	// }
	if (isset($_POST['genradiopkg1'])) {
		// $pkg1array = array(
		// 	"Remove jump cover",
		// 	"Remove reflectors",
		// 	"Change body paint",
		// 	"HID Lights"
		// );
		// $_SESSION['pkg1'] = $pkg1array;
		// var_dump(count($_SESSION['pkg1']);
		header("Location: ../pages/alter/Altspecs.php?pkg=genpkg1");
	}
	elseif (isset($_POST['genradiopkg2'])) {
		// $pkg2array = array(
		// 	"Remove jump cover",
		// 	"Remove reflectors",
		// 	"Change body paint",
		// 	"HID Lights",
		// 	"Remove mudguard",
		// 	"Add theme"
		// );
		// $_SESSION['pkg2'] = $pkg2array;
		// var_dump(count($_SESSION['pkg1']);
		header("Location: ../pages/alter/Altspecs.php?pkg=genpkg2");
	}
	elseif (isset($_POST['altradiopkg1'])) {
		// $pkg3array = array(
		// 	"Remove jump cover",
		// 	"Remove reflectors",
		// 	"Change body paint",
		// 	"HID Lights",
		// 	"Remove mudguard",
		// 	"Add theme",
		// 	"Short meter",
		// 	"Remove headlight holders"
		// );
		// $_SESSION['pkg3'] = $pkg3array;
		// var_dump(count($_SESSION['pkg1']);
		header("Location: ../pages/alter/Altspecs.php?pkg=altpkg1");
	}
}
