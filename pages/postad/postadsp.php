<?php
session_start();
if(!isset($_SESSION['userUId'])){
	$current_page = $_SERVER['REQUEST_URI'];
	$_SESSION['curr_page'] = $current_page;	
	header("Location: ../../LoginOrRegister.php");
}
$title = 'Post an advert';
include_once '../../includes/header.php';
?>
<section id="postad" class="section postadsection">
	<div class="container">
		<div>
			<h4>What are you selling?</h4>
			<a href="postadbike.php">
				<div class="btncreative btn-1 btn-1a" >
					Motorbikes
				</div>
			</a>
			<a href="postadsp.php">
				<div class="btncreative btn-1 btn-1a" >
					Spare Parts
				</div>
			</a>
		</div><br>
		
		<div class="fullAlter">
			<h4 class="p-3">Please add the following details to submit your advert</h4>
			<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
				<form class="p-2" action="includes/postadsp.inc.php" method="post" enctype="multipart/form-data" id="spform">
					<div class="form-row p-2 pt-4 mb-3">
						<label for="title">Title</label>
						<div>
							<div class="input-group">
								<input type="text" class="form-control" name="sptitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Condition</label>
						<div class="select-wrap mb-2">
							<select class="btn" name="spcondition" id="title">
								<option value="" disabled selected>Select</option>
								<option value="New">New</option>
								<option value="Used">Used</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Description</label>
						<div>
							<div class="input-group mb-3">
								<textarea class="form-control" rows="5" cols="50" id="description" name="spdescription" style="resize: none;"></textarea>
							</div>
						</div>
					</div>
					<div class="form-row pl-2 pr-2 pt-2">
						<label>Price</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="spprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>House name/Number</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="sphomename" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Postcode</label>
						<div class="">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="sppcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Country/Region</label>
						<div class="select-wrap mb-3">
							<select class="btn" name="spcountryregion" id="title">
								<option value="IS" selected="selected">Islamabad</option>
								<option value="KHI">Karachi</option>
								<option value="LH">Lahore</option>
								<option value="RW">Rawalpindi</option>
								<option value="PSW">Peshawar</option>
							</select>
						</div>
					</div>
					<div class="form-row p-2">
						<label>Phone Number</label>
						<div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="spphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>
					<div class="form-row pl-2 pr-2 pb-3 field" align="left">
						<label>Attachment Instructions</label>
						<ul style="list-style: none;">
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
									<input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
								</span>
								<output id="Filelist" style="max-width: 630px;"></output>
							</li>
						</ul>
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

                        //Apply the validation rules for attachments upload
                        ApplyFileValidationRules(readerEvt)

                        //Render attachments thumbnails.
                        RenderThumbnail(e, readerEvt);

                        //Fill the array of attachment
                        FillAttachmentArray(e, readerEvt)
                    };
                })(f);

                // Read in the image file as a data URL.
                // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
                // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
                fileReader.readAsDataURL(f);
            }
            document.getElementById('files').addEventListener('change', handleFileSelect, false);
            
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
            //To check file type according to upload conditions
            if (CheckFileType(readerEvt.type) == false) {
            	alert("The file (" + readerEvt.name + ") does not match the upload conditions, You can only upload jpg/png/gif files");
            	e.preventDefault();
            	return;
            }

            //To check file Size according to upload conditions
            if (CheckFileSize(readerEvt.size) == false) {
            	alert("The file (" + readerEvt.name + ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB");
            	e.preventDefault();
            	return;
            }

            //To check files count according to upload conditions
            if (CheckFilesCount(AttachmentArray) == false) {
            	if (!filesCounterAlertStatus) {
            		filesCounterAlertStatus = true;
            		alert("You have added more than 10 files. According to upload conditions you can upload 10 files maximum");
            	}
            	e.preventDefault();
            	return;
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
        function RenderThumbnail(e, readerEvt)
        {
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
        function FillAttachmentArray(e, readerEvt)
        {
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
				  	url: "../../includes/postadbike.inc.php",
				  	type: "POST",
				  	data:  formData,
				  	contentType: false,
				  	cache: false,
				  	processData:false,
				  	beforeSend : function()
				  	{
				    //$("#preview").fadeOut();
				    //$("#err").fadeOut();
				},
				success: function(data)
				{
					if(data=='invalid')
					{
				     // invalid file format.
				     $("#err").html("Invalid File !").fadeIn();
				 }
				 else
				 {
				     // view uploaded file.
				     //$("#preview").html(data).fadeIn();
				     //$("#form")[0].reset(); 
				     location.href = "../../usedbikes.php"
				 }
				},
				error: function(e) 
				{
					$("#err").html(e).fadeIn();
				}          
			});
				}));
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
				    //$("#preview").fadeOut();
				    //$("#err").fadeOut();
				},
				success: function(data)
				{
					if(data=='invalid')
					{
				     // invalid file format.
				     $("#err").html("Invalid File !").fadeIn();
				 }

				 else
				 {
				     // view uploaded file.
				     //$("#preview").html(data).fadeIn();
				     //$("#form")[0].reset(); 
				     location.href = "../../spareparts.php"
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
    <?php
    include_once '../../includes/footer.php';
    ?>