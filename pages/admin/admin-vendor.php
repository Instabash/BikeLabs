<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
$title = 'Manage vendors';
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
							<h3 class="box-title">Vendor management</h3>
						</div>
						<!-- /.box-header -->
						<form action="/BikeLabs/includes/signup.inc.php" method="post">
							<div class="pt-4  p-5">
								<label class="pb-3">Add a new vendor</label>
								<?php
								if (isset($_GET['error'])) 
								{
									if ($_GET['error'] == "emptyfields") 
									{
										echo '<p style="color:red !important;padding:5px;";>Fill in all fields</p>';
									}
									elseif ($_GET['error'] == "invalidmailuid") 
									{
										echo '<p style="color:red !important;padding:5px;";>Invalid Username and e-mail!</p>';
									}
									elseif ($_GET['error'] == "invaliduid") 
									{
										echo '<p style="color:red !important;padding:5px;";>Invalid Username!</p>';
									}
									elseif ($_GET['error'] == "invalidmail") 
									{
										echo '<p style="color:red !important;padding:5px;";>Invalid e-mail!</p>';
									}
									elseif ($_GET['error'] == "usertaken") 
									{
										echo '<p style="color:red !important;padding:5px;";>Username is taken!</p>';
									}
									elseif ($_GET['error'] == "invalidphone") 
									{
										echo '<p style="color:red !important;padding:5px;";>You have entered an invalid phone number!</p>';
									}
									elseif ($_GET['error'] == "passwordcheck") 
									{
										echo '<p style="color:red !important;padding:5px;";>Passwords do not match!</p>';
									}
									elseif ($_GET['error'] == "pwdstr") 
									{
										echo '<p style="color:red !important;padding:5px;";>Please enter a strong password!</p>';
									}

								}
								if (isset($_GET['signup'])) {
									if ($_GET['signup'] == "success") 
									{
										echo '<p style="color:green!important;padding:5px;";>Vendor added!</p>';
									}
								}
								?>
								<div class=" ">
									<div class="" >
										<input class="form-control" type="text" name="uid" placeholder="Vendor name" value="<?= isset($_GET['uid']) ? $_GET['uid'] : ''; ?>">
									</div>
								</div><br>
								<div class=" ">
									<div class="" >
										<input class="form-control" type="text" name="mail" placeholder="E-mail" value="<?= isset($_GET['mail']) ? $_GET['mail'] : ''; ?>">
									</div>
								</div><br>
								<div class=" ">
									<div class="" >
										<input class="form-control" type="text" name="phone" placeholder="Phone" value="<?= isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
									</div>
								</div><br>
								<div class=" ">
									<div class="" >
										<input class="form-control" type="text" name="address" placeholder="Address" value="<?= isset($_GET['address']) ? $_GET['address'] : ''; ?>">
									</div>
								</div><br>
								<div class=" ">
									<div class="" >
										<input class="form-control" type="password" name="pwd" placeholder="Password">
									</div>
								</div><br>
								<div class=" ">
									<div class="" >
										<input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
									</div>
								</div><br>
								<div class=" modmarginleft">
									<div class="" >
										<button class="btn btn-primary" type="submit" name="signup-vendor">Submit</button>
									</div>
								</div>
							</div>
						</form>
						<form action="/BikeLabs/includes/removevendor.inc.php" method="post">
							<div class="box-body">
								<label class="">All vendors</label>
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Select</th>
											<th>Vendor id</th>
											<th>Vendor name</th>
											<th>Vendor contact information</th>
											<th>Vendor address</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$sql = "SELECT * FROM users WHERE User_type = '2';";
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
													<td><input type="checkbox" name="rem-vendor-check[]" value="<?php echo $row['idUsers']; ?>"></td>
													<td><?php echo $row['idUsers']; ?></td>
													<td><?php echo $row['uidUsers']; ?></td>
													<td><?php echo $row['User_Contact']; ?></td>
													<td><?php echo $row['User_Address']; ?></td>
												</tr>
												<?php
											}
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th>Select</th>
											<th>Vendor id</th>
											<th>Vendor name</th>
											<th>Vendor contact information</th>
											<th>Vendor address</th>
										</tr>
									</tfoot>
								</table>
							</div> 
							<div id="remVendor" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Confirm removal</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p>Please press the button below to Confirm.</p>
										</div>
										<div class="modal-footer">
											<input class="btn btn-primary" type="submit" name="submit-remove" value="Confirm">
										</div>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#remVendor">Remove vendor</button>
							<!-- <input class="btn btn-primary" type="submit" name="submit-remove" value="Remove vendor"> -->
						</form>
						<?php
							if (isset($_GET['error'])) 
							{
								if ($_GET['error'] == "selectvendor") 
								{
									echo '<p style="color:red;padding:5px;";>Select a vendor!</p>';
								}
							}
						?>
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
<?php
include_once '../../includes/footer.php';
?>