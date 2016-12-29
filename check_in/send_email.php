<?php
$connect = mysqli_connect("localhost","root","","testing");

if(isset($_POST['book_name'])){

	$username = mysqli_real_escape_string($connect, $_GET['username']);
	$email = mysqli_real_escape_string($connect, $_GET['email']);
	$phone = mysqli_real_escape_string($connect, $_GET['phone']);
 
 if($username && $email && $phone)}
 {
	$confirmcode = uniqid(rand());
	$sql = "INSERT INTO (checkIn_id,uid,sid,package_id,username,email,phone,status,checkIn_code) FROM check_in";
	
	$message = 
				"
				BookSmart Smart Check-In System
				Please Click The Button Below to Check-In To Your Booked Service
				<button class='btn btn-success' type='button' href='http://www.welovebooksmart.com/checkin/check_in.php'>Check In</button>
				";
	mail($email "BookSmart Check-In Update", $message, "From:BookSmart.support@booksmart.com");	
 }	
?>