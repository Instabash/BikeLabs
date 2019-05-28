<?php
session_start();
include '../../includes/restrictions.inc.php';
user_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
$user_id = $_SESSION['userId'];
$spaartsql = "SELECT * FROM order_table WHERE idUsers = {$user_id} AND order_status = 'Processing';";
$stmt = mysqli_stmt_init($conn);
?>
<label href="#" class="list-group-item" style="width: auto;">User Panel
	<button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
</label>
<div class="d-flex" id="wrapper">
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="list-group list-group-flush">
			<a href="/BikeLabs/pages/user/userdash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
			<a href="/BikeLabs/pages/user/user-ads.php" class="list-group-item list-group-item-action bg-light">Posted Adverts.</a>
			<a href="/BikeLabs/pages/user/user-purchases.php" class="list-group-item list-group-item-action bg-light">Past Purchases</a>
			<a href="/BikeLabs/pages/user/user-pending-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
		</div>
	</div>

	<!-- Main content -->
	<section class="section modsection content content2" style="padding-left:5%;width: 100%;">
		<div class="pb-5" >
			<h3>Pending Orders</h3><hr style="border-color:black !important">
		</div>
		
		<div class="row">
			<div style="width: 15%;margin-left: 25px;"><label>Order type</label></div>
			<div style="width: 15%;"><label>Order status</label></div>
			<div style="width: 15%;"><label>Order data</label></div>
			<div style="width: 15%;"><label>Order address</label></div>
			<div style="width: 15%;"><label>Order price</label></div>
			<div style="width: 15%;"><label>Order quantity</label></div>
		</div>
		<?php 
		if(!mysqli_stmt_prepare($stmt, $spaartsql))
		{
			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$isOdd = true;
			while ($row = mysqli_fetch_assoc($result)) {
				$imgnamesql = "SELECT * FROM order_items WHERE order_id = {$row['order_id']};";

				if(!mysqli_stmt_prepare($stmt, $imgnamesql))
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_execute($stmt);
					$result1 = mysqli_stmt_get_result($stmt);

					while ($row1 = mysqli_fetch_assoc($result1)) 
					{
										//echo $row['ad_image_name'];

						?>
						<div class="p-3 mt-3 border-new border border-dark rounded " style="width: 100%;border-radius: 8px !important;<?php if ($isOdd) {
							echo 'background-color: #f8f9fa;';
						}
						else{
							echo "background-color: white;";
						}
						$isOdd = ! $isOdd;
						?>">
						
							<div class="row">
								<div style="width: 15%;margin-left: 20px;">
									<label href=""><?php echo $row['order_type'] ?></label>
								</div>
								<div style="width: 15%;">
									<label><?php echo $row['order_status']; ?></label>
								</div>
								<div style="width: 15%;">
									<label><?php echo $row['order_date'] ?></label>
								</div>
								<div style="width: 15%;">
									<label><?php echo $row1['Order_Address'] ?></label>
								</div>
								<div style="width: 15%;" class="ml-1">
									<label><?php echo $row1['Order_price'] ?> Rs.</label>
								</div>
								<div style="width: 5%;" class="ml-1">
									<label><?php echo $row1['Order_quantity'] ?></label>
								</div>
							</div>

						
					</div>
					<?php 
				}			
			}
		}	
	}
	?>>
</section>	
</div>
<script>
	$('#example1').DataTable(
	{
		'paging'      : true,
		'searching'   : false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false
	})
	
</script>
<?php
include_once '../../includes/footer.php';
?>