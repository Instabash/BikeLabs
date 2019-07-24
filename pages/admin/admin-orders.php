<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
$title = 'Orders';
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
include '../../includes/sidebar.inc.php';
?>
<!-- Sidebar -->
<style type="text/css">
	.dataTables_info{
		color: black;
	}
</style>
<label href="#" class="list-group-item" style="width: auto;">Admin Panel
	<button class="btn" id="menu-toggle"><img style="width: 10px;" src="../../images/bars-solid.svg"></button>
</label>
<div class="d-flex" id="wrapper">
	<?php
	adminsidebar();
	?>
	<section id="modify" class="section bike-parts modsection content content2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12" style="overflow-x:auto;">
					<!-- /.box -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Pending Orders</h3>
						</div>
						<!-- /.box-header -->
						<form action="/BikeLabs/includes/admin-orders.inc.php" method="post">
							<div class="pb-3">
								<div id="apprOrder" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Confirm</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<p>Please press the button below to Confirm.</p>
											</div>
											<div class="modal-footer">
												<input class="btn btn-primary" type="submit" name="admin-appr-order" value="Approve Order">
											</div>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#apprOrder">Approve Order</button>
								<!-- <input class="btn btn-primary" type="submit" name="admin-appr-order" value="Approve Order"> -->
							</div>
							<?php
							if (isset($_GET['error'])) 
							{
								if ($_GET['error'] == "order") 
								{
									echo '<p style="color:red;padding:5px;";>Select a order to approve!</p>';
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
											<th>Order Address</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$sql = "SELECT * FROM order_table WHERE order_status = 'Processing' AND assigned_vendor = '12';";
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
															<td><input type="checkbox" name="admin-appr-check[]" value="<?php echo $row['order_id']; ?>"></td>
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
											<th>Select</th>
											<th>Order id</th>
											<th>Order type</th>
											<th>Order status</th>
											<th>Order date</th>
											<th>User id</th>
											<th>Order price</th>
											<th>Order quantity</th>
											<th>Order Address</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</form>
						<div>
							<!-- <div class="box-body">
								<div class="pb-3">
								<input class="btn btn-primary" type="submit" name="admin-sold-order" value="Mark Order As Sold">
							</div> -->
							<div class="box-header">
								<h3 class="box-title">Order details</h3>
							</div><hr style="color: black;">
							<div class="row pt-5 ">
								<div class="col-sm-6 bike-table" style="overflow-x:auto;">
									<div class="box-header">
										<h3 class="box-title">Bike Order Detail</h3>
									</div>
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Order id</th>
												<!-- 	<th>Order price</th> -->
												<th>Bike Brand</th>
												<th>Bike Model</th>
												<th>Bike Year</th>
												<th>Bike Description</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT * FROM order_table WHERE order_status = 'Processing' AND assigned_vendor = '12';";
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
															$bike_id = $row2['Order_type_ID'];
															$sql3 = "SELECT * FROM bikes WHERE bike_id = ?;";
															$stmt3 = mysqli_stmt_init($conn);
															if (!mysqli_stmt_prepare($stmt3, $sql3)) 
															{
																header("Location: ../index.php?error=sqlerror");
																exit();
															}
															else
															{
																mysqli_stmt_bind_param($stmt3, "s", $bike_id);
																mysqli_stmt_execute($stmt3);
																$result3 = mysqli_stmt_get_result($stmt3);
																while ($row3 = mysqli_fetch_assoc($result3)) 
																{
																	?>
																	<tr>
																		<td><?php echo $row['order_id']; ?></td>
																		<!-- <td><?php echo $row2['Order_price']; ?></td> -->
																		<td><?php echo $row3['bike_brand']; ?></td>
																		<td><?php echo $row3['bike_model']; ?></td>
																		<td><?php echo $row3['bikeyear']; ?></td>
																		<td><?php echo $row3['bike_desc']; ?></td>
																	</tr>
																	<?php
																}
															}
														}
													}
												}
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>Order id</th>
												<!-- 	<th>Order price</th> -->
												<th>Bike Brand</th>
												<th>Bike Model</th>
												<th>Bike Year</th>
												<th>Bike Description</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="col-sm-6 part-table" style="overflow-x:auto;">
									<div class="box-header">
										<h3 class="box-title">Part Order Detail</h3>
									</div>
									<table id="example4" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Order id</th>
												<th>Order price</th>
												<th>Part Name</th>
												<th>Part Description</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT * FROM order_table WHERE order_status = 'Processing' AND assigned_vendor = '12';";
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
															$part_id = $row2['Order_type_ID'];
															$sql3 = "SELECT * FROM spare_parts WHERE part_id = ?;";
															$stmt3 = mysqli_stmt_init($conn);
															if (!mysqli_stmt_prepare($stmt3, $sql3)) 
															{
																header("Location: ../index.php?error=sqlerror");
																exit();
															}
															else
															{
																mysqli_stmt_bind_param($stmt3, "s", $part_id);
																mysqli_stmt_execute($stmt3);
																$result3 = mysqli_stmt_get_result($stmt3);
																while ($row3 = mysqli_fetch_assoc($result3)) 
																{
																	?>
																	<tr>
																		<td><?php echo $row['order_id']; ?></td>
																		<td><?php echo $row2['Order_price']; ?></td>
																		<td><?php echo $row3['part_name']; ?></td>
																		<td><?php echo $row3['part_description']; ?></td>
																	</tr>
																	<?php
																}
															}
														}
													}
												}
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>Order id</th>
												<th>Order price</th>
												<th>Part Name</th>
												<th>Part Description</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					<!-- /.box-body -->
				</div>
				<!-- /.col -->
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
	</section>
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

		$('#example1').DataTable(
		{
			'paging'      : true,
			'searching'   : false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : false
		})
		
	})
	$('#example3').DataTable(
	{
		'paging'      : true,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false
	})
	$('#example4').DataTable(
	{
		'paging'      : true,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false
	})
</script>
<?php
include_once '../../includes/footer.php';
?>