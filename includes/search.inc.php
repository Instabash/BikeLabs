<?php

if(isset($_POST['search-sub']) || isset($_POST['search-parts']) || isset($_POST['search-con']) || isset($_POST['search-parts-used']))
{
	if (!empty($_POST['fromval'])) {
		$fromval = $_POST['fromval'];
	}
	if (!empty($_POST['toval'])) {
		$toval = $_POST['toval'];
	}
	
	$array = array();
	$array2 = array();
	$array3 = array();

	if(!empty($_POST['modelcheck'])){
		foreach($_POST['modelcheck'] as $selected){
			$array[] = $selected;
		}
	}

	if (!empty($_POST['makecheck'])) {
		foreach ($_POST['makecheck'] as $selected2) {
			$array2[] = $selected2;
		}
	}

	if (!empty($_POST['condcheck'])) {
		foreach ($_POST['condcheck'] as $selected3) {
			$array3[] = $selected3;
		}
	}

	$args = array (
		'pricefrom' => $fromval,
		'priceto' => $toval,
		'model' => $array,
		'make' => $array2,
		'condition' => $array3
	);

	$query = preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '[]=', http_build_query($args));
	// $cleanedParams = preg_replace('/%5B(\d+?)%5D/', '', $params);
	if (isset($_POST['search-sub'])) {
		
	header("Location: ../newbikes.php?" . $query);
	}
	if (isset($_POST['search-parts'])) {
		// echo $fromval . $toval;	
	header("Location: ../newspareparts.php?" . $query);
	}

	if (isset($_POST['search-con'])) {
		// echo $fromval . $toval;	
	header("Location: ../usedbikes.php?" . $query);
	}

	if (isset($_POST['search-parts-used'])) {
		// echo $fromval . $toval;	
	header("Location: ../spareparts.php?" . $query);
	}	

}