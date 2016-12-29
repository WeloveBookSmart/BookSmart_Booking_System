<?php
include('config.php');
include('client_noti.php');
//receive data from user through form
$sql = "SELECT book_data FROM client_noti WHERE status='$unread' AND timestamp >=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND timestamp < CURDATE()";
$res = mysqli_query($con,$sql);
 
 //Make a confirmation dialog to client whether to accept or reject
//create block that if booking is accepted, certain statement will work	
//change this to switch statement in case it does not working	
$booking_status = $accept;
switch ($booking_status)
{
  case ($accept):
  {
	 $accept = mysqli_query("UPDATE client_noti SET booking_status='$accept' AND status='$read' WHERE id='$notify_id'");
  }
  break;
  case ($reject):
    {
		$reject = mysqli_query("UPDATE client_noti SET booking_status='$reject' AND status='$read' WHERE id='$notify_id'");
			echo "<div class='statusmsg'>Booking Has Been Rejected!</div>";
			return true;
    }
  break;
  default: 
  {
		echo "<div class='confirm'>Please Make A Confirmation Within 24 Hours!</div>";
  }
}
//make verification about the status of the booking 
if(isset($_GET['book_data']) && !empty($_GET['book_data']))
{
 //verify data
	
	$book_data = trim(mysqli_real_escape_string($con, $_GET['$book_data']));

	$search = mysqli_query("SELECT book_data FROM client_noti WHERE verified='0'");
	$match = mysqli_num_rows($search);
}
 if($match > 0)
 {
	//we have a match, verify the data
		$search = mysqli_query($con, "UPDATE client_noti SET verified='1' AND status='$read' WHERE book_data='$book_data' AND verified='0' AND status='$unread'") or die(mysqli_error());
		echo '<div class="statusmsg">Your booking data has been sent!</div>';
 }else{
		//no match -> invalid URL or account has already been activated
		echo '<div class="statusmsg">Your Booking Are Not Successful!</div>';
 }


//delete the book_data if client has make confirmation to accept or reject
if($verified == 1)
{
	$sql = mysqli_query("DELETE * FROM client_noti WHERE verified='1' AND status='$read'");
	return true;
}
else
{
	//display alert
	echo "<script>alert('Booking $book_id Has Not Been Verified Yet. Please Verify it')</script>";
	
}

//decode data into normal array and insert those data into the table of the client
//insert the data into the tbl_services and tbl_packages of the client
$book_data = json_decode($book_data,true);
$

$sql = "SELECT t.book_id,b.b_id,p.package_name FROM tbl_booking AS t, service_booked AS b, tbl_package AS p INNER JOIN service_booked ON t.book_id = b.b_id AND p.package_name = b.package_name";
$res = mysqli_query($con,$sql);


$res = mysqli_num_rows($sql);
$insert = "INSERT INTO `client` VALUE('','','','','','')");
$result = mysqli_query($con,$sql);

if($result)
{
	$
	$sql = "INSERT INTO service_booked(package_id,package_name,package_price,user_book,payment_status) VALUE('$package_id','$package_name','$package_price','$user_book','$payment_status')";
}
else{
	echo "Data has not been insert into client table!";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Verify Booking</title>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
 
<script src="dist/sweetalert.min.js"></script> 
</head>
<body>
<div id="booking"></div>
</body>
</html>
<script>

$.ajax({
	url:client_noti.php;
	method: GET;
	data: ;
	success: function(data)
	})
</script>
