<?php
	include_once 'includes/header.php';
?>

<section id="signup" class="section fontsec">
	<form action="includes/signup.inc.php" method="post">
		<div class="container">
			<h1>Signup</h1><br>
			<?php
				if (isset($_GET['error'])) 
				{
					if ($_GET['error'] == "emptyfields") 
					{
						echo '<p style="color:red;padding:5px;";>Fill in all fields</p>';
					}
					elseif ($_GET['error'] == "invalidmailuid") 
					{
						echo '<p style="color:red;padding:5px;";>Invalid Username and e-mail!</p>';
					}
					elseif ($_GET['error'] == "invaliduid") 
					{
						echo '<p style="color:red;padding:5px;";>Invalid Username!</p>';
					}
					elseif ($_GET['error'] == "invalidmail") 
					{
						echo '<p style="color:red;padding:5px;";>Invalid e-mail!</p>';
					}
					elseif ($_GET['error'] == "usertaken") 
					{
						echo '<p style="color:red;padding:5px;";>Username is taken!</p>';
					}

				}
				if (isset($_GET['signup'])) {
					if ($_GET['signup'] == "success") 
					{
						echo '<p style="color:green;padding:5px;";>Signup successful!</p>';
					}
				}
			?>
			<div class="form-row modmarginleft">
				<div class="col-3" >
					<input class="form-control" type="text" name="uid" placeholder="Username">
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-3" >
					<input class="form-control" type="text" name="mail" placeholder="E-mail">
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-3" >
					<input class="form-control" type="text" name="phone" placeholder="Phone">
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-3" >
					<input class="form-control" type="password" name="pwd" placeholder="Password">
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-3" >
					<input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
				</div>
			</div><br>
			<div class="form-row modmarginleft">
				<div class="col-3" >
					<button class="btn btn-danger" type="submit" name="signup-submit">Signup</button>
				</div>
			</div>
	
		</div>
	</form>
</section>

<?php
	include_once 'includes/footer.php';
?>
