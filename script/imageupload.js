$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var files = e.target.files,
        filesLength = files.length;

        var count = $("[id^=pip]").length+1;
        for (var i = 0; i < filesLength; i++) {
          if(count > 3)
          {
            document.getElementById("files").disabled = true;
          }
          
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;

            $("<span class=\"pip\" id=\"pip\">" +
              "<img class=\"imageThumb\"  src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
              "<br/><span>" + f.name + "</span>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });
            
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
        $("#files")[0].value = '';
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
FileUploader.FileSelect.prototype.isEmptyAfterSelection = function() {
    return {Boolean}; // true|false
};

function count1()
{
   var count = $("[id^=pip]").length+1;
   return count
}