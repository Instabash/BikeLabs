<?php

if(isset($_POST['search-sub']))
{
	$fromval = $_POST['fromval'];
	$toval = $_POST['toval'];

	header("Location: ../newbikes.php?pricefrom=$fromval&priceto=$toval");
}