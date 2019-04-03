<?php

session_start();
session_unset();
session_destroy();
if (isset($_SESSION['curr_page'])) {
	header("Location: ../..".$_SESSION['curr_page']);
}
else{
	$_SESSION['current_page'] = $_SERVER['HTTP_REFERER'];
	header("Location: ". $_SESSION['current_page']);
}
