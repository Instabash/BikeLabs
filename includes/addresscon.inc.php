<?php
session_start();
unset($_SESSION['modaddress']);
unset($_SESSION['altaddress']);
unset($_SESSION['modORalt']);

if (isset($_SESSION['modcart'])) {
	if (isset($_POST['homepickbtn'])) {
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$countryreg = $_POST['countryorregion'];
		$hnameorno = $_POST['hnameorno'];
		$pcode = $_POST['pcode'];
		$del_method = 1;
		if(empty($title) || empty($fname) || empty($lname) || empty($phone) || empty($countryreg) || empty($hnameorno) || empty($pcode) || empty($del_method))
		{
			header("Location: ../AddressCon.php?error=emptyfields&title=".$title."&fname=".$fname."&lname=".$lname."&countryreg=".$countryreg."&hnameorno=".$hnameorno."&pcode=".$pcode."&del_method=".$del_method."&phone=".$phone);
			exit();
		}
		elseif (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) 
		{
			header("Location: ../AddressCon.php?error=invalidchar");
			exit();
		}
		elseif (!preg_match("/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/", $phone)) {
			header("Location: ../AddressCon.php?error=invalidphone");
			exit();
		}
		elseif (!preg_match("/^\\d{5}$/", $pcode)) {
			header("Location: ../AddressCon.php?error=invalidpcode");
			exit();
		}
		else{
			if ($del_method == 1) {
				$del_method_text = "Home Pickup";
			}
			if ($del_method == 2) {
				$del_method_text = "Drop Off";
			}

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
}
elseif (isset($_SESSION['altcart'])) {
	if (isset($_POST['homepickbtn'])) {
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$countryreg = $_POST['countryorregion'];
		$hnameorno = $_POST['hnameorno'];
		$pcode = $_POST['pcode'];
		$del_method = 1;
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
		// echo $_SESSION['modORalt'];;
		header("Location: ../payment.php");
	}
}