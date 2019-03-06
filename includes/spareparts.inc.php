<?php

include_once 'dbh.inc.php';

$spaartsql = "SELECT * FROM spare_parts";
$spartresult = mysqli_query($conn, $spaartsql);
$resultcheck = mysqli_num_rows($spartresult);
$spartIdarray = array();
$spartNamearray = array();
$spartDescarray = array();
$spartPricearray = array();
$spartCatarray = array();
$spartTypearray = array();

if($resultcheck > 0)
{
	while ($row = mysqli_fetch_assoc($spartresult))
	{
		$spartIdarray[] = $row['part_id'];
		$spartNamearray[] = $row['part_name'];
		$spartDescarray[] = $row['part_desc'];
		$spartPricearray[] = $row['part_price'];
		$spartCatarray[] = $row['part_category'];
		$spartTypearray[] = $row['part_type'];

		$postid = $spartIdarray;
		$postname = $spartNamearray;
		$postdesc = $spartDescarray;
		$postprice = $spartPricearray;
		$postcat = $spartCatarray;
		$posttype = $spartTypearray; 	
	}
	
	
}


?>
<!-- 
for ($i=0; $i < count($spartIdarray); $i++) { 
		echo $postid[$i]."<br>";
		echo $postname[$i]."<br>";
		echo $postdesc[$i]."<br>";
		echo $postprice[$i]."<br>";
		echo $postcat[$i]."<br>";
		echo $posttype[$i]."<br>";
	} -->