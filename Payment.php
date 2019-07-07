<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
if (!isset($_SESSION['del_method'])) {
	header("Location: index.php");
}
else{
if (isset($_SESSION['modORalt'])) {
	$modoralt = $_SESSION['modORalt'];
}
else{
	$modoralt = "";
}
$title = 'Payment';
include_once 'includes/dbh.inc.php';
include_once 'includes/header.php';
?>
<div id="confirmPay" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirm Transaction</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p>Please press the button below to Confirm.</p>
			</div>
			<div class="modal-footer">
				<form action="includes/payment.inc.php" method="post">
					<div class="payment-btn pt-4">
						<button type="submit" name="btnplaceorder" class="btn btn-outline-danger" value="">Place order</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<section id="payment" class="section paymentsec content">
	<div class="container">
		<h1>Your order</h1><br>
		<div class="order-method-div-top p-3 border-new border border-dark rounded" <?php if(isset($_SESSION['cart'])){?>style="border-bottom: 0px !important;<?php } ?>">
			<label><b>Order method:</b></label>
			<!-- <?php
				//echo POST['ORDER-METHOD'];
			?> -->
			
			<a href="addresscon.php" id="orderredirect">Change order method</a><br><br>
			<div>
				<?php
				if ($modoralt == "modification") 
				{
					?>
					<?php
					if (isset($_SESSION['modaddress'])) {?>
					<p><b>Current address:</b> 
					<?php
						foreach($_SESSION['modaddress'] as $value)
						{
							echo $value['modadhname'] . ", " . $value['modadpcode'] . ", " . $value['modadcountry'];
						}
					}
					?></p><?php 
				}
				if ($modoralt == "alteration") 
				{
					?>
					<?php
					if (isset($_SESSION['altaddress'])) {?>
					<p><b>Current address:</b> 
					<?php
						foreach($_SESSION['altaddress'] as $value)
						{
							echo $value['altadhname'] . ", " . $value['altadpcode'] . ", " . $value['altadcountry'];
						}
					}
					?></p><?php 
				}?>
			</div>
		</div>
		<?php
		if(isset($_SESSION['cart'])){
			?>
			<div class="cart-div-second p-3 border-new border border-dark border-top-0 rounded">
			<!-- <?php
				//echo POST['order-item(n)'];
			?> -->
			<a href="newspareparts.php">Edit your shopping bag</a>
		</div>
	<?php } ?>
	<div class="paymentmain imageDiv" style="margin-left: 0px;margin-right: 0px">
		<div class="p-3 mt-3 border-new border border-dark rounded paymentleft imageDivRight">
			<div class="payment-method-div-third">
				<div style="width: 98%;">
					<h5><b>Pay using Cash on delivery</b></h5><br>
					<p>Depending on your chosen order method above, your payment will be made using cash on delivery</p>
					<?php
		 					//if ($ordermethod == "pickup") {
		 						# code...
		 					//}
		 					//else if($ordermethod == "dropoff"){
		 						# code...
		 					//}
					?>

				</div>

			</div>
		</div>

		<div class="p-3 mt-3 border-new border-0 border-dark rounded paymentright imageDivRight">
			<h4 class="pb-3">Your cart</h4><hr>
			<?php
			if(isset($_SESSION['cart']))
			{
				$total_price = 0;
				foreach($_SESSION['cart'] as $item)
				{
					$priceind = $item['price'];
					$pricetotal = $priceind*$item['quantity'];
					$total_price += $pricetotal;
					?>

					<label><b>Product Name: </b></label>
					<label><?php echo $item['title'];?></label><br>
					<label><b>Product Price: </b></label>
					<label><?php echo $item['price'];?> Rs.</label><br>
					<label><b>Product quantity: </b></label>
					<?php
					if (isset($item['quantity'])) {
						?>
						<label><?php echo $item['quantity'];?></label><br>
						<?php
					}
					else{
						?>
						<label><?php echo "1"; ?></label>
						<?php
					}
					?><hr>
					<?php 
				}
				echo "<label><b>Total Price</label></b><br>";
				echo "<label>$total_price Rs.</label>";
			}

			if (isset($_SESSION['bikecart'])) {
				$total_price = 0;
				foreach($_SESSION['bikecart'] as $item)
				{
					$priceind = $item['price'];
					$pricetotal = $priceind*$item['quantity'];
					$total_price += $pricetotal;
					?>

					<label><b>Product Name: </b></label>
					<label><?php echo $item['title'];?></label><br>
					<label><b>Product Price: </b></label>
					<label><?php echo $item['price'];?> Rs.</label><br>
					<label><b>Product quantity: </b></label>
					<?php
					if (isset($item['quantity'])) {
						?>
						<label><?php echo $item['quantity'];?></label><br>
						<?php
					}
					else{
						?>
						<label><?php echo "1"; ?></label>
						<?php
					}
					?><hr>
					<?php 
				}
				echo "<label><b>Total Price</label></b><br>";
				echo "<label>$total_price Rs.</label>";
			}

			if ($modoralt == "modification") 
			{
				?>
				<h4><b>Custom Modification</b></h4><br>
				<?php
				foreach ($_SESSION['modcart'] as $item) {
					if ($item['selectedpkg'] == 1) {?>
						<div class="accordion-group" id="make">
							<div class="accordion-heading">
								<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
									<b><h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
									<a href="#">Click for package details
										<i class="fa fa-caret-down"></i>
									</a>
								</div>
							</div>
							<div id="collapse_0" class="accordion-body in collapse" style="">
								<ul style="list-style: none; padding: 10px;">
									<?php
									$sql = "SELECT * FROM modaltpackages WHERE map_pkg_1 = 1 AND map_type = 'modification'";
									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_assoc($result)) 
									{?>
										<li><?php echo $row['map_name']; ?></li>
									<?php }
									?>
								</ul>
							</div>
						</div>
						<!-- <div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div> -->
						<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
						<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div><?php
					}
					elseif ($item['selectedpkg'] == 2){?>
						<div class="accordion-group" id="make">
							<div class="accordion-heading">
								<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
									<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
									<a href="#">Click for package details
										<i class="fa fa-caret-down"></i>
									</a>
								</div>
							</div>
							<div id="collapse_0" class="accordion-body in collapse" style="">
								<ul style="list-style: none; padding: 10px;">
									<?php
									$sql = "SELECT * FROM modaltpackages WHERE map_pkg_2 = 1 AND map_type = 'modification'";
									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_assoc($result)) 
									{?>
										<li><?php echo $row['map_name']; ?></li>
									<?php }
									?>
								</ul>
							</div>
						</div>
							<!-- <div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Theme</h5><?php echo $item['theme'];?><br></div> -->
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div><?php
							}
							elseif ($item['selectedpkg'] == 3){?>
								<div class="accordion-group" id="make">
									<div class="accordion-heading">
										<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
											<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
											<a href="#">Click for package details
												<i class="fa fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div id="collapse_0" class="accordion-body in collapse" style="">
										<ul style="list-style: none; padding: 10px;">
											<?php
											$sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1 AND map_type = 'modification'";
											$result = mysqli_query($conn, $sql);
											while ($row = mysqli_fetch_assoc($result)) 
											{?>
												<li><?php echo $row['map_name']; ?></li>
											<?php }
											?>
										</ul>
									</div>
								</div>
							<!-- <div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Theme</h5><?php echo $item['theme'];?><br></div> -->
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div>

							<?php }
							elseif ($item['selectedpkg'] == "custom") {?>
								<div class="accordion-group" id="make">
									<div class="accordion-heading">
										<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
											<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
											<a href="#">Click for package details
												<i class="fa fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div id="collapse_0" class="accordion-body in collapse" style="">
										<ul style="list-style: none; padding: 10px;">
											<?php 
											foreach($_SESSION['pkg4'] as $key=>$value)
												{?>
													<li><?php echo $value; ?></li>

												<?php }
												?>
											</ul>
										</div>
									</div>
							<!-- <div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Theme</h5><?php echo $item['theme'];?><br></div> -->
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div>

							<?php }
						}
					}
					elseif ($modoralt == "alteration") {
						?>
						<h4>Custom Alteration</h4><br>
						<?php
						foreach ($_SESSION['altcart'] as $item) {
							if ($item['selectedpkg'] == 1) {?>
								<div class="accordion-group" id="make">
									<div class="accordion-heading">
										<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
											<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
											<a href="#">Click for package details
												<i class="fa fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div id="collapse_0" class="accordion-body in collapse" style="">
										<ul style="list-style: none; padding: 10px;">
											<li>Chain spocket</li>
											<li>Silencer</li>
											<li>Carburetor</li>
											<li>Remove filter pipe</li>
										</ul>
									</div>
								</div>
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div><?php
							}
							elseif ($item['selectedpkg'] == 2){?>
								<div class="accordion-group" id="make">
									<div class="accordion-heading">
										<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
											<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
											<a href="#">Click for package details
												<i class="fa fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div id="collapse_0" class="accordion-body in collapse" style="">
										<ul style="list-style: none; padding: 10px;">
											<li>Piston (0, 50, 90)</li>
											<li>Weights</li>
											<li>Head Cylinder (124cc)</li>
										</ul>
									</div>
								</div>
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div><?php
							}
							elseif ($item['selectedpkg'] == 3){?>
								<div class="accordion-group" id="make">
									<div class="accordion-heading">
										<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
											<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
											<a href="#">Click for package details
												<i class="fa fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div id="collapse_0" class="accordion-body in collapse" style="">
										<ul style="list-style: none; padding: 10px;">
											<li>Genuine 70cc Carburetor</li>
											<li>Genuine 70cc Piston</li>
											<li>Genuine 70cc Head Cylinder</li>
											<li>Genuine 70cc Chain Spocket</li>
											<li>Genuine 70cc Silencer</li>
											<li>Genuine 70cc Pipes</li>
											<li>Genuine 70cc Weights</li>
										</ul>
									</div>
								</div>
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div>

							<?php }
							elseif ($item['selectedpkg'] == "custom") {?>
								<div class="accordion-group" id="make">
									<div class="accordion-heading">
										<div class="border border-dark border-new accordion-toggle collapsed" data-toggle="collapse" href="#collapse_0" aria-expanded="false">
											<h5 class="p-2">Selected package</h5><p><b><?php echo $item['selectedpkg'];?></b></p>
											<a href="#">Click for package details
												<i class="fa fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div id="collapse_0" class="accordion-body in collapse" style="">
										<ul style="list-style: none; padding: 10px;">
											<?php 
											foreach($_SESSION['pkg4'] as $key=>$value)
												{?>
													<li><?php echo $value; ?></li>

												<?php }
												?>
											</ul>
										</div>
									</div>
							<!-- <div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Theme</h5><?php echo $item['theme'];?><br></div> -->
								<div class="border border-dark border-new"><h5 class="p-2">Instructions for mechanic</h5><label><?php echo $item['description'];?></label><br></div>
								<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><label><?php echo $item['price']." Rs.";?></label><br></div>

							<?php }
						}
					}
					?>
					<div class="payment-btn pt-4">
						<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmPay">Buy</button>
					</div>
					<!-- <form action="includes/payment.inc.php" method="post">
						<div class="payment-btn pt-4">
							<button type="submit" name="btnplaceorder" class="btn btn-outline-danger" value="">Place order</button>
						</div>
					</form> -->
				</div>
			</div>

		</div>
	</section>		
	<script type="text/javascript" src="script/getparameters.js"></script>
	<script>

	// $('#orderredirect').click(function() {
	// 	var a = document.getElementById('orderredirect'); 
	// 	a.href = "addresscon.php?quant="+quant;
	// });
	var query = window.location.search.substring(1);
	var qs = parse_query_string(query);

	var partid = localStorage.getItem('partid'); //part-id from spareparttemp.php
	console.log(partid);	

	// console.log(qs.quant);	
	
	var title = qs.title;
	localStorage.setItem('title', title); //title from addresscon.php
	var third = localStorage.getItem('title');
	console.log(third);	

	var fname = qs.fname;
	localStorage.setItem('fname', fname); //fname from addresscon.php
	var fourth = localStorage.getItem('fname');
	console.log(fourth);	

	var lname = qs.lname;
	localStorage.setItem('lname', lname); //lname from addresscon.php
	var fifth = localStorage.getItem('lname');
	console.log(fifth);	

	var phone = qs.phone;
	localStorage.setItem('phone', phone); //phone from addresscon.php
	var sixth = localStorage.getItem('phone');
	console.log(sixth);	

	var countryorregion = qs.countryorregion;
	localStorage.setItem('countryorregion', countryorregion); //countryorregion from addresscon.php
	var seventh = localStorage.getItem('countryorregion');
	console.log(seventh);	

	var hnameorno = qs.hnameorno;
	localStorage.setItem('hnameorno', hnameorno); //hnameorno from addresscon.php
	var eigth = localStorage.getItem('hnameorno');
	console.log(eigth);	

	var pcode = qs.pcode;
	localStorage.setItem('pcode', pcode); //pcode from addresscon.php
	var ningth = localStorage.getItem('pcode');
	console.log(ningth);	

</script>
<?php
include_once 'includes/footer.php';
}
?>