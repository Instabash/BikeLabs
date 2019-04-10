<?php
session_start();
unset($_SESSION['modaddress']);
if (isset($_POST['homepickbtn'])) {
	$title = $_POST['title'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$countryreg = $_POST['countryorregion'];
	$hnameorno = $_POST['hnameorno'];
	$pcode = $_POST['pcode'];
	// echo $title;
	// echo $fname;
	// echo $lname;
	// echo $phone;
	// echo $countryreg;
	// echo $hnameorno;
	// echo $pcode;
	$_SESSION['modaddress'][] = array(
			'modadtitle' => $title,
			'modadfname' => $fname,
			'mmodadlname' => $lname,
			'modadphone' => $phone,
			'modadcountry' => $countryreg,
			'modadhname' => $hnameorno,
			'modadpcode' => $pcode
		);
	header("Location: ../payment.php");
}