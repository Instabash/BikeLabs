
      $(document).ready(function(){
        // Set form variable
        var form = $('#modform1');
        
        // Hijack form submit
        form.submit(function(event){
          // Set variables
          var model = $('#modelselect').val(); 
    	  var year = $('#yearselect').val(); 

          // Check if username value set
          if(model == "Choose..." || year == "Choose..."){
          	$("#modaftersubmission").addClass("moderror");
          	$("#modaftersubmission").html("Please choose a model or year");
          }
          else{
            // Process AJAX request
            $.post('includes/Modification.inc.php', {model: model, year: year}, function(data){
              // Append data into #results div
              $("#modaftersubmission").removeClass("moderror");
              $('#modaftersubmission').html(data);
            });
          }
          
          // Prevent default form action
          event.preventDefault();
        });
        
	        // Set form variable
	        var form2 = $('#modform2');
	        
	        // Hijack form submit
	        form2.submit(function(event){
	          // Set variables
		      var hlightcheck = $('#hlightcheck').val(); 
			  var jumpcheck = $('#jumpcheck').val(); 
			  var seatcheck = $('#seatcheck').val(); 
			  var mguardcheck = $('#mguardcheck').val(); 
			  var colorcheck = $('#colorcheck').val(); 
			  var cspocketcheck = $('#cspocketcheck').val(); 
		      var exhaustcheck = $('#exhaustcheck').val(); 
	    	  var tlightcheck = $('#tlightcheck').val(); 


	          // Check if username value set
	          
	            // Process AJAX request
	            $.post('includes/Modification.inc.php', {hlightcheck: hlightcheck, jumpcheck: jumpcheck, seatcheck:seatcheck, mguardcheck:mguardcheck,
	            colorcheck:colorcheck, cspocketcheck:cspocketcheck, exhaustcheck:exhaustcheck, tlightcheck:tlightcheck }, function(data){
	              // Append data into #results div
	              $("#modaftersubmission2").removeClass("moderror");
	              $('#modaftersubmission2').html(data);
	            });
	          
	          
	          // Prevent default form action
	          event.preventDefault();
	        });
      });



