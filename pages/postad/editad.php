<?php
session_start();

include '../../includes/dbh.inc.php';
include '../../includes/restrictions.inc.php';
logged_in();
user_protect();
$title = 'Edit advert';
$ad_id = $_GET['adid'];
$sql = "SELECT * FROM post_ad WHERE ad_id='$ad_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)<1) {
	header("Location: /BikeLabs/404-page.php");
}
else{
include_once '../../includes/header.php';
if (isset($_POST['editad'])) {
	
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
		if ($ad_type == 'bike') {
			?>
			<section id="postad" class="section postadsection content">
				<div class="container">
					<div class="fullAlter">
						<h2 class="p-3">Edit Ad.</h2>
						<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
							<form class="p-2" action="includes/postadbike.inc.php" method="post" enctype="multipart/form-data" id="bkform">
								<div class="form-row formrowad p-2 pt-4 mb-3">
									<label for="title">Title</label>
									<div>
										<div class="input-group">
											<p class="form-control"><?php echo $ad_title; ?></p>
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Condition</label>
									<div class="select-wrap mb-2">
										<select class="custom-select" name="bkcondition">
											<option value="<?php echo $ad_condition; ?>" selected ><?php echo $ad_condition; ?></option>
											<option value="New">New</option>
											<option value="Used">Used</option>
										</select>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Make</label>
									<div class="select-wrap mb-2">
										<select class="custom-select" name="bkmake" id="title">
											<option value="<?php echo $ad_make; ?>" selected ><?php echo $ad_make; ?></option>
											<option value="Honda">Honda</option>
											<option value="SuperPower">SuperPower</option>
											<option value="Unique">Unique</option>
			                                <option value="Superstar">Superstar</option>
			                                <option value="Yamaha">Yamaha</option>
			                                <option value="United">United</option>
			                                <option value="Suzuki">Suzuki</option>
			                                <option value="Other">Other</option>
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
											<input type="number" class="form-control" name="bkpcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1" value="<?php echo $ad_pcode; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Country/Region</label>
									<div class="select-wrap mb-3">
										<select class="custom-select" name="bkcountryregion" id="title">
											<option value="<?php echo $ad_country; ?>" selected><?php echo $ad_country; ?></option>
											<option value="IS">Islamabad</option>
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
											<input type="number" class="form-control" name="bkphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1" value="<?php echo $ad_phone; ?>">
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
											<output id="Filelist" style="max-width: 630px;">
												<ul class="thumb-Images" id="imgList" style="list-style: none;">
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
															
															<li style="float: left;">
																<div class="img-wrap pip">
																	<span class="close">&times;</span>
																	<img id="imageTH" class="thumb imageThumb" src="../../images/sparepartimg/<?php echo $row['ad_image_name']; ?> " data-id="<?php echo $row['ad_image_name']; ?>"/>
																</div>
																<div class="FileNameCaptionStyle">honda-cb-unicorn-150-pearl-siena-red.png</div>
															</li>
														<?php }
													}
													?>
												</ul>
											</output>
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
									<button type="submit" name="bksubmit" class="btn btn-outline-danger">Post the advert</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			
			<?php
		}
		elseif ($ad_type == 'sparepart') { ?>
			<section id="postad" class="section postadsection content">
				<div class="container">
					<div class="fullAlter">
						<h2 class="p-3">Edit Ad.</h2>
						<div class="advertpick form-wrap clearfix border-new border border-dark rounded">
							<form class="p-2" action="includes/postadsp.inc.php" method="post" enctype="multipart/form-data" id="spform">
								<div class="form-row p-2 pt-4 mb-3 formrowad">
									<label for="title">Title</label>
									<div>
										<div class="input-group">
											<p class="form-control"><?php echo $ad_title; ?></p>
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Condition</label>
									<div class="select-wrap mb-2">
										<select class="custom-select" name="spcondition" id="title">
											<option value="<?php echo $ad_condition; ?>" selected><?php echo $ad_condition; ?></option>
											<option value="New">New</option>
											<option value="Used">Used</option>
										</select>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Description</label>
									<div>
										<div class="input-group mb-3">
											<textarea class="form-control" rows="5" cols="50" id="description" name="spdescription" style="resize: none;"><?php echo $ad_description; ?></textarea>
										</div>
									</div>
								</div>
								<div class="form-row formrowad pl-2 pr-2 pt-2">
									<label>Price</label>
									<div>
										<div class="input-group mb-3">
											<input type="number" class="form-control" name="spprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" value="<?php echo $ad_price; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>House name/Number</label>
									<div class="">
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="sphomename" placeholder="House name or number" aria-label="House name or number" aria-describedby="basic-addon1" value="<?php echo $ad_hname; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Postcode</label>
									<div class="">
										<div class="input-group mb-3">
											<input type="number" class="form-control" name="sppcode" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1" value="<?php echo $ad_pcode; ?>">
										</div>
									</div>
								</div>
								<div class="form-row formrowad p-2">
									<label>Country/Region</label>
									<div class="select-wrap mb-3">
										<select class="custom-select" name="spcountryregion" id="title">
											<option value="<?php echo $ad_country; ?>" selected="selected"><?php echo $ad_country; ?></option>
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
											<input type="number" class="form-control" name="spphone" placeholder="Phone number" aria-label="Phone number" aria-describedby="basic-addon1" value="<?php echo $ad_phone; ?>">
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
											<output id="Filelist" style="max-width: 630px;">
												<ul class="thumb-Images" id="imgList" style="list-style: none;">
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
															
															<li style="float: left;">
																<div class="img-wrap pip">
																	<span class="close">&times;</span>
																	<img  id="imageTH" class="thumb imageThumb" src="../../images/sparepartimg/<?php echo $row['ad_image_name']; ?>" data-id="<?php echo $row['ad_image_name']; ?>"/>
																</div>
																<div class="FileNameCaptionStyle">honda-cb-unicorn-150-pearl-siena-red.png</div>
															</li>
														<?php }
													}
													?>
												</ul>
											</output>
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
			<?php
		}	
	}
}

//get image miime type
function getMimeType($img='')
{
$typeString = null;
$typeInt = exif_imagetype($img);
switch($typeInt) {
  case IMG_GIF:
    return $typeString = 'image/gif';
    break;
  case IMG_JPG:
    return $typeString = 'image/jpg';
    break;
  case IMG_JPEG:
    return $typeString = 'image/jpeg';
    break;
  case IMG_PNG:
    return $typeString = 'image/png';
    break;
  case IMG_WBMP:
    return $typeString = 'image/wbmp';
    break;
  case IMG_XPM:
    return $typeString = 'image/xpm';
    break;
  default: 
    return $typeString = 'unknown';

}
}
?>
<script type="text/javascript">
		//get content of loaded image
		// var img = document.getElementById('imageTH'); 

		// // var width = img.naturalWidth;
		// // var height = img.naturalHeight;
		// // console.log(width);
		// // console.log(height);
		
		// var base64 = getBase64Image(document.getElementById("imageTH"));
		// console.log(base64);	
		// console.log(size);

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
        //gags
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
                			// console.log('in promise')
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
                	// console.log('h', height)
                	// console.log('w', width)
                	if (height < 300 || width < 300) {
                		// console.log('v1', validated);
                		validated = false;
                		// console.log('v2', validated);
                		// console.log("You cannot upload a file smaller that 300x300 px");
                		document.getElementById("empty").innerHTML = "You cannot upload a file smaller that 300x300 px";
                		e.preventDefault();

                		dfrd1.resolve();
                	} else {

                		validated = true;
                		document.getElementById("empty").innerHTML = "";
                		e.preventDefault();

                		dfrd1.resolve();
                	}
                };

                return $.when(dfrd1).done(function(){

                }).promise();

            }

        function getBase64Image(img) {
        	var canvas = document.createElement("canvas");
        	canvas.width = img.width;
        	canvas.height = img.height;
        	var ctx = canvas.getContext("2d");
        	ctx.drawImage(img, 0, 0);
        	var dataURL = canvas.toDataURL("image/png");
        	return dataURL.split(',')[1];
        }

        //To remove attachment once user click on x button
        jQuery(function ($) {
        	$('div').on('click', '.img-wrap .close', function () {
        		var id = $(this).closest('.img-wrap').find('img').data('id');
        		// console.log(id);
                //to remove the deleted item from array
                var elementPos = AttachmentArray.map(function (x) { return x.FileName; }).indexOf(id);
                // console.log(elementPos);
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
        	// console.log(readerEvt);
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
        	// console.log(validated);
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
        		ArrayType : "New",
        	};
        	arrCounter = arrCounter + 1;
        	
        }


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
			//<?php echo $row['ad_image_name']; 
			while ($row = mysqli_fetch_assoc($result)) {
		?>
		AttachmentArray[arrCounter] =
    	{
    		AttachmentType: 1,
    		ObjectType: 1,
    		FileName: '<?php echo $row['ad_image_name'] ?>',
    		FileDescription: "Attachment",
    		NoteText: "",
    		MimeType: '<?php echo getMimeType('../../images/sparepartimg/'.$row['ad_image_name']) ?>',
    		Content: '<?php echo base64_encode(file_get_contents('../../images/sparepartimg/'.$row['ad_image_name'])) ?>',
    		FileSizeInBytes: <?php echo filesize('../../images/sparepartimg/'.$row['ad_image_name']) ?>,
    		ArrayType : "Old",
    	};
    	arrCounter = arrCounter + 1;
		
		<?php }
		}
		?>
		// console.log(AttachmentArray);
        $(document).ready(function (e) {
        	$("#bkform").on('submit',(function(e) {
        		e.preventDefault();
				  //AttachmentArray
				  var formData = new FormData(this);
				  formData.append('images', JSON.stringify(AttachmentArray));
				  //return;
				  $.ajax({
				  	url: "../../includes/editadbike.inc.php?adid=<?php echo $_GET['adid']; ?>",
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
                    	document.getElementById("empty").innerHTML = "Please enter a valid pakistani phone number.";
                    }else
                    if (data == 5) 
                    {
                    	document.getElementById("empty").innerHTML = "Please enter a valid post code";
                    }else
                    if (data == 6) 
                    {
                    	document.getElementById("empty").innerHTML = "Please select images";
                    }else
                    if (data == 8) 
                    {
                        document.getElementById("empty").innerHTML = "There was an error";
                    }else
                    if (data == 9) 
                    {
                        document.getElementById("empty").innerHTML = "There was an error";
                    }else
                    if (data == 10) 
                    {
                        document.getElementById("empty").innerHTML = "There was an error";
                    }
                    else
                    	if (data == 7) 
                    	{
                            // alert('success');
                            location.href = "/BikeLabs/usedbikes.php";
                        }
                    },
                    error: function(e) 
                    {
                    	$("#err").html(e).fadeIn();
                    }          
                });
				}));

        });
        $(document).ready(function (e) {
        	$("#spform").on('submit',(function(e) {
        		e.preventDefault();
				  //AttachmentArray
				  var formData = new FormData(this);
				  formData.append('images', JSON.stringify(AttachmentArray));
				  //return;
				  $.ajax({
				  	url: "../../includes/editadsp.inc.php?adid=<?php echo $_GET['adid']; ?>",
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
                    }else
                    if (data == 7) 
                    {
                        document.getElementById("empty").innerHTML = "There was an error";
                    }
                    else
                    if (data == 8) 
                    {
                        document.getElementById("empty").innerHTML = "There was an error";
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

    <?php
    include_once '../../includes/footer.php';
}
    ?>