<?php
	include_once 'header.php';
?>

<section id="" class="section orderconsec">
	<div class="container">
		<div class="pb-4">
			<h3>Thank you for your order</h3>
		</div>

		<div class="border-new border border-dark rounded p-3">
			<div class="pt-2 pr-4 pl-4">
				<b><h3>Order number</h3></b>
				<h3><?php
						//POST['order-number'];
					?></h3>
				<button type="submit" id="" name="" class="btn btn-danger mt-3" style="" value="">Print</button>
			</div>
			<hr>
			<div>
				<p>We are currently processing your order and we will email you with confirmation shortly.</p>
				<p>For your convenience you may want to save your order confirmation.</p>
			</div>
			<div class="pt-5 pr-4 pl-4">
				<b><h3>Delivery Details</h3></b>
			</div>
			<hr>
			<div>
				<b>Delivery for</b>
				<?php
					//POST['username'];
				?>
			</div>
			<div>
				<b>Address</b>
				<?php
					//POST['user_address'];
				?>
			</div>
			<div>
				<b>Delivery method</b>
				<?php
					//POST['delivery_method'];
				?>
			</div>
			<div class="pt-5 pr-4 pl-4">
				<b><h3>Order summary</h3></b>
				<?php
					//POST['order_item'];
					//POST['order_qty'];
					//POST['order_price'];
				?>
			</div>
			<hr>
			<div class="pt-5 pr-4 pl-4">
				<h3>Payment information</h3>
			</div>
			<hr>
			<div>
				<b>Payment type</b>
			</div>
			<div>
				<b>Billing address</b>
			</div>
		</div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>