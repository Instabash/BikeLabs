<?php

if(isset($_POST['search-sub']))
{
	$fromval = $_POST['fromval'];
	$toval = $_POST['toval'];
	$array = array();

	if(!empty($_POST['modelcheck'])){
		foreach($_POST['modelcheck'] as $selected){
			$array[] = $selected;
		}
	}
	$args = array (
    'pricefrom' => $fromval,
    'priceto' => $toval,
    'model' => $array
);

		$query = preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '[]=', http_build_query($args));
		// $cleanedParams = preg_replace('/%5B(\d+?)%5D/', '', $params);

	header("Location: ../newbikes.php?" . $query);
}