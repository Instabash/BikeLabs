<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
?>
<!DOCTYPE html>
<html>
<head>
	<!-- meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title><?php if (isset($title)) {echo $title;}else {echo "BikeLabs";} ?></title>

	<!--------------------------------------------------------------------CSS-------------------------------------------------->
	<!-- 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/w3.css">
	<!-- Icon -->
	<link rel="shortcut icon" href="../favicon.ico"> 

	<!--font awesome css-->
	<script src="https://kit.fontawesome.com/aa4e02e399.js"></script>

	<!------------------------------------------------------------------Font css------------------------------------------->
	<!-- <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/PTSans.css">

	<!--------------------------------------------------------------- custom buttons --------------------------------------------------------------->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/component.css" />

	<!---------------------------------------------------------------Bootstrap cdn--------------------------------------------------------------->
	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/bootstrap.min.css">

	<!---------------------------------------------------------------Custom css--------------------------------------------------------------->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/style.css">

	<!---------------------------------------------------------------Select2 css--------------------------------------------------------------->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/dropzone.css">

	<!-- sidebar js -->
	<link href="/BikeLabs/css/simple-sidebar.css" rel="stylesheet">

	<!-- datatables css -->
	<link href="/BikeLabs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<!---------------------------------CSS end---------------------------------->

	<!---------------------------------Scripts---------------------------------->
	
	<!--jquery cdn-->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script> -->
	<script src="/BikeLabs/script/jquery-3.3.1.min.js"></script>

	<!--font awesome css-->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
	<script src="/BikeLabs/script/popper.min.js"></script>

	<!--bootstrap js-->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
	<script src="/BikeLabs/script/bootstrap.min.js"></script>
	
	<!--select2 js-->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
	<script src="/BikeLabs/script/select2.min.js"></script>

	<!--custom js-->
	<script src="/BikeLabs/script/main.js"></script>
	<script src="/BikeLabs/script/imageupload.js"></script>
	<script src="/BikeLabs/script/getparameters.js"></script>

	<!-- isotope script  -->
	<script src="/BikeLabs/script/isotope.pkgd.min.js"></script>

	<!-- dropzone js -->
	<script src="/BikeLabs/script/dropzone.js"></script>

	<!-- Datatables js -->
	<script src="/BikeLabs/script/jquery.dataTables.min.js"></script>
	<script src="/BikeLabs/script/dataTables.bootstrap.js"></script>

	<!-- Misc js -->
	<script src="/BikeLabs/script/jquery.inputmask.js"></script>
	<script src="/BikeLabs/script/inputmask.binding.js"></script>
	<script src="/BikeLabs/script/jquery.capslockstate.js"></script>
	
	<!---------------------------------Scripts end---------------------------------->

</head>
<body style="">
<header>
<!-- <div class="head-container">
	
</div> -->
<div class="modal fade" id="emptymodal" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<div class="modal-body">
				<p>Please fill in the fields for login</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="pwdmodal" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<div class="modal-body">
				<p>You have entered an incorrect Username or Password</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="nousermodal" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<div class="modal-body">
				<p>There is no account with that E-mail or Username</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<nav class=" navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="head-container collapse navbar-collapse" id="navbarSupportedContent" >
		<ul class="navbar-nav mr-auto">
			<h2 class="unselectable header-logo" style="color: #dc3545;padding-right: 30px;">BikeLabs</h2>
			<li class="nav-item header-padding" style="color: #dc3545;">
				<a class="nav-link" href="/BikeLabs/index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown header-padding" style="color: #dc3545;">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Modify your bike </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/BikeLabs/modification.php">Body Modification</a>
					<a class="dropdown-item" href="/BikeLabs/alteration.php">Engine Alteration</a>
				</div>
			</li>
			<li class="nav-item header-padding" style="color: #dc3545;">
				<a class="nav-link" href="/BikeLabs/newbikes.php">Purchase Bikes</a>
			</li>
			<li class="nav-item header-padding" style="color: #dc3545;">
				<a class="nav-link" href="/BikeLabs/newspareparts.php">Purchase spare parts</a>
			</li>
			<li class="nav-item dropdown header-padding" style="color: #dc3545;">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Find Ads.</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/BikeLabs/usedbikes.php">Bikes</a>
					<a class="dropdown-item" href="/BikeLabs/spareparts.php">Spare Parts</a>
				</div>
			</li>
			<li class="nav-item header-padding" style="color: #dc3545;">
				<a class="nav-link" href="/BikeLabs/postad.php">Post An Advertisement</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<?php
			if(!isset($_SESSION['userId']))
				{?>
					<li class="dropdown">
						<a class="nav-link dropdown-toggle login-drop" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Login </a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<form class="px-4 py-3" action="/BikeLabs/includes/login.inc.php" method="post">
								<div class="form-group">
									<label for="exampleDropdownFormEmail1">Email address</label>
									<input type="text" class="form-control" name="mailuid" placeholder="Username/E-mail..">
								</div>
								<div class="form-group">
									<label for="exampleDropdownFormPassword1">Password</label>
									<input type="password" class="form-control" name="pwd" placeholder="Password..">
								</div>
								<div class="form-group">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="dropdownCheck">
										<label class="form-check-label" for="dropdownCheck">
											Remember me
										</label>
									</div>
								</div>
								<?php
								if (isset($_GET['error'])) 
								{
									if ($_GET['error'] == "emptyfields") 
									{
										echo '<p style="color:red !important;padding:5px;";>Fill in all the fields above</p>';
									}
									elseif ($_GET['error'] == "wrongpwd2") 
									{
										echo '<p style="color:red !important;padding:5px;";>You have entered an incorrect Username or Password!</p>';
									}
									elseif ($_GET['error'] == "nouser") 
									{
										echo '<p style="color:red !important;padding:5px;";>There is no account with that E-mail or Username!</p>';
									}
								}
								?>
								<button type="submit" class="btn btn-primary" name="login-submit">Sign in</button>
							</form>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="/BikeLabs/signup.php">New around here? Sign up</a>
							<a class="dropdown-item" href="#">Forgot password?</a>
						</div>
					</li>
					<?php 
				}
			?>
		</ul>
		<?php
			if (isset($_SESSION['userId'])) 
			{
				?>
				<div id="cartIcon" class="nav-item header-padding" style="margin-right: 20px;">
					<a href="/BikeLabs/cart.php">
						<img id="image" style="padding-left: 10px;left: auto;" src="/BikeLabs/images/cart3.svg">
						<div id="text" style = "color: #dc3545;">
							<span class="day">
								<?php
								if (isset($_SESSION['cart'])) 
								{
									if (!count($_SESSION['cart']) == 0) 
									{
										echo count($_SESSION['cart']);
									}
								} 	
							}
							?>
						</span>
					</div>
				</a>
			</div>
		<?php
			if(isset($_SESSION['userId']))
			{
				$userId = $_SESSION["userUId"];
				?>
				<?php
				if ($_SESSION['usertype'] == "1") {

					?>
					<p class="header-padding" style="padding-left:15px;margin:5px;color:black;">Logged in as : <a href="/../BikeLabs/pages/admin/admindash.php"> <?php echo $userId ?> </a></p>
					<?php 
				}
				elseif ($_SESSION['usertype'] == "2") {
					?>
					<p class="header-padding" style="padding-left:15px;margin:5px;color:black;">Logged in as : <a href="/../BikeLabs/pages/vendor/vendordash.php"> <?php echo $userId ?> </a></p>
					<?php 
				}
				else{
					?>
					<p class="header-padding" style="padding-left:15px;margin:5px;color:black;">Logged in as : <a href="/../BikeLabs/pages/user/userdash.php"> <?php echo $userId ?> </a></p>
					<?php 
				}?>
				<form class="" action="/BikeLabs/includes/logout.inc.php" style="margin-left: 15px;" method="post">
					<button type="submit" class="btn btn-outline-danger" name="logout-submit">Logout</button>
				</form>
				<?php
			}
		?>
		</div>	
	</nav>
</header>
<script>
	$(document).ready(function() {
		$('a.active').removeClass('active');
		$('a[href="' + location.pathname + '"]').closest('a').addClass('active'); 
	});
</script>
<script type="text/javascript">
var url = window.location.href;
<?php
	if (isset($_SESSION['error'])) {
		if ($_SESSION['error'] == 'empty') {
			?>
			$('#emptymodal').modal('show');
			<?php
		}
		elseif ($_SESSION['error'] == 'wrongpwd') {
			?>
			$('#nousermodal').modal('show');
			<?php
		}
		elseif ($_SESSION['error'] == 'empty') {
			?>
			$('#success').modal('show');
			<?php
		}
	}
	unset($_SESSION['error']);
?>
// if(url.indexOf('?error=emptyfields') != -1) {
//     $('#emptymodal').modal('show');
// }
// else
// if(url.indexOf('?error=wrongpwd2') != -1) {
//     $('#pwdmodal').modal('show');
// }
// else
// if(url.indexOf('?error=nouser') != -1) {
//     $('#nousermodal').modal('show');
// }
// else
// if(url.indexOf('?login=success') != -1) {
//     $('#success').modal('show');
// }
</script>