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

	<!-- Main content -->
	<section class="section modsection content content2" style="padding-left:5%;width: 100%;">
		<div class="pb-5" >
			<h4>Admin panel</h4>
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
			<div class="col-sm-6 ">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Latest members</h3>
					</div>
					<!-- /.box-header -->
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
