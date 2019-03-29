<?php
	session_start();
	if(!isset($_SESSION['userUId'])){
		$current_page = $_SERVER['REQUEST_URI'];
		$_SESSION['curr_page'] = $current_page;
	   	header("Location:LoginOrRegister.php");
	}
	$title = 'Post an advert';
	include_once 'includes/header.php';
?>

<section id="postad" class="section postadsection">
	<div class="container">
		<div>
			<h4>What are you selling?</h4>
			<div class="btncreative btn-1 btn-1a" onclick="switch_div(1);">
				Motorbikes
			</div>
			<div class="btncreative btn-1 btn-1a" onclick="switch_div(2);">
				Spare Parts
			</div>
		</div><br>
		<div class="fullAlter hide" id="show_1">
			<h4 class="p-3">Please add the following details to submit your advert</h4>
			<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
				<form class="p-2" action="includes/postadbike.inc.php" method="post" enctype="multipart/form-data">
					<div class="form-row p-2 pt-4 mb-3">
						<label for="title">Title</label>
						<div>
							<div class="input-group">
								<input type="text" class="form-control" name="bktitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Condition</label>
						<div class="select-wrap mb-2">
							<select class="btn" name="bkcondition" id="title">
								<option value="" disabled selected>Select</option>
								<option value="New">New</option>
								<option value="Used">Used</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Make</label>
						<div class="select-wrap mb-2">
							<select class="btn" name="bkmake" id="title">
								<option value="" disabled selected>Select</option>
								<option value="2018">Honda</option>
							    <option value="2017">SuperPower</option>
					    		<option value="2016">Unique</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2 pt-4 mb-3">
						<label for="title">Year</label>
						<div>
							<div class="input-group">
								<input type="text" class="form-control" name="bkyear" placeholder="Year" aria-label="Year" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Description</label>
						<div>
							<div class="input-group mb-3">
								<textarea class="form-control" rows="5" cols="50" name="bkdescription" id="description" style="resize: none;"></textarea>
							</div>
						</div>
					</div>
					<div class="form-row pl-2 pr-2 pt-2">
						<label>Price</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="bkprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>House name/Number</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="bkhomename" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Postcode</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="bkpcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Country/Region</label>
						<div class="select-wrap mb-3">
							<select class="btn" name="bkcountryregion" id="title">
								<option value="IS" selected="selected">Islamabad</option>
								<option value="KHI">Karachi</option>
								<option value="LH">Lahore</option>
								<option value="RW">Rawalpindi</option>
								<option value="PSW">Peshawar</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Phone Number</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="bkphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row pl-2 pr-2 pb-3 field" align="left">
						<div style="padding-top: 20px;">
							<label>Upload some images. (Minimum 5.)</label>
						</div>
						<div style="padding-top: 20px;max-width: 630px;">
							<input type="file" id="bkfiles" name="files[]" multiple />
						</div>
					</div>
					<div class="addressbtn" style="float:right;padding:10px;">
						<button type="submit" name="bksubmit" class="btn btn-outline-danger">Post the advert</button>
					</div>
				</form>
			</div>
		</div>
		<div class="fullAlter hide" id="show_2">
			<h4 class="p-3">Please add the following details to submit your advert</h4>
			<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
				<form class="p-2" id="form" action="includes/postadsp.inc.php" method="post" enctype="multipart/form-data">
					<div class="form-row p-2 pt-4 mb-3">
						<label for="title">Title</label>
						<div>
							<div class="input-group">
								<input type="text" class="form-control" name="sptitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Condition</label>
						<div class="select-wrap mb-2">
							<select class="btn" name="spcondition" id="title">
								<option value="" disabled selected>Select</option>
								<option value="New">New</option>
								<option value="Used">Used</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Description</label>
						<div>
							<div class="input-group mb-3">
								<textarea class="form-control" rows="5" cols="50" id="description" name="spdescription" style="resize: none;"></textarea>
							</div>
						</div>
					</div>
					<div class="form-row pl-2 pr-2 pt-2">
						<label>Price</label>
							<div>
						<div class="input-group mb-3">
								<input type="text" class="form-control" name="spprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>House name/Number</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="sphomename" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Postcode</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="sppcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Country/Region</label>
						<div class="select-wrap mb-3">
							<select class="btn" name="spcountryregion" id="title">
								<option value="IS" selected="selected">Islamabad</option>
								<option value="KHI">Karachi</option>
								<option value="LH">Lahore</option>
								<option value="RW">Rawalpindi</option>
								<option value="PSW">Peshawar</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Phone Number</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="spphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row pl-2 pr-2 pb-3 field" align="left">
						<div style="padding-top: 20px;">
							<label>Upload some images. (Minimum 5.)</label>
						</div>
						<div style="padding-top: 20px;max-width: 630px;">
							<input type="file" id="spfiles" name="files[]" multiple />
						</div>
					</div>
					<div class="addressbtn" style="float:right;padding:10px;">
						<button type="submit" name="spsubmit" class="btn btn-outline-danger">Post the advert</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>

</script>
<?php	
	include_once 'includes/footer.php';
?>