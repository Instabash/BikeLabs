<?php 
session_start();
include_once 'dbh.inc.php';

$user = $_SESSION['userUId'];
$currtime = $timestamp = date('Y-m-d G:i:s');
if (isset($user) && isset($_GET['user'])) {
	if(isset($_POST['chatmsg'])){
		
		if ($_POST['chatmsg'] != '') {
			$sender_name = $user;
			$receiver_name = $_GET['user'];
			$message = $_POST['chatmsg'];
			$date = date("Y-m-d h:i:sa");

			$sql = 'INSERT INTO chat_message (sender_name, receiver_name, chat_message, time_stamp) VALUES(?, ?, ?, ?)';
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) 
			{
				echo "SQL statement failed";
			}	
			else
			{
				mysqli_stmt_bind_param($stmt, "ssss", $sender_name , $receiver_name, $message, $date);
				mysqli_stmt_execute($stmt);
				?>
				<div class="outgoing_msg">
					<div class="sent_msg">
						<p><?php echo $message; ?>	</p>
					</div>
				</div>
				<?php				
			}
		}
		else{
			echo 0;
		}
	}
}

