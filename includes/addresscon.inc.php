<?php
session_start();
if (isset($_SESSION['bikecart'])) {
	unset($_SESSION['cart']);
}
elseif (isset($_SESSION['cart'])){
	unset($_SESSION['bikecart']);
}

unset($_SESSION['modaddress']);
unset($_SESSION['altaddress']);
unset($_SESSION['new_b_p_address']);
unset($_SESSION['new_b_p_address_store']);
unset($_SESSION['modORalt']);

if (isset($_SESSION['cart']) || isset($_SESSION['bikecart'])) {
	if (isset($_POST['homepickbtn'])) {
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$countryreg = $_POST['countryorregion'];
		$hnameorno = $_POST['hnameorno'];
		$pcode = $_POST['pcode'];
		$del_method = "Home Pickup";
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
			$_SESSION['del_method'] = $del_method;
			$_SESSION['new_b_p_address'][] = array(
				'new_b_p_title' => $title,
				'new_b_p_fname' => $fname,
				'new_b_p_lname' => $lname,
				'new_b_p_phone' => $phone,
				'new_b_p_country' => $countryreg,
				'new_b_p_hname' => $hnameorno,
				'new_b_p_pcode' => $pcode
			);
			header("Location: ../payment.php");
		}
	}
	elseif (isset($_POST['storepickupbtn'])) {
		$del_method = "Drop Off";
		$_SESSION['del_method'] = $del_method;
		$store = $_POST['storepickup'];
		$_SESSION['new_b_p_address_store'] = $store;
		header("Location: ../payment.php");
	}
}


elseif (isset($_SESSION['modcart'])) {
	if (isset($_POST['homepickbtn'])) {
		$title = trim($_POST['title']);
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$phone = trim($_POST['phone']);
		$countryreg = trim($_POST['countryorregion']);
		$hnameorno = trim($_POST['hnameorno']);
		$pcode = trim($_POST['pcode']);
		$del_method = "Home Pickup";
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
			$_SESSION['del_method'] = $del_method;
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
	elseif (isset($_POST['storepickupbtn'])) {
		$del_method = "Drop Off";
		$_SESSION['del_method'] = $del_method;
		$store = $_POST['storepickup'];
		$_SESSION['modaddress_store'] = $store;
		// echo $store;
		$_SESSION['modORalt'] = "modification";
		header("Location: ../payment.php");
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
		$del_method = "Home Pickup";

		$_SESSION['del_method'] = $del_method;
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
	elseif (isset($_POST['storepickupbtn'])) {
		$del_method = "Drop Off";
		$_SESSION['del_method'] = $del_method;
		$store = $_POST['storepickup'];
		$_SESSION['altaddress_store'] = $store;
		$_SESSION['modORalt'] = "alteration";
		header("Location: ../payment.php");
	}
}