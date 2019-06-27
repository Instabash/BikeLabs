<?php
session_start();
include '../../includes/restrictions.inc.php';
logged_in();
$title = 'Post an advert';
include_once '../../includes/header.php';
?>
<section id="postad" class="section postadsection content">
	<div class="container">
		<div>
			<h4>What are you selling?</h4>
			<a href="postadbike.php">
				<div class="btncreative btn-1 btn-1a" >
					Motorbikes.
				</div>
			</a>
			<a href="postadsp.php">
				<div class="btncreative btn-1 btn-1a" >
					Spare Parts.
				</div>
			</a>
		</div><br>
		<div class="fullAlter">
			<h4 class="p-3">Please add the following details to submit your advert</h4>
			<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
				<form class="p-2" action="includes/postadsp.inc.php" method="post" enctype="multipart/form-data" id="spform">
					<div class="form-row p-2 pt-4 mb-3 formrowad">
						<label for="title">Title</label>
						<div>
							<div class="input-group">
								<input type="text" class="form-control" name="sptitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row formrowad p-2">
						<label>Condition</label>
						<div class="select-wrap mb-2">
                            <select class="js-example-responsive" name="spcondition" style="width: 100px;">
							<!-- <select class="custom-select" name="spcondition" id="title"> -->
								<option value="0" selected>Select</option>
								<option value="New">New</option>
								<option value="Used">Used</option>
							</select>
						</div>
					</div>
					<div class="form-row formrowad p-2">
						<label>Description</label>
						<div>
							<div class="input-group mb-3">
								<textarea class="form-control" rows="5" cols="50" id="description" name="spdescription" style="resize: none;"></textarea>
							</div>
						</div>
					</div>
					<div class="form-row formrowad pl-2 pr-2 pt-2">
						<label>Price</label>
						<div>
							<div class="input-group mb-3">
								<input type="number" class="form-control" name="spprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row formrowad p-2">
						<label>House name/Number</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="sphomename" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row formrowad p-2">
						<label>Postcode</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="number" class="form-control" name="sppcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row formrowad p-2">
						<label>Country/Region</label>
						<div class="select-wrap mb-3">
                            <select class="js-example-responsive" name="spcountryregion" style="width: 100px;">
							<!-- <select class="custom-select" name="spcountryregion" id="title"> -->
								<option value="IS" selected="selected">Islamabad</option>
								<option value="KHI">Karachi</option>
								<option value="LH">Lahore</option>
								<option value="RW">Rawalpindi</option>
								<option value="PSW">Peshawar</option>
							</select>
						</div>
					</div>
					<div class="form-row formrowad p-2">
						<label>Phone Number</label>
						<div>
							<div class="input-group mb-3">
								<input type="number" class="form-control" name="spphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1">
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
									<input type="file" name="files[]" style="display: none !important;" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
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
					<div class="addressbtn" style="float:right;padding:10px;">
						<button type="submit" name="spsubmit" class="btn btn-outline-danger">Post the advert</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
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
        function ApplyFileValidationRules(readerEvt){
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
       $("#spform").on('submit',(function(e) {
          e.preventDefault();
				  //AttachmentArray
				  var formData = new FormData(this);
				  formData.append('images', JSON.stringify(AttachmentArray));
				  //return;
				  $.ajax({
				  	url: "../../includes/postadsp.inc.php",
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
                        document.getElementById("empty").innerHTML = "Please enter more than 20 characters for your description.";
                    }else
                    if (data == 2) 
                    {
                        document.getElementById("empty").innerHTML = "Please enter a price between the ranges of 5000 to 1000000 Rs.";
                    }else
                    if (data == 3) 
                    {
                        document.getElementById("empty").innerHTML = "Please enter a valid pakistani phone number.";
                    }else
                    if (data == 4) 
                    {
                        document.getElementById("empty").innerHTML = "Please enter a valid post code";
                    }else
                    if (data == 5) 
                    {
                        document.getElementById("empty").innerHTML = "Please select images";
                    }
                    else
                        if (data == 6) 
                        {
                            // alert('success');
                            location.href = "/BikeLabs/spareparts.php";
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