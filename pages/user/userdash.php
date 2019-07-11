<?php
session_start();
include '../../includes/restrictions.inc.php';
user_protect();
$title = 'Dashboard';
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
$user_id = $_SESSION['userId'];
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
			<h3>User Panel</h3>
		</div>
		
		<div>
			<b><h4>Account Information</h4></b>
		</div>

		<div class="border border-new border-black p-5 rounded mt-3">
			<?php		
				$sqlacc = "SELECT * FROM users WHERE idUsers = ?";
				$stmt = mysqli_stmt_init($conn);
				

				if (!mysqli_stmt_prepare($stmt, $sqlacc)) 
				{
					header("Location: userdash.php?error=sqlerror");
					exit();	
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "s", $user_id);
					mysqli_stmt_execute($stmt);

					$result = mysqli_stmt_get_result($stmt);
					while($row1 = mysqli_fetch_assoc($result))
					{

					?>
			<div class="p-2">
				<h5>Display Name</h5>
		 		<label><?php echo $row1['uidUsers']; ?></label>
			</div>
			<div class="p-2">
				<h5>E-mail Address</h5>
		 		<label><?php echo $row1['emailUsers']; } } ?></label>
			</div>
			<div class="p-2">
				<h5>Password</h5>
		 		<label>*********</label>
			</div>
			<div class="p-2" >
				<form action="user-reset-pass.php" method="post"> 
					<input type="submit" name="change-pass" class="btn btn-outline-danger" value="Reset Password">
				</form>
				
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