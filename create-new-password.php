<?php
include_once 'includes/header.php';
?>

<section id="signup" class="section fontsec content">
	<div class="container">
		<?php
			$selector = $_GET['selector'];
			$validator = $_GET['validator'];

			if (empty($selector) || empty($validator)) {
				echo "Could not validate request";
				exit();
			}
			else{
				if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
					?>
						<form action="includes/reset-password.inc.php" method="post">
							<input type="hidden" name="selector" value="<?php echo $selector ?>">
							<input type="hidden" name="validator" value="<?php echo $validator ?>">
							<input type="password" name="pwd" placeholder="Enter a new password...">
							<input type="password" name="pwd-repeat" placeholder="Repeat new password...">
							<button type="submit" name="reset-password-submit">Reset Password</button>
						</form>
				<?php
				}
			}
		?>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>