<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
$title = 'Assign jobs';
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
			<a href="/BikeLabs/pages/admin/admin-jobs.php" class="list-group-item list-group-item-action bg-light">Pending Jobs</a>
			<a href="/BikeLabs/pages/admin/admin-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
			<a href="/BikeLabs/pages/admin/admin-vendor.php" class="list-group-item list-group-item-action bg-light">Vendor management</a>
			<a href="/BikeLabs/pages/admin/admin-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
			<a href="/BikeLabs/pages/admin/admin-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
			<a href="/BikeLabs/pages/admin/admin-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
			<a href="/BikeLabs/pages/admin/admin-bike-parts.php" class="list-group-item list-group-item-action bg-light">Bikes/Parts Posted</a>
			<a href="/BikeLabs/pages/admin/admin-modaltpkg.php" class="list-group-item list-group-item-action bg-light">Edit Mod/Alt packages</a>
		</div>
	</div>
	<section id="modify" class="section bike-parts modsection content content2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12" style="overflow-x:auto;">
					<!-- /.box -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Pending Jobs</h3>
						</div>
						<!-- /.box-header -->
						<form action="/BikeLabs/includes/admin-orders.inc.php" method="post">
							<div class="pb-3 ">
								<label>Select Vendor</label>
								<div class="select-wrap mb-2">
									<select class="custom-select" name="vendor-select" style="width: 15%;">
										<option value="" disabled selected>Select</option>
										<?php

										$sql3 = "SELECT * FROM users WHERE User_type = '2';";
										$stmt3 = mysqli_stmt_init($conn);
										if (!mysqli_stmt_prepare($stmt3, $sql3)) 
										{
											header("Location: ../index.php?error=sqlerror");
											exit();
										}
										else
										{
											mysqli_stmt_execute($stmt3);
											$result3 = mysqli_stmt_get_result($stmt3);
											while($row3 = mysqli_fetch_assoc($result3))
											{
												?>
												<option value="<?php echo $row3['idUsers'] ?>"><?php echo $row3['uidUsers']; ?></option>
												<?php
											}	
										}
										?>
									</select>
								</div>
								<div id="assignJob" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Confirm Assignment</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<p>Please press the button below to Confirm.</p>
											</div>
											<div class="modal-footer">
												<input class="btn btn-primary" type="submit" name="submit-job" value="Confirm">
											</div>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignJob">Assign job</button>
								<!-- <input class="btn btn-primary" type="submit" name="submit-job" value="Assign job"> -->
							</div>
							<?php
							if (isset($_GET['error'])) 
							{
								if ($_GET['error'] == "order") 
								{
									echo '<p style="color:red;padding:5px;";>Select a order to assign!</p>';
								}
								elseif ($_GET['error'] == "vendor") 
								{
									echo '<p style="color:red;padding:5px;";>Select a vendor!</p>';
								}
							}
							?>
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Select</th>
											<th>Order id</th>
											<th>Order type</th>
											<th>Order status</th>
											<th>Order date</th>
											<th>User id</th>
											<th>Order price</th>
											<th>Order quantity</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$sql = "SELECT * FROM order_table WHERE order_status = 'Open';";
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
												echo $orderid;
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
															<td><input type="checkbox" name="order-check[]" value="<?php echo $row['order_id']; ?>"></td>
															<td><?php echo $row['order_id']; ?></td>
															<td><?php echo $row['order_type']; ?></td>
															<td><?php echo $row['order_status']; ?></td>
															<td><?php echo $row['order_date']; ?></td>
															<td><?php echo $row['idUsers']; ?></td>
															<td><?php echo $row2['Order_price']; ?></td>
															<td><?php echo $row2['Order_quantity']; ?></td>
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
											<th>Select</th>
											<th>Order id</th>
											<th>Order type</th>
											<th>Order status</th>
											<th>Order date</th>
											<th>User id</th>
											<th>Order price</th>
											<th>Order quantity</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</form>
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