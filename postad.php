<?php
$title = 'Post an advert';
include_once 'header.php'
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
			<div class="home-pick form-wrap clearfix border-new border border-dark rounded">
				<form class="p-2">
					<div class="form-row p-2 pt-4 mb-3">
						<label for="title">Title</label>
						<div>
							<div class="input-group">
								<input type="text" class="form-control" name="title" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Condition</label>
						<div class="select-wrap mb-2">
							<select class="btn" name="title" id="title">
								<option value="" disabled selected>Select</option>
								<option value="New">New</option>
								<option value="Used">Used</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Description</label>
						<div class="">
							<div class="input-group mb-3">
								<textarea class="form-control" rows="5" cols="50" id="description" style="resize: none;"></textarea>
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Price</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Upload some images. (Minimum 5.)</label>
						<div class="" style="padding-top: 20px;">
							<button type="button" class="btn btn-outline-secondary">Upload</button>
						</div>
					</div>
					<div class="hide">
						<p>images uploaded:<?php
								//echo $_POST['imgs_uploaded'];
						?></p>
						<img src="images/<?php //echo POST['userupload'] ?>">
					</div>
					<div class="form-row p-2">
						<label>House name/Number</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="hname-no" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1">
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
					<div class="form-row p-2">
						<label>Country/Region</label>
						<div class="select-wrap mb-3">
							<select class="btn" name="country-region" id="title">
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
								<input type="text" class="form-control" name="phone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="addressbtn" style="float:right;padding:10px;">
						<button type="submit" id="" name="" class="btn btn-outline-danger" value="">Post the advert</button>
					</div>
				</form>
			</div>
		</div>
		<div class="fullAlter hide" id="show_2">
			<form id="adformparts" action = "" method = "POST">

			</form>
		</div>
	</div>
</section>

<?php	
include_once 'footer.php'
?>