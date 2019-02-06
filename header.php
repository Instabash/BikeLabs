<?php

?>

<!DOCTYPE html>
<html>
<head>
	<script src="script/main.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">	
	<title>BikeLabs</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){
        // Set form variable
        var form = $('#ajaxform');
        
        // Hijack form submit
        form.submit(function(event){
          // Set username variable
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
      });
    </script>
	
</head>
<body>
	<header>
		<div class="head-container">
			<h1 class="unselectable">BikeLabs</h1>
		</div>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      	<li class="nav-item active header-padding">
		        	<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      	</li>
		      	<li class="nav-item header-padding">
			        <a class="nav-link" href="spparts.php">Spare Parts</a>
		      	</li>
		      	<li class="nav-item dropdown header-padding">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Modify </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="modification.php">Body Modification</a>
			          <a class="dropdown-item" href="alteration.php">Engine Alteration</a>
			        </div>
		      	</li>
		      	<li class="nav-item header-padding">
		        	<a class="nav-link" href="newbikes.php">New Bikes</a>
	      		</li>
		      	<li class="nav-item header-padding">
		        	<a class="nav-link" href="postad.php">Post An Ad</a>
      			</li>
		      	
		    </ul>

		    <form id="demo-2">
				<input type="search" placeholder="Search">
			</form>
		  </div>	
		</nav>
	</header>
