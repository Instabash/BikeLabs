<?php
session_start();
include_once '../includes/header.php';
include_once '../includes/dbh.inc.php';
if (isset($_GET['usertoid']) || isset($_GET['partid'])) {
	$touserid = $_GET['usertoid'];
	$partid = $_GET['partid'];
	$fromuserid = $_SESSION['userId'];
	echo $touserid;
	echo $fromuserid;
	$chatincom = "SELECT * FROM chat_message WHERE to_user_id = $touserid AND from_user_id = $fromuserid AND part_id = $partid;";
	$chatoutgo = "SELECT * FROM chat_message WHERE from_user_id  = $fromuserid AND to_user_id = $touserid AND part_id = $partid;";
	$stmt = mysqli_stmt_init($conn);
}

?>
<section id="biketemplate" class="section biketemplatesec">
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
							<!-- THE CURRENT USER THAT WE WILL GET WITH THE USERID WILL BE HERE -->
							<div class="chat_list active_chat">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div>
							<!-- REST OF THE PAST CHAT USERS IF ANY, WILL BE IN A LOOP -->
							<div class="chat_list">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div>
							<!-- <div class="chat_list">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div>
							<div class="chat_list">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div>
							<div class="chat_list">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div>
							<div class="chat_list">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div>
							<div class="chat_list">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
										<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
										<p>Test, which is a new approach to have all solutions 
										astrology under one roof.</p>
									</div>
								</div>
							</div> -->
						</div>
					</div>
					<div class="mesgs">
						<div class="msg_history">
							<div class="incoming_msg">
								<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
								<div class="received_msg">
									<div class="received_withd_msg">
										<?php 
										if(!mysqli_stmt_prepare($stmt, $chatoutgo))
										{
											echo "SQL statement failed";
										}
										else
										{
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											while ($row = mysqli_fetch_assoc($result)) {
												?>
												<p><?php echo $row['chat_message']; ?></p>
												<span class="time_date"><?php echo $row['time_stamp']; ?></span>
												<?php 
											} 
										}
										?>
									</div>
								</div>
							</div>
							<div class="outgoing_msg">
								<div class="sent_msg">
									<?php 
									if(!mysqli_stmt_prepare($stmt, $chatincom))
									{
										echo "SQL statement failed";
									}
									else
									{
										mysqli_stmt_execute($stmt);
										$result2 = mysqli_stmt_get_result($stmt);
										while ($row2 = mysqli_fetch_assoc($result2)) {
											?>
											<p><?php echo $row2['chat_message']; ?></p>
											<span class="time_date"><?php echo $row2['time_stamp']; ?></span>
											<?php 
										} 
									}
									?>
								</div>
							</div>
						<!-- <div class="incoming_msg">
							<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
							<div class="received_msg">
								<div class="received_withd_msg">
									<p>Test, which is a new approach to have</p>
									<span class="time_date"> 11:01 AM    |    Yesterday</span>
								</div>
							</div>
						</div>
						<div class="outgoing_msg">
							<div class="sent_msg">
								<p>Apollo University, Delhi, India Test</p>
								<span class="time_date"> 11:01 AM    |    Today</span>
							</div>
						</div>
						<div class="incoming_msg">
							<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
							<div class="received_msg">
								<div class="received_withd_msg">
									<p>We work directly with our designers and suppliers,
										and sell direct to you, which means quality, exclusive
									products, at a price anyone can afford.</p>
									<span class="time_date"> 11:01 AM    |    Today</span>
								</div>
							</div>
						</div> --> 
					</div>
					<div class="type_msg">
						<div class="input_msg_write">
							<form id="chatmsgsub">
								<input type="text" class="write_msg" id="chatmsg" placeholder="Type a message" />
								<button class="msg_send_btn" name="msgsendbtn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<script>

	$(function () {
		$('#chatmsgsub').on('submit', function (e) {
			e.preventDefault();
			var message = $("#chatmsg").val();

			var query = window.location.search.substring(1);
			var qs = parse_query_string(query);

			var usertoid = qs.usertoid;
			var partid = qs.partid;
			$.ajax({
				type: 'post',
				url: '../includes/chat.inc.php',
				data: { chatmsg: message, usertoid: usertoid, partid: partid},
				success: function () {
					$("#chatmsg").val("");

				}
			});

		});

	});
</script>

<?php
include_once '../includes/footer.php';
?>