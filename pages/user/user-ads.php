<?php
session_start();
include '../../includes/restrictions.inc.php';
user_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
$user_id = $_SESSION['userId'];
$spaartsql = "SELECT * FROM post_ad WHERE idUsers = {$user_id} ORDER BY `ad_date` DESC";;
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
			<h3>Posted Ads.</h3><hr style="border-color:black !important">
		</div>
		
		<div class="row">
			<div style="flex:10%;"></div>
			<div style="flex:15%;margin: auto; width: 50%;"><label>Ad. Title</label></div>
			<div style="flex:35%;margin: auto; width: 50%;"><label>Posted On.</label></div>
			<div style="flex:20%;margin: auto; width: 50%;"><label>Price</label></div>
			<div style="flex:10%;margin: auto; width: 50%;"><label></label></div>
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
				$imgnamesql = "SELECT ad_image_name, MIN(ad_image_thumb) FROM post_ad_images WHERE ad_id = {$row['ad_id']} GROUP BY ad_id;";

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
							<div id="markSold" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <h4 class="modal-title">Remove ad</h4>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      </div>
							      <div class="modal-body">
							        <p>Are you sure you want to remove this ad? You will not be able to undo this action.</p>
							      </div>
							      <div class="modal-footer">
							        <form action="/BikeLabs/includes/markadsold.inc.php?ad_id=<?php echo $row['ad_id']; ?>" method="post">
										<input class="btn-outline-danger btn" type="submit" name="mksold" value="Confirm">
									</form>
							      </div>
							    </div>

							  </div>
							</div>
							<div class="row">
								<div style="flex:10%;" class="pl-3">
									<img class="thumbimg rounded" src="../../images/sparepartimg/<?php echo $row1['ad_image_name'] ?>" style="border:3px solid black;">
								</div>
								<div style="flex: 15%;margin: auto; width: 50%;">
									<label href=""><?php echo $row['ad_title'] ?></label>
								</div>
								<div style="flex: 35%;margin: auto; width: 50%;">
									<label><?php echo $row['ad_date']; ?></label>
								</div>
								<div style="flex: 20%;margin: auto; width: 50%;">
									<p><?php echo $row['ad_price'] ?> Rs.</p>
								</div>
								<div style="flex: 5%;margin: auto; width: 50%;">
									<input type="button" class="btn-outline-danger btn" data-toggle="modal" data-target="#markSold" value="Mark as sold"></input>
									<!-- <form action="/BikeLabs/includes/markadsold.inc.php?ad_id=<?php echo $row['ad_id']; ?>" method="post">
										<input class="btn-outline-danger btn" type="submit" name="mksold" value="Mark as sold">
									</form> -->
								</div>
								<div style="flex: 5%;margin: auto; width: 50%;" class="ml-1">
									<form action="../postad/editad.php?adid=<?php echo $row['ad_id']; ?>" method="post">
										<input class="btn-outline-danger btn" type="submit" name="editad" value="Edit ad.">
									</form>
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
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>
<?php
include_once '../../includes/footer.php';
?>