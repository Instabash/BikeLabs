<?php
session_start();

	include_once 'dbh.inc.php';
	$model = $_POST['model'];
	$year = $_POST['year'];

	
	
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
		<div class='row'>
				<div class='modleft'>
					<div class='modslider border-new border border-dark rounded'>
						<div class='modmarginleft'>
							<?php
								if(isset($spec1) && !empty($spec1))
								{
									$imagename1 =  "images/".$imageName.".jpg";
									echo "<img id = 'modimage' src= $imagename1>";
								}
								else 
								{
									echo "";
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
								if(isset($spec1) && !empty($spec1))
									{
										echo "</br>";
										echo "Company : ". $spec1;
										echo "</br>";
										echo "Condition : " . $spec3;
										echo "</br>";
										echo "Price : " . $spec5;
										echo "</br>";
										echo "Description : " .  $spec6;
										session_unset();
										session_destroy();
									}
									else {
										echo "";
									}
							?>
				</div>
				</div>
			</div>
			<div class='modmain' >
				<div class='modmarginleft'>
					<h4>Does this look right to you?</h4>	
				</div>	
				<div class='modmarginleft'>
					<button type='submit' name='btnmod2' class='btn btn-danger' style='margin: 10px;' value=''>Yes</button> 
					<button type='submit' name='btnmod2' class='btn btn-danger' style='margin: 10px;' value=''>No</button> 
				</div> 
		 </div> 
		
