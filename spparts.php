<?php
$title = 'Spare Parts';
include_once 'header.php'
?>
<!-- spare parts -->

<section id="spparts" class="section sppartsection">
	<div class="container" style="max-width: 1410px;">
		<h2>Spare parts</h2> <br>
		<div class="row">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">
		  	<div class="left mt-4">
		  		<h4>Filters</h4>
		  		<div class="pb-3">
				  	<label>Price</label>
				  	<div class="p-1 pl-5 pr-5 ">
				  		<input type="number" placeholder="From" class="form-control input-s" aria-label="Small" aria-describedby="">
				  	</div>
				  	<div class="p-1 pl-5 pr-5 pt-3">
				  		<input type="number" placeholder="To" class="form-control input-s" aria-label="Small" aria-describedby="">
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
		  		<div class="mt-3" id="myUL">
	  					<div class="filterDiv cars m-3 border-new border border-dark rounded">
	  						<a href="">
	  							<img src="images/1.jpg">
					  			<div>
					  				<label class="productName">Motor</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
						</div>
						<div class="filterDiv colors fruits m-3  border-new border border-dark rounded">
							<a href="">
	  							<img src="images/a_dvert1.jpg">
						  		<div>
					  				<label class="productName">chain</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>							
	  					</div>
			    		<div class="filterDiv cars m-3  border-new border border-dark rounded">
			    			<a href="">
	  							<img src="images/a_dvert2.jpg">
						  		<div>
					  				<label class="productName">crankshaft</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
					  		
						</div>
						<div class="filterDiv cars m-3  border-new border border-dark rounded">
							<a href="">
	  							<img src="images/modify.jpg">
						  		<div>
					  				<label class="productName">piston</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
					  		
						</div>
	  					<div class="filterDiv colors m-3  border-new border border-dark rounded">
	  						<a href="">
	  							<img src="images/modify2.jpg">
				  				<div>
					  				<label class="productName">taillight</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
			  			<div class="filterDiv animals m-3  border-new border border-dark rounded">
			  				<a href="">
	  							<img src="images/modify3.jpg">
				  				<div>
					  				<label class="productName">chain spocket</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
			  			<div class="filterDiv colors m-3  border-new border border-dark rounded">
			  				<a href="">
	  							<img src="images/purchase1.jpg">
				  				<div>
					  				<label class="productName">Handle bar</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
  					 	<div class="filterDiv animals m-3  border-new border border-dark rounded">
  					 		<a href="">
	  							<img src="images/purchase2.jpg">
				  				<div>
					  				<label class="productName">Air Filter</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
			  			<div class="filterDiv animals m-3  border-new border border-dark rounded">
			  				<a href="">
	  							<img src="images/purchase2.jpg">
				  				<div>
					  				<label class="productName">NGK Sparkplugs</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
				  		<div class="filterDiv animals m-3  border-new border border-dark rounded">
				  			<a href="">
	  							<img src="images/purchase2.jpg">
				  				<div>
					  				<label class="productName">Exhaust</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
			  			<div class="filterDiv animals m-3  border-new border border-dark rounded">
			  				<a href="">
	  							<img src="images/modify2.jpg">
				  				<div>
					  				<label class="productName">Silencer</label><br>
					  				<label>Price:</label>
					  				<label>333 Rs</label>
					  			</div>
	  						</a>
			  				
			  			</div>
				</div>
		  	</div>
		</div>
	</div>
</section>

	
	<!-- Footer -->
<?php
include_once 'footer.php'
?>