<?php
session_start();
$title = 'New motorbikes';
include_once 'includes/header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/restrictions.inc.php';
redirect();

?>
<!-- New Bikes -->
<section id="spparts" class="section sppartsection content">
	<div class="container">
		<h3>New motorbikes</h3> <br>
		<form class="example" action="includes/search.inc.php" method="post">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit" name="submit-search-nb"><i class="fa fa-search"></i></button>
		</form>
		<div class="search-page-new">
			<div class="row">
				<div class="mt-4 col-md-2 used-car-refine-search">
					<div class="sidebar-filters border-new">
						<div class="filter-panel-new box">
							<form action="includes/search.inc.php" method="post">
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
														<input type="checkbox" rel="honda" id="honda" class="makecheck" name="makecheck[]" value="Honda" />
														<label for="honda">Honda</label>
													</label>
												</li>
												<li>
													<label class="filter-check clearfix">
														<input type="checkbox" rel="superstar" id="superstar" class="makecheck" name="makecheck[]" value="Superstar"/>
														<label for="superstar">Superstar</label>
													</label>
												</li>
												<li>
													<label class="filter-check clearfix">
														<input type="checkbox" rel="superpower" id="superpower" class="makecheck" name="makecheck[]" value="Superpower"/>
														<label for="superpower">Superpower</label>
													</label>
												</li>
												<li>
													<label class="filter-check clearfix">
														<input type="checkbox" rel="unique" id="unique" class="makecheck" name="makecheck[]" value="Unique"/>
														<label for="unique">Unique</label>
													</label>
												</li>
												<li>
													<label class="filter-check clearfix">
														<input type="checkbox" rel="yamaha" id="yamaha" class="makecheck" name="makecheck[]" value="Yamaha"/>
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
														<input type="checkbox" rel="70cc" class="modelcheck" name="modelcheck[]" value="70cc" />
														<label for="70cc">70cc</label>
													</label>
												</li>
												<li>
													<label class="filter-check clearfix">
														<input type="checkbox" rel="125cc" class="modelcheck" name="modelcheck[]" value="125cc"  />
														<label for="125cc">125cc</label>
													</label>
												</li>
												<li>
													<label class="filter-check clearfix">
														<input type="checkbox" rel="150cc" class="modelcheck" name="modelcheck[]" value="150cc"  />
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

											<select id="fromInput" style="width: 100%;" class="nomargin" name="fromval">
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
											<select id="toInput" class="nomargin" style="width: 100%;" name="toval">
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
											
											<div id="clear-selection">
												
											</div>
										</div>
									</div>
								</div>
								<input type="submit" disabled="disabled" class="btn btn-primary btn-block" id="btngo" name="search-sub" value="Go">
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-10 bike-results">
					<div class="row">
						
						<?php
						if (isset($_GET['pageno'])) {
							$pageno = $_GET['pageno'];
						} else {
							$pageno = 1;
						}
						$no_of_records_per_page = 12;
						$offset = ($pageno-1) * $no_of_records_per_page;

						$total_pages_sql = "SELECT COUNT(*) FROM bikes";
						$result = mysqli_query($conn,$total_pages_sql);	

						$total_rows = mysqli_fetch_array($result)[0];
						// echo $total_rows;
						$total_pages = ceil($total_rows / $no_of_records_per_page);		
						?>
						<?php
						if (isset($_GET['s'])) 
						{
							$stmt = mysqli_stmt_init($conn);
							$query = $_GET['s'];
							$searchsql = "SELECT * FROM bikes WHERE bike_brand LIKE '%$query%' OR bike_model LIKE '%$query%' OR bikeyear LIKE '%$query%' OR bike_price LIKE '%$query%' OR bike_desc LIKE '%$query%' LIMIT {$offset}, {$no_of_records_per_page};";
							$resultsearch = mysqli_query($conn, $searchsql);
							$queryResult = mysqli_num_rows($resultsearch);
							if ($queryResult > 0) { 
								while ($row = mysqli_fetch_assoc($resultsearch)) 
								{
								$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";
								if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
								{
									echo "SQL statement failed";
								}
								else
								{
									mysqli_stmt_execute($stmt);
									$result1 = mysqli_stmt_get_result($stmt);

									while ($row1 = mysqli_fetch_assoc($result1)) 
										{
											?>
											<div class="col-md-4" id="myUL">
												<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
													<div class="product-item">
														<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
														<div class="nigger">
															<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
															<label>Price:</label>
															<label class="price"><?php echo $row['bike_price'] ?></label>
														</div>
													</div>
												</a>
											</div>
											<?php
										}
									}
								}
							} 
							else 
							{ 
								?>
								<div class="pt-5 pl-5" id="noresult">
									<label>Nothing matched your query</label>
								</div>
								<?php
							}
						}
						else
						{
						?>
						<?php 
						$spaartsql = "SELECT * FROM bikes LIMIT {$offset}, {$no_of_records_per_page};";
						$stmt = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt, $spaartsql))
						{
							echo "SQL statement failed";
						}
						else
						{
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);

							while ($row = mysqli_fetch_assoc($result)) {
								$imgnamesql = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

								if(!mysqli_stmt_prepare($stmt, $imgnamesql))
								{
									echo "SQL statement failed";
								}
								else
								{
									mysqli_stmt_execute($stmt);
									$result1 = mysqli_stmt_get_result($stmt);

									while ($row1 = mysqli_fetch_assoc($result1)) 
									{
									//echo $row['ad_image_name'];
										if (isset($_GET['pricefrom']) || isset($_GET['priceto']) || isset($_GET['model']) || isset($_GET['make'])) 
										{
											$pricefrom = 0;
											$priceto = 0;
											$modelarr = 0;
											$makearr = 0;
											$modelStr = 0;
											$makeStr = 0;
											$priceflag = 0;
											$modelflag = 0;
											$makeflag = 0;

											if (isset($_GET['pricefrom']) || isset($_GET['priceto'])) {
												$pricefrom = $_GET['pricefrom'];
												$priceto = $_GET['priceto'];
												$priceflag = 1;
											}
											if (isset($_GET['model'])) {
												$modelarr = $_GET['model'];
												$modelStr = implode("', '", $modelarr);
												$modelflag = 1;
											}
											if (isset($_GET['make'])) {
												$makearr = $_GET['make'];
												$makeStr = implode("', '", $makearr);
												$makeflag = 1;
											}
											
											if ($priceflag == 1 && $modelflag == 1 && $makeflag == 1) {
												if (!$pricefrom == "" || !$priceto == "" || !$modelarr == "" || !$makearr == "") 
												{
													if (!$pricefrom == "" || !$priceto == "") 
													{
														$pricesql = "SELECT * FROM bikes WHERE bike_price >= {$pricefrom} AND bike_price <= {$priceto} AND bike_model in ('$modelStr') AND bike_brand in ('$makeStr');";
														$stmt = mysqli_stmt_init($conn);
														if(!mysqli_stmt_prepare($stmt, $pricesql))
														{
															echo "SQL statement failed";
														}
														else
														{
															mysqli_stmt_execute($stmt);
															$result = mysqli_stmt_get_result($stmt);
															if (mysqli_num_rows($result) == 0) { ?>
																<div class="pt-5 pl-5" id="noresult">
																	<label>Nothing matched your query</label>
																</div>
																<?php
															} 
															else 
															{ 

																while ($row = mysqli_fetch_assoc($result)) {
																	$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																	if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																	{
																		echo "SQL statement failed";
																	}
																	else
																	{
																		mysqli_stmt_execute($stmt);
																		$result1 = mysqli_stmt_get_result($stmt);

																		while ($row1 = mysqli_fetch_assoc($result1)) 
																			{?>
																				<div class="col-md-4" id="myUL">
																					<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																						<div class="product-item">
																							<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																							<div class="nigger">
																								<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																								<label>Price:</label>
																								<label class="price"><?php echo $row['bike_price'] ?></label>
																							</div>
																						</div>
																					</a>
																				</div>
																				<?php
																			}
																		}
																	}
																}
															}
														}
													}
												}
												elseif ($priceflag == 1 && $modelflag == 1) {
													if (!$pricefrom == "" || !$priceto == "" || !$modelarr == "") 
													{
														if (!$pricefrom == "" || !$priceto == "") 
														{
															$pricesql = "SELECT * FROM bikes WHERE bike_price >= {$pricefrom} AND bike_price <= {$priceto} AND bike_model in ('$modelStr');";
															$stmt = mysqli_stmt_init($conn);
															if(!mysqli_stmt_prepare($stmt, $pricesql))
															{
																echo "SQL statement failed";
															}
															else
															{
																mysqli_stmt_execute($stmt);
																$result = mysqli_stmt_get_result($stmt);
																if (mysqli_num_rows($result) == 0) { ?>
																	<div class="pt-5 pl-5" id="noresult">
																		<label>Nothing matched your query</label>
																	</div>
																	<?php
																} 
																else 
																{ 

																	while ($row = mysqli_fetch_assoc($result)) {
																		$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																		if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																		{
																			echo "SQL statement failed";
																		}
																		else
																		{
																			mysqli_stmt_execute($stmt);
																			$result1 = mysqli_stmt_get_result($stmt);

																			while ($row1 = mysqli_fetch_assoc($result1)) 
																				{?>
																					<div class="col-md-4" id="myUL">
																						<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																							<div class="product-item">
																								<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																								<div class="nigger">
																									<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																									<label>Price:</label>
																									<label class="price"><?php echo $row['bike_price'] ?></label>
																								</div>
																							</div>
																						</a>
																					</div>
																					<?php
																				}
																			}
																		}
																	}
																}
															}
														}
													}
													elseif ($modelflag == 1 && $makeflag == 1) {
														if (!$modelflag == "" || !$makeflag == "") 
														{
															$makemodelsql = "SELECT * FROM bikes WHERE bike_model in ('$modelStr') AND bike_brand in ('$makeStr');";
															$stmt = mysqli_stmt_init($conn);
															if(!mysqli_stmt_prepare($stmt, $makemodelsql))
															{
																echo "SQL statement failed";
															}
															else
															{
																mysqli_stmt_execute($stmt);
																$result = mysqli_stmt_get_result($stmt);
																if (mysqli_num_rows($result) == 0) { ?>
																	<div class="pt-5 pl-5" id="noresult">
																		<label>Nothing matched your query</label>
																	</div>
																	<?php
																} 
																else 
																{ 

																	while ($row = mysqli_fetch_assoc($result)) {
																		$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																		if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																		{
																			echo "SQL statement failed";
																		}
																		else
																		{
																			mysqli_stmt_execute($stmt);
																			$result1 = mysqli_stmt_get_result($stmt);

																			while ($row1 = mysqli_fetch_assoc($result1)) 
																				{?>
																					<div class="col-md-4" id="myUL">
																						<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																							<div class="product-item">
																								<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																								<div class="nigger">
																									<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																									<label>Price:</label>
																									<label class="price"><?php echo $row['bike_price'] ?></label>
																								</div>
																							</div>
																						</a>
																					</div>
																					<?php
																				}
																			}
																		}
																	}
																}
															}
														}
														elseif ($priceflag == 1 && $makeflag == 1) {
															if (!$pricefrom == "" || !$priceto == "" || !$makeflag == "") 
															{
																if (!$pricefrom == "" || !$priceto == "") 
																{
																	$pricemakesql = "SELECT * FROM bikes WHERE bike_price >= {$pricefrom} AND bike_price <= {$priceto} AND bike_brand in ('$makeStr');";
																	$stmt = mysqli_stmt_init($conn);
																	if(!mysqli_stmt_prepare($stmt, $pricemakesql))
																	{
																		echo "SQL statement failed";
																	}
																	else
																	{
																		mysqli_stmt_execute($stmt);
																		$result = mysqli_stmt_get_result($stmt);
																		echo mysqli_num_rows($result);
																		if (mysqli_num_rows($result) == 0) { ?>
																			<div class="pt-5 pl-5" id="noresult">
																				<label>Nothing matched your query</label>
																			</div>
																			<?php
																		} 
																		else 
																		{ 

																			while ($row = mysqli_fetch_assoc($result)) {
																				$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																				if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																				{
																					echo "SQL statement failed";
																				}
																				else
																				{
																					mysqli_stmt_execute($stmt);
																					$result1 = mysqli_stmt_get_result($stmt);

																					while ($row1 = mysqli_fetch_assoc($result1)) 
																						{?>
																							<div class="col-md-4" id="myUL">
																								<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																									<div class="product-item">
																										<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																										<div class="nigger">
																											<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																											<label>Price:</label>
																											<label class="price"><?php echo $row['bike_price'] ?></label>
																										</div>
																									</div>
																								</a>
																							</div>
																							<?php
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
															elseif ($priceflag == 1) {
																if (!$pricefrom == "" || !$priceto == "") 
																{
																	$pricesql = "SELECT * FROM bikes WHERE bike_price >= {$pricefrom} AND bike_price <= {$priceto};";
																	$stmt = mysqli_stmt_init($conn);
																	if(!mysqli_stmt_prepare($stmt, $pricesql))
																	{
																		echo "SQL statement failed";
																	}
																	else
																	{
																		mysqli_stmt_execute($stmt);
																		$result = mysqli_stmt_get_result($stmt);
																		if (mysqli_num_rows($result) == 0) { ?>
																			<div class="pt-5 pl-5" id="noresult">
																				<label>Nothing matched your query</label>
																			</div>
																			<?php 
																		} 
																		else 
																		{ 
																			while ($row = mysqli_fetch_assoc($result)) {
																				$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																				if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																				{
																					echo "SQL statement failed";
																				}
																				else
																				{
																					mysqli_stmt_execute($stmt);
																					$result1 = mysqli_stmt_get_result($stmt);

																					while ($row1 = mysqli_fetch_assoc($result1)) 
																						{?>
																							<div class="col-md-4" id="myUL">
																								<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																									<div class="product-item">
																										<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																										<div class="nigger">
																											<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																											<label>Price:</label>
																											<label class="price"><?php echo $row['bike_price'] ?></label>
																										</div>
																									</div>
																								</a>
																							</div>
																							<?php
																						}
																					}
																				}
																			}
																		}
																	}
																}
																elseif ($modelflag == 1) {
																	if (!$modelStr == "") 
																	{
																		$modelsql = "SELECT * FROM bikes WHERE bike_model in ('$modelStr');";
																		$stmt = mysqli_stmt_init($conn);
																		if(!mysqli_stmt_prepare($stmt, $modelsql))
																		{
																			echo "SQL statement failed";
																		}
																		else
																		{
																			mysqli_stmt_execute($stmt);
																			$result = mysqli_stmt_get_result($stmt);
																			if (mysqli_num_rows($result) == 0) { ?>
																				<div class="pt-5 pl-5" id="noresult">
																					<label>Nothing matched your query</label>
																				</div>

																				<?php 
																			} 
																			else 
																			{ 
																				while ($row = mysqli_fetch_assoc($result)) {
																					$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																					if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																					{
																						echo "SQL statement failed";
																					}
																					else
																					{
																						mysqli_stmt_execute($stmt);
																						$result1 = mysqli_stmt_get_result($stmt);

																						while ($row1 = mysqli_fetch_assoc($result1)) 
																							{?>
																								<div class="col-md-4" id="myUL">
																									<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																										<div class="product-item">
																											<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																											<div class="nigger">
																												<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																												<label>Price:</label>
																												<label class="price"><?php echo $row['bike_price'] ?></label>
																											</div>
																										</div>
																									</a>
																								</div>
																								<?php								
																							}
																						}
																					}
																				}
																			}
																		}
																	} 
																	elseif ($makeflag == 1) {
																		if (!$makeStr == "") 
																		{
																			$makesql = "SELECT * FROM bikes WHERE bike_brand in ('$makeStr');";
																			$stmt = mysqli_stmt_init($conn);
																			if(!mysqli_stmt_prepare($stmt, $makesql))
																			{
																				echo "SQL statement failed";
																			}
																			else
																			{
																				mysqli_stmt_execute($stmt);
																				$result = mysqli_stmt_get_result($stmt);
																				if (mysqli_num_rows($result) == 0) { ?>
																					<div class="pt-5 pl-5" id="noresult">
																						<label>Nothing matched your query</label>
																					</div>

																					<?php 
																				} 
																				else 
																				{ 
																					while ($row = mysqli_fetch_assoc($result)) {
																						$imgnamesqlprice = "SELECT bike_image_name, MIN(bike_image_thumb) FROM b_images WHERE bike_id = {$row['bike_id']} GROUP BY bike_id;";

																						if(!mysqli_stmt_prepare($stmt, $imgnamesqlprice))
																						{
																							echo "SQL statement failed";
																						}
																						else
																						{
																							mysqli_stmt_execute($stmt);
																							$result1 = mysqli_stmt_get_result($stmt);

																							while ($row1 = mysqli_fetch_assoc($result1)) 
																								{?>
																									<div class="col-md-4" id="myUL">
																										<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																											<div class="product-item">
																												<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																												<div class="nigger">
																													<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																													<label>Price:</label>
																													<label class="price"><?php echo $row['bike_price'] ?></label>
																												</div>
																											</div>
																										</a>
																									</div>
																									<?php								
																								}
																							}
																						}
																					}
																				}
																			}
																		} 
																	}
																	else
																	{
																		?>
																		<div class="col-md-4" id="myUL">
																			<a href="pages/new-bikes/new-bikes.php?bikeid=<?php echo $row['bike_id'] ?>">
																				<div class="product-item">
																					<img src="images/sparepartimg/<?php echo $row1['bike_image_name'] ?>"  style="height: 200px !important;width: 100% !important;">
																					<div class="nigger">
																						<label class="productName"><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear']; ?></label><br>
																						<label><b>Price:</b></label>
																						<label class="price"><?php echo $row['bike_price'] ?> Rs.</label>
																					</div>
																				</div>
																			</a>
																		</div>
																		<?php 
																	}
																}			
															}
														}
														?>
														<div class="container pt-5">
															<ul class="pagination" style="margin-left: 35%;">
																<li><a href="?pageno=1">First</a></li>
																<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
																	<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
																</li>
																<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
																	<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
																</li>
																<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
															</ul>
														</div>
														<?php	
													}
												?>
							</div>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript">
	$('div.tags').find('input:checkbox').on('click', function() {
		let
		els = $('.results > div').hide(),
		checked = $('div.tags').find('input:checked').each(function() {
			els.filter('.'+$(this).attr('rel')).show();
		});
		if (!checked.length) els.show();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#toInput').change(function(){
			var val = $('#fromInput').val();
			var val2 = $('#toInput').val();
			if (val == '' || val2 == '') {
				$('#btngo').attr('disabled', 'disabled');
			}else{
				$('#btngo').removeAttr('disabled');
			}
		});
		$('#fromInput').change(function(){
			var val = $('#fromInput').val();
			var val2 = $('#toInput').val();
			if (val == '' || val2 == '') {
				$('#btngo').attr('disabled', 'disabled');
			}else{
				$('#btngo').removeAttr('disabled');
			}
		});

		var checkboxes = $(".modelcheck"),
		submitButt = $("#btngo");

		checkboxes.click(function() {
			submitButt.attr("disabled", !checkboxes.is(":checked"));
		});

		var checkboxes2 = $(".makecheck"),
		submitButt2 = $("#btngo");

		checkboxes2.click(function() {
			submitButt2.attr("disabled", !checkboxes2.is(":checked"));
		});
	});
</script>
<script type="text/javascript">
	var $noresult = $('#noresult');
	var $pagination = $('.pagination');

	if(!$('#noresult').length == 0 || window.location.href.indexOf("pricefrom") > -1 || window.location.href.indexOf("priceto") > -1 || window.location.href.indexOf("model") > -1) 
	{
		$pagination.html('');
	}
</script>

<?php
include_once 'includes/footer.php';
?>