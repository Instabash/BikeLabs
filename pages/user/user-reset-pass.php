<?php
session_start();
include '../../includes/restrictions.inc.php';
user_protect();
$title = 'Reset password';
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
$user_id = $_SESSION['userId'];
?>
<label href="#" class="list-group-item" style="width: auto;">User Panel
	<button class="btn" id="menu-toggle"><img style="width: 10px;" src="../../images/bars-solid.svg"></button>
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
			<b><h4>Change Password</h4></b>
		</div>

		<div class="border border-new border-black p-5 rounded mt-3">
			<form action="../../includes/change-pass.inc.php" method="post">
				<label>Old Password</label>
				<div class="form-row formrowad p-2 pt-2 mb-3">
					<div>
						<div class="input-group">
							<input class="form-control" id="CapsLockIn" type="password" name="oldpass" placeholder="Old Password">
							<p class="Caps" style="display: none;padding: 5px;padding-left: 10px;">Caps Lock is On</p>
						</div>
					</div>
				</div>
				<label>New Password</label>
				<div class="form-row formrowad p-2 pt-2 mb-3">
					<div>
						<div class="input-group">
							<input class="form-control" id="CapsLockIn" type="password" name="newpass" placeholder="New Password">
							<p class="Caps" style="display: none;padding: 5px;padding-left: 10px;">Caps Lock is On</p>
						</div>
					</div>
				</div>
				<label>Confirm New Password</label>
				<div class="form-row formrowad p-2 pt-2 mb-3">
					<div>
						<div class="input-group">
							<input class="form-control" id="CapsLockIn" type="password" name="connewpass" placeholder="Confirm New Password">
							<p class="Caps" style="display: none;padding: 5px;padding-left: 10px;">Caps Lock is On</p>
						</div>
					</div>
				</div>
				<?php
				if (isset($_GET['error'])) 
				{
					if ($_GET['error'] == "emptyfields") 
					{
						echo '<p style="color:red !important;padding:5px;";>Fill in all fields</p>';
					}
					elseif ($_GET['error'] == "pwdstr") 
					{
						echo '<p style="color:red !important;padding:5px;";>Please enter a strong password!</p>';
					}
					elseif ($_GET['error'] == "passwordcheck") 
					{
						echo '<p style="color:red !important;padding:5px;";>The two passwords must be matching!</p>';
					}
					elseif ($_GET['error'] == "pwdchange") 
					{
						echo '<p style="color:red !important;padding:5px;";>Please enter a different password than your previous password!</p>';
					}
				}
				if (isset($_GET['signup'])) {
					if ($_GET['signup'] == "success") 
					{
						echo '<p style="color:green;padding:5px;";>Signup successful!</p>';
					}
				}
				?>
				<div id="capsLockWarning" style="font-weight: bold; color: maroon; margin: 0 0 10px 0; display: none;">Caps Lock is on.</div>
				<div class="form-row formrowad p-2 pt-2 mb-3">
					<div>
						<button class="loginbtn" type="submit" name="pwd-reset-submit">Change password</button>
					</div>
				</div>
			</form>
		</div>
	</section>	
</div>

<script language="javascript">
	function isCapsLockOn(e) {
		var keyCode = e.keyCode ? e.keyCode : e.which;
		var shiftKey = e.shiftKey ? e.shiftKey : ((keyCode == 16) ? true : false);
		return (((keyCode >= 65 && keyCode <= 90) && !shiftKey) || ((keyCode >= 97 && keyCode <= 122) && shiftKey))
	}
	$(document).ready(function() {
		$(":password").keypress(function(e) {
			if (isCapsLockOn(e))
				$("#capsLockWarning").show();
			else
				$("#capsLockWarning").hide();
		});                           
	});
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