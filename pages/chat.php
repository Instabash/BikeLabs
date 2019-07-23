<?php
session_start();
$title = 'Chat';
include '../includes/restrictions.inc.php';
logged_in();

include_once '../includes/dbh.inc.php';
if (isset($_GET['user'])) {
	$sql1 = 'SELECT * FROM users WHERE uidUsers = "'.$_GET['user'].'"';
	$r = mysqli_query($conn, $sql1);
	if($r)
	{
		if(mysqli_num_rows($r)<1)
		{
			
			header("Location: chat.php");
		}
	}
}
if ($_SESSION['usertype'] == 0 && isset($_GET['user'])) {
	$sql1 = 'SELECT * FROM users WHERE uidUsers = "'.$_GET['user'].'"';
	$r = mysqli_query($conn, $sql1);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{
			$row = $r->fetch_assoc();
			if ($row['User_type'] == 0) {
				// echo $row['User_type'];
				header("Location: chat.php");
			}
		}
	}
}
include_once '../includes/header.php';
$user = $_SESSION['userUId'];
$no_message = false;
if (isset($_GET['user'])) {
	$_GET['user'] = $_GET['user']; 
	$r_name = $_GET['user'];
}
else{
	$user = $_SESSION['userUId'];
	$sql1 = 'SELECT sender_name, receiver_name FROM chat_message WHERE sender_name = "'.$user.'" OR receiver_name = "'.$user.'" ORDER BY time_stamp DESC LIMIT 1';
	$r = mysqli_query($conn, $sql1);
	
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{
			while($row = mysqli_fetch_assoc($r))
			{
				$sender_name = $row['sender_name'];
				$receiver_name = $row['receiver_name'];

				if ($_SESSION['userUId'] == $sender_name) {
					$r_name = $receiver_name;
				}
				else{
					$r_name = $sender_name;
				}
			}
		}
		else
		{
			?>
			<!-- <div class="p">
				<p>You don't have any messages right now.</p>
			</div -->
			<?php $no_message = true;
		}
	}
	else{
		echo $sql1;
	}
}
$sql = "SELECT * FROM chat_message WHERE sender_name = ? AND receiver_name = ? OR sender_name = ? AND receiver_name = ?";

// $r_name = $_GET['user']; IF ANY THING GOES WRONG UN COMMENT THIS PLEASE.
$stmt = mysqli_stmt_init($conn);

?>
<section id="biketemplate" class="section biketemplatesec content">
	<div class="container">
		<div class="messaging">
			<div class="inbox_msg">
				<div class="inbox_people">
					<div class="headind_srch">
						<div class="recent_heading">
							<h4>Recent</h4>
						</div>
						<div class="srch_bar">
							<div class="stylish-input-group">
								<input type="text" class="search-bar"  placeholder="Search" >
								<span class="input-group-addon">
									<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
								</span> </div>
							</div>
						</div>

						<div class="inbox_chat">
							<?php
							$sql2 = 'SELECT DISTINCT receiver_name, sender_name FROM chat_message WHERE sender_name = "'.$_SESSION['userUId'].'" OR receiver_name = "'.$_SESSION['userUId'].'" ORDER BY time_stamp DESC';
							$r = mysqli_query($conn, $sql2);
							if($r)
							{
								if(mysqli_num_rows($r)>0)
								{
									$counter = 0;
									$added_user = array();
									while($row = mysqli_fetch_assoc($r))
									{
										$sender_name = $row['sender_name'];
										$receiver_name = $row['receiver_name'];
										if ($_SESSION['userUId'] == $sender_name) {
										//adding receiver name only once, so to do this check the user in array
											if (in_array($receiver_name, $added_user)) {
											//dont add receiver name because they are already added

											}
											else{
											//add the receiver name
												?>
												<div class="chat_list active_chat">
													<div class="chat_people">
														<div class="chat_img"> <img src="../images/user-profile.png" alt="user-profile"> </div>
														<div class="chat_ib">
															<h5><?php echo '<a href="?user='.$receiver_name.'">'. $receiver_name.'</a>'; ?> <span class="chat_date">Dec 25</span></h5>
														</div>
													</div>
												</div>
												<?php
												//add receiver name to the array as well
												$added_user = array($counter => $receiver_name);
												//increment the counter 
												$counter++;
											}
										}
										elseif ($_SESSION['userUId'] == $receiver_name) {
										//adding sender name only once, so to do this check the user in array
											if (in_array($sender_name, $added_user)) {
											//dont add sender name because they are already added

											}
											else{
											//add the sender name
												?>
												
												<div class="chat_list active_chat">
													<div class="chat_people">
														<div class="chat_img"> <img src="../images/user-profile.png" alt="user-profile"> </div>
														<div class="chat_ib">
															<h5><?php echo '<a href="?user='.$sender_name.'">'. $sender_name.'</a>'; ?> <span class="chat_date">Dec 25</span></h5>
														</div>
													</div>
												</div>
												
												<?php
												//add sender name to the array as well
												$added_user = array($counter => $sender_name);
												//increment the counter 
												$counter++;
											}
										}
									}
								}
								else
								{
									?>
									<div class="pt-5">
										<p>You don't have any messages right now.</p>
									</div>
									<?php
								}
							}
							else{
								echo $sql;
							}
							?>
						</div>
					</div>
					<div class="mesgs">
						<div class="msg_history" id="msg-container">
							<?php
							if ($no_message == false) {
								if (!mysqli_stmt_prepare($stmt, $sql)) 
								{
									echo "SQL statement failed";
								}	
								else
								{
									mysqli_stmt_bind_param($stmt, "ssss", $user , $r_name, $r_name, $user);
									mysqli_stmt_execute($stmt);
									$result = mysqli_stmt_get_result($stmt);
									while($row = mysqli_fetch_assoc($result))
									{
										$sender_name = $row['sender_name'];
										$receiver_name = $row['receiver_name'];
										$message = $row['chat_message'];

										if ($sender_name == $user) 
										{
											?>
											<div class="outgoing_msg">
												<div class="sent_msg">
													<p><?php echo $message; ?>	</p>
												</div>
											</div>
											<?php 
										}
										else
										{
											?>
											<div class="incoming_msg">
												<div class="incoming_msg_img pt-3">
													<img src="../images/user-profile.png" alt="user-profile">
												</div>
												<div class="received_msg">
													<div class="received_withd_msg">
														<a href="#"><?php echo $sender_name; ?></a>
														<p><?php echo $message; ?>	</p>
													</div>
												</div>
											</div>
											<?php 
										}
									}
								}
							}
							else
							{
								?>
								<div class="pt-5">
									<p>You don't have any messages right now.</p>
								</div>
								<?php
							}
							?>
						</div>
						<div class="type_msg">
							<div class="input_msg_write">
								<form id="chatmsgsub">
									<input type="text" class="write_msg" id="chatmsg" placeholder="Type a message" />
									<button class="msg_send_btn" name="msgsendbtn" type="submit"><img style="width: 20px;height: 20px;" class="pr-1 pt-1" src="../images/paper-plane-regular.svg"></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
	<script>

		$("document").ready(function(event)
		{
			$('#chatmsgsub').on('submit', function (e) {
				e.preventDefault();
				var message = $("#chatmsg").val();
				$.post('../includes/chat.inc.php?user=<?php echo $_GET['user']; ?>',{
					chatmsg: message,
				},
				function(data, status){
					if (data == 0) {
						alert("write something!");
					}
					else{
					$("#chatmsg").val("");
					document.getElementById("msg-container").innerHTML += data;
					}
				}
				);
			});
		});
	</script>

	<?php
	include_once '../includes/footer.php';
	?>