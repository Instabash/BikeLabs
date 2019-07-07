<?php
include_once 'includes/header.php';
?>

<section id="signup" class="section fontsec content">
	<div class="container">
		<h1 class="p-4">Reset Password</h1>
		<div class="mt-4 border border-new border-black p-4" style="box-shadow: 6px 6px #e6e6e6;border-color: #cad1d8 !important;">
			<p>An E-mail will be sent to you with instructions on how to reset your password.</p>
			<form action="includes/reset-request.inc.php" method="post">
				<div class="form-group modmarginleft">
					<div class="pt-4 logintext1">
						<input type="text" style="width: 250px;" class="logintext" name="email" placeholder="Enter your E-mail address.">
					</div>
				</div>
				<button type="submit" class="loginbtn" name="reset-request-submit">Reset Password</button>
			</form>
			<div class="pt-4">	
			<?php
			if (isset($_GET['reset'])) 
			{
				if ($_GET['error'] == "success") 
				{
					echo '<p style="color:red !important;padding:5px;";>An E-mail has been sent with a reset link, please check your inbox.</p>';
				}
			}
			?>
		</div>
		</div>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>