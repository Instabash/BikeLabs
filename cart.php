<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Cart';
include_once 'includes/dbh.inc.php';
include_once 'includes/header.php';
?>
<section id="cart" class="section fontsec content">
	<div class="container">
		<div class="paymentmain imageDiv" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft imageDivRight">
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
									<tr class="cartHeadings">
										
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
													
													<img class="border border-dark border-new thumbimg p-1" src="images/sparepartimg/<?php echo $item['default_img'];?>">
													
													<a href="#"><?php echo $item['title'];?></a>
												</td>
												<td>
													<button class="btn btn-outline-danger cartRem" type="submit" name="removeItem" >remove</button>
													<button class="btn btn-danger cartRemx" type="submit" name="removeItem" style="display: none;">x</button>
												</td>
												<td align="center" valign="middle">
													<p><?php echo $item['price'];?> Rs.</p>
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
														<p><?php echo $item['quantity']; $quant = $item['quantity']; }?></p>
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
						<div class="p-3 mt-3 border-new border-0 border-dark rounded paymentright imageDivRight">
							<h4 class="pb-3">Your cart:</h4>
							<?php
							$total_price = 0;
							$tax = 500;
							$subtotal = 0;
							foreach($_SESSION['cart'] as $item)
							{
								$priceind = $item['price'];
								$pricetotal = $priceind*$item['quantity'];
								?>
								<div class="row">
									<div class="payment-total-left">
										<p class="border border-dark border-left-0"><?php echo $item['title'];?></p>
									</div>
									<div class="payment-total-right">
										<p class="border-top border-bottom border-dark"><?php echo $pricetotal;?> Rs.</p>
									</div>
								</div>
								<?php
								$subtotal += $pricetotal;
								$total_price = $subtotal+$tax;
							}?>
						}
						<div class="row mt-5">
							<div class="payment-total-left">
								<p class="border border-dark border-left-0">Tax:</p>
								<p class="border-right border-bottom border-dark">Subtotal:</p>
								<p class="border-right border-bottom border-dark">Total:</p>
							</div>
							<div class="payment-total-right">
								<p class="border-top border-bottom border-dark"><?php echo $tax; ?> Rs.</p>
								<p class="border-bottom border-dark"><?php echo $subtotal; ?> Rs.</p>
								<p class="border-bottom border-dark"><?php echo $total_price; ?> Rs.</p>
							</div>
						</div>
						<form action="/BikeLabs/includes/cartprocess.inc.php" method="post">
							<div class="payment-btn pt-4">
								<input type="hidden" name="quant" value="<?php echo $quant ?>">
								<button type="submit" name="cartBuy-parts" class="btn btn-outline-danger">Proceed to checkout</button>
							</div>
						</form>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<?php
	include_once 'includes/footer.php';
	?>