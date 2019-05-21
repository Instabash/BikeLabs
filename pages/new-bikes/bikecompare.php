<?php
include_once '../../includes/header.php';
?>

<section id="postad" class="section postadsection content">
	<div class="container">
		<h4>Compare bikes</h4>
		<form action="../../includes/bikecompare.inc.php" method="post">
			<div class="row pt-5 pl-5 pr-5">
				<div class="modleft1">
					<h5>Choose Bike (A)</h5>
					<div id="demoForm" class="demoForm p-5">
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
					</div>
				</div>
				<div class="mt-4 mb-4" style="border-right: 2px solid #dcd4d4;">
				</div>
				<div class="modright1">
					<h5>Choose Bike (B)</h5>
					<div id="demoForm" class="demoForm p-5">
						<div class="formrowad p-2">
							<label>Make</label>
							<div class="select-wrap mb-2">
								<select class="custom-select" name="category2" id="category2">
									<option value="Honda">Honda</option>
									<option value="SuperPower">SuperPower</option>
									<option value="Unique">Unique</option> 
								</select>
							</div>
						</div>
						<div class="formrowad p-2">
							<label>Make</label>
							<div class="select-wrap mb-2">
								<select class="custom-select" name="choices2" id="choices2">
									<!-- populated using JavaScript -->
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-outline-danger" name="cmpsubmit" value="Compare">
		</form>
	</div>
</section>
<script>
	
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

	document.getElementById("category2").addEventListener("change", function(e) {
	    // name of associated select list
	    var relName = 'choices2';
	    
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
	var sel2 = document.getElementById("category2");
	sel.selectedIndex = 0;

	// name of associated select list
	var relName = 'choices';
	var relName2 = 'choices2';
	// reference to associated select list
	var rel = document.getElementById(relName);
	var rel2 = document.getElementById(relName2);
	// get data for associated select list passing its name
	// and value of selected in controlling select list
	var data = Select_List_Data["choices"][ sel.value ];
	var data2 = Select_List_Data["choices"][ sel2.value ];
	// add options to associated select list
	appendDataToSelect(rel, data);
	appendDataToSelect(rel2, data2);
}());

</script>
<?php
include '../../includes/footer.php';
?>