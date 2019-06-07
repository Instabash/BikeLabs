<?php

function priceFilter()
{
	if (isset($_GET['pricefrom'])||isset($_GET['priceto'])) {

		$pricefrom = $_GET['pricefrom'];
		$priceto = $_GET['priceto'];

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
																	// $modelarr = $_GET['model'];
																	// $modelStr = implode("', '", $modelarr);
																	// echo $modelStr;
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