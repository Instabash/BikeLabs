<?php
session_start();
include 'includes/restrictions.inc.php';
logged_in();
user_protect();
$title = 'Post an advert';
include_once 'includes/header.php';
?>

<section id="postad" class="section postadsection content">
	<div class="container">
		<div>
			<h4>What are you selling?</h4>
			<a href="pages/postad/postadbike.php">
				<div class="btncreative btn-1 btn-1a" >
					Motorbikes.
				</div>
			</a>
			<a href="pages/postad/postadsp.php">
				<div class="btncreative btn-1 btn-1a" >
					Spare Parts.
				</div>
			</a>
		</div><br>
	</div>
</section>

    <?php	
    include_once 'includes/footer.php';
    ?>