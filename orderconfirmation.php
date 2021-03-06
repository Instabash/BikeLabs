<?php
session_start();
if (isset($_SESSION['order_id'])) {
include 'includes/restrictions.inc.php';
logged_in();
$title = 'Order confirmation';
require_once 'includes/header.php';
include_once 'includes/dbh.inc.php';
?>

<div id="" class="section orderconsec content">

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
					<form method="post" action="includes/printpdf.inc.php">
						<button type="submit" name="print-vouchers" class="btn btn-outline-danger mt-3 print-remove">Print</button>
					</form>
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
					$firstBreak = strpos($output, '<br />');
					$firstWord = explode(' ',trim($output))[0];
					$firstWord = trim($firstWord,'<br');
					if($firstWord == "Modification" || $firstWord == "Alteration") {
						$output = str_replace(',', '<br />', $row['order_summary']);
						$firstBreak = strpos($output, '<br />');
						if($firstBreak === false) {
						    $output = "<b>$output</b>";
						} else {
						    $output = '<b>' . substr($output, 0, $firstBreak) . '</b>' . substr($output, $firstBreak);
						}
						echo $output;
					}
					else{
						$output = str_replace('.', '<br /><br>', $row['order_summary']);
						$firstBreak = strpos($output, '<br />');
						$output = '<b>' . substr($output, 0, $firstBreak) . '</b>' . substr($output, $firstBreak);
						echo $output;
					}
				?>
				</p>
			</div>
			<div class="pt-5 pr-4 pl-4">
				<h3>Payment information</h3>
			</div>
			<hr>
			<div style="padding: 10px;">
				<p><b>Price</b></p>
				<p>
				<?php
					// echo $row['payment_type'];
				$order_id = $_SESSION["order_id"];
				$pricesql = "SELECT * FROM order_items WHERE order_id = ?";
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $pricesql)) {
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "s", $order_id);
					mysqli_stmt_execute($stmt);
					$result2 = mysqli_stmt_get_result($stmt);

					if($row2 = mysqli_fetch_assoc($result2))
					{
						echo $row2['Order_price'] ." Rs.";
					}
				}
				?>
				</p>
			</div>
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
</div>

<?php
	include_once 'includes/footer.php';
	}
	else{
		header("Location: index.php");
	}
?>