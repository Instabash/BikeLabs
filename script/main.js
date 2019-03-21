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
    if (!(fromInput == "0" && !toInput == "0")) {
        document.getElementById('clear-selection').innerHTML = '<a href="#" id="clrlink">Clear selection</a>';
    }
  }
}

function switch_div(show) {  
  document.getElementById("show_"+show).style.display = "block";
  document.getElementById("show_"+((show==1)?2:1)).style.display = "none";
}   

//------------------------gallery start--------------------------------------//
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

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
    dots[i].className = dots[i].className.replace(" redborder", "");
  }
  x[slideIndex-1].style.display = "";
  dots[slideIndex-1].className += " w3-opacity-off";
  dots[slideIndex-1].className += " redborder";  
  
}
//------------------------gallery end--------------------------------------//
