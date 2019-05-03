<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Payment';
include_once 'includes/dbh.inc.php';
include_once 'includes/header.php';
	// $part_id = $_GET["partid"];
?>
<section id="cart" class="section fontsec content">
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
								if (!empty($_SESSION["cart"])) {?>
							<table style="width:100%">
								<tr>
									<th><input type="checkbox" name="checkAll"><a style="padding-left:5px;">Select Items</a></th>
									<th></th>
									<th>Price</th>
									<th>Quantity</th>
								</tr>
								<?php
									foreach($_SESSION['cart'] as $item)
									{
										?>
										<form action="includes/cartprocess.inc.php?partid=<?php echo $item['product_id'] ?>" method="post">
											<tr>
												<td align="center" valign="middle">
													<input type="checkbox" name="checkitem">
													<img class="thumbimg" src="images/sparepartimg/<?php echo $item['default_img'];?>">
													<a href=""><?php echo $item['title'];?></a>
												</td>
												<td>
													<button class="btn btn-danger" type="submit" name="removeItem">remove</button>
												</td>
												<td align="center" valign="middle">
													<p><?php echo $item['price'];?></p>
												</td>
												<td align="center" valign="middle">
												<?php 
													if (!isset($item['quantity'])) {
												?>
													<p>1</p>
													<?php 
														}
														else{
													?>
													<p><?php echo $item['quantity']; }?></p>
												</td>
											</tr>
										</form>
										<?php 
									}
								}
								else
									{?>
										<p>There are no items in your cart..</p><?php
									}
									?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php
			if (!empty($_SESSION["cart"])) 
				{
			?>
			<div class="p-3 mt-3 border-new border-0 border-dark rounded paymentright">
				<h4 class="pb-3">Your cart:</h4>
				<?php
					$total_price = 0;
					foreach($_SESSION['cart'] as $item)
					{
						?>
						<div class="row">
							<div class="payment-total-left">
								<p class="border border-dark border-left-0"><?php echo $item['title'];?></p>
							</div>
							<div class="payment-total-right">
								<p class="border-top border-bottom border-dark"><?php echo $item['price'];?></p>
							</div>
						</div>
						<?php
						$total_price += $item['price'];
					}?>
				}
				<div class="row mt-5">
					<div class="payment-total-left">
						<p class="border border-dark border-left-0">Tax:</p>
						<p class="border-right border-bottom border-dark">Subtotal:</p>
						<p class="border-right border-bottom border-dark">Total:</p>
					</div>
					<div class="payment-total-right">
						<p class="border-top border-bottom border-dark">41414rs</p>
						<p class="border-bottom border-dark">1414141rs</p>
						<p class="border-bottom border-dark"><?php echo $total_price; ?></p>
					</div>
				</div>

				<div class="payment-btn pt-4">
					<button type="submit" id="" name="" class="btn btn-danger" value="">Place order</button>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>