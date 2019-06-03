<?php
include_once '../../includes/header.php';
include_once '../../includes/dbh.inc.php';
include_once '../../includes/restrictions.inc.php';
redirect();
$bike_id = $_GET["bikeid"];

$sql = "SELECT * FROM bikes WHERE bike_id='$bike_id'";
$result = mysqli_query($conn, $sql);

$stmt = mysqli_stmt_init($conn);
?>
<section id="biketemplate" class="section biketemplatesec content">
	<div class="container max-w">
		<div class="paymentmain" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft border-new border border-dark rounded mt-5 ">
				<div class="w3-content w3-display-container">
					<?php
					$imgnamesql = "SELECT bike_image_name FROM b_images WHERE bike_id = {$_GET["bikeid"]};";
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
							<img class="mySlides" src="../../images/sparepartimg/<?php echo $row1['bike_image_name'] ?>" style="width:100%;height: 500px !important;">
							<?php 
						}			
					}
					?>
					<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
					<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
				</div>
				<div class=" w3-row-padding w3-section">
					<?php
					$imgnamesql = "SELECT bike_image_name FROM b_images WHERE bike_id = {$_GET["bikeid"]};";
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
							<div class="w3-col s4">
								<img class="demo w3-opacity w3-hover-opacity-off border-new border border-dark rounded " src="../../images/sparepartimg/<?php echo $row1['bike_image_name'] ?>" style="width:100px;height:75.47px !important;cursor:pointer" onclick="currentDiv(<?php echo $i ?>)">
							</div>
							<?php 
						}
					}		
					?>
				</div>
			</div>
			<div class="paymentright">
				<div class="border-new border border-dark rounded mt-5 p-3">
					<?php
					if($row = mysqli_fetch_assoc($result))
					{
						?>
						<div>
							<h5><b><?php echo $row['bike_brand'] . " " . $row['bike_model'] . " " . $row['bikeyear'];  ?></b></h5><br>
							<p><?php echo $row['bike_price']; ?> Rs.</p>

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
									<?php
									if ($row3['User_type'] == '1'){
										?>
										<p>Posted by BikeLabs</p>
										<?php
									}
									elseif ($row3['User_type'] == '2'){
										?>
										<p>Posted by : <?php echo " " .  $row3['uidUsers']; ?></p>
										<?php 
									}
								}
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
				
				<form action="/BikeLabs/includes/cartprocess.inc.php?bikeid=<?php echo $_GET["bikeid"] ?>" method="post">
					<div class="border-new border border-dark rounded mt-5 p-3">
						<button type="submit" name="buyBtn-bikes" class="btn btn-outline-danger">Buy now</button>
					</div>
				</form>
			</div>
		</div>
		<div class="paymentmain" style="margin-left: 0px;margin-right: 0px">
			<div class="paymentleft" >
				<div class="border-new border border-dark rounded mt-5 p-3">
					<h4>Description</h4><br>	
					<p><?php echo $row['bike_desc']; ?></p>
				</div>
				<?php
				
				$sqlspecs = "SELECT * FROM bikespecs WHERE bike_id = {$bike_id};";
				if(!mysqli_stmt_prepare($stmt, $sqlspecs))
				{
					echo "SQL statement failed";
				}
				else
				{
					mysqli_stmt_execute($stmt);
					$result1 = mysqli_stmt_get_result($stmt);

					if($row1 = mysqli_fetch_assoc($result1)) 
					{
						$bike1eng = $row1['bike_engine_type'];
						$bike1bore_str = $row1['bike_bore_stroke']; 
						$bike1trans = $row1['bike_transmission']; 
						$bike1starting = $row1['bike_starting']; 
						$bike1frame = $row1['bike_frame']; 
						$bike1dimensions = $row1['bike_dimensions']; 
						$bike1petrol_cap = $row1['bike_petrol_cap']; 
						$bike1f_tyre = $row1['bike_f_tyre']; 
						$bike1b_tyre = $row1['bike_b_tyre']; 
						$bike1dry_weight = $row1['bike_dry_weight']; 
					}?>
					<div class="border-new border border-dark rounded mt-5 p-3">
						<h4>Bike Specifications</h4><br>
						<table class="table" style="width:100%">
							<col style="width:20%" span="4" />
							<tr>
								<th>Engine Type</th>
								<td><p style="text-align: center;"><?php echo $bike1eng; ?></p></td>
							</tr>
							<tr>
								<th>Bore & Stroke</th>
								<td><p style="text-align: center;"><?php echo $bike1bore_str; ?></p></td>
							</tr>
							<tr>
								<th>Transmission</th>
								<td><p style="text-align: center;"><?php echo $bike1trans; ?></p></td>
							</tr>
							<tr>
								<th>Starting</th>
								<td><p style="text-align: center;"><?php echo $bike1starting; ?></p></td>
							</tr>
							<tr>
								<th>Frame</th>
								<td><p style="text-align: center;"><?php echo $bike1frame; ?></p></td>
							</tr>
							<tr>
								<th>Dimension (Lxwxh)</th>
								<td><p style="text-align: center;"><?php echo $bike1dimensions; ?></p></td>
							</tr>
							<tr>
								<th>Petrol Capacity</th>
								<td><p style="text-align: center;"><?php echo $bike1petrol_cap; ?></p></td>
							</tr>
							<tr>
								<th>Tyre at Front</th>
								<td><p style="text-align: center;"><?php echo $bike1f_tyre; ?></p></td>
							</tr>
							<tr>
								<th>Tyre at Back</th>
								<td><p style="text-align: center;"><?php echo $bike1b_tyre; ?></p></td>
							</tr>
							<tr>
								<th>Dry Weight</th>
								<td><p style="text-align: center;"><?php echo $bike1dry_weight; ?></p></td>
							</tr>
						</table>
					</div>
					<div class="border-new border border-dark rounded mt-5 p-3">
						<?php
						$bikeinfosql = "SELECT * FROM bikes WHERE bike_id = {$bike_id};";
						if(!mysqli_stmt_prepare($stmt, $bikeinfosql))
						{
							echo "SQL statement failed";
						}
						else
						{
							mysqli_stmt_execute($stmt);
							$result1 = mysqli_stmt_get_result($stmt);

							if($row2 = mysqli_fetch_assoc($result1)) 
							{
								$bike_name = $row2['bike_brand'] . " " . $row2['bike_model'] . " " . $row2['bikeyear'];
								$bike1_model = $row2['bike_model'];
								$bike1_make = $row2['bike_brand'];
							}
						}
						?>
						<h5>Compare <b><?php echo $bike_name; ?></b> with other bikes</h5>
						<form action="../../includes/bikecompare.inc.php" method="post">
							<div class="row pt-5 pl-5 pr-5">
								<div class="modleft1">
									<h5>Choose Bike</h5>
									<div id="demoForm" class="demoForm p-4">
										<div class="formrowad p-2">
											<label>Make</label>
											<div class="select-wrap mb-2">
												<select class="custom-select" name="category" id="category">
													<option value="Honda">Honda</option>
													<option value="SuperPower">SuperPower</option>
													<option value="Unique">Unique</option> 
												</select>
											</div>
										</div>
										<div class="formrowad p-2">
											<label>Make</label>
											<div class="select-wrap mb-2">
												<select class="custom-select" name="choices" id="choices">
													<!-- populated using JavaScript -->
												</select>
											</div>
										</div>
										<div>
											<input type="hidden" name="category2" value="<?php echo $bike1_make ?>">
											<input type="hidden" name="choices2" value="<?php echo $bike1_model ?>">
										</div>
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-outline-danger" name="cmpsubmit" value="Compare">
						</form>
					</div>
					<?php
				}
				?>
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
	var bike = qs.bike;
	localStorage.setItem('bikeid', bike);

	// to remove fn's from global namespace
	(function() {

	// removes all option elements in select list 
	// removeGrp (optional) boolean to remove optgroups
	function removeAllOptions(sel, removeGrp) {
		var len, groups, par;
		if (removeGrp) {
			groups = sel.getElementsByTagName('optgroup');
			len = groups.length;
			for (var i=len; i; i--) {
				sel.removeChild( groups[i-1] );
			}
		}

		len = sel.options.length;
		for (var i=len; i; i--) {
			par = sel.options[i-1].parentNode;
			par.removeChild( sel.options[i-1] );
		}
	}

	function appendDataToSelect(sel, obj) {
		var f = document.createDocumentFragment();
		var labels = [], group, opts;

		function addOptions(obj) {
			var f = document.createDocumentFragment();
			var o;

			for (var i=0, len=obj.text.length; i<len; i++) {
				o = document.createElement('option');
				o.appendChild( document.createTextNode( obj.text[i] ) );

				if ( obj.value ) {
					o.value = obj.value[i];
				}

				f.appendChild(o);
			}
			return f;
		}

		if ( obj.text ) {
			opts = addOptions(obj);
			f.appendChild(opts);
		} else {
			for ( var prop in obj ) {
				if ( obj.hasOwnProperty(prop) ) {
					labels.push(prop);
				}
			}

			for (var i=0, len=labels.length; i<len; i++) {
				group = document.createElement('optgroup');
				group.label = labels[i];
				f.appendChild(group);
				opts = addOptions(obj[ labels[i] ] );
				group.appendChild(opts);
			}
		}
		sel.appendChild(f);
	}

	// anonymous function assigned to onchange event of controlling select list
	document.getElementById("category").addEventListener("change", function(e) {
	    // name of associated select list
	    var relName = 'choices';
	    
	    // reference to associated select list 
	    var relList = document.getElementById(relName);
	    
	    // get data from object literal based on selection in controlling select list (this.value)
	    var obj = Select_List_Data["choices"][ this.value ];
	    
	    // remove current option elements
	    removeAllOptions(relList, true);
	    
	    // call function to add optgroup/option elements
	    // pass reference to associated select list and data for new options
	    appendDataToSelect(relList, obj);
	});

	// object literal holds data for optgroup/option elements
	var Select_List_Data = {

	    'choices': { // name of associated select list

	        // names match option values in controlling select list
	        Honda: {
	        	text: ['CG-125', 'CD-70', 'CG-125 Deluxe', 'CB-150F', 'CD-150'],
	        	value: ['125cc', '70cc', 'cg125del', 'cb150f', '150cc']
	        },
	        SuperPower: {
	        	text: ['SP-70', 'SP-125', 'SP-100', 'PK-150'],
	        	value: ['70cc', '125cc', 'sp100', '150cc']
	        },
	        Unique: {
	            // example without values
	            text: ['UD-70', 'UD-100', 'UD-125', 'UD-150'],
	            value: ['70cc', 'ud100', '125cc', '150cc']
	        }

	    }
	    
	};

	var form = document.forms['demoForm'];

	// reference to controlling select list
	var sel = document.getElementById("category");
	sel.selectedIndex = 0;

	// name of associated select list
	var relName = 'choices';
	// reference to associated select list
	var rel = document.getElementById(relName);
	// get data for associated select list passing its name
	// and value of selected in controlling select list
	var data = Select_List_Data["choices"][ sel.value ];
	// add options to associated select list
	appendDataToSelect(rel, data);
}());
</script>

<?php
include_once '../../includes/footer.php';
?>