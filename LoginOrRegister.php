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
			<p class="p-4">Or <a href="signup.php">register</a> if you are a new user.</p>
		</div>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>