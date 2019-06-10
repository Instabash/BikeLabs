<?php
session_start();
$title = 'Spare Parts';
include_once 'includes/header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/restrictions.inc.php';
redirect();

?>
<section id="spparts" class="section sppartsection content">
	<div class="container">
		<h3>New Spareparts</h3> <br>
		<div class="search-page-new">
			<div class="row">
				<div class="mt-3 col-md-2 used-car-refine-search">
					<div class="sidebar-filters border-new">
						<div class="filter-panel-new box">
							<form action="includes/search.inc.php" method="post">
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
												<option value="100">100</option>
												<option value="1000">1,000</option>
												<option value="5000">5,000</option>
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
											</select>
											<div class="mb10">
											</div>
											<select id="toInput" class="nomargin" style="width: 100%;" name="toval">
												<option value="" selected="selected">Price To</option>
												<option value="100">100</option>
												<option value="1000">1,000</option>
												<option value="5000">5,000</option>
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
											</select>
											<div id="clear-selection">

											</div>

										</div>
									</div>
								</div>
								<input type="submit" disabled="disabled" class="btn btn-primary btn-block" id="btngo" name="search-parts-used" value="Go">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="row">
						<?php
						if (isset($_GET['pageno'])) {
							$pageno = $_GET['pageno'];
						} else {
							$pageno = 1;
						}
						$no_of_records_per_page = 12;
						$offset = ($pageno-1) * $no_of_records_per_page;

						$total_pages_sql =  "SELECT COUNT(*) FROM post_ad WHERE ad_type = 'sparepart'";
						$result = mysqli_query($conn,$total_pages_sql);	

						$total_rows = mysqli_fetch_array($result)[0];
						$total_pages = ceil($total_rows / $no_of_records_per_page);		
						?>
						<?php 
						$spaartsql = "SELECT * FROM post_ad WHERE ad_type = 'sparepart' ORDER BY `ad_date` DESC LIMIT {$offset}, {$no_of_records_per_page};";
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
								$imgnamesql = "SELECT ad_image_name, MIN(ad_image_thumb) FROM post_ad_images WHERE ad_id = {$row['ad_id']} GROUP BY ad_id;";

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
										if (isset($_GET['pricefrom']) || isset($_GET['priceto'])) 
										{
											$pricefrom = 0;
											$priceto = 0;
											$priceflag = 0;

											if (isset($_GET['pricefrom']) || isset($_GET['priceto'])) {
												$pricefrom = $_GET['pricefrom'];
												$priceto = $_GET['priceto'];
												$priceflag = 1;
											}
											if ($priceflag == 1) {
												if (!$pricefrom == "" || !$priceto == "") 
												{
													$pricesql = "SELECT * FROM post_ad WHERE ad_type = 'sparepart' AND ad_price >= {$pricefrom} AND ad_price <= {$priceto};";
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
																$imgnamesqlprice = "SELECT ad_image_name, MIN(ad_image_thumb) FROM post_ad_images WHERE ad_id = {$row['ad_id']} GROUP BY ad_id;";

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
																			<div class="col-md-4">
																				<a href="pages/spareparts/spareparttemp.php?partid=<?php echo $row['ad_id'] ?>">
																					<div class="product-item">
																						<img src="images/sparepartimg/<?php echo $row1['ad_image_name'] ?>" style="height: 200px !important;width: 100% !important;">
																						<div>
																							<label class="productName"><?php echo $row['ad_title'] ?></label><br>
																							<label><b>Price:</b></label>
																							<label class="price"><?php echo $row['ad_price'] ?> Rs.</label>
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
												<div class="col-md-4">
													<a href="pages/spareparts/spareparttemp.php?partid=<?php echo $row['ad_id'] ?>">
														<div class="product-item">
															<img src="images/sparepartimg/<?php echo $row1['ad_image_name'] ?>" style="height: 200px !important;width: 100% !important;">
															<div>
																<label class="productName"><?php echo $row['ad_title'] ?></label><br>
																<label><b>Price:</b></label>
																<label class="price"><?php echo $row['ad_price'] ?> Rs.</label>
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

	<!-- Footer -->

	<?php
	include_once 'includes/footer.php';
	?>