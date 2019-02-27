<?php
	$title = 'Payment';
	include_once 'header.php';
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
			<a href="">Change order method</a>
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
				<div class="row">
					<div class="payment-total-left">
						<p class="border border-dark border-left-0">Item #1:</p>
						<p class="border-bottom border-right border-dark">Item #2:</p>
						<p class="border-bottom border-right border-dark">Item #3:</p>
						<p class="border-bottom border-right border-dark">Item #4:</p>
						<p class="border-bottom border-right border-dark">Item #5:</p>
					</div>
					<div class="payment-total-right">
						<p class="border-top border-bottom border-dark">4231rs</p>
						<p class="border-bottom border-dark">141rs</p>
						<p class="border-bottom border-dark">14141414rs</p>
						<p class="border-bottom border-dark">1414rs</p>
						<p class="border-bottom border-dark">111rs</p>
					</div>
				</div>
				<div class="row mt-5">
					<div class="payment-total-left">
						<p class="border border-dark border-left-0">Tax:</p>
						<p class="border-right border-bottom border-dark">Subtotal:</p>
						<p class="border-right border-bottom border-dark">Total:</p>
					</div>
					<div class="payment-total-right">
						<p class="border-top border-bottom border-dark">41414rs</p>
						<p class="border-bottom border-dark">1414141rs</p>
						<p class="border-bottom border-dark">14141414rs</p>
					</div>
				</div>
				
				<div class="payment-btn pt-4">
					<button type="submit" id="" name="" class="btn btn-danger" value="">Place order</button>
				</div>
			</div>
		</div>
		
	</div>
</section>		

<?php
	include_once 'footer.php';
?>