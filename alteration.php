<?php
	$title = 'Alteration';
	include_once 'includes/header.php';
?>
<section id="alter" class="section modsection">
	<form id="modform1" action = "includes/altprocess.inc.php" method = "post" autocomplete="off">
			<div class="container">
				<h3>Step 1: Select your motorbike</h3><br>
				<h6>Choose the Model, Year, and Make of your Motorbike</h6><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<label style="padding: 2px;">Model</label>
						<select class="custom-select" id="modelselect" name="altmodelselect">
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
						<select class="custom-select" id="yearselect" name="altyearselect">
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
						<select class="custom-select" id="yearselect" name="altmakeselect">
						    <option selected>Choose...</option>
						    <option value="Honda">Honda</option>
						    <option value="SuperPower">SuperPower</option>
				    		<option value="Unique">Unique</option>
					  	</select>
					</div>
				</div><br><br><br><br>
				<h3>Step 2: </h3><br>
				<h6>What alteration would you like to make to your motorbike?</h6><br>
				<div>
					<div class="btncreative btn-1 btn-1a" onclick="switch_div(1);">
						Genuine
					</div>
					<div class="btncreative btn-1 btn-1a" onclick="switch_div(2);">
						Alter
					</div>
				</div><br>
				<div class="fullAlter hide" id="show_1">
					<h3>Step 3: Select what to Modify</h3><br>
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
							<div style="padding-top: 100px">
								<div class="pkgslider2 border-new border border-dark rounded">
									<div class="pkg1slide1"></div>
									<div class="pkg1slide2"></div>
									<div class="pkg1slide3"></div>
								</div>
								<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
									Select
									<input type="radio" name="genradiopkg1" >
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
							<div >
								<div class="pkgslider2 border-new border border-dark rounded" style="vertical-align: bottom;">
									<div class="pkg2slide1"></div>
									<div class="pkg2slide2"></div>
									<div class="pkg2slide3"></div>
								</div>
								<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
									Select
									<input type="radio" name="genradiopkg2" >
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
				</div>
				<div class="alterGenuine hide border-new border border-dark rounded p-3" style="width: 50%;margin-left: 25%;margin-bottom: 20px;" id="show_2">
					<h5>Package 1</h5>
					<div class="packageList" style="">
						<ul>
							<li>Handle bar</li>
							<li>Air Filter</li>
							<li>NGK Sparkplugs</li>
							<li>Exhaust & Silencer</li>
						</ul>
					</div>
					<div class="pkgslider2 border-new border border-dark rounded">
						<div class="pkg1slide1"></div>
						<div class="pkg1slide2"></div>
						<div class="pkg1slide3"></div>
					</div>
					<div class="border-new border border-dark rounded" style="background-color: #dc3545;">
						Select
						<input type="radio" name="altradiopkg1" >
					</div>
				</div>
				<div class="modbtn1">
					<button type="submit" id="btnmod13" name="btnalt" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
				</div>
				<!-- <div class="modbtn1">
					<button type="submit" id="btnmod13" name="btnmod13" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
				</div>
				-->
			</div>
		</form>
</section>
<hr>

	<!-- Footer -->
<?php
	include_once 'includes/footer.php';
?>