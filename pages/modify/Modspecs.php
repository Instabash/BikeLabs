<?php

session_start();
include_once '../../includes/header.php';
?>
<?php
if (isset($_GET['pkg'])) {
	$_SESSION['packageselected'] = $_GET['pkg'];
	?>
<section id="modspecs" class="section fontsec">
	<form action="../../includes/moddetailprocess.inc.php" method="post">
		<div class="container">
			<div>
				<?php
				if($_GET['pkg'] == "1")
				{?>
					<h3>You have selected package 1</h3><br>
					<h5>Please specify any further modification you would like to implement from the package you have selected.</h5><br>
					<?php
					$pkg1 = array(
						"Remove jump cover","Reflectors","HID Lights","Body paint (User defined):"
					);
					foreach ($pkg1 as $key) {?>
					<div>
						<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $key?></label><br><br>
						<?php 
						if ($key == "Body paint (User defined):") {?>
							<div class="pb-4">
								<select class="js-example-responsive" name="modpaintselect" style="width: 50%">
									<option>Black</option>
									<option>White</option>
									<option>Blue</option>
									<option>Grey</option>
									<option>Red</option>
									<option>Yellow</option>
									<option>Purple</option>
									<option>Green</option>
								</select>
							</div>
						<?php }
						?>
					</div>
				<?php }}
				elseif($_GET['pkg'] == "2")
				{?>
					<h3>You have selected package 2</h3><br>
					<h5>Please specify what modification you would like to implement from the package you have selected.</h5><br>
					<?php
					$pkg2 = array(
						"Remove jump cover","Reflectors","HID Lights","Remove mudguard","Add theme (User defined):","Body paint (User defined):"
					);
					foreach ($pkg2 as $key) {?>
					<div class="">
						<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $key?></label><br><br>
						<?php 
						if ($key == "Body paint (User defined):") {?>
							<div class="pb-4">
								<select class="js-example-responsive" name="modpaintselect" style="width: 50%">
									<option>Black</option>
									<option>White</option>
									<option>Blue</option>
									<option>Grey</option>
									<option>Red</option>
									<option>Yellow</option>
									<option>Purple</option>
									<option>Green</option>
								</select>
							</div>
						<?php }
						if ($key == "Add theme (User defined):") {?>
							<div class="pb-4">
								<select class="js-example-responsive" name="modthemeselect" style="width: 50%">
									<option>Flaming skulls theme</option>
									<option>Harley davidson theme</option>
									<option>Batman theme</option>
									<option>Superman theme</option>
									<option>Ironman theme</option>
								</select>
							</div>
						<?php }
						?>
					</div>
				<?php }}
				elseif($_GET['pkg'] == "3")
				{?>
					<h3>You have selected package 3</h3><br>
					<h5>Please specify what modification you would like to implement from the package you have selected.</h5><br>
					<?php
					$pkg3 = array(
						"Remove jump cover","Reflectors","HID Lights","Remove mudguard","Short meter","Remove headlight holders","Body paint (User defined):","Add theme (User defined):"
					);
					foreach ($pkg3 as $key) {?>
					<div>
						<label style="width: 200px;left: -20px;display: inline-block;vertical-align: middle;"><?php echo $key?></label><br><br>
						<?php 
						if ($key == "Body paint (User defined):") {?>
							<div class="pb-4">
								<select class="js-example-responsive" name="modpaintselect" style="width: 50%">
									<option>Black</option>
									<option>White</option>
									<option>Blue</option>
									<option>Grey</option>
									<option>Red</option>
									<option>Yellow</option>
									<option>Purple</option>
									<option>Green</option>
								</select>
							</div>
						<?php }
						if ($key == "Add theme (User defined):") {?>
							<div class="pb-4">
								<select class="js-example-responsive" name="modthemeselect" style="width: 50%">
									<option>Flaming skulls theme</option>
									<option>Harley davidson theme</option>
									<option>Batman theme</option>
									<option>Superman theme</option>
									<option>Ironman theme</option>
								</select>
							</div>
						<?php }
						?>
					</div>
				<?php }}
				else
				{?>
					echo '<script>window.location="../../modification.php"</script>';
				<?php }?>
			</div><br><br>
			<?php
				if ($_GET['pkg'] == "1" || $_GET['pkg'] == "2") {?>
			<h4>If you want to add parts from other packages</h4>
			<h5>Please select from the options below</h5><br>
			<div class="" style="background-color: #dc3545;">
				<label>Choose custom parts</label>
				<input type="radio" name="radiopkg1" id="togglecustom" value="2">
			</div><br>
			<div class="customparts">
				<select style="width: 100%" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="multiple"  tabindex="-1" aria-hidden="true" name="select2[]" id="selectbox">
					<?php 
						if ($_GET['pkg'] == "1") {?>
							<option>Short meter</option>
							<option>Remove headlight holders</option>
							<option>Remove mudguard</option>
							<option>Add theme (User defined)</option>
						<?php }
						elseif ($_GET['pkg'] == "2") {?>
							<option>Short meter</option>
							<option>Remove headlight holders</option>
						<?php }
					?>
		 		</select>
			</div>
		<?php } ?><br>
		<div class="form-group">
		  <label for="comment">If you would like to specify what to do with the custom parts you have selected please mention it below:</label>
		  <textarea class="form-control" rows="5" id="comment" name="customspecifytxtarea"></textarea>
		</div><br><br>
			<div class="modbtn2">
				<button type="submit" name="btnmod2" class="btn btn-outline-danger">Next</button>
			</div>
		</div>
	</form>
</section>
<?php }

else
{?>
	echo '<script>window.location="../../modification.php"</script>';
<?php }?>

<script>
	$(".js-example-responsive").select2({
	minimumResultsForSearch: -1,
    width: 'resolve' // need to override the changed default
});
</script>
<?php
include_once '../../includes/footer.php';
?>