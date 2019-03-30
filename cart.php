<?php
	$title = 'Payment';
	include_once 'includes/dbh.inc.php';
	include_once 'includes/header.php';
	$part_id = $_GET["partid"];

?>

<section id="cart" class="section fontsec">
	<div class="container">
		<div class="paymentmain" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft">
				<div class="p-3 mt-3 border-new border border-dark rounded ">
				<div class="payment-method-div-third">
					<div style="width: 98%;">
		 				<h5 style="text-align: center">Your cart</h5><br>
		 				
		 				
					</div>
					
				</div>
			</div>
			<div class="p-3 mt-3 border-new border border-dark rounded ">
				<div class="payment-method-div-third">
					<div style="width: 98%;">

						

		 				
		 				<?php
		 					foreach($_SESSION['cart'] as $item)
								{?>
									<input type="checkbox" name="checkitem"><?php
								    echo $item['product_id'];?><br><?php
								    echo $item['title'];?><br><?php
								    echo $item['price'];?><br><?php
								    echo $item['default_img'];?><br><?php
								    echo $item['quantity'];?><br><?php
								}
		 				?>


					</div>
					
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
	include_once 'includes/footer.php';
?>