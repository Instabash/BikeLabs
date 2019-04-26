<?php
include_once 'includes/header.php';
?>

<section id="signup" class="section fontsec content">
	<div class="container">
		<h3 class="p-4">Login</h3>
		<div class="border border-dark border-new rounded pt-5">
			<form class="" action="includes/login.inc.php" method="post">
				<div class="form-group modmarginleft">
					<div class="" >
						<input type="text" class="form-control" name="mailuid" placeholder="Username/E-mail..">
					</div>
				</div>
				<div class="form-group modmarginleft">
					<div class="" >
						<input type="password" class="form-control" name="pwd" placeholder="Password..">
					</div>
				</div>
				<button type="submit" class="btn btn-outline-danger" name="login-submit">Login</button>
			</form>
			<p class="p-4">Or <a href="signup.php">register</a> if you are a new user.</p>
		</div>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>