<?php
session_start();
include '../../includes/restrictions.inc.php';
user_protect();
include_once '../../includes/header.php';
include_once '../../includes/dbh.inc.php';

?>

<section id="biketemplate" class="section biketemplatesec content">
	<div class="container" >
		<a href="#">Go to chat</a>
	</div>
</section>

<?php
include_once '../../includes/footer.php';
?>