<?php
// session_start();
	
	include_once 'dbh.inc.php';
	$model = $_POST['model']; //switch back to modmodelselect 
	$year = $_POST['year'];//switch back to modyearselect 
	// $make = $_POST['modmakeselect'];
	
	
		$imagesql = "SELECT bike_img_name FROM b_images WHERE bikemodel='$model' AND bikeyear = '$year'";
		$specssql = "SELECT * FROM bikes WHERE bike_model = '$model' AND bikeyear = '$year'";

		$imgresult = mysqli_query($conn, $imagesql);
		$specresult = mysqli_query($conn, $specssql);

		$imgrow = mysqli_fetch_assoc($imgresult);
		$specrow = mysqli_fetch_assoc($specresult);

		$imageName = $imgrow['bike_img_name'];

		$spec1 = $specrow['bike_name'];
		$spec2 = $specrow['bike_model'];
		$spec3 = $specrow['bike_type'];
		$spec5 = $specrow['bike_price'];
		$spec6 = $specrow['bike_desc'];

		// $_SESSION['spec1'] = $spec1;
		// $_SESSION['spec2'] = $spec2;
		// $_SESSION['spec3'] = $spec3;
		// $_SESSION['spec5'] = $spec5;
		// $_SESSION['spec6'] = $spec6;

		// $_SESSION['imagename'] = $imageName;
?>



<!-- <div class='row'>
	<div class='modleft'>
		<div class='modslider border-new border border-dark rounded'>
			<div class='modmarginleft'>
				<?php
					//if(isset($spec1) && !empty($spec1))
					{
					//	$imagename1 =  "images/".$imageName.".jpg";
					//	echo "<img id = 'modimage' src= $imagename1>";
					}
					//else 
					{
					//	echo "";
					}	
				?>
			</div>
		</div>
	</div>

	<div class='modright'>

		<div class='modmarginleft'>
			<h4>Specifications</h4>
		</div>

		<div class='modmarginleft'>
			<?php
				//if(isset($spec1) && !empty($spec1))
				{
				//	echo "</br>";
				//	echo "Company : ". $spec1;
				//	echo "</br>";
				//	echo "Condition : " . $spec3;
				//	echo "</br>";
				//	echo "Price : " . $spec5;
				//	echo "</br>";
				//	echo "Description : " .  $spec6;
				//	
				}
				//else {
				//	echo "";
				}
			?>
		</div>

	</div>

</div>

<br><br><br><br>

<div class='modmain'>
	<div class='modmarginleft'>
		<h3>Step 2: Choose what you want to modify...</h3>	
	</div>	<br>
	<div class="container">
		<form id = "modform2" action = "" method = "POST">
			<div class="form-row ">
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="hlightcheck" type="checkbox" value="">  Headlight</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="jumpcheck" type="checkbox" value="">  Jumps</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="seatcheck" type="checkbox" value="">  Seat</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="mguardcheck" type="checkbox" value="">  Mudguard</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="colorcheck" type="checkbox" value="">  Color</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="cspocketcheck" type="checkbox" value="">  Chain Spocket</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="exhaustcheck" type="checkbox" value="">  Exhaust</label>
				</div>
				<div class="col-3" style="padding:10px;">
					<label class="checkbox-inline"><input id="tlightcheck" type="checkbox" value="">  Tail Light</label>
				</div>
			</div><br>
			<div class="modbtn1">
				<button type="submit" name="btnmod2" id = "modbtn13" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
			</div>
		</form>
	</div>
</div>
<div class="modmain" id="modaftersubmission2">

</div> -->
		
