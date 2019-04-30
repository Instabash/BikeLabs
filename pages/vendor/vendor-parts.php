<?php
session_start();
include '../../includes/restrictions.inc.php';
vendor_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
?>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Vendor Panel
	<button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
</label>
<div class="d-flex" id="wrapper">
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="list-group list-group-flush">
			<a href="/BikeLabs/pages/vendor/vendordash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="/BikeLabs/pages/vendor/vendor-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
            <a href="/BikeLabs/pages/vendor/vendor-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
            <a href="/BikeLabs/pages/vendor/vendor-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
            <a href="/BikeLabs/pages/vendor/vendor-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
		</div>
	</div>
	<section id="modify" class="section modsection content content2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- /.box -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Add new parts</h3>
						</div>
						<!-- /.box-header -->
						
						<div class="advertpick clearfix ">
							<form class="p-2" action="/BikeLabs/includes/new-parts.inc.php" method="post" enctype="multipart/form-data" id="spform">
								<div class="form-row p-2 pt-4 mb-3 formrowad">
									<label for="title">Title</label>
									<div>
										<div class="input-group">
											<input type="text" class="form-control" name="sptitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
										</div>
									</div>
								</div>
								<!-- <div class="form-row formrowad p-2">
									<label>Brand name</label>
									<div class="select-wrap mb-2">
										<select class="custom-select" name="spcondition" id="title">
											<option value="" disabled selected>Select</option>
											<option value="New">Honda</option>
											<option value="Used">Super</option>
										</select>
									</div>
								</div> -->
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
											<input type="text" class="form-control" name="spprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
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
											<span id="error" style="color: white;"></span>
										</li>
									</ul>
								</div>
								<div class="addressbtn">
									<button type="submit" name="spsubmit" class="btn btn-primary">Post the advert</button>
								</div>
							</form>
						</div> 

						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
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
        	$("#spform").on('submit',(function(e) {
        		e.preventDefault();
				  //AttachmentArray
				  var formData = new FormData(this);
				  formData.append('images', JSON.stringify(AttachmentArray));
				  //return;
				  $.ajax({
				  	url: "/BikeLabs/includes/new-parts.inc.php",
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
				     var usertype = "<?php echo $_SESSION['usertype']; ?>"; 
                     if (usertype == 1) {
                        location.href = "/BikeLabs/pages/admin/admin-parts.php?success"
                     }
                     else
                        if (usertype == 2) {
                            location.href = "/BikeLabs/pages/vendor/vendor-parts.php?success"
                        }
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
