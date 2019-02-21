<?php
// session_start();
include_once 'header.php'
?>
<!-- Modify section -->
<section id="modify" class="section modsection">
		<form id="modform1" action = "" method = "POST">
			<div class="container">
				<h3>Step 1: Select your motorbike</h3><br>
				<h6>Choose the Model, Year, and Make of your Motorbike</h6><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<label style="padding: 2px;">Model</label>
						<select class="custom-select" id="modelselect" name="modmodelselect">
						    <option selected>Choose...</option>
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
						    <option selected>Choose...</option>
						    <option value="2018">2018</option>
						    <option value="2017">2017</option>
				    		<option value="2016">2016</option>
					  	</select>
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3">
						<label style="padding: 2px;">Make</label>
						<select class="custom-select" id="yearselect" name="modmakeselect">
						    <option selected>Choose...</option>
						    <option value="2018">Honda</option>
						    <option value="2017">SuperPower</option>
				    		<option value="2016">Unique</option>
					  	</select>
					</div>
				</div><br><br><br><br>
				<h3>Step 2: Select what to Modify</h3><br>
				<h6>We offer 3 packages of our own</h6><br>
				<div class="row">
					<div class="modleft1 border-new border border-dark rounded p-3">
						<h5>Package 1</h5>
						<div class="packageList">
							<ul>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
							</ul>
						</div>
						<div style="padding-top: 200px">
							<div class="pkgslider border-new border border-dark rounded">
								<div class="pkg1slide1"></div>
								<div class="pkg1slide2"></div>
								<div class="pkg1slide3"></div>
							</div>
							<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
								Select
								<input type="radio" name="radiopkg1" >
							</div>
						</div>
					</div>
					<div class="modmiddle1 border-new border border-dark rounded p-3">
						<h5>Package 2</h5>
						<div class="packageList">
							<ul>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
							</ul>
						</div>
						<div style="padding-top: 100px">
							<div class="pkgslider border-new border border-dark rounded" style="vertical-align: bottom;">
								<div class="pkg2slide1"></div>
								<div class="pkg2slide2"></div>
								<div class="pkg2slide3"></div>
							</div>
							<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
								Select
								<input type="radio" name="radiopkg1" >
							</div>
						</div>
						
					</div>
					<div class="modright1 border-new border border-dark rounded p-3">
						<h5>Package 3</h5>
						<div class="packageList">
							<ul>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
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
								<input type="radio" name="radiopkg1" >
							</div>
						</div>
						
					</div>
				</div>
				<div><br>
					<h3>Or</h3><br>
					<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
						<label>Choose custom parts</label>
						<input type="radio" name="radiopkg1" id="togglecustom" value="2">
					</div><br>
					<div class="customparts"><br>
					  	<select style="width: 100%" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="multiple"  tabindex="-1" aria-hidden="true" name="select2[]" id="selectbox">
						    <option>Headlight</option>
						    <option>Jumps</option>
						    <option>Seats</option>
						    <option>Mudguard</option>
						    <option>Color</option>
						    <option>Chain Spocket</option>
						    <option>Exhaust</option>
						    <option>Tail Light</option>
						</select>
					</div>
				</div><br><br>
				<div class="modbtn1">
					<button type="submit" id="btnmod13" name="btnmod13" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
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
include_once 'footer.php';
		
?>