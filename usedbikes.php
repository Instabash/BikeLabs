<?php
	$title = 'Used motorbikes';
include_once 'header.php'
?>
	<!-- New Bikes -->
	<section id="spparts" class="section sppartsection">
	<div class="container" style="max-width: 1410px; min-width: 1017px !important;">
		<h3>Used motorbikes</h3> <br>
		<div class="row" >
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." style="max-width: 100% !important;">
		  	<div class="left mt-4">
		  		<h4>Filters</h4>
		  		<div class="pb-3">
				  	<label>Price</label>
				  	<div class="p-1 pl-5 pr-5 ">
				  		<input type="number" id="fromInput" onkeyup="priceRange()" placeholder="From" class="form-control input-s" aria-label="Small" aria-describedby="">
				  	</div>
				  	<div class="p-1 pl-5 pr-5 pt-3">
				  		<input type="number" id="toInput" onkeyup="priceRange()" placeholder="To" class="form-control input-s" aria-label="Small" aria-describedby="">
				  	</div>
		  		</div>
		  		<div class="pb-3">
			  		<label>Motorbike model</label>
			  		<div id="myBtnContainer">
					  <button class="filter btn mb-2" onclick="filterSelection('all')"> Show all</button><br>
					  <button class="filter btn mb-2" onclick="filterSelection('cars')"> Honda</button><br>
					  <button class="filter btn mb-2" onclick="filterSelection('animals')"> Superstar</button><br>
					  <button class="filter btn mb-2" onclick="filterSelection('fruits')"> Superpower</button><br>
					  <button class="filter btn mb-2" onclick="filterSelection('colors')"> Unique</button><br>
					</div>
			  	</div>
		  	</div>
		  	<div class="right">
		  		
		  	</div>
		</div>
	</div>
</section>
<?php
include_once 'footer.php'
?>