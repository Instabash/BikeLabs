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
	$del_method = $_POST['pickup-type-radio'];
	if ($del_method == 1) {
		$del_method_text = "Home Pickup";
	}
	if ($del_method == 2) {
		$del_method_text = "Drop Off";
	}
	// echo $title;
	// echo $fname;
	// echo $lname;
	// echo $phone;
	// echo $countryreg;
	// echo $hnameorno;
	// echo $pcode;
	$_SESSION['del_method'] = $del_method_text;
	$_SESSION['modaddress'][] = array(
			'modadtitle' => $title,
			'modadfname' => $fname,
			'modadlname' => $lname,
			'modadphone' => $phone,
			'modadcountry' => $countryreg,
			'modadhname' => $hnameorno,
			'modadpcode' => $pcode
		);
	header("Location: ../payment.php");
}