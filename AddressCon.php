<?php
session_start();
if(!isset($_SESSION['userUId'])){
	$current_page = $_SERVER['REQUEST_URI'];
	$_SESSION['curr_page'] = $current_page;	
	header("Location:LoginOrRegister.php");
}
$title = 'Address Confirmation';
include_once 'includes/header.php';
?>
<!-- Payment/Confirmation section -->
<section id="addresscon" class="section addressconsec">
	<div class="container">
		<h3>How would you like to recieve your order?</h3><br>
		<form class="p-2" action="includes/addresscon.inc.php" method="post">
			<div class="form-check-inline">
				<div class="btncreative btn-1 btn-1a" onclick="switch_div(1)">
					<label>Home Pickup</label>
				</div>
				<div class="btncreative btn-1 btn-1a" onclick="switch_div(2)" >
					<label>Drop off</label>
				</div>
			</div>
			<div class="homepickup-pick hide <?php if (isset($_GET['error'])) {echo 'show';} ?>" id="show_1">
				<h4 class="p-3">Where are we picking up your motorbike from?</h4>
				<div class="home-pick form-wrap clearfix border-new border border-dark rounded">
					<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == "emptyfields") 
						{
							echo '<p style="color:red;padding:5px;";>Please fill in all fields</p>';
						}
						elseif ($_GET['error'] == "invalidchar") {
							echo '<p style="color:red;padding:5px;";>Please enter valid characters</p>';
						}
						elseif ($_GET['error'] == "invalidphone") {
							echo '<p style="color:red;padding:5px;";>Please enter a valid phone number</p>';
						}
						elseif ($_GET['error'] == "invalidpcode") {
							echo '<p style="color:red;padding:5px;";>Please enter a valid postal code</p>';
						}
					}
					?>
					<div class="form-row p-2 pt-4 mb-3">
						<label for="title">Title</label>
						<div class="select-wrap ">
							<select class="btn" name="title" id="title">
								<option value="Mr" selected="selected">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Miss">Miss</option>
								<option value="Ms">Ms</option>
								<option value="Dr">Dr</option>
								<option value="Rev">Rev</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>First Name</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="fname" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Last Name</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="lname" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Phone Number</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="phone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Country/Region</label>
						<div class="select-wrap mb-3">
							<select class="btn" name="countryorregion" id="countryreg">
								<option value="IS" selected="selected">Islamabad</option>
								<option value="KHI">Karachi</option>
								<option value="LH">Lahore</option>
								<option value="RW">Rawalpindi</option>
								<option value="PSW">Peshawar</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>House name/Number</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="hnameorno" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Postcode</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="pcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="addressbtn" style="float:right;padding:10px;">
						<button type="submit" id="" name="homepickbtn" class="btn btn-outline-danger" value="">Use this address</button>
					</div>
				</div>
			</div>
			<div class="dropoff-pick form-wrap clearfix hide border-new border border-dark rounded" id="show_2">
				<h4 class="p-3">Which store would you like to drop off your motorbike?</h4>
				<p class="text-left p-3">Find your nearest store</p>
				<div class="form-row pl-3">
					<div class="select-wrap">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="near-store" placeholder="Enter town or postcode" aria-label="Enter town or postcode" aria-describedby="basic-addon1">
						</div>
					</div>
					<div class="addressbtn pl-4">
						<button type="submit" id="" name="" class="btn btn-outline-danger" value="">Find stores</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<script type="text/javascript" src="script/getparameters.js"></script>
<script>
	var firstData = sessionStorage.getItem('partid');
	console.log(firstData);	

	// var query = window.location.search.substring(1);
	// var qs = parse_query_string(query);
	// // console.log(qs.quant);
	// var quant1 = qs.quant;
	
 //  		localStorage.setItem('quant', quant1);	
 

 
 
 
	// var second = sessionStorage.getItem('quant');
	// console.log(second);	
</script>
<?php
include_once 'includes/footer.php';
?>