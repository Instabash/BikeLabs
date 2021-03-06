<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Modification';
include_once 'includes/header.php';
include_once 'includes/dbh.inc.php';
?>
<!-- Modify section -->
<section id="modify" class="section modsection content">
	<form id="modform1" action = "includes/modprocess.inc.php" method = "post" autocomplete="off"> 
		<div class="container">
			<h3>Step 1: Select your motorbike</h3><br>
			<h6>Choose the Model, Year, and Make of your Motorbike</h6><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small pb-4 pt-4">
					<!-- <label style="padding: 2px;">Model</label> -->
					<label class="pr-2">Model</label>
					<select class="custom-select js-example-responsive model" id="modelselect" name="modmodelselect">
						<option selected value="">Model</option>
						<option value="70cc">70cc</option>
						<option value="125cc">125cc</option>
						<option value="150cc">150cc</option>
					</select>
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small pb-4">
					<label class="pr-2">Make</label>
					<select class="custom-select js-example-responsive year" name="modmakeselect">
						<option selected value="">Make</option>
						<option value="Honda">Honda</option>
                        <option value="SuperPower">SuperPower</option>
                        <option value="Unique">Unique</option>
                        <option value="Superstar">Superstar</option>
                        <option value="Yamaha">Yamaha</option>
                        <option value="United">United</option>
                        <option value="Suzuki">Suzuki</option>
					</select>
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small pb-4">
					<label class="pr-2">Year</label>
					<div class="input-group">
						<input type="number" class="form-control" name="modyearselect" placeholder="Year" aria-label="Year" aria-describedby="basic-addon1" style="text-align:center;">
					</div>
					<!-- <select class="custom-select js-example-responsive make" id="yearselect" name="modyearselect">
						<option selected value="">Year</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
					</select> -->
				</div>
			</div><br>
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") 
				{
					echo '<p style="color:red !important ;padding:5px;";>Please select all fields</p>';
				}
				elseif ($_GET['error'] == "nopkgselected") {
					echo '<p style="color:red !important ;padding:5px;";>Please select a package</p>';
				}
				elseif ($_GET['error'] == "invalidyear") {
					echo '<p style="color:red !important ;padding:5px;";>You have entered an invalid Year.</p>';
				}
			}
			?>
			<br><br>
			<h3>Step 2: Select what to Modify</h3><br>
			<h6>We offer 3 packages of our own</h6><br>
			<div class="row">
				<div class="modleft1 border-new border border-dark rounded p-3">
					<h5>Package 1</h5>
					<div class="packageList" style="height: 250px;">
						<ul class="list-group"> 
							<?php
							$sql = "SELECT * FROM modaltpackages WHERE map_pkg_1 = 1 AND map_type = 'modification'";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) 
							{?>
								<li><?php echo $row['map_name']; ?></li>
							<?php }
							?>
						</ul>
					</div>
					<div style="">
						<div class="pkgslider border-new border border-dark rounded">
							<div class="pkg1slide1"></div>
							<div class="pkg1slide2"></div>
							<div class="pkg1slide3"></div>
						</div>

						<label class="btncreative btn-1 btn-1a packageradio">
							Select
							<input type="radio" name="radiopkg" value="pkg1">
						</label>


					</div>
				</div>
				<div class="modmiddle1 border-new border border-dark rounded p-3">
					<h5>Package 2</h5>
					<div class="packageList" style="height: 250px;">
						<ul class="list-group">
							<?php
							$sql = "SELECT * FROM modaltpackages WHERE map_pkg_2 = 1 AND map_type = 'modification'";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) 
							{?>
								<li><?php echo $row['map_name']; ?></li>
							<?php }
							?>
						</ul>
					</div>
					<div style="">
						<div class="pkgslider border-new border border-dark rounded" style="vertical-align: bottom;">
							<div class="pkg2slide1"></div>
							<div class="pkg2slide2"></div>
							<div class="pkg2slide3"></div>
						</div>
						<label class="btncreative btn-1 btn-1a packageradio">
							Select
							<input type="radio" name="radiopkg" value="pkg2">
						</label>
					</div>
				</div>
				<div class="modright1 border-new border border-dark rounded p-3">
					<h5>Package 3</h5>
					<div class="packageList" style="height: 250px;">
						<ul class="list-group">
							<?php
							$sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1 AND map_type = 'modification'";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) 
							{?>
								<li><?php echo $row['map_name']; ?></li>
							<?php }
							?>
						</ul>
					</div>
					<div>
						<div class="pkgslider border-new border border-dark rounded">
							<div class="pkg3slide1"></div>
							<div class="pkg3slide2"></div>
							<div class="pkg3slide3"></div>
						</div>
						<label class="btncreative btn-1 btn-1a packageradio">
							Select
							<input type="radio" name="radiopkg" value="pkg3">
						</label>
					</div>
				</div>
			</div>
			<div><br>
				<h3>Or</h3><br>
				<label class="btncreative btn-1 btn-1a packageradio">
					Choose custom parts
					<input type="radio" name="radiopkg" id="togglecustom" value="2">
				</label><br>
				<div class="customparts"><br>
					<select style="width: 100%" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="multiple"  tabindex="-1" aria-hidden="true" name="select2[]" id="selectbox">\
						<?php
							$sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1 AND map_type = 'modification'";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) 
							{?>
								<option><?php echo $row['map_name']; ?></option>
							<?php }
						?>
					</select>
				</div>
			</div><br><br>
			<div class="modbtn1">
				<button type="submit" name="btnmod" class="btn btn-outline-danger">Next</button>
			</div>
				<!-- <div class="modbtn1">
					<button type="submit" id="btnmod13" name="btnmod13" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
				</div>
			-->
		</div>
	</form>
	<div class="modmain" id="modaftersubmission">

	</div>
</section>
<script type="text/javascript">
	$('.packageradio').click(function() {
		$('.packageradio').removeClass('activeradio');
		$(this).addClass('activeradio');
	});
</script>
<script>
	$(".js-example-responsive").select2({
		minimumResultsForSearch: -1,
		placeholder: "Select..",
    	width: 'resolve' // need to override the changed default
	});
	
</script>
<!-- Footer -->
<?php
include_once 'includes/footer.php';		
?>