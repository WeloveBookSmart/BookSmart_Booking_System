<?php
include('config.php');
require('client_noti.php');
$sql = "SELECT book_data FROM client_noti WHERE status='$unread'";
$res = mysqli_query($con,$sql);
 
 
 //create block that if booking is accepted, certain statement will work	
//change this to switch statement in case it does not working	
 if($booking_status == $accept)
 {
		$sql = "SELECT book_data FROM client_noti WHERE status='$unread'"
		while ($row = mysqli_fetch_array(MYSQLI_ASSOC,$sql)
		{
			if(isset($_GET['book_id']))
			{
						
				$username = trim(mysqli_real_escape_string($connect, $_GET['username']));
				$email = trim(mysqli_real_escape_string($connect, $_GET['email']));
				$phone = trim(mysqli_real_escape_string($connect, $_GET['phone']));
			    $start_date = trim(mysqli_real_escape_string($connect, $_GET['start_date']));
			    $end_date = trim(mysqli_real_escape_string($connect, $_GET['end_date']));
				$payment_method = trim(mysqli_real_escape_string($connect, $_GET['payment_method']));	
		    
				foreach($book_id = $notify_id)
				{
					$q = "INSERT INTO client_noti(book_data,status,booking_status) VALUE('$book_data','$status','$booking_status')";
					$result = mysqli_query($connect, $q);

					if($result){
	
							echo "<script>alert('Booking Is Been Verify')</script>";
							echo "<script>window.open('client.php','_SELF')</script>";
	
					}
				}
			}
  }
  else
    {
			mysql_query = ("UPDATE client_noti SET booking_status='$reject' WHERE id='$notify_id' AND status='$read' AND booking_status='$accept'")
			echo "<div class='statusmsg'>Booking Has Been Rejected!</div>";
			return true;
    }
	
	header("Location:booking_verification.php");
?>
  