<?php
session_start();
include '../../includes/restrictions.inc.php';
vendor_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
?>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Vendor Panel
	<button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
</label>
<div class="d-flex" id="wrapper">
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="list-group list-group-flush">
			<a href="/BikeLabs/pages/vendor/vendordash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
			<a href="/BikeLabs/pages/vendor/vendor-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
			<a href="/BikeLabs/pages/vendor/vendor-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
			<a href="/BikeLabs/pages/vendor/vendor-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
			<a href="/BikeLabs/pages/vendor/vendor-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
		</div>
	</div>

	<!-- Main content -->
	<section class="section modsection content content2" style="padding-left:5%;width: 100%;">
		<div class="pb-5" >
			<h4>Vendor panel</h4>
		</div>
		
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">CPU Traffic</span>
						<span class="info-box-number">90<small>%</small></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Likes</span>
						<span class="info-box-number">41,410</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Sales</span>
						<span class="info-box-number">760</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">New Members</span>
						<span class="info-box-number">2,000</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<div class="row pt-5" style="width: 100%;">
			<!-- Left col -->
			<div class="col-sm-6 ">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Latest Orders</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>Order id</th>
										<th>Order type</th>
										<th>Order status</th>
										<th>Order date</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$vendor_name = $_SESSION['userId'];
									$sql = "SELECT * FROM order_table WHERE order_status = 'Approved' AND assigned_vendor = ? LIMIT 5 ;";
									$stmt = mysqli_stmt_init($conn);
									if (!mysqli_stmt_prepare($stmt, $sql)) 
									{
										header("Location: ../index.php?error=sqlerror");
										exit();
									}
									else
									{
										mysqli_stmt_bind_param($stmt, "s", $vendor_name);
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
														<td><a href="pages/examples/invoice.html"><?php echo $row['order_id']; ?></a></td>
														<td><?php echo $row['order_type']; ?></td>
														<td><span class="label label-success"><?php echo $row['order_status']; ?></span></td>
														<td><?php echo $row['order_date']; ?></td>
													</tr>
													<?php
												}
											}
										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix">
						<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- <div class="col-sm-6 ">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Latest members</h3>
					</div>
					
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>Order ID</th>
										<th>Item</th>
										<th>Status</th>
										<th>Popularity</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="pages/examples/invoice.html">OR9842</a></td>
										<td>Call of Duty IV</td>
										<td><span class="label label-success">Shipped</span></td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
									<tr>
										<td><a href="pages/examples/invoice.html">OR1848</a></td>
										<td>Samsung Smart TV</td>
										<td><span class="label label-warning">Pending</span></td>
										<td>
											<div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
									<tr>
										<td><a href="pages/examples/invoice.html">OR7429</a></td>
										<td>iPhone 6 Plus</td>
										<td><span class="label label-danger">Delivered</span></td>
										<td>
											<div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
									<tr>
										<td><a href="pages/examples/invoice.html">OR7429</a></td>
										<td>Samsung Smart TV</td>
										<td><span class="label label-info">Processing</span></td>
										<td>
											<div class="sparkbar" data-color="#00c0ef" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
									<tr>
										<td><a href="pages/examples/invoice.html">OR1848</a></td>
										<td>Samsung Smart TV</td>
										<td><span class="label label-warning">Pending</span></td>
										<td>
											<div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
									<tr>
										<td><a href="pages/examples/invoice.html">OR7429</a></td>
										<td>iPhone 6 Plus</td>
										<td><span class="label label-danger">Delivered</span></td>
										<td>
											<div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
									<tr>
										<td><a href="pages/examples/invoice.html">OR9842</a></td>
										<td>Call of Duty IV</td>
										<td><span class="label label-success">Shipped</span></td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
					
					<div class="box-footer clearfix">
						<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
					</div>
					
				</div> -->
				<!-- /.box -->
			</div>
			<!-- /.col -->


			<!-- /.col -->
		</div>
		

	</section>
	
</div>
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
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>
<?php
include_once '../../includes/footer.php';
?>
