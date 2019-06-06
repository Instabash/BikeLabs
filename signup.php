<?php
include_once 'includes/header.php';
?>

<section id="signup" class="section fontsec content">
	<form action="includes/signup.inc.php" method="post">
		<div class="container">
			<h1>Signup</h1><br>
			<?php
			if (isset($_GET['error'])) 
			{
				if ($_GET['error'] == "emptyfields") 
				{
					echo '<p style="color:red !important;padding:5px;";>Fill in all fields</p>';
				}
				elseif ($_GET['error'] == "invalidmailuid") 
				{
					echo '<p style="color:red !important;padding:5px;";>Invalid Username and e-mail!</p>';
				}
				elseif ($_GET['error'] == "invaliduid") 
				{
					echo '<p style="color:red !important;padding:5px;";>Invalid Username!</p>';
				}
				elseif ($_GET['error'] == "invalidmail") 
				{
					echo '<p style="color:red !important;padding:5px;";>Invalid e-mail!</p>';
				}
				elseif ($_GET['error'] == "usertaken") 
				{
					echo '<p style="color:red !important;padding:5px;";>Username is taken!</p>';
				}
				elseif ($_GET['error'] == "pwdstr") 
				{
					echo '<p style="color:red !important;padding:5px;";>Please enter a strong password!</p>';
				}

			}
			if (isset($_GET['signup'])) {
				if ($_GET['signup'] == "success") 
				{
					echo '<p style="color:green;padding:5px;";>Signup successful!</p>';
				}
			}
			?>
			<div class="mt-4 border border-new border-black p-4" style="box-shadow: 6px 6px #e6e6e6;border-color: #cad1d8 !important;">
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<input class="form-control logintext" type="text" name="uid" placeholder="Username" value="<?= isset($_GET['uid']) ? $_GET['uid'] : ''; ?>">
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<input class="form-control logintext" type="text" name="mail" placeholder="E-mail" value="<?= isset($_GET['mail']) ? $_GET['mail'] : ''; ?>">
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<input class="form-control logintext" type="text" name="fname" placeholder="First Name" value="<?= isset($_GET['fname']) ? $_GET['fname'] : ''; ?>">
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<input class="form-control logintext" type="text" name="lname" placeholder="Last Name" value="<?= isset($_GET['lname']) ? $_GET['lname'] : ''; ?>">
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<input class="form-control logintext" type="password" id = "password" name="pwd" placeholder="Password">
						
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<input class="form-control logintext" type="password" name="pwd-repeat" placeholder="Repeat password">
						<span id="result" style="color: red;"></span>
					</div>
				</div><br>
				<div class="form-row modmarginleft">
					<div class="col-3" >
						<button class="loginbtn" type="submit" name="signup-submit">Signup</button>
					</div>
				</div>
			</div>

		</div>
	</form>
</section>
<script>
	$(document).ready(function() 
	{
		$('#password').keyup(function() 
		{
			$('#result').html(checkStrength($('#password').val()))
		})
		function checkStrength(password) 
		{
			var strength = 0
			if (password.length < 6) 
			{
				$('#result').removeClass()
				$('#result').addClass('short')
				return '<br> <p style = "color:black !important;">Password Strength : <p> Too short'
			}
			if (password.length > 7) strength += 1
			// If password contains both lower and uppercase characters, increase strength value.
			if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
			// If it has numbers and characters, increase strength value.
			if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
			// If it has one special character, increase strength value.
			if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
			// If it has two special characters, increase strength value.
			if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
			// Calculated strength value, we can return messages
			// If value is less than 2
			if (strength < 2) 
			{
				$('#result').removeClass()
				$('#result').addClass('weak')
				return '<br> <p style = "color:black !important;"> Password Strength : <p> Weak'
			} 
			else if (strength == 2) 
			{
				$('#result').removeClass()
				$('#result').addClass('good')
				return '<br> <p style = "color:black !important;"> Password Strength : <p> Good'
			} 
			else 
			{
				$('#result').removeClass()
				$('#result').addClass('strong')
				return '<br> <p style = "color:black !important;"> Password Strength : <p> Strong'
			}
		}
	});
</script>
<?php
	if (isset($_GET['success'])) {
?>
<script>
	$(function(){
    $("body").fadeOut(1000,function(){
       window.location.href = "http://test.example.com/;"
    })
 });
</script>
<?php
}
?>
<?php
include_once 'includes/footer.php';
?>
