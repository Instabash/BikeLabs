<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Order confirmation';
include_once 'includes/header.php';
include_once 'includes/dbh.inc.php';
?>

<section id="" class="section orderconsec content">
	<div class="container">
		<div class="pb-4">
			<h3>Thank you for your order</h3>
		</div>

		<div class="border-new border border-dark rounded p-3">
			<div class="pt-2 pr-4 pl-4">
				<b><h3>Order number</h3></b>
				<h3><?php
						$order_id = $_SESSION["order_id"];
						$ordernosql = "SELECT * FROM invoice WHERE order_id = ?";
						$stmt = mysqli_stmt_init($conn);

						if (!mysqli_stmt_prepare($stmt, $ordernosql)) {
							echo "SQL statement failed";
						}
						else
						{
							mysqli_stmt_bind_param($stmt, "s", $order_id);
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);

							if($row = mysqli_fetch_assoc($result))
							{
								echo $row['order_id'];
							
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
			<div style="padding: 10px;">
				<p><b>Delivery for</b></p>
				<p>
				<?php
					echo $row['uidUsers'];
				?>
				</p>
			</div>
			<div style="padding: 10px;">
				<p><b>Address</b></p>
				<p>
				<?php
					echo $row['user_address'];
				?>
				</p>
			</div>
			<div style="padding: 10px;">
				<p><b>Delivery method</b></p>
				<p>
				<?php
					echo $row['delivery_method'];
				?>
				</p>
			</div>
			<div class="pt-5 pr-4 pl-4">
				<b><h3>Order summary</h3></b>
			</div>
			<hr>
			<div style="padding: 10px;">
				<p>
				<?php
					$output = str_replace(',', '<br />', $row['order_summary']);
					echo $output;
				?>
				</p>
			</div>
			<div class="pt-5 pr-4 pl-4">
				<h3>Payment information</h3>
			</div>
			<hr>
			<div style="padding: 10px;">
				<p><b>Payment type</b></p>
				<p>
				<?php
					echo $row['payment_type'];
				?>
				</p>
			</div>
			<div style="padding: 10px;">
				<p><b>Billing address</b></p>
				<p>
				<?php
					echo $row['billing_address'];
				}
			}
			?>
			</p>
			</div>
		</div>
	</div>
</section>

<?php
	include_once 'includes/footer.php';
?>