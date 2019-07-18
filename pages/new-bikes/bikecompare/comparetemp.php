<?php
if (!isset($_GET['bike1']) || !isset($_GET['bike2'])) {
	header("Location: /BikeLabs/404-page.php");
	exit();
}
elseif ($_GET['bike1'] == $_GET['bike2']) {
	header("Location: ../new-bikes.php?bikeid=".$_GET['bike1']."&error=samebike");
	exit();
}
else{
	$title = 'Compare bikes';
include_once '../../../includes/header.php';
include_once '../../../includes/dbh.inc.php';


$stmt = mysqli_stmt_init($conn);

$bike1 = $_GET['bike1'];
$bike2 = $_GET['bike2'];
$query = mysqli_query($conn, "select * from bikespecs inner join (select bike_spec_id from bikespecs where bike_id IN ({$bike1}, {$bike2}) having count(distinct bike_id ) = 2) t on t.bike_spec_id = bikespecs.bike_spec_id");

if (!$query)
{
    die('Error: ' . mysqli_error($conn));
}

if(mysqli_num_rows($query) > 0)
{

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
		<div style="float: left;">
			<!-- <button class="btn"></button> -->
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><img src="/BikeLabs/images/arrow-left-solid.svg" style="width: 40px;height: 40px;"></a>
		</div>
		<div style="padding-bottom: 50px;">
			<h2 style=""><?php echo $bike1Name . " Vs. " . $bike2Name; ?></h2 >
		</div>
		<div style="background-color: #f2f3f3;border-radius: 4px;width: 100%;" class="compDiv">
			<table style="width: 100%;margin-bottom: 60px;">
				<col style="width:30%" span="4" />
				<tr>
					<th></th>
					<?php 
					$sql2 = "SELECT * , MIN(bike_image_thumb) FROM b_images WHERE (bike_id = {$bike1} OR bike_id = {$bike2}) GROUP BY bike_id;";
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
									<div class="compImg">
										<img src="/BikeLabs/images/sparepartimg/<?php echo $row2['bike_image_name']; ?>" style="border:2px solid black;border-radius: 4px;width:100%;height: 290px !important;"> <br><br>
									</div>
									<h5 style="text-align: center;"><?php echo $bike1Name; ?></h5>
								</td>
								<?php 
							}
							if ($row2['bike_id'] == $bike2)
							{
								?>
								<td class="" style="width: 30%;padding: 30px;">
									<div class="compImg">
										<img src="/BikeLabs/images/sparepartimg/<?php echo $row2['bike_image_name']; ?>" style="border:2px solid black;border-radius: 4px;width:100%;height: 290px !important;"> <br><br>
									</div>
									<h5 style="text-align: center;"><?php echo $bike2Name; ?></h5>
								</td>
								<?php 
							}
						}
					}
					?>
				</tr>
			</table>
		</div>
		<div style="overflow-x:auto;">
			<table class="table table-bordered table-striped" style="width:100%;">
				<col style="width:20%" span="4" />
				<tr>
					<th><h6>Engine Type</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1eng; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2eng; ?></p></td>
				</tr>
				<tr>
					<th><h6>Bore & Stroke</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1bore_str; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2bore_str; ?></p></td>
				</tr>
				<tr>
					<th><h6>Transmission</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1trans; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2trans; ?></p></td>
				</tr>
				<tr>
					<th><h6>Starting</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1starting; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2starting; ?></p></td>
				</tr>
				<tr>
					<th><h6>Frame</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1frame; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2frame; ?></p></td>
				</tr>
				<tr>
					<th><h6>Dimension (Lxwxh)</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1dimensions; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2dimensions; ?></p></td>
				</tr>
				<tr>
					<th><h6>Petrol Capacity</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1petrol_cap; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2petrol_cap; ?></p></td>
				</tr>
				<tr>
					<th><h6>Tyre at Front</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1f_tyre; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2f_tyre; ?></p></td>
				</tr>
				<tr>
					<th><h6>Tyre at Back</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1b_tyre; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2b_tyre; ?></p></td>
				</tr>
				<tr>
					<th><h6>Dry Weight</h6></th>
					<td><p style="text-align: center;"><?php echo $bike1dry_weight; ?></p></td>
					<td><p style="text-align: center;"><?php echo $bike2dry_weight; ?></p></td>
				</tr>
			</table>
		</div>
	</div>
</section>
 <?php   
}
else
{?>
<p>no dice</p>
<?php
	}
}
?>