<?php

session_start();
if(isset($_POST['btnmod']))
{
	if (isset($_SESSION['modspecs'])) {
		unset($_SESSION['modspecs']);
	}
	
		$model = $_POST['modmodelselect'];
		$year = $_POST['modyearselect'];
		$make = $_POST['modmakeselect'];
		$ctmpts = array();
		foreach ($_POST['select2'] as $selectedOption)
		{
			$ctmpts[] = $selectedOption;
		}

		$_SESSION['modspecs']['model'] = $model;
		$_SESSION['modspecs']['year'] = $year;
		$_SESSION['modspecs']['make'] = $make;

		$_SESSION['modspecs']['custom'] = $ctmpts;
		print_r($_SESSION['modspecs']);
	

}
