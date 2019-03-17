<?php
include_once '../../includes/header.php';
include_once '../../includes/dbh.inc.php';
$part_id = $_GET["partid"];

$sql = "SELECT * FROM spare_parts WHERE part_id='$part_id'";
$result = mysqli_query($conn, $sql);
?>
<section id="biketemplate" class="section biketemplatesec">
	<div class="container" >
		<div class="paymentmain" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft border-new border border-dark rounded mt-5 " style="">
				<div class="w3-content w3-display-container">
					<img class="mySlides" src="../../images/a_dvert1.jpg" style="width:100%">
					<img class="mySlides" src="../../images/a_dvert2.jpg" style="width:100%;display:none">
					<img class="mySlides" src="../../images/modify.jpg" style="width:100%;display:none">
					<img class="mySlides" src="../../images/modify2.jpg" style="width:100%;display:none">
					<img class="mySlides" src="../../images/purchase1.jpg" style="width:100%;display:none">
					<img class="mySlides" src="../../images/purchase2.jpg" style="width:100%;display:none">
					<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
					<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
				</div>
				
				<div class=" w3-row-padding w3-section">
					<div class="w3-col s4">
						<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/a_dvert1.jpg" style="width:100px;cursor:pointer" onclick="currentDiv(1)">
					</div>
					<div class="w3-col s4">
						<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/a_dvert2.jpg" style="width:100px;cursor:pointer" onclick="currentDiv(2)">
					</div>
					<div class="w3-col s4">
						<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/modify.jpg" style="width:100px;cursor:pointer" onclick="currentDiv(3)">
					</div>
					<div class="w3-col s4">
						<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/modify2.jpg" style="width:100px;cursor:pointer" 
						onclick="currentDiv(4)">
					</div>
					<div class="w3-col s4">
						<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/modify3.jpg" style="width:100px;cursor:pointer" 
						onclick="currentDiv(5)">
					</div>
					<div class="w3-col s4">
						<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/purchase1.jpg" style="width:100px;cursor:pointer" 
						onclick="currentDiv(6)">
					</div>
				</div>
			</div>
			<div class="paymentright">
				<div class="border-new border border-dark rounded mt-5 p-3" style="">
					<?php
						if($row = mysqli_fetch_assoc($result))
						{
							echo '
							<div>
								<h3>'.$row['part_name'].'</h3><br>
								<p>'.$row['part_price'].' Rs.</p>
							</div>
							';
						}
					?>
				</div>
				<div class="border-new border border-dark rounded mt-5 p-3" style="">
					<?php
						
							echo '
							<div>
								<h3>Description</h3><br>	
								<p>'.$row['part_description'].'</p>
							</div>
							';
					?>
				</div>
			</div>
			
		</div>
	</div>
</section>
<script type="">
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
		</script>

		<?php
		include_once '../../includes/footer.php';
		?>