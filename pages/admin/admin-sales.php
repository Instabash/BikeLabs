<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
?>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Admin Panel
	<button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
</label>
<div class="d-flex" id="wrapper">
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="list-group list-group-flush">
			<a href="/BikeLabs/pages/admin/admindash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
			<a href="/BikeLabs/pages/admin/admin-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
			<a href="/BikeLabs/pages/admin/admin-vendor.php" class="list-group-item list-group-item-action bg-light">Vendor management</a>
			<a href="/BikeLabs/pages/admin/admin-user.php" class="list-group-item list-group-item-action bg-light">User management</a>
			<a href="/BikeLabs/pages/admin/admin-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
			<a href="/BikeLabs/pages/admin/admin-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
			<a href="/BikeLabs/pages/admin/admin-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
		</div>
	</div>
	<section id="modify" class="section modsection content content2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- /.box -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Sales</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Order id</th>
										<th>Order type</th>
										<th>Order status</th>
										<th>Order date</th>
										<th>User id</th>
										<th>Order price</th>
										<th>Order quantity</th>
										<th>Order address</th>
									</tr>
								</thead>
								<tbody>
										<?php
										$sql = "SELECT * FROM order_table WHERE order_status = 'Shipped';";
										$stmt = mysqli_stmt_init($conn);
										if (!mysqli_stmt_prepare($stmt, $sql)) 
										{
											header("Location: ../index.php?error=sqlerror");
											exit();
										}
										else
										{
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											while($row = mysqli_fetch_assoc($result))
											{
												$orderid = $row['order_id'];
												$sql2 = "SELECT * FROM order_items WHERE order_id = ?;";
												$stmt2 = mysqli_stmt_init($conn);
												if (!mysqli_stmt_prepare($stmt2, $sql2)) 
												{
													header("Location: ../index.php?error=sqlerror");
													exit();
												}
												else
												{
													mysqli_stmt_bind_param($stmt2, "s", $orderid);
													mysqli_stmt_execute($stmt2);
													$result2 = mysqli_stmt_get_result($stmt2);
													while($row2 = mysqli_fetch_assoc($result2))
													{
														?>
														<tr>
															<td><?php echo $row['order_id']; ?></td>
															<td><?php echo $row['order_type']; ?></td>
															<td><?php echo $row['order_status']; ?></td>
															<td><?php echo $row['order_date']; ?></td>
															<td><?php echo $row['idUsers']; ?></td>
															<td><?php echo $row2['Order_price']; ?></td>
															<td><?php echo $row2['Order_quantity']; ?></td>
															<td><?php echo $row2['Order_Address']; ?></td>
														</tr>
														<?php
													}
												}
											}
										}
										?>
									</tbody>
								<tfoot>
									<tr>
										<th>Order id</th>
										<th>Order type</th>
										<th>Order status</th>
										<th>Order date</th>
										<th>User id</th>
										<th>Order price</th>
										<th>Order quantity</th>
										<th>Order address</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
		</div>
	</section>
</div>

<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>
<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>
<?php
include_once '../../includes/footer.php';
?>