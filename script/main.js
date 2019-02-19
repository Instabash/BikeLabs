

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




