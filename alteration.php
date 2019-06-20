<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Alteration';
include_once 'includes/header.php';
?>
<section id="alter" class="section modsection content">
	<form id="modform1" action = "includes/altprocess.inc.php" method = "post" autocomplete="off">
		<div class="container">
			<h3>Step 1: Select your motorbike</h3><br>
			<h6>Choose the Model, Year, and Make of your Motorbike</h6><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small" >
					<label class="pr-2">Model</label>
					<select class="custom-select js-example-responsive" id="modelselect" name="altmodelselect">
						<option selected value="">Model</option>
						<option value="70cc">70cc</option>
						<option value="150cc">125cc</option>
						<option value="125cc">150cc</option>
					</select>
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small">
					<label class="pr-2">Year</label>
					<select class="custom-select js-example-responsive" id="yearselect" name="altyearselect">
						<option selected value="">Year</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
					</select>
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small">
					<label class="pr-2">Make</label>
					<select class="custom-select js-example-responsive" id="makeselect" name="altmakeselect">
						<option selected value="">Make</option>
						<option value="Honda">Honda</option>
						<option value="SuperPower">SuperPower</option>
						<option value="Unique">Unique</option>
					</select>
				</div>
			</div><br><br>
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") 
				{
					echo '<p style="color:red !important ;padding:5px;";>Please select all fields</p>';
				}
				elseif ($_GET['error'] == "nopkgselected") {
					echo '<p style="color:red !important ;padding:5px;";>Please select a package</p>';
				}
			}
			?>
			<br><br>
			<h3>Step 2: </h3><br>
			<h6>What alteration would you like to make to your motorbike?</h6><br>
			<div style="text-align: center;">
				<div class="btncreative btn-1 btn-1a" onclick="switch_div(1);" style="text-align: center;">
					Alter
				</div>
				<div class="btncreative btn-1 btn-1a" onclick="switch_div(2);" style="text-align: center;">
					Genuine
				</div>
			</div><br>
			<div class="fullAlter hide" id="show_1" style="margin-bottom: 20px;">
				<h3>Step 3: Select what to Modify</h3><br>
				<h6>We offer 2 packages of our own</h6><br>
				<div class="row">
					<div class="modleft1 border-new border border-dark rounded p-3" style="margin:0 5px 0 100px;">
						<h5>Package 1</h5>
						<div class="packageList" style="height: 250px;">
							<ul>
								<li>Chain Spocket</li>
								<li>Silencer</li>
								<li>Carburetor</li>
								<li>Remove filter pipe</li>
							</ul>
						</div>
						<div>
							<!-- <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
								<div class="carousel-inner" >
									<div class="carousel-item active" data-interval="3000">
										<img src="images/modify.jpg" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item" data-interval="3000">
										<img src="images/modify2.jpg" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item" data-interval="3000">
										<img src="images/modify3.jpg" class="d-block w-100" alt="...">
									</div>
								</div>
							</div> -->
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
					<div class="modright1 border-new border border-dark rounded p-3" style="margin:0 100px 0 5px;">
						<h5>Package 2</h5>
						<div class="packageList" style="height: 250px;">
							<ul>
								<li>Piston (0, 50, 90)</li>
								<li>Weights</li>
								<li>Head Cylinder (124cc)</li>
							</ul>
						</div>
						<div class="">
							<div class="pkgslider border-new border border-dark rounded">
								<div class="pkg1slide1"></div>
								<div class="pkg1slide2"></div>
								<div class="pkg1slide3"></div>
							</div>
							<label class="btncreative btn-1 btn-1a packageradio">
								Select
								<input type="radio" name="radiopkg" value="pkg2">
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
						<select style="width: 100%" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="multiple"  tabindex="-1" aria-hidden="true" name="select2[]" id="selectbox">
							<option>Chain Spocket</option>
							<option>Carburetor</option>
							<option>Silencer</option>
							<option>Remove filter pipe</option>
							<option>Piston</option>
							<option>Weights</option>
							<option>Head Cylinder</option>
						</select>
					</div>
				</div><br><br>
			</div>
			<div class="alterGenuine hide" id="show_2" style="margin:0 300px 0 300px;">
				<h3>Step 3: Select what to Modify</h3><br>
				<div class="border-new border border-dark rounded p-3">
					<h5>Package 1</h5>
					<div class="packageList" style="height: 250px;">
						<ul>
							<li>Genuine 70cc Carburetor</li>
							<li>Genuine 70cc Piston</li>
							<li>Genuine 70cc head cylinder</li>
							<li>Genuine 70cc chain spocket</li>
							<li>Genuine 70cc silencer</li>
							<li>Genuine 70cc pipes</li>
							<li>Genuine 70cc Weights</li>
						</ul>
					</div>
					<div class="pkgslider border-new border border-dark rounded">
						<div class="pkg1slide1"></div>
						<div class="pkg1slide2"></div>
						<div class="pkg1slide3"></div>
					</div>
					<label class="btncreative btn-1 btn-1a packageradio">
						Select
						<input type="radio" name="radiopkg" value="pkg3">
					</label>
				</div>
			</div>
			<div class="modbtn1">
				<button type="submit" name="btnalt" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
			</div>
		</div>
	</form>
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
<?php
include_once 'includes/footer.php';
?>