<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Alteration';
include_once 'includes/header.php';
?>
<section id="alter" class="section modsection">
	<form id="modform1" action = "includes/altprocess.inc.php" method = "post" autocomplete="off">
		<div class="container">
			<h3>Step 1: Select your motorbike</h3><br>
			<h6>Choose the Model, Year, and Make of your Motorbike</h6><br>
			<div class="form-row modmarginleft">
				<div class="col-4 select-small" >
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
				<div class="col-4 select-small">
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
				<div class="col-4 select-small">
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
			<div style="text-align: center;">
				<div class="btncreative btn-1 btn-1a" onclick="switch_div(1);" style="text-align: center;">
					Genuine
				</div>
				<div class="btncreative btn-1 btn-1a" onclick="switch_div(2);" style="text-align: center;">
					Alter
				</div>
			</div><br>
			<div class="fullAlter hide" id="show_1" style="margin-bottom: 20px;">
				<h3>Step 3: Select what to Modify</h3><br>
				<h6>We offer 2 packages of our own</h6><br>
				<div class="row">
					<div class="modleft1 border-new border border-dark rounded p-3">
						<h5>Package 1</h5>
						<div class="packageList" style="height: 250px;">
							<ul>
								<li>Handle bar</li>
								<li>Air Filter</li>
								<li>NGK Sparkplugs</li>
								<li>Exhaust & Silencer</li>
							</ul>
						</div>
						<div>
							<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
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
							</div>
							<label class="btncreative btn-1 btn-1a packageradio">
								Select
								<input type="radio" name="altradiopkg" value="pkg1">
							</label>
						</div>
					</div>
					<div class="modright1 border-new border border-dark rounded p-3">
						<h5>Package 2</h5>
						<div class="packageList" style="height: 250px;">
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
						<div>
							<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
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
							</div>
							<label class="btncreative btn-1 btn-1a packageradio">
								Select
								<input type="radio" name="altradiopkg" value="pkg2">
							</label>
						</div>
					</div>
				</div>
				
			</div>
			<div class="alterGenuine hide" id="show_2">
				<h3>Step 3: Select what to Modify</h3><br>
				<div class="border-new border border-dark rounded p-3">
					<h5>Package 1</h5>
					<div class="packageList" style="height: 250px;">
						<ul>
							<li>Handle bar</li>
							<li>Air Filter</li>
							<li>NGK Sparkplugs</li>
							<li>Exhaust & Silencer</li>
						</ul>
					</div>
					<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
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
					</div>
					<label class="btncreative btn-1 btn-1a packageradio">
						Select
						<input type="radio" name="altradiopkg" value="pkg3">
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
<?php
include_once 'includes/footer.php';
?>