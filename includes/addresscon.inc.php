<?php
session_start();
unset($_SESSION['modaddress']);
unset($_SESSION['altaddress']);

if (isset($_SESSION['modcart'])) {
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
		$_SESSION['modORalt'] = "modification";
		header("Location: ../payment.php");
	}
}
if (isset($_SESSION['altcart'])) {
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
		$_SESSION['del_method'] = $del_method_text;
		$_SESSION['altaddress'][] = array(
			'altadtitle' => $title,
			'altadfname' => $fname,
			'altadlname' => $lname,
			'altadphone' => $phone,
			'altadcountry' => $countryreg,
			'altadhname' => $hnameorno,
			'altadpcode' => $pcode
		);
		$_SESSION['modORalt'] = "alteration";
		header("Location: ../payment.php");
	}
}