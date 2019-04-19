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
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">

	<!-- title -->
	<title><?php if (isset($title)) {echo $title;}else {echo "BikeLabs";} ?></title>

	<!--------------------------------------------------------------------CSS-------------------------------------------------->
	<!-- 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" type="text/css" href="/BikeLabs/css/w3.css">
	<!-- Icon -->
	<link rel="shortcut icon" href="../favicon.ico"> 

	<!--font awesome css-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

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
	
	<!---------------------------------Scripts end---------------------------------->

</head>
<body style="">
	<header>
		<!-- <div class="head-container">
			
		</div> -->
		
		<nav class=" navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="head-container collapse navbar-collapse" id="navbarSupportedContent" >
				<ul class="navbar-nav mr-auto">
					<h2 class="unselectable" style="color: #dc3545;padding-right: 30px;">BikeLabs</h2>
					<li class="nav-item active header-padding" style="color: #dc3545;">
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
				<ul class="navbar-nav">
					<?php
					if(!isset($_SESSION['userId']))
						{?>
							<li class="nav-item header-padding" style="color: #dc3545;">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Login </a>
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
					if (isset($_SESSION['userId'])) {?>
						<div id="cartIcon" style="margin-right: 20px;">
							<a href="/BikeLabs/cart.php">
								<img id="image" style="width: 40px;margin-right: 20px;" src="/BikeLabs/images/cart3.svg">
								<div id="text" style = "color: #dc3545;">
									<span class="day"><?php
									if (isset($_SESSION['cart'])) {
										if (!count($_SESSION['cart']) == 0) {
											echo count($_SESSION['cart']);
										}
									} 	
								}
								?></span>
							</div>
						</a>
					</div>


					<?php
					if(isset($_SESSION['userId']))
					{
						$userId = $_SESSION["userUId"];
						?>
						<p style="margin:5px;color:black;">Logged in as : <a href="/../BikeLabs/pages/panels/userdash.php"> <?php echo $userId ?> </a></p>
						<form class="" action="/BikeLabs/includes/logout.inc.php" style="margin-left: 10px;" method="post">
							<button type="submit" class="btn btn-outline-danger" name="logout-submit">Logout</button>
						</form>
						<?php
					}
					?>



					<form id="demo-2" style="margin-left: 10px;" >
						<input type="search" placeholder="Search">
					</form>
				</div>	
			</nav>
		</header>
