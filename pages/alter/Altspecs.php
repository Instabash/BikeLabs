<?php
session_start();
include '../../includes/restrictions.inc.php';
logged_in();
$title = 'Modification specifications';
include_once '../../includes/header.php';
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
							$pkg1 = array(
								"Chain spocket","Silencer","Carburetor","Remove filter pipe"
							);
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
							$pkg2 = array(
								"Piston (0, 50, 90)","Weights","Head Cylinder (124cc)"
							);
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
						$pkg3 = array(
							"Genuine 70cc Carburetor","Genuine 70cc Piston","Genuine 70cc head cylinder","Genuine 70cc chain spocket","Genuine 70cc silencer","Genuine 70cc pipes", "Genuine 70cc Weights"
						);
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