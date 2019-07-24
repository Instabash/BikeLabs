<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
$title = 'Posted bikes/parts';
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
	<section id="modify" class="bike-parts section modsection content content2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12" style="overflow-x:auto;">
					<!-- /.box -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Posted Bikes or Parts</h3>
						</div>
						<!-- /.box-header -->
						
						<div class="box-body" >
							<label class="">Posted Bikes</label>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Bike ID</th>
										<th>Bike brand</th>
										<th>Bike model</th>
										<th>Bike year</th>
										<th>Bike price</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sql = "SELECT * FROM bikes WHERE idUsers = '12';";
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
										$i = 1;
										while($row = mysqli_fetch_assoc($result))
										{
											?>
											<tr>
												<td><?php echo $row['bike_id']; ?></td>
												<td><?php echo $row['bike_brand']; ?></td>
												<td><?php echo $row['bike_model']; ?></td>
												<td><?php echo $row['bikeyear']; ?></td>
												<td><?php echo $row['bike_price']; ?></td>
												<td>
													<form action="/BikeLabs/includes/markadsold.inc.php?part_id=<?php echo $row['bike_id']; ?>" method="post">
														<div id="remBike<?php echo $i; ?>" class="modal fade" role="dialog">
															<div class="modal-dialog">
															<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Confirm Removal</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<div class="modal-body">
																		<p>Please press the button below to Confirm.</p>
																	</div>
																	<div class="modal-footer">
																		<input class="btn-outline-danger btn" type="submit" name="remove-bike" value="Confirm">
																	</div>
																</div>
															</div>
														</div>
														<button type="button" class="btn-outline-danger btn" data-toggle="modal" data-target="#remBike<?php echo $i; ?>">Remove Bike</button>
														<!-- <input class="btn-outline-danger btn" type="submit" name="remove-bike" value="Remove Bike"> -->
													</form>
												</td>
											</tr>
											<?php
											$i++;
										}
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>Bike ID</th>
										<th>Bike brand</th>
										<th>Bike model</th>
										<th>Bike year</th>
										<th>Bike price</th>
										<th>Remove</th>
									</tr>
								</tfoot>
							</table>
						</div> 
						<br>
						
						<div class="box-body">
							<label class="">Posted Parts</label>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Part ID</th>
										<th>Part Name</th>
										<th>Part Price</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sql = "SELECT * FROM spare_parts WHERE idUsers = '12';";
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
										$j = 1;
										while($row = mysqli_fetch_assoc($result))
										{
											?>
											<tr>
												<td><?php echo $row['part_id']; ?></td>
												<td><?php echo $row['part_name']; ?></td>
												<td><?php echo $row['part_price']; ?></td>
												<td>
													<form action="/BikeLabs/includes/markadsold.inc.php?part_id=<?php echo $row['part_id']; ?>" method="post">
														<div id="remPart<?php echo $j; ?>" class="modal fade" role="dialog">
															<div class="modal-dialog">
															<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Confirm Removal</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<div class="modal-body">
																		<p>Please press the button below to Confirm.</p>
																	</div>
																	<div class="modal-footer">
																		<input class="btn-outline-danger btn" type="submit" name="remove-part" value="Confirm">
																	</div>
																</div>
															</div>
														</div>
														<button type="button" class="btn-outline-danger btn" data-toggle="modal" data-target="#remPart<?php echo $j; ?>">Remove Part</button>
														<!-- <input class="btn-outline-danger btn" type="submit" name="remove-part" value="Remove Part"> -->
													</form>
												</td>
											</tr>
											<?php
											$j++;
										}
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>Part ID</th>
										<th>Part Name</th>
										<th>Part Price</th>
										<th>Remove</th>
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
<?php
include_once '../../includes/footer.php';
?>