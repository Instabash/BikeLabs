<?php
session_start();
if(!isset($_SESSION['userUId'])){
	$current_page = $_SERVER['REQUEST_URI'];
	$_SESSION['curr_page'] = $current_page;	
	header("Location:LoginOrRegister.php");
}
$title = 'Modification';
include_once 'includes/header.php';
?>
<!-- Modify section -->
<section id="modify" class="section modsection">
		<form id="modform1" action = "includes/modprocess.inc.php" method = "post" autocomplete="off"> 
			<div class="container">
				<h3>Step 1: Select your motorbike</h3><br>
				<h6>Choose the Model, Year, and Make of your Motorbike</h6><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<label style="padding: 2px;">Model</label>
						<select class="custom-select" id="modelselect" name="modmodelselect">
						    <option selected value="">Choose...</option>
						    <option value="70cc">70cc</option>
						    <option value="150cc">125cc</option>
				    		<option value="125cc">150cc</option>
					  	</select>
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3">
						<label style="padding: 2px;">Year</label>
						<select class="custom-select" id="yearselect" name="modyearselect">
						    <option selected value="">Choose...</option>
						    <option value="2018">2018</option>
						    <option value="2017">2017</option>
				    		<option value="2016">2016</option>
					  	</select>
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3">
						<label style="padding: 2px;">Make</label>
						<select class="custom-select" name="modmakeselect">
						    <option selected value="">Choose...</option>
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
							echo '<p style="color:red;padding:5px;";>Please select all fields</p>';
						}
						elseif ($_GET['error'] == "nopkgselected") {
							echo '<p style="color:red;padding:5px;";>Please select a package</p>';
						}
					}
				?>
				<br><br>
				<h3>Step 2: Select what to Modify</h3><br>
				<h6>We offer 3 packages of our own</h6><br>
				<div class="row">
					<div class="modleft1 border-new border border-dark rounded p-3">
						<h5>Package 1</h5>
						<div class="packageList" style="height: 288px;">
							<ul>
								<li>Remove jump cover</li>
								<li>Reflectors</li>
								<li>Remove mudguard</li>
								<li>Body paint (User defined)</li>
							</ul>
						</div>
						<div style="">
							<div class="pkgslider border-new border border-dark rounded">
								<div class="pkg1slide1"></div>
								<div class="pkg1slide2"></div>
								<div class="pkg1slide3"></div>
							</div>
							<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
								Select
								<input type="radio" name="radiopkg" value="pkg1">
							</div>
						</div>
					</div>
					<div class="modmiddle1 border-new border border-dark rounded p-3">
						<h5>Package 2</h5>
						<div class="packageList" style="height: 288px;">
							<ul>
								<li>Remove jump cover</li>
								<li>Reflectors</li>
								<li>HID Lightsgs</li>
								<li>Remove mudguard</li>
								<li>Add theme (User defined)</li>
								<li>Body paint (User defined)</li>
							</ul>
						</div>
						<div style="">
							<div class="pkgslider border-new border border-dark rounded" style="vertical-align: bottom;">
								<div class="pkg2slide1"></div>
								<div class="pkg2slide2"></div>
								<div class="pkg2slide3"></div>
							</div>
							<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
								Select
								<input type="radio" name="radiopkg" value="pkg2">
							</div>
						</div>
					</div>
					<div class="modright1 border-new border border-dark rounded p-3">
						<h5>Package 3</h5>
						<div class="packageList" style="height: 288px;">
							<ul>
								<li>Remove jump cover</li>
							    <li>Reflectors</li>
							    <li>HID Lights</li>
							    <li>Remove mudguard</li>
							    <li>Short meter</li>
							    <li>Remove headlight holders</li>
							    <li>Body paint (User defined)</li>
							    <li>Add theme (User defined)</li>
							</ul>
						</div>
						<div>
							<div class="pkgslider border-new border border-dark rounded">
								<div class="pkg3slide1"></div>
								<div class="pkg3slide2"></div>
								<div class="pkg3slide3"></div>
							</div>
							<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
								Select
								<input type="radio" name="radiopkg" value="pkg3">
							</div>
						</div>
					</div>
				</div>
				<div><br>
					<h3>Or</h3><br>
					<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
						<label>Choose custom parts</label>
						<input type="radio" name="radiopkg" id="togglecustom" value="2">
					</div><br>
					<div class="customparts"><br>
					  	<select style="width: 100%" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="multiple"  tabindex="-1" aria-hidden="true" name="select2[]" id="selectbox">
						    <option>Remove jump cover</option>
						    <option>Reflectors</option>
						    <option>HID Lights</option>
						    <option>Remove mudguard</option>
						    <option>Short meter</option>
						    <option>Remove headlight holders</option>
						    <option>Body paint (User defined)</option>
						    <option>Add theme (User defined)</option>
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
	<!-- Footer -->
<?php
	include_once 'includes/footer.php';		
?>