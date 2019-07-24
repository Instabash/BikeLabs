<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
$title = 'Dashboard';
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
include '../../includes/sidebar.inc.php';
?>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Admin Panel
	<button class="btn" id="menu-toggle"><img style="width: 10px;" src="../../images/bars-solid.svg"></button>
</label>
<div class="d-flex" id="wrapper">
	<?php
	adminsidebar();
	?>
	
	<!-- Main content -->
	<section class="section modsection content content2" style="padding-left:5%;width: 100%;">
		<div class="pb-5" >
			<h4>Admin panel</h4>
		</div>
		<div class="row pt-2" style="width: 100%;">
			<!-- Left col -->
			<div class="col-sm-6 ">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Latest Orders</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
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

									$sql = "SELECT * FROM order_table WHERE order_status = 'Processing' AND assigned_vendor = '12' ORDER BY order_date DESC LIMIT 5;";
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
														<td><span class="label label-success"><?php echo $row['order_id']; ?></span></td>
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
						<a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-primary pull-right">View All Orders</a>
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
							<table id="example2" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Username</th>
										<th>User email</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sql = "SELECT * FROM users WHERE User_type = '0' LIMIT 5;";
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
											
											?>
											<tr>
												<td><span class="label label-success"><?php echo $row['uidUsers']; ?></span></td>
												<td><?php echo $row['emailUsers']; ?></td>
											</tr>
											<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
					<!-- /.box-body -->
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->

			<div class="col-sm-6 pt-5">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Latest messages</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<table id="example3" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sender</th>
										<th>Time</th>
										<th>Message</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$receiver = $_SESSION['userUId'];
									$sql = "SELECT * FROM chat_message WHERE receiver_name = '$receiver';";
									$stmt = mysqli_stmt_init($conn);
									if (!mysqli_stmt_prepare($stmt, $sql)) 
									{
										echo("sql error");
										echo mysqli_error($conn);
										exit();
									}
									else
									{
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										while($row = mysqli_fetch_assoc($result))
										{
											
											?>
											<tr>
												<td><span class="label label-success"><?php echo $row['sender_name']; ?></span></td>
												<td><?php echo $row['time_stamp']; ?></td>
												<td><span class="label label-success"><?php echo $row['chat_message']; ?></span></td>
											</tr>
											<?php

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
						<a href="../chat.php" class="btn btn-sm btn-primary pull-right">Go to chat</a>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		

	</section>
	
</div>
<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable()
		$('#example3').DataTable()
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
