

$(document).ready(function() {
    // $('.js-example-basic-multiple').select2({
    // 	placeholder:"Select parts or add your own parts",
    // 	tags: true
    // });
    $('input[name="radiopkg1"]').on('change', function() {
	  // this, in the anonymous function, refers to the changed-<input>:
	  // select the element(s) you want to show/hide:
	  $('.customparts')
	      // pass a Boolean to the method, if the numeric-value of the changed-<input>
	      // is exactly equal to 2 and that <input> is checked, the .business-fields
	      // will be shown:
	      .toggle(+this.value === 2 && this.checked);
	// trigger the change event, to show/hide the .business-fields element(s) on
	// page-load:
	}).change();
	    
});


//test for select2 box
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
    	placeholder: "Select a state",
    	tags: true,
    	allowClear: true

    });
});

$(document).ready(function(){
	$('input[name="pickup-type-radio"]').on('change', function() {
	  // this, in the anonymous function, refers to the changed-<input>:
	  // select the element(s) you want to show/hide:
	  $('.homepickup-pick')
	      // pass a Boolean to the method, if the numeric-value of the changed-<input>
	      // is exactly equal to 2 and that <input> is checked, the .business-fields
	      // will be shown:
	      .toggle(+this.value === 1 && this.checked);
	// trigger the change event, to show/hide the .business-fields element(s) on
	// page-load:
	}).change();
});

$(document).ready(function(){
	$('input[name="pickup-type-radio"]').on('change', function() {
	  // this, in the anonymous function, refers to the changed-<input>:
	  // select the element(s) you want to show/hide:
	  $('.dropoff-pick')
	      // pass a Boolean to the method, if the numeric-value of the changed-<input>
	      // is exactly equal to 2 and that <input> is checked, the .business-fields
	      // will be shown:
	      .toggle(+this.value === 2 && this.checked);
	// trigger the change event, to show/hide the .business-fields element(s) on
	// page-load:
	}).change();
});



//----------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------//


filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("filter");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

//-----------------------javascript for spareparts filter for search bar
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByClassName('filterDiv');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("productName")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
//-----------------------javascript for spareparts filter for price range
function priceRange() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  fromInput = +document.getElementById('fromInput').value;
  toInput = +document.getElementById('toInput').value;
  ul = document.getElementById("myUL");
  li = ul.getElementsByClassName('filterDiv');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("price")[0];
    var result;
    result = a.innerHTML;
    if (fromInput == "" && toInput == "") {
      toInput = 9999999;
      li[i].style.display = "";
    } 
    if (result >= fromInput && result <= toInput){
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

function switch_div(show) {  
  document.getElementById("show_"+show).style.display = "block";
  document.getElementById("show_"+((show==1)?2:1)).style.display = "none";
}   

// $(document).ready(function() {
//   const events = {
//     submit: 'submit'
//   };
//   const $form1 = $('#modform1');
//   const $form2 = $('#modform2');
  
//   $form1.on(events.submit, function(event) {
  
//     // Prevents the event from bubbling up the DOM tree, preventing any parent handlers from being notified of the event.
//     event.stopPropagation(); 
    
//     // Default action of the event will not be triggered.
//     event.preventDefault(); 
    
//     var model = $('#modelselect').val(); 
// 	  var year = $('#yearselect').val(); 

//       // Check if username value set
//       if(model == "Choose..." || year == "Choose..."){
//       	$("#modaftersubmission").addClass("moderror");
//       	$("#modaftersubmission").html("Please choose a model or year");
//       }
//       else{
//         // Process AJAX request
//         $.post('includes/Modification.inc.php', {model: model, year: year}, function(data){
//           // Append data into #results div
//           $("#modaftersubmission").removeClass("moderror");
//           $('#modaftersubmission').html(data);
//         });
//       }
//   });
  
//   $form2.on(events.submit, function(event) {
  
//     // Prevents the event from bubbling up the DOM tree, preventing any parent handlers from being notified of the event.
//     event.stopPropagation(); 
    
//     // Default action of the event will not be triggered.
//     event.preventDefault(); 
    
//     var hlightcheck = $('#hlightcheck').val(); 
// 	var jumpcheck = $('#jumpcheck').val(); 
// 	var seatcheck = $('#seatcheck').val(); 
// 	var mguardcheck = $('#mguardcheck').val(); 
// 	var colorcheck = $('#colorcheck').val(); 
// 	var cspocketcheck = $('#cspocketcheck').val(); 
// 	var exhaustcheck = $('#exhaustcheck').val(); 
// 	var tlightcheck = $('#tlightcheck').val(); 


// 	// Check if username value set

// 	// Process AJAX request
// 	$.post('includes/Modification.inc.php', {hlightcheck: hlightcheck, jumpcheck: jumpcheck, seatcheck:seatcheck, mguardcheck:mguardcheck,
// 	colorcheck:colorcheck, cspocketcheck:cspocketcheck, exhaustcheck:exhaustcheck, tlightcheck:tlightcheck }, function(data){
// 	  // Append data into #results div
// 	  $("#modaftersubmission2").removeClass("moderror");
// 	  $('#modaftersubmission2').html(data);
// 	});
//   });
//   });

//      //  $(document).ready(function(){
//      //    // Set form variable
//      //    var form = $('#modform1');
        
//      //    // Hijack form submit
//      //    form.submit(function(event){
//      //      // Set variables
//      //      var model = $('#modelselect').val(); 
//     	//   var year = $('#yearselect').val(); 

//      //      // Check if username value set
//      //      if(model == "Choose..." || year == "Choose..."){
//      //      	$("#modaftersubmission").addClass("moderror");
//      //      	$("#modaftersubmission").html("Please choose a model or year");
//      //      }
//      //      else{
//      //        // Process AJAX request
//      //        $.post('includes/Modification.inc.php', {model: model, year: year}, function(data){
//      //          // Append data into #results div
//      //          $("#modaftersubmission").removeClass("moderror");
//      //          $('#modaftersubmission').html(data);
//      //        });
//      //      }
          
//      //      // Prevent default form action
//      //      event.preventDefault();
//      //    });
        
// 	    //     // Set form variable
// 	    //     var form2 = $('#modform2');
	        
// 	    //     // Hijack form submit
// 	    //     form2.submit(function(event){
// 	    //       // Set variables
// 		   //    var hlightcheck = $('#hlightcheck').val(); 
// 			  // var jumpcheck = $('#jumpcheck').val(); 
// 			  // var seatcheck = $('#seatcheck').val(); 
// 			  // var mguardcheck = $('#mguardcheck').val(); 
// 			  // var colorcheck = $('#colorcheck').val(); 
// 			  // var cspocketcheck = $('#cspocketcheck').val(); 
// 		   //    var exhaustcheck = $('#exhaustcheck').val(); 
// 	    // 	  var tlightcheck = $('#tlightcheck').val(); 


// 	    //       // Check if username value set
	          
// 	    //         // Process AJAX request
// 	    //         $.post('includes/Modification.inc.php', {hlightcheck: hlightcheck, jumpcheck: jumpcheck, seatcheck:seatcheck, mguardcheck:mguardcheck,
// 	    //         colorcheck:colorcheck, cspocketcheck:cspocketcheck, exhaustcheck:exhaustcheck, tlightcheck:tlightcheck }, function(data){
// 	    //           // Append data into #results div
// 	    //           $("#modaftersubmission2").removeClass("moderror");
// 	    //           $('#modaftersubmission2').html(data);
// 	    //         });
	          
	          
// 	    //       // Prevent default form action
// 	    //       event.preventDefault();
// 	    //     });
//      //  });




