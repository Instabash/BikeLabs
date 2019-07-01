<?php
session_start();
include '../../includes/restrictions.inc.php';
logged_in();
$title = 'Modification specifications';
include_once '../../includes/header.php';
include_once '../../includes/dbh.inc.php';
?>
<?php
if (isset($_GET['pkg'])) {
	$_SESSION['packageselected'] = $_GET['pkg'];
	?>
	<section id="modspecs" class="section fontsec content">
		<form action="../../includes/altdetailprocess.inc.php" method="post">
			<div class="container">
				<div>
					<?php
					
					if($_GET['pkg'] == "1")
						{?>
							<h3>You have selected package 1</h3><br>
							<h5>Please specify any further modification you would like to implement from the package you have selected.</h5><br>
							<div class="border-dark border border-new" style="padding:10px; padding-top: 30px;">
							<?php
							$sql = "SELECT * FROM modaltpackages WHERE map_pkg_1 = 1 AND map_type = 'alteration'";
							$result = mysqli_query($conn, $sql);
							$pkg1 = array();
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$pkg1[] = $row['map_name'];
							}
							foreach ($pkg1 as $key) {?>
								<div>
									<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $key?></label><br><br>
								</div>
							<?php }}
					elseif($_GET['pkg'] == "2")
						{?>
							<h3>You have selected package 2</h3><br>
							<h5>Please specify what modification you would like to implement from the package you have selected.</h5><br>
							<div class="border-dark border border-new" style="padding:10px; padding-top: 30px;">
							<?php
							$sql = "SELECT * FROM modaltpackages WHERE map_pkg_2 = 1 AND map_type = 'alteration'";
							$result = mysqli_query($conn, $sql);
							$pkg2 = array();
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$pkg2[] = $row['map_name'];
							}
							foreach ($pkg2 as $key) {?>
								<div class="">
									<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $key?></label><br><br>
								</div>
							<?php }}
					elseif($_GET['pkg'] == "3")
					{
						?>
						<h3>You have selected package 3</h3><br>
						<h5>Please specify what modification you would like to implement from the package you have selected.</h5><br>
						<div class="border-dark border border-new" style="padding:10px; padding-top: 30px;">
						<?php
						$sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1 AND map_type = 'alteration'";
							$result = mysqli_query($conn, $sql);
							$pkg3 = array();
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$pkg3[] = $row['map_name'];
							}
						foreach ($pkg3 as $key) 
						{
							?>
							<div>
								<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $key?></label><br><br>
							</div>
							<?php 
						}
					}
					elseif ($_GET['pkg'] == "custom") 
						{?>
							<h3>You have selected a custom package</h3><br>
							<h5>Please specify what modification you would like to implement from the package you have selected.</h5><br>
						<div class="border-dark border border-new" style="padding: 10px; padding-top: 30px;">
							<?php 
							foreach($_SESSION['pkg4'] as $key=>$value)
								{?>
									<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $value?></label><br><br>
							<?php }
						}
					else
					{?>
						echo '<script>window.location="../../alteration.php"</script>';
						<?php 
					}?>
				</div></div>
				<br>
				<div class="form-group">
					<label for="comment">If you would like to specify what to do with the custom parts you have selected please mention it below:</label><br><br>
					<textarea class="form-control" rows="5" id="comment" name="customspecifytxtarea"></textarea>
				</div>
				<div class="modbtn2">
					<button type="submit" name="btnalt2" class="btn btn-outline-danger">Next</button>
				</div>
			</div>
		</form>
	</section>
	<?php 
	}
	else
	{
	?>
		echo '<script>window.location="../../alteration.php"</script>';
	<?php 
	}
	?>

<script>
	$(".js-example-responsive").select2({
		minimumResultsForSearch: -1,
    	width: 'resolve' // need to override the changed default
	});
</script>
<?php
include_once '../../includes/footer.php';
?>