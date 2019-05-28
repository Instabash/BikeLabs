<?php
include_once '../../../includes/header.php';
include_once '../../../includes/dbh.inc.php';


$stmt = mysqli_stmt_init($conn);

$bike1 = $_GET['bike1'];
$bike2 = $_GET['bike2'];

$sql = "SELECT * FROM bikespecs WHERE bike_id = {$bike1} OR bike_id = {$bike2};";

if(!mysqli_stmt_prepare($stmt, $sql))
{
	echo "SQL statement failed";
}
else
{
	mysqli_stmt_execute($stmt);
	$result1 = mysqli_stmt_get_result($stmt);

	while($row1 = mysqli_fetch_assoc($result1)) 
	{
		if ($row1['bike_id'] == $bike1) {
			$bike1eng = $row1['bike_engine_type'];
			$bike1bore_str = $row1['bike_bore_stroke']; 
			$bike1trans = $row1['bike_transmission']; 
			$bike1starting = $row1['bike_starting']; 
			$bike1frame = $row1['bike_frame']; 
			$bike1dimensions = $row1['bike_dimensions']; 
			$bike1petrol_cap = $row1['bike_petrol_cap']; 
			$bike1f_tyre = $row1['bike_f_tyre']; 
			$bike1b_tyre = $row1['bike_b_tyre']; 
			$bike1dry_weight = $row1['bike_dry_weight']; 
		}
		if ($row1['bike_id'] == $bike2) {
			$bike2eng = $row1['bike_engine_type'];
			$bike2bore_str = $row1['bike_bore_stroke']; 
			$bike2trans = $row1['bike_transmission']; 
			$bike2starting = $row1['bike_starting']; 
			$bike2frame = $row1['bike_frame']; 
			$bike2dimensions = $row1['bike_dimensions']; 
			$bike2petrol_cap = $row1['bike_petrol_cap']; 
			$bike2f_tyre = $row1['bike_f_tyre']; 
			$bike2b_tyre = $row1['bike_b_tyre']; 
			$bike2dry_weight = $row1['bike_dry_weight']; 
		}
	}
}
$sql1 = "SELECT * FROM bikes WHERE bike_id = {$bike1} OR bike_id = {$bike2};";
if(!mysqli_stmt_prepare($stmt, $sql1))
{
	echo "SQL statement failed";
}
else
{
	mysqli_stmt_execute($stmt);
	$result3 = mysqli_stmt_get_result($stmt);

	while($row3 = mysqli_fetch_assoc($result3)) 
	{
		if ($row3['bike_id'] == $bike1) 
		{
			$bike1Name = $row3['bike_brand'] . " " . $row3['bike_model'] . " " . $row3['bikeyear'];
		}
		if ($row3['bike_id'] == $bike2) 
		{
			$bike2Name = $row3['bike_brand'] . " " . $row3['bike_model'] . " " . $row3['bikeyear'];
		}
	}
}
?>

<section id="postad" class="section postadsection content">
	<div class="container">
		<div style="padding-bottom: 50px;">
			<h2 style=""><?php echo $bike1Name . " Vs. " . $bike2Name; ?></h2 >
		</div>
		<div style="background-color: #f2f3f3;border-radius: 4px;">
			<table style="width: 100%;margin-bottom: 60px;">
				<col style="width:30%" span="4" />
				<tr>
					<th></th>
					<?php 
					$sql2 = "SELECT * FROM b_images WHERE (bike_id = {$bike1} OR bike_id = {$bike2}) AND bike_image_thumb = '0';";
					if(!mysqli_stmt_prepare($stmt, $sql2))
					{
						echo "SQL statement failed";
					}
					else
					{
						mysqli_stmt_execute($stmt);
						$result2 = mysqli_stmt_get_result($stmt);

						while($row2= mysqli_fetch_assoc($result2)) 
						{
							?>
							<?php
							if ($row2['bike_id'] == $bike1) 
							{
								?>
								<td class="" style="width: 30%;padding: 30px;">
									<img src="/BikeLabs/images/sparepartimg/<?php echo $row2['bike_image_name']; ?>" style="border:3px solid black;border-radius: 4px;"> <br><br>
									<p style="text-align: center;"><?php echo $bike1Name; ?></p>
								</td>
								<?php 
							}
							if ($row2['bike_id'] == $bike2)
							{
								?>
								<td class="" style="width: 30%;padding: 30px;">
									<img src="/BikeLabs/images/sparepartimg/<?php echo $row2['bike_image_name']; ?>" style="border:3px solid black;border-radius: 4px;"> <br><br>
									<p style="text-align: center;"><?php echo $bike2Name; ?></p>
								</td>
								<?php 
							}
						}
					}
					?>
				</tr>
			</table>
		</div>
		<table class="table table-bordered table-striped" style="width:100%">
			<col style="width:20%" span="4" />
			<tr>
				<th>Engine Type</th>
				<td><p style="text-align: center;"><?php echo $bike1eng; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2eng; ?></p></td>
			</tr>
			<tr>
				<th>Bore & Stroke</th>
				<td><p style="text-align: center;"><?php echo $bike1bore_str; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2bore_str; ?></p></td>
			</tr>
			<tr>
				<th>Transmission</th>
				<td><p style="text-align: center;"><?php echo $bike1trans; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2trans; ?></p></td>
			</tr>
			<tr>
				<th>Starting</th>
				<td><p style="text-align: center;"><?php echo $bike1starting; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2starting; ?></p></td>
			</tr>
			<tr>
				<th>Frame</th>
				<td><p style="text-align: center;"><?php echo $bike1frame; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2frame; ?></p></td>
			</tr>
			<tr>
				<th>Dimension (Lxwxh)</th>
				<td><p style="text-align: center;"><?php echo $bike1dimensions; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2dimensions; ?></p></td>
			</tr>
			<tr>
				<th>Petrol Capacity</th>
				<td><p style="text-align: center;"><?php echo $bike1petrol_cap; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2petrol_cap; ?></p></td>
			</tr>
			<tr>
				<th>Tyre at Front</th>
				<td><p style="text-align: center;"><?php echo $bike1f_tyre; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2f_tyre; ?></p></td>
			</tr>
			<tr>
				<th>Tyre at Back</th>
				<td><p style="text-align: center;"><?php echo $bike1b_tyre; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2b_tyre; ?></p></td>
			</tr>
			<tr>
				<th>Dry Weight</th>
				<td><p style="text-align: center;"><?php echo $bike1dry_weight; ?></p></td>
				<td><p style="text-align: center;"><?php echo $bike2dry_weight; ?></p></td>
			</tr>
		</table>
	</div>
</section>
