<?php
$title = 'Spare Parts';
include_once 'includes/header.php';
include_once 'includes/dbh.inc.php';

$spaartsql = "SELECT * FROM spare_parts";
$stmt = mysqli_stmt_init($conn);


?>
<!-- spare parts -->
<style>
body{

}
</style>
<section id="spparts" class="section sppartsection">
	<div class="container" style="max-width: 1410px; min-width: 1017px !important;">
		<h2>Spare parts</h2> <br>
		<div class="row" >
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." style="max-width: 100% !important;">
			<div class="mt-3 col-md-2 used-car-refine-search">
				<div class="sidebar-filters border-new">
					<div class="filter-panel-new box">
						<div class="accordion-group" id="make">
							<div class="accordion-heading">
								<a class="accordion-toggle " data-toggle="collapse" href="#collapse_0">
									<i class="fa fa-caret-down"></i>Make
								</a>
							</div>
							<div id="collapse_0" class="accordion-body collapse in">
								<div class="accordion-inner tags">
									<ul class="list-unstyled filterSection">
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="honda" id="honda" />
												<label for="honda">Honda</label>
											</label>
										</li>
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="superstar" id="superstar" />
												<label for="superstar">Superstar</label>
											</label>
										</li>
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="superpower" id="superpower" />
												<label for="superpower">Superpower</label>
											</label>
										</li>
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="unique" id="unique" />
												<label for="unique">Unique</label>
											</label>
										</li>
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="yamaha" id="yamaha" />
												<label for="yamaha">Yamaha</label>
											</label>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="accordion-group" id="model">
							<div class="accordion-heading">
								<a class="accordion-toggle " data-toggle="collapse" href="#collapse_1">
									<i class="fa fa-caret-down"></i>Model
								</a>
							</div>
							<div id="collapse_1" class="accordion-body collapse in">
								<div class="accordion-inner tags">
									<ul class="list-unstyled">
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="70cc" id="70cc" />
												<label for="70cc">70cc</label>
											</label>
										</li>
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="125cc" id="125cc" />
												<label for="125cc">125cc</label>
											</label>
										</li>
										<li>
											<label class="filter-check clearfix">
												<input type="checkbox" rel="150cc" id="150cc" />
												<label for="150cc">150cc</label>
											</label>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="accordion-group" id="price">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" href="#collapse_2">
									<i class="fa fa-caret-down"></i>Price
								</a>
							</div>
							<div id="collapse_2" class="accordion-body collapse in">
								<div class="accordion-inner">
									<form action="#" method="post" onsubmit="return false">
										<select id="fromInput" style="width: 100%;" class="nomargin">
											<option value="">Price From</option>
											<option value="10000">10,000</option>
											<option value="20000">20,000</option>
											<option value="30000">30,000</option>
											<option value="40000">40,000</option>
											<option value="50000">50,000</option>
											<option value="60000">60,000</option>
											<option value="70000">70,000</option>
											<option value="80000">80,000</option>
											<option value="90000">90,000</option>
											<option value="100000">100,000</option>
											<option value="150000">150,000</option>
											<option value="200000">200,000</option>
											<option value="300000">300,000</option>
											<option value="400000">400,000</option>
											<option value="500000">500,000</option>
											<option value="1000000">1,000,000</option>
											<option value="2000000">2,000,000</option>
										</select>
										<div class="mb10">
										</div>
										<select id="toInput" class="nomargin" style="width: 100%;" >
											<option value="" selected="selected">Price To</option>
											<option value="20000">20,000</option>
											<option value="30000">30,000</option>
											<option value="40000">40,000</option>
											<option value="50000">50,000</option>
											<option value="60000">60,000</option>
											<option value="70000">70,000</option>
											<option value="80000">80,000</option>
											<option value="90000">90,000</option>
											<option value="100000">100,000</option>
											<option value="150000">150,000</option>
											<option value="200000">200,000</option>
											<option value="300000">300,000</option>
											<option value="400000">400,000</option>
											<option value="500000">500,000</option>
											<option value="1000000">1,000,000</option>
											<option value="2000000">2,000,000</option>
										</select>
										<input type="submit" class="btn btn-primary btn-block" id="btngo" value="Go" onclick="priceRange()">
										<div id="clear-selection">

										</div>
									</form>                  
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-10 search-listing pull-right">
				<div class="results" id="myUL">
					<?php 
					if(!mysqli_stmt_prepare($stmt, $spaartsql))
					{
						echo "SQL statement failed";
					}
					else
					{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);

						while ($row = mysqli_fetch_assoc($result)) {
							echo 
							'<div class="all honda 70cc filterDiv m-3 border-new border border-dark rounded">
								<a href="pages/spareparts/spareparttemp.php?partid='.$row['part_id'].'">
									<img src="images/1.jpg">
									<div>
										<label class="productName">'.$row['part_name'].'</label><br>
										<label>Price:</label>
										<label class="price">'.$row['part_price'].'</label>
									</div>
								</a>
							</div>';
						}	
					}
					?>
						<!-- <div class="all honda 125cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/a_dvert1.jpg">
								<div>
									<label class="productName">chain</label><br>
									<label>Price:</label>
									<label class="price">20000</label>
								</div>
							</a>							
						</div>
						<div class="all superstar 70cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/a_dvert2.jpg">
								<div>
									<label class="productName">crankshaft</label><br>
									<label>Price:</label>
									<label class="price">10023</label>
								</div>
							</a>
						</div>
						<div class="all superstar 125cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify.jpg">
								<div>
									<label class="productName">piston</label><br>
									<label>Price:</label>
									<label class="price">17000</label>
								</div>
							</a>
						</div>
						<div class="all superpower 125cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify2.jpg">
								<div>
									<label class="productName">taillight</label><br>
									<label>Price:</label>
									<label class="price">39000</label>
								</div>
							</a>
						</div>
						<div class="all yamaha 70cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify3.jpg">
								<div>
									<label class="productName">chain spocket</label><br>
									<label>Price:</label>
									<label class="price">33000</label>
								</div>
							</a>
						</div>
						<div class="all honda 150cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase1.jpg">
								<div>
									<label class="productName">Handle bar</label><br>
									<label>Price:</label>
									<label class="price">60000</label>
								</div>
							</a>
						</div>
						<div class="all unique 150cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase2.jpg">
								<div>
									<label class="productName">Air Filter</label><br>
									<label>Price:</label>
									<label class="price">14000</label>
								</div>
							</a>
						</div>
						<div class="all honda 125cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase2.jpg">
								<div>
									<label class="productName">NGK Sparkplugs</label><br>
									<label>Price:</label>
									<label class="price">16000</label>
								</div>
							</a>
						</div>
						<div class="all superpower 70cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase2.jpg">
								<div>
									<label class="productName">Exhaust</label><br>
									<label>Price:</label>
									<label class="price">22000</label>
								</div>
							</a>
						</div>
						<div class="all unique 150cc filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify2.jpg">
								<div>
									<label class="productName">Silencer</label><br>
									<label>Price:</label>
									<label class="price">20000</label>
								</div>
							</a>
						</div> -->
						<!-- <div class="
							<?php 
								// POST[''] 
							?> 
							filterDiv  m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify2.jpg">
								<div>
									<label class="productName">Silencer</label><br>
									<label>Price:</label>
									<label class="price">3235</label>
								</div>
							</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>

		$('div.tags').find('input:checkbox').on('click', function() {
			let
			els = $('.results > div').hide(),
			checked = $('div.tags').find('input:checked').each(function() {
				els.filter('.'+$(this).attr('rel')).show();
			});
			if (!checked.length) els.show();
		});



// external js: isotope.pkgd.js


// store filter for each group
// var filters = {};

// $('.filters').on( 'click', '.buttonfag', function( event ) {
// 	var $button = $( event.currentTarget );
//   // get group key
//   var $buttonGroup = $button.parents('.button-group');
//   var filterGroup = $buttonGroup.attr('data-filter-group');
//   // set filter for group
//   filters[ filterGroup ] = $button.attr('data-filter');
//   // combine filters
//   var filterValue = concatValues( filters );
//   // set filter for Isotope
//   // init Isotope
//   var $grid = $('.grid').isotope({
//   	itemSelector: '.color-shape',
//   	percentPosition: true
//   });

//   $grid.isotope({ filter: filterValue });
// });

// // change is-checked class on buttons
// $('.button-group').each( function( i, buttonGroup ) {
// 	var $buttonGroup = $( buttonGroup );
// 	$buttonGroup.on( 'click', 'button', function( event ) {
// 		$buttonGroup.find('.is-checked').removeClass('is-checked');
// 		var $button = $( event.currentTarget );
// 		$button.addClass('is-checked');
// 	});
// });

// // flatten object by concatting values
// function concatValues( obj ) {
// 	var value = '';
// 	for ( var prop in obj ) {
// 		value += obj[ prop ];
// 	}
// 	return value;
// }
</script>

<!-- Footer -->

<?php
include_once 'includes/footer.php';
?>