<?php
include_once 'includes/header.php';
?>

<section id="signup" class="section fontsec content">
	<div class="container">
		<h1 class="p-4">Login</h1>
		<div class="mt-4 border border-new border-black p-4" style="box-shadow: 6px 6px #e6e6e6;border-color: #cad1d8 !important;">
			<form action="includes/login.inc.php" method="post">
				<div class="form-group modmarginleft">
					<div class="" >
						<input type="text" class="form-control logintext" name="mailuid" placeholder="Username/E-mail..">
					</div>
				</div>
				<div class="form-group modmarginleft">
					<div class="" >
						<input type="password" class="form-control logintext" name="pwd" placeholder="Password..">
					</div>
				</div>
				<button type="submit" class="loginbtn" name="login-submit">Login</button>
			</form>
			<p class="pt-4 pl-4 pr-4">Or <a href="signup.php">register</a> if you are a new user.</p>
			<p class="pt-3"><a href="reset-password.php">Forgot your password?</a></p>
		</div>
		<div class="pt-4">	
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
		</div>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>