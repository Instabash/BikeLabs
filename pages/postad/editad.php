<?php
session_start();
include '../../includes/restrictions.inc.php';
logged_in();
$title = 'Post an advert';
include_once '../../includes/header.php';
include '../../includes/dbh.inc.php';
if (isset($_POST['editad'])) {
	$ad_id = $_GET['adid'];
	$adtypesql = "SELECT * FROM post_ad WHERE ad_id = ?;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $adtypesql))
	{
		echo "SQL statement failed";
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, 's', $ad_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_assoc($result)) 
		{
			$ad_type = $row['ad_type'];
			$ad_title = $row['ad_title'];
			$ad_price = $row['ad_price'];
			$ad_description = $row['ad_description'];
			$ad_condition = $row['ad_condition'];
			$ad_hname = $row['ad_user_hname'];
			$ad_pcode = $row['ad_user_pcode'];
			$ad_country = $row['ad_user_country'];
			$ad_phone = $row['ad_user_phone'];
			$ad_make = $row['bike_make'];
			$ad_year = $row['bike_year'];
		}
		if ($ad_type == 'bike') {?>
			<section id="postad" class="section postadsection content">
				<div class="container">
					<br>
					<div class="fullAlter">
						<h4 class="p-3">Edit advert</h4>
						<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
							<form class="p-2" action="includes/postadbike.inc.php" method="post" enctype="multipart/form-data" id="bkform">
								<div class="form-row formrowad p-2 pt-4 mb-3">
									<label for="title">Title</label>
									<div>
										<div class="input-group">
											<input type="text" class="form-control" name="bktitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1" value="<?php echo $ad_title; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Condition</label>
									<div class="select-wrap mb-2">
										<select class="custom-select" name="bkcondition" id="title">
											<option value="" hidden="" selected><?php echo $ad_condition; ?></option>
											<option value="New">New</option>
											<option value="Used">Used</option>
										</select>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Make</label>
									<div class="select-wrap mb-2">
										<select class="custom-select" name="bkmake" id="title">
											<option value="" hidden="" selected><?php echo $ad_make; ?></option>
											<option value="Honda">Honda</option>
											<option value="SuperPower">SuperPower</option>
											<option value="Unique">Unique</option>
										</select>
									</div>
								</div>
								<div class="form-row formrowad p-2 pt-4 mb-3">
									<label for="title">Year</label>
									<div>
										<div class="input-group">
											<input type="number" class="form-control" name="bkyear" placeholder="Year" aria-label="Year" aria-describedby="basic-addon1" value="<?php echo $ad_year;?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Description</label>
									<div>
										<div class="input-group mb-3">
											<textarea class="form-control" rows="5" cols="50" name="bkdescription" id="description" style="resize: none;"><?php echo $ad_description; ?></textarea>
										</div>
									</div>
								</div>
								<div class="form-row formrowad pl-2 pr-2 pt-2">
									<label>Price</label>
									<div>
										<div class="input-group mb-3">
											<input type="number" class="form-control" name="bkprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" value="<?php echo $ad_price; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>House name/Number</label>
									<div class="">
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="bkhomename" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1" value="<?php echo $ad_hname; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Postcode</label>
									<div class="">
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="bkpcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1" value="<?php echo $ad_pcode; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Country/Region</label>
									<div class="select-wrap mb-3">
										<select class="custom-select" name="bkcountryregion" id="title">
											<option value="IS" selected="selected"><?php echo $ad_country; ?></option>
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
											<input type="text" class="form-control" name="bkphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1" value="<?php echo $ad_phone; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2 imageupload" align="left">
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
												<input type="file" name="files[]" style="display: none !important;" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
												<input type="button" class="btn btn-outline-danger" value="Browse..." onclick="document.getElementById('files').click();" />
											</span>
										</li>
										<?php
											$sqlimageprev = "SELECT * FROM post_ad_images WHERE ad_id = ?";
											$stmt = mysqli_stmt_init($conn);
											if(!mysqli_stmt_prepare($stmt, $sqlimageprev))
											{
												echo "SQL statement failed";
												exit();
											}
											else
											{
												mysqli_stmt_bind_param($stmt, 's', $ad_id);
												mysqli_stmt_execute($stmt);
												$result = mysqli_stmt_get_result($stmt);

												while ($row = mysqli_fetch_assoc($result)) {
													?>
													<li>
														<output id="Filelist" style="max-width: 630px;"></output>
														<div class="img-wrap pip">
															<span class="close">&times;</span>
												        	<img class="thumb imageThumb" src="../../images/sparepartimg/<?php echo $row['ad_image_name']; ?>"/>
											        	</div>
													</li>
												<?php }
											}
										?>
										<li>
											<output id="Filelist" style="max-width: 630px;"></output>
										</li>
										<li>
											<span id="error" style="color: white;"></span>
										</li>
									</ul>
								</div>
								<div class="addressbtn" style="float:right;padding:10px;">
									<button type="submit" name="bksubmit" class="btn btn-outline-danger">Post the advert</button>
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
					if(data == 0)
					{
						location.href = "../../pages/postad/postadbike.php?error=emptyfields";
					}
					else
						if (data == 1) 
						{
							location.href = "../../pages/postad/postadbike.php?error=invalidyear";
						}
						else
						{
							location.href = "../../usedbikes.php"
						}
					// alert(data);
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
<?php }
}
}
?>