<?php
$title = 'Payment';
include_once 'includes/header.php';
?>
<section id="payment" class="section paymentsec">
	<div class="container">
		<h1>Your order</h1><br>
		<div class="order-method-div-top p-3 border-new border border-dark rounded" style="border-bottom: 0px !important;">
			<label>Order method:</label>
			<!-- <?php
				//echo POST['ORDER-METHOD'];
			?> -->
			<img src="">
			<a href="addresscon.php" id="orderredirect">Change order method</a>
		</div>
		<div class="cart-div-second p-3 border-new border border-dark border-top-0 rounded">
			<!-- <?php
				//echo POST['order-item(n)'];
			?> -->
			<a href="">Edit your shopping bag</a>
		</div>
		<div class="paymentmain" style="margin-left: 0px;margin-right: 0px">
			<div class="p-3 mt-3 border-new border border-dark rounded paymentleft">
				<div class="payment-method-div-third">
					<div style="width: 98%;">
						<h5>Pay using Cash on delivery</h5><br>
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

			<div class="p-3 mt-3 border-new border-0 border-dark rounded paymentright">
				<h4 class="pb-3">Your cart:</h4>
				<?php
				if(isset($_SESSION['cart']))
				{
					foreach($_SESSION['cart'] as $item)
					{
						echo $item['product_id'];?><br><?php
						echo $item['title'];?><br><?php
						echo $item['price'];?><br><?php
						echo $item['default_img'];?><br><?php
						echo $item['quantity'];?><br><?php
					}
				}

				if (isset($_SESSION['modaddress'])) {
					?>
					<h4>Custom Modification</h4>
					<?php
					foreach ($_SESSION['modcart'] as $item) {
						if ($item['selectedpkg'] == 1) {?>
							<div class="border border-dark border-new"><h5 class="p-2">Selected package</h5><?php echo $item['selectedpkg'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Custom mods (if any)</h5><?php echo $item['description'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Additional parts</h5><br></div>
							<?php 
							foreach ($item['ctmpts'] as $key) {
								echo $key;?><br><?php
							}
							?>
							<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><?php echo $item['price'];?><br></div><?php
						}
						elseif ($item['selectedpkg'] == 2){?>
							<div class="border border-dark border-new"><h5 class="p-2">Selected package</h5><?php echo $item['selectedpkg'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Paint</h5><?php echo $item['paint'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Theme</h5><?php echo $item['theme'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Custom mods (if any)</h5><?php echo $item['description'];?><br></div>
							<div class="border border-dark border-new"><h5 class="p-2">Additional parts</h5>
							<?php 
							foreach ($item['ctmpts'] as $key) {
								echo $key;?><br></div><?php
							}
							?>
							<div class="border border-dark border-new"><h5 class="p-2">Package Price</h5><?php echo $item['price'];?><br></div><?php
						}
						elseif ($item['selectedpkg'] == 3){?>
							<img class="thumbimg"> src="images/<?php echo $item['default_img'] ?>"><br>
							<?php 
							echo "Selected package: " . $item['selectedpkg'];?><br><?php
							echo "Paint: " . $item['paint'];?><br><?php
							echo "Theme: " .$item['theme'];?><br><?php
							echo "Custom mods (if any): " .$item['description'];?><br><?php
							echo "Package Price: " .$item['price'];?><br><?php
						}
					}
				}
				//if (isset($_SESSION['modaddress'])) {
				//
				//}
				?>
				<div class="payment-btn pt-4">
					<button type="submit" id="" name="" class="btn btn-danger" value="">Place order</button>
				</div>
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
?>