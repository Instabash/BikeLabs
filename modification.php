<?php
session_start();
include_once 'header.php'
?>
	
<!-- Modify section -->
<section id="modify" class="section modsection">
		<form id="ajaxform" action = "" method = "POST">
			<div class="container">
				<h3>Select the model and year of your motorbike</h3><br>
				<div class="form-row modmarginleft">
					<div class="col-3">
						<label style="padding: 2px;">Model</label>
						<select class="custom-select" id="modelselect" name="modmodelselect">
						    <option selected>Choose...</option>
						    <option value="70cc">70cc</option>
						    <option value="150cc">150cc</option>
				    		<option value="125cc">125cc</option>
					  	</select>
					</div>
					<div class="col-3"  style="margin-left: 10px">
						<label style="padding: 2px;">Year</label>
						<select class="custom-select" id="yearselect" name="modyearselect">
						    <option selected>Choose...</option>
						    <option value="2018">2018</option>
						    <option value="2017">2017</option>
				    		<option value="2016">2016</option>
					  	</select>
					</div>
				</div>

				<div class="modbtn1">
					<button type="submit" name="btnmod1" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
				</div>
				<!-- <h2 class="section-head">
					<i class="fas fa-cogs"></i> <h1 class="unselectable">Body Modification</h1>
				</h2>
				<p class="lead">Modify your motorbike according to your specific preferences.</br> Add or remove parts from and to your motorbike, change the chassis, or alter the engine.</p>
				<a href="modification.php" class="btn btn-outline-danger mb mt">Start Modifying Now</a>
				<div class='slider border-new border border-dark rounded'>
				  <div class='slide1'></div>
				  <div class='slide2'></div>
				  <div class='slide3'></div>
				</div> -->
			</div>
		</form>
		<div class="modmain" id="modaftersubmission">
			
		</div>
	
	
</section>

	<!-- Footer -->
<?php
include_once 'footer.php';
		
?>