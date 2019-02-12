<?php
// session_start();
include_once 'header.php'
?>
<!-- Modify section -->
<section id="modify" class="section modsection">
		<form id="modform1" action = "" method = "POST">
			<div class="container">
				<h3>Step 1: Describe your motorbike</h3><br>
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
						<select class="custom-select" id="yearselect" name="modyearselect">
						    <option selected>Choose...</option>
						    <option value="2018">Honda</option>
						    <option value="2017">SuperPower</option>
				    		<option value="2016">Unique</option>
					  	</select>
					</div>
				</div><br>

				<div class="modbtn1">
					<button type="submit" name="btnmod1" class="btn btn-danger" style="margin: 10px;" value="">Next</button>
				</div>
			</div>
		</form>
		<div class="modmain" id="modaftersubmission">
			
		</div>
</section>
	<!-- Footer -->
<?php
include_once 'footer.php';
		
?>