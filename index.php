<?php
include_once 'includes/header.php';
include_once 'includes/restrictions.inc.php';
include_once 'includes/dbh.inc.php';
redirect();
?>
<!-- Index section -->
<style>
.demo a {
	position: absolute;
	left: 49%;
	z-index: 2;
	display: inline-block;
	-webkit-transform: translate(0, -50%);
	transform: translate(0, -50%);
	color: #fff;
	font : normal 400 20px/1 'Josefin Sans', sans-serif;
	letter-spacing: .1em;
	text-decoration: none;
	transition: opacity .3s;
}
.demo a p{
	margin-top: 300px;
}
.demo a:hover {
	opacity: .5;
}

#section02 a {
	padding-top: 60px;
}
#section02 a span {
	margin-top: 300px;
	position: absolute;
	top: 0;
	left: 50%;
	width: 46px;
	height: 46px;
	margin-left: -23px;
	border: 1px solid #fff;
	border-radius: 100%;
	box-sizing: border-box;
}
#section02 a span::after {
	position: absolute;
	top: 50%;
	left: 50%;
	content: '';
	width: 16px;
	height: 16px;
	margin: -12px 0 0 -8px;
	border-left: 1px solid #fff;
	border-bottom: 1px solid #fff;
	-webkit-transform: rotate(-45deg);
	transform: rotate(-45deg);
	box-sizing: border-box;
}

@-webkit-keyframes sdb02 {
	0% {
		opacity: 0;
	}
	30% {
		opacity: 1;
	}
	60% {
		box-shadow: 0 0 0 60px rgba(255,255,255,.1);
		opacity: 0;
	}
	100% {
		opacity: 0;
	}
}
@keyframes sdb02 {
	0% {
		opacity: 0;
	}
	30% {
		opacity: 1;
	}
	60% {
		box-shadow: 0 0 0 60px rgba(255,255,255,.1);
		opacity: 0;
	}
	100% {
		opacity: 0;
	}
}
</style>
<div id="showcase">
	<div class="section-main container">
		<h1 class="unselectable">Bikelabs</h1>
		<h2>All of your biking needs in one place.</h2>
		<p class="lead hide-on-small">
			Bikelabs is the best way to experience all of your 
			motorbike related needs in one centralized hub. 
		</p>
		<p class="lead hide-on-small">
			Why waste time searching for mechanics, when the 
			mechanic can come to you.
		</p>
	</div>
	<section id="section02" class="demo">
  		<a href="#modify"><span></span><p>Scroll</p></a>
	</section>
</div>
<!-- Modify section -->
<section id="modify" class="section content">
	<div class="container">
		<h2 class="section-head">
			<i class="fas fa-cogs"></i> <h1 class="unselectable">Body Modification</h1>
		</h2>
		<p class="lead">Modify your motorbike according to your specific preferences.</br> Add or remove parts from and to your motorbike, change the chassis, or alter the engine.</p>
		<a href="modification.php" class="btn btn-outline-danger mb mt">Start Modifying Now</a>
		<!-- <div class='slider border-new border border-dark rounded'>
		  <div class='slide1'></div>
		  <div class='slide2'></div>
		  <div class='slide3'></div>
		</div> -->
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
			<div class="carousel-inner" >
				<div class="carousel-item active" data-interval="3000">
					<img src="images/modify.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
		</div>
	</div>
</section>
<hr>

<!-- Alteration section -->

<section id="alter" class="section">
	<div class="container">
		<h2 class="section-head">
			<i class="fas fa-cogs"></i> <h1 class="unselectable">Engine Alteration</h1>
		</h2>
		<p class="lead">Modify your motorbike according to your specific preferences.</br> Add or remove parts from and to your motorbike, change the chassis, or alter the engine.</p>
		<a href="alteration.php" class="btn btn-outline-danger mb mt">Start Alteration Now</a>
		<!-- <div class='slider border-new border border-dark rounded'>
		  <div class='slide1'></div>
		  <div class='slide2'></div>
		  <div class='slide3'></div>
		</div> -->
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
			<div class="carousel-inner" >
				<div class="carousel-item active" data-interval="3000">
					<img src="images/modify.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
		</div>
	</div>
</section>
<hr>

<!-- Purchasing section -->

<section id="spareparts" class="section">
	<div class="container">
		<h2 class="section-head">
			<i class="fas fa-cogs"></i> <h1 class="unselectable">Spare Parts</h1>
		</h2>
		<p class="lead">Purchase new motorbikes, or spare parts that your bike needs.</p>
		<p class="lead">Choose from a variety of different vendors and retailers.</p>
		<a href="spparts.php" class="btn btn-outline-danger mb mt">Purchase</a>
		<!-- <div class='slider border-new border border-dark rounded'>
		  <div class='slide4'></div>
		  <div class='slide5'></div>
		  <div class='slide6'></div>
		</div> -->
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
			<div class="carousel-inner" >
				<div class="carousel-item active" data-interval="3000">
					<img src="images/modify.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
		</div>
	</div>
</section>
<hr>

<!-- Advertisement section -->

<section id="advertisement" class="section">
	<div class="container">
		<h2 class="section-head">
			<i class="fas fa-cogs"></i> <h1 class="unselectable">Post An Ad.</h1>
		</h2>
		<p class="lead">Sell your motorbike or motorbike parts.</p>
		<p class="lead">Choose from a variety of different vendors and retailers.</p>
		<a href="postad.php" class="btn btn-outline-danger mb mt">Post An Ad.</a>
		<!-- <div class='slider border-new border border-dark rounded'>
		  <div class='slide7'></div>
		  <div class='slide8'></div>
		  <div class='slide9'></div>
		</div> -->
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
			<div class="carousel-inner" >
				<div class="carousel-item active" data-interval="3000">
					<img src="images/modify.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
		</div>
	</div>
</section>
<hr>
<!-- Compare Section -->
<section id="compare" class="section">
	<div class="container">
		<h2 class="section-head">
			<i class="fas fa-cogs"></i> <h1 class="unselectable">Compare bikes</h1>
		</h2>
		<p class="lead">Compare two motorbikes beforehand to be sure of your purchase.</p>
		<p class="lead">Get detailed information about the motorbikes you compare.</p>
		<a href="pages/new-bikes/bikecompare.php" class="btn btn-outline-danger mb mt">Compare Bikes.</a>
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="1000">
			<div class="carousel-inner" >
				<div class="carousel-item active" data-interval="3000">
					<img src="images/modify.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-interval="3000">
					<img src="images/modify3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
		</div>
	</div>
</section>

<?php
include_once 'includes/footer.php';
?>
<script>
	$(function() {
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});
</script>
