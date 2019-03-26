// $(document).ready(function() {
//     if (window.File && window.FileList && window.FileReader) {
//       $("#files").on("change", function(e) {
//         var files = e.target.files,
//         filesLength = files.length;

//         var count = $("[id^=pip]").length+1;
//         for (var i = 0; i < filesLength; i++) {
//           if(count > 3)
//           {
//             document.getElementById("files").disabled = true;
//           }

//           var f = files[i]
//           var fileReader = new FileReader();
//           fileReader.onload = (function(e) {
//             var file = e.target;

//             $("<span class=\"pip\" id=\"pip\">" +
//               "<img class=\"imageThumb\"  src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
//               "<br/><span>" + f.name + "</span>" +
//               "<br/><span class=\"remove\">Remove image</span>" +
//               "</span>").insertAfter("#files");
//             $(".remove").click(function(){
//               $(this).parent(".pip").remove();
//             });

//           // Old code here
//           /*$("<img></img>", {
//             class: "imageThumb",
//             src: e.target.result,
//             title: file.name + " | Click to remove"
//           }).insertAfter("#files").click(function(){$(this).remove();});*/

//         });
//       }
//     });
//   } else {
//     alert("Your browser doesn't support to File API")
//   }
// });

// function count1()
// {
//    var count = $("[id^=pip]").length+1;
//    return count
// }

$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#bkfiles").on("change", function(e) {
            var files = e.target.files,
            filesLength = files.length;
            

            for (var i = 0; i < filesLength; i++) {

                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\" style='text-align:center;'>" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                        "<br/><span>" + f.name + "</span>" +
                        "<br/><span class=\"remove\">Remove image</span>" +
                        "</span>").insertAfter("#bkfiles");
                    $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                    });
    });

        fileReader.readAsDataURL(f);
    }
});
        $("#spfiles").on("change", function(e) {
            var files = e.target.files,
            filesLength = files.length;
            

            for (var i = 0; i < filesLength; i++) {

                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\" style='text-align:center;'>" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                        "<br/><span>" + f.name + "</span>" +
                        "<br/><span class=\"remove\">Remove image</span>" +
                        "</span>").insertAfter("#spfiles");
                    $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                    });
    });

        fileReader.readAsDataURL(f);
    }
});
    } else {
        alert("Your browser doesn't support to File API")
    }
});



