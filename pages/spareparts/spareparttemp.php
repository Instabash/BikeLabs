<?php
include_once '../../includes/dbh.inc.php';
$part_id = $_GET["partid"];

$sql = "SELECT * FROM post_ad WHERE ad_id='$part_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)<1) {
	header("Location: /BikeLabs/404-page.php");
}
else{
include_once '../../includes/header.php';
include_once '../../includes/restrictions.inc.php';
redirect();
$stmt = mysqli_stmt_init($conn);
?>
<section id="biketemplate" class="section biketemplatesec content">
	<div class="container max-w">
		<div class="paymentmain" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft" style="text-align: left;height: ">
				
			</div>
			<div class="paymentright">
				
			</div>
		</div>
		<div class="paymentmain imageDiv" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft border-new border border-dark rounded mt-5 imageDivRight" style="">
				<div class="w3-content w3-display-container ">

					<?php
					$imgnamesql = "SELECT ad_image_name FROM post_ad_images WHERE ad_id = {$_GET["partid"]};";
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
							?>
							<img class="mySlides " src="/BikeLabs/images/sparepartimg/<?php echo $row1['ad_image_name'] ?>" style="width:100%;height: 500px;">
							<?php 
						}			
					}
					?>
					<div>
						<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
					</div>
					<div>
						<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
					</div>
				</div>
				<div class=" w3-row-padding w3-section" style="margin-left: 5%;">
					<?php
					$imgnamesql = "SELECT ad_image_name FROM post_ad_images WHERE ad_id = {$_GET["partid"]};";
					if(!mysqli_stmt_prepare($stmt, $imgnamesql))
					{
						echo "SQL statement failed";
					}
					else
					{
						$i = 0;
						mysqli_stmt_execute($stmt);
						$result1 = mysqli_stmt_get_result($stmt);
						while ($row1 = mysqli_fetch_assoc($result1)) 
						{ 
							$i++;
							?>
							<div class="w3-col s4" style="width: auto;">
								<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="/BikeLabs/images/sparepartimg/<?php echo $row1['ad_image_name'] ?>" style="width:100px;height:75.47px !important;cursor:pointer" onclick="currentDiv(<?php echo $i ?>)">
							</div>

							<?php 

						}
					}		
					?>
				</div>
			</div>
			<div class="paymentright imageDivRight">
				<div class="border-new border border-dark rounded mt-5 p-3" style="">
					<?php
					if($row = mysqli_fetch_assoc($result))
					{
						?>
						<div>
							<!-- <h4><?php echo $row['ad_title']; ?></b></h4> -->
							<h3><b><?php echo $row['ad_price']; ?></b> Rs.</h3><br>
							<h5 class=""><?php echo $row['ad_title']; ?></h5>
						</div>
						<?php
					}?>
				</div>
				<div class="border-new border border-dark rounded mt-2 p-3">
					<?php 
					$sqladdesc = "SELECT * FROM users WHERE idUsers ={$row["idUsers"]}";
					if(!mysqli_stmt_prepare($stmt, $sqladdesc))
					{
						echo "SQL statement failed";
					}
					else
					{
						mysqli_stmt_execute($stmt);
						$result3 = mysqli_stmt_get_result($stmt);
						while ($row3 = mysqli_fetch_assoc($result3)) 
						{
							?>
							<h5><b>Posted by :</b> <?php echo " " .  $row3['uidUsers']; ?></h5>
							<?php 
						}
					}
					?>
				</div>
				
				<div class="border-new border border-dark rounded mt-2 p-3">
					<h5><b>Ad. Location</b></h5><br>
					<p>
					<?php
						echo $row['ad_user_hname'] . ", " . $row['ad_user_pcode'] . ", " . $row['ad_user_country'] ;
					?></p>
				</div>
				<div class="border-new border border-dark rounded mt-2 p-3">
					<h5><b>Date Posted</b></h5><br>
					<p>
					<?php
						echo $row['ad_date'];
					?></p>
				</div>
				<form action="../../includes/markadsold.inc.php?partid=$part_id" method="post">
					<div class="border-new border border-dark rounded mt-2 p-3">
						<?php 
						if(isset($_SESSION['userId']))
						{
							if (($row['idUsers'] == $_SESSION['userId'])) 
							{
								?>
								<button type="button" name="mksold" class="btn btn-outline-danger">Mark Ad. as sold</button>
								<?php 
							}
							else
							{
								$sqladdesc = "SELECT * FROM users WHERE idUsers ={$row["idUsers"]}";
								if(!mysqli_stmt_prepare($stmt, $sqladdesc))
								{
									echo "SQL statement failed";
								}
								else
								{
									mysqli_stmt_execute($stmt);
									$result2 = mysqli_stmt_get_result($stmt);
									while ($row2 = mysqli_fetch_assoc($result2)) 
									{
										?>
										<h5><b>User Contact</b></h5><br>
										<p><b>Email:</b></p>
										<p><?php echo $row2['emailUsers'];?></p>
										<p>Or</p>
										<p><b>Phone:</b></p>
										<p><?php echo $row2['User_Contact'];?></p>
										<?php
									}
								} 
							}
						}
						else
						{
							$sqladdesc = "SELECT * FROM users WHERE idUsers ={$row["idUsers"]}";
							if(!mysqli_stmt_prepare($stmt, $sqladdesc))
							{
								echo "SQL statement failed";
							}
							else
							{
								mysqli_stmt_execute($stmt);
								$result2 = mysqli_stmt_get_result($stmt);
								while ($row2 = mysqli_fetch_assoc($result2)) 
								{
									?>
									<h5><b>User Contact</b></h5><br>
									<p><b>Email:</b></p>
									<p><?php echo $row2['emailUsers'];?></p>
									<p>Or</p>
									<p><b>Phone:</b></p>
									<p><?php echo $row2['User_Contact'];?></p>
									<?php
								}
							} 
						}
						?>
					</div>
				</form>
			</div>
		</div>
		<div class="paymentmain imageDiv" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft imageDivRight" >
				<div class="border-new border border-dark rounded mt-5 p-3" style="text-align: left;">
					<h4><b>Details</b></h4><br>	
					<div class="row pl-3">
						<?php
							if ($row['ad_type'] == 'bike') {
						?>
						<div class="modleft1">
							<label><b>Make</b></label><p><?php echo $row['bike_make']; ?></p>
						</div>
						<div class="modmiddle1">
							<label><b>Year</b></label><p><?php echo $row['bike_year']; ?></p>
						</div>
						<?php
							}
						?>
						<div class="modright1">
							<label><b>Condition</b></label><p><?php echo $row['ad_condition']; ?></p>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="paymentright imageDivRight">
				
			</div>
		</div>
		<div class="paymentmain imageDiv" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft imageDivRight" >
				<div class="border-new border border-dark rounded mt-5 p-3" style="text-align: left;">
					<h4><b>Description</b></h4><br>	
					<p style="word-break: break-all;"><?php echo $row['ad_description']; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="../../script/getparameters.js"></script>
<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {slideIndex = 1}
			if (n < 1) {slideIndex = x.length}
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				}
				x[slideIndex-1].style.display = "block";  
			}
			$('.btn-number').click(function(e){
				e.preventDefault();

				fieldName = $(this).attr('data-field');
				type      = $(this).attr('data-type');
				var input = $("input[name='"+fieldName+"']");
				var currentVal = parseInt(input.val());
				if (!isNaN(currentVal)) {
					if(type == 'minus') {

						if(currentVal > input.attr('min')) {
							input.val(currentVal - 1).change();
						} 
						if(parseInt(input.val()) == input.attr('min')) {
							$(this).attr('disabled', true);
						}

					} else if(type == 'plus') {

						if(currentVal < input.attr('max')) {
							input.val(currentVal + 1).change();
						}
						if(parseInt(input.val()) == input.attr('max')) {
							$(this).attr('disabled', true);
						}

					}
				} else {
					input.val(0);
				}
			});
			$('.input-number').focusin(function(){
				$(this).data('oldValue', $(this).val());
			});
			$('.input-number').change(function() {

				minValue =  parseInt($(this).attr('min'));
				maxValue =  parseInt($(this).attr('max'));
				valueCurrent = parseInt($(this).val());

				name = $(this).attr('name');
				if(valueCurrent >= minValue) {
					$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
				} else {
					alert('Sorry, the minimum value was reached');
					$(this).val($(this).data('oldValue'));
				}
				if(valueCurrent <= maxValue) {
					$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
				} else {
					alert('Sorry, the maximum value was reached');
					$(this).val($(this).data('oldValue'));
				}


			});
			$(".input-number").keydown(function (e) {
	// Allow: backspace, delete, tab, escape, enter and .
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
	// Allow: Ctrl+A
	(e.keyCode == 65 && e.ctrlKey === true) || 
	// Allow: home, end, left, right
	(e.keyCode >= 35 && e.keyCode <= 39)) {
	// let it happen, don't do anything
return;
}
	// Ensure that it is a number and stop the keypress
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
});

			var query = window.location.search.substring(1);
			var qs = parse_query_string(query);
	// console.log(qs.quant);	
	var partid = qs.partid;
	localStorage.setItem('partid', partid);
</script>

<?php
include_once '../../includes/footer.php';	
}
?>