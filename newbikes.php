<?php
$title = 'New motorbikes';
include_once 'header.php'
?>
<!-- New Bikes -->
<section id="spparts" class="section sppartsection">
	<div class="container" style="max-width: 1410px; min-width: 1017px !important;">
		<h3>New motorbikes</h3> <br>
		<div class="search-page-new">
			<div class="row">
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
									<div class="accordion-inner">
										<ul class="list-unstyled">
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="Honda">
													<a href="">Honda</a>
												</label>
											</li>
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="Yamaha">
													<a href="">Unique</a>
												</label>
											</li>
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="Suzuki">
													<a href="">Yamaha</a>
												</label>
											</li>
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="Super Power">
													<a href="">Super Power</a>
												</label>
											</li>
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="Kawasaki">
													<a href="">Superstar</a>
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
									<div class="accordion-inner">
										<ul class="list-unstyled">
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="">
													<a href="">70cc</a>
												</label>
											</li>
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="">
													<a href="">125cc</a>
												</label>
											</li>
											<li>
												<label class="filter-check clearfix">
													<input type="checkbox" title="">
													<a href="">150cc</a>
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
											<div style="margin:0;padding:0;display:inline">
												<input name="utf8" type="hidden" value="✓">
												<input name="authenticity_token" type="hidden" value="AoNANCgpuGrFJnZXS92jr2Ked1IOOfSaChD81AY38x8=">
											</div>
											<select id="pr_from" style="width: 100%;" class="nomargin" data-parsley-required="" data-parsley-lt="#pr_to" data-parsley-lt-message="Select a lower value." data-parsley-id="1864">
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
											<select id="pr_to" class="nomargin" style="width: 100%;" data-parsley-required="" data-parsley-id="0368">
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
											<input type="submit" class="btn btn-primary btn-block" value="Go">
										</form>                  
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-10 search-listing pull-right">
					<div class="" id="myUL">
						<div class="filterDiv cars m-3 border-new border border-dark rounded">
							<a href="">
								<img src="images/1.jpg">
								<div>
									<label class="productName">Motor</label><br>
									<label>Price:</label>
									<label class="price">333</label>
								</div>
							</a>
						</div>
						<div class="filterDiv colors fruits m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/a_dvert1.jpg">
								<div>
									<label class="productName">chain</label><br>
									<label>Price:</label>
									<label class="price">423</label>
								</div>
							</a>							
						</div>
						<div class="filterDiv cars m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/a_dvert2.jpg">
								<div>
									<label class="productName">crankshaft</label><br>
									<label>Price:</label>
									<label class="price">123</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv cars m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify.jpg">
								<div>
									<label class="productName">piston</label><br>
									<label>Price:</label>
									<label class="price">523</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv colors m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify2.jpg">
								<div>
									<label class="productName">taillight</label><br>
									<label>Price:</label>
									<label class="price">5213</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv animals m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify3.jpg">
								<div>
									<label class="productName">chain spocket</label><br>
									<label>Price:</label>
									<label class="price">123</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv colors m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase1.jpg">
								<div>
									<label class="productName">Handle bar</label><br>
									<label>Price:</label>
									<label class="price">111</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv animals m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase2.jpg">
								<div>
									<label class="productName">Air Filter</label><br>
									<label>Price:</label>
									<label class="price">523</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv animals m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase2.jpg">
								<div>
									<label class="productName">NGK Sparkplugs</label><br>
									<label>Price:</label>
									<label class="price">1255</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv animals m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/purchase2.jpg">
								<div>
									<label class="productName">Exhaust</label><br>
									<label>Price:</label>
									<label class="price">6643</label>
								</div>
							</a>
							
						</div>
						<div class="filterDiv animals m-3  border-new border border-dark rounded">
							<a href="">
								<img src="images/modify2.jpg">
								<div>
									<label class="productName">Silencer</label><br>
									<label>Price:</label>
									<label class="price">3235</label>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	include_once 'footer.php'
	?>