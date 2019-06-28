<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
?>
<script>

    $(":input").inputmask();
    $(":input").inputmask();
</script>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Admin Panel
	<button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
</label>
<div class="d-flex" id="wrapper">
	<div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="/BikeLabs/pages/admin/admindash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="/BikeLabs/pages/admin/admin-jobs.php" class="list-group-item list-group-item-action bg-light">Pending Jobs</a>
            <a href="/BikeLabs/pages/admin/admin-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
            <a href="/BikeLabs/pages/admin/admin-vendor.php" class="list-group-item list-group-item-action bg-light">Vendor management</a>
            <a href="/BikeLabs/pages/admin/admin-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
            <a href="/BikeLabs/pages/admin/admin-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
            <a href="/BikeLabs/pages/admin/admin-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
            <a href="/BikeLabs/pages/admin/admin-bike-parts.php" class="list-group-item list-group-item-action bg-light">Bikes/Parts Posted</a>
        </div>
    </div>
    <section id="modify" class="section modsection content content2">
        <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <!-- /.box -->
               <div class="box">
                  <div class="box-header">
                     <h3 class="box-title">Add new bikes</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="advertpick clearfix ">
                     <form class="p-2" action="/BikeLabs/includes/new-bikes.inc.php" method="post" enctype="multipart/form-data" id="bkform">
                        <hr>
                        <h5>Specifications</h5>
                        <hr>
                        <div class="form-row formrowad p-2">
                            <label>Brand</label>
                            <div class="select-wrap mb-2">
                                <select class="js-example-responsive" name="bkbrand" style="width: 100px;">
                                <!-- <select class="custom-select" name="bkbrand" id="title"> -->
                                    <option value="0" selected>Select</option>
                                    <option value="Honda">Honda</option>
                                    <option value="SuperPower">SuperPower</option>
                                    <option value="Unique">Unique</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row formrowad p-2 pt-4">
                            <label>Model</label>
                            <div class="select-wrap mb-2">
                                <select class="js-example-responsive" name="bkmodel" style="width: 100px;">
                                <!-- <select class="custom-select" name="bkmodel" id="title"> -->
                                    <option value="0" selected>Select</option>
                                    <option value="70cc">70cc</option>
                                    <option value="125cc">125cc</option>
                                    <option value="150cc">150cc</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row formrowad p-2 pt-4 mb-3">
                            <label>Year</label>
                            <div>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bkyear" placeholder="Year" aria-label="Year" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkengine">Engine Type</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bkengine" placeholder="Engine type" aria-label="Engine type" aria-describedby="basic-addon1">
                                    <small style="color: black" class="p-2 pl-5"><i>Eg. 4-stroke Single cylinder</i></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkborestroke">Bore and Stroke</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bkborestroke" placeholder="Bore and Stroke" aria-label="Bore and Stroke" aria-describedby="basic-addon1" data-inputmask="'mask': '99.9 - 99.9 mm'">
                                    <small style="color: black" class="p-2 pl-5"><i>Eg. 56.6-49.4</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bktrans">Transmission</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bktrans" placeholder="Transmission" aria-label="Transmission" aria-describedby="basic-addon1" data-inputmask="'mask': '9 - speed'">
                                    <small style="color: black" class="p-2 pl-5"><i>Eg. 4 speed</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkstart">Starting</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bkstart" placeholder="Starting" aria-label="Starting" aria-describedby="basic-addon1">
                                    <small style="color: black" class="p-2 pl-5"><i>Eg. Kick start</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkframe">Frame</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bkframe" placeholder="Frame" aria-label="Frame" aria-describedby="basic-addon1">
                                    <small style="color: black" class="p-2 pl-5"><i>Eg. Backbone type</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkdim">Dimensions</label>
                            <div>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bkdim" placeholder="Dimensions" aria-label="Dimensions" aria-describedby="basic-addon1">
                                    <small style="color: black" class="p-2 pl-5"><i>(Lxwxh)</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkpetcap">Petrol Capacity</label>
                            <div>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bkpetcap" placeholder="Petrol Capacity" aria-label="Petrol Capacity" aria-describedby="basic-addon1">
                                    <small style="color: black" class="p-2 pl-5"><i>In litres</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkftyre">Tyre at front</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bkftyre" placeholder="Tyre at front" aria-label="Tyre at front" aria-describedby="basic-addon1" data-inputmask="'mask': '99.99 - 99.99'">
                                    <small style="color: black" class="p-2 pl-5"><i>Eg. 90 - 104</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkbtyre">Tyre at back</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bkbtyre" placeholder="Tyre at back" aria-label="Tyre at back" aria-describedby="basic-addon1" data-inputmask="'mask': '99.99 - 99.99'">
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-2 pt-4 mb-3 formrowad">
                            <label for="bkdweight">Dry weight</label>
                            <div>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bkdweight" placeholder="Dry Weight" aria-label="Dry Weight" aria-describedby="basic-addon1">
                                    <small style="color: black" class="p-2 pl-5"><i>In Kilograms</i></small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>General information</h5>
                        <hr>
                        <div class="form-row formrowad p-2 pt-4">
                            <label>Description</label>
                            <div>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" rows="5" cols="50" id="description" name="bkdescription" style="resize: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row formrowad pl-2 pr-2 pt-2">
                            <label>Price</label>
                            <div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="bkprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="form-row formrowad p-2 imageupload" align="left">
                            <label>Attachment Instructions</label>
                            <ul class="imagelist" style="list-style: none;">
                                <li>
                                    Allowed only files with extension (jpg, png, gif)
                                </li>
                                <li>
                                    Maximum number of allowed files 10 with 300 KB for each
                                </li>
                                <li>
                                    you can select files from different folders
                                </li>
                                <li>
                                    <span class=" fileinput-button">
                                        <br>
                                        <span>Select Attachment</span>
                                        <input type="file" name="files[]" id="files" style="display: none !important;" multiple accept="image/jpeg, image/png, image/gif,"><br />
                                        <input type="button" class="btn btn-outline-danger" value="Browse..." onclick="document.getElementById('files').click();" />
                                    </span>
                                </li>
                                <li>
                                    <output id="Filelist" class="imgoutput" style="max-width: 630px;"></output>
                                </li>
                                <li>
                                    <span id="error" style="color: red;"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="pb-4">
                            <p id="empty" style="color: red !important;"></p>
                            <p id="year" style="color: red !important;"></p>
                        </div>
                        <div class="addressbtn">
                           <button type="submit" name="bksubmit" class="btn btn-primary">Post the advert</button>
                       </div>
                   </form>
               </div> 
               <!-- /.box-body -->
           </div>
           <!-- /.box -->
        </div>
    </section>
</div>

<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>
<script type="text/javascript">

        //I added event handler for the file upload control to access the files properties.
        document.addEventListener("DOMContentLoaded", init, false);

        //To save an array of attachments 
        var AttachmentArray = [];

        //counter for attachment array
        var arrCounter = 0;

        //to make sure the error message for number of files will be shown only one time.
        var filesCounterAlertStatus = false;

        //un ordered list to keep attachments thumbnails
        var ul = document.createElement('ul');
        ul.style.listStyle = "none";
        ul.className = ("thumb-Images");
        ul.id = "imgList";

        var validated = true;

        function init() {
            //add javascript handlers for the file upload event
            document.querySelector('#files').addEventListener('change', handleFileSelect, false);
            
        }

        //the handler for file upload event
        function handleFileSelect(e) {
            //to make sure the user select file/files
            if (!e.target.files) return;

            //To obtaine a File reference
            var files = e.target.files;

            // Loop through the FileList and then to render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                //instantiate a FileReader object to read its contents into memory
                var fileReader = new FileReader();

                // Closure to capture the file information and apply validation.
                fileReader.onload = (function (readerEvt) {
                    return function (e) {
                        dimensionValidation(e).then(function () {
                            console.log('in promise')
                            if (validated) {
                                //Apply the validation rules for attachments upload
                                ApplyFileValidationRules(readerEvt)
                             //Render attachments thumbnails.
                             RenderThumbnail(e, readerEvt);

                                //Fill the array of attachment
                                FillAttachmentArray(e, readerEvt)                      
                            }
                        });

                    };
                })(f);

                fileReader.readAsDataURL(f);
            }
            document.getElementById('files').addEventListener('change', handleFileSelect, false);
        }

        function dimensionValidation(e) {

            var dfrd1 = $.Deferred();
            
            var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function () {
                  var height = this.height;
                  var width = this.width;
                  console.log('h', height)
                  console.log('w', width)
                  if (height < 300 || width < 300) {
                    console.log('v1', validated);
                    validated = false;
                    // alert("Height and Width must not exceed 100px.");
                    console.log('v2', validated);
                    e.preventDefault();

                    dfrd1.resolve();
                } else {

                  validated = true;
                  // alert("Uploaded image has valid Height and Width.");
                  e.preventDefault();

                  dfrd1.resolve();
              }
          };

          return $.when(dfrd1).done(function(){

          }).promise();
          
      }

        //To remove attachment once user click on x button
        jQuery(function ($) {
            $('div').on('click', '.img-wrap .close', function () {
                var id = $(this).closest('.img-wrap').find('img').data('id');

                //to remove the deleted item from array
                var elementPos = AttachmentArray.map(function (x) { return x.FileName; }).indexOf(id);
                if (elementPos !== -1) {
                    AttachmentArray.splice(elementPos, 1);
                }

                //to remove image tag
                $(this).parent().find('img').not().remove();

                //to remove div tag that contain the image
                $(this).parent().find('div').not().remove();

                //to remove div tag that contain caption name
                $(this).parent().parent().find('div').not().remove();

                //to remove li tag
                var lis = document.querySelectorAll('#imgList li');
                for (var i = 0; li = lis[i]; i++) {
                    if (li.innerHTML == "") {
                        li.parentNode.removeChild(li);
                    }
                }

            });
        }
        )

        //Apply the validation rules for attachments upload
        function ApplyFileValidationRules(readerEvt)
        {
            console.log(readerEvt);
            //To check file type according to upload conditions
            if (CheckFileType(readerEvt.type) == false) {
                document.getElementById("error").innerHTML = "The file (" + readerEvt.name + ") does not match the upload conditions, You can only upload jpg/png/gif files";
                e.preventDefault();
                return;
            }

            //To check file Size according to upload conditions
            if (CheckFileSize(readerEvt.size) == false) {
                // alert("The file (" + readerEvt.name + ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB");
                document.getElementById("error").innerHTML = "The file("+ readerEvt.name + ") does not match the upload conditions,<br> The maximum file size for uploads should not exceed 300 KB)";
                e.preventDefault();
                return;
            }

            //To check files count according to upload conditions
            if (CheckFilesCount(AttachmentArray) == false) {
                if (!filesCounterAlertStatus) {
                    filesCounterAlertStatus = true;
                    document.getElementById("error").innerHTML = "You have added more than 10 files. According to upload conditions you can upload 10 files maximum";
                }
                e.preventDefault();
                return;
            }
            else
            {
                document.getElementById("error").innerHTML = " ";
            }
        }

        //To check file type according to upload conditions
        function CheckFileType(fileType) {
            if (fileType == "image/jpeg") {
                return true;
            }
            else if (fileType == "image/png") {
                return true;
            }
            else if (fileType == "image/gif") {
                return true;
            }
            else {
                return false;
            }
            return true;
        }

        //To check file Size according to upload conditions
        function CheckFileSize(fileSize) {
            if (fileSize < 300000) {
                return true;
            }
            else {
                return false;
            }
            return true;
        }

        //To check files count according to upload conditions
        function CheckFilesCount(AttachmentArray) {
            //Since AttachmentArray.length return the next available index in the array, 
            //I have used the loop to get the real length
            var len = 0;
            for (var i = 0; i < AttachmentArray.length; i++) {
                if (AttachmentArray[i] !== undefined) {
                    len++;
                }
            }
            //To check the length does not exceed 10 files maximum
            if (len > 9) {
                return false;
            }
            else
            {
                return true;
            }
        }

        //Render attachments thumbnails.
        function RenderThumbnail(e, readerEvt){
            console.log(validated);
            if (!validated) {
                return;
            }
            var li = document.createElement('li');
            li.style.cssFloat = "left";
            ul.appendChild(li);
            li.innerHTML = ['<div class="img-wrap pip"> <span class="close">&times;</span>' +
            '<img class="thumb imageThumb" src="', e.target.result, '" title="', escape(readerEvt.name), '" data-id="',
            readerEvt.name, '"/>' + '</div>'].join('');

            var div = document.createElement('div');
            div.className = "FileNameCaptionStyle";
            li.appendChild(div);
            div.innerHTML = [readerEvt.name].join('');
            document.getElementById('Filelist').insertBefore(ul, null);   
        }

        //Fill the array of attachment
        function FillAttachmentArray(e, readerEvt){
            if (!validated) {
                return;
            }
            AttachmentArray[arrCounter] =
            {
              AttachmentType: 1,
              ObjectType: 1,
              FileName: readerEvt.name,
              FileDescription: "Attachment",
              NoteText: "",
              MimeType: readerEvt.type,
              Content: e.target.result.split("base64,")[1],
              FileSizeInBytes: readerEvt.size,
          };
          arrCounter = arrCounter + 1;
        }

      $(document).ready(function (e) {
       $("#bkform").on('submit',(function(e) {
          e.preventDefault();
                  //AttachmentArray
                  var formData = new FormData(this);
                  formData.append('images', JSON.stringify(AttachmentArray));
                  //return;
                  $.ajax({
                    url: "../../includes/new-bikes.inc.php",
                    type: "POST",
                    data:  formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function()
                    {
                },
                success: function(data)
                {
                    // alert(data);
                    if (data == 0) 
                    {
                        document.getElementById("empty").innerHTML = "Fill in all the fields";
                    }else
                    if (data == 1) 
                    {
                        document.getElementById("empty").innerHTML = "You have entered an invalid year, please enter a year between 1990 and current year";
                    }else
                    if (data == 2) 
                    {
                        document.getElementById("empty").innerHTML = "Please enter more than 20 characters for your description.";
                    }else
                    if (data == 3) 
                    {
                        document.getElementById("empty").innerHTML = "Please enter a price between the ranges of 5000 to 5000000 Rs.";
                    }else
                    if (data == 4) 
                    {
                        document.getElementById("empty").innerHTML = "Please select images";
                    }
                    else
                        if (data == 5) 
                        {
                            // alert('success');
                            location.href = "/BikeLabs/newbikes.php";
                        }
                    },
                    error: function(e) 
                    {
                       $("#err").html(e).fadeIn();
                   }          
               });
                }));

   });
</script>
<script>
    $(".js-example-responsive").select2({
        minimumResultsForSearch: -1
    });
</script>
<?php
include_once '../../includes/footer.php';
?>
