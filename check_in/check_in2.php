<?php
require "config.php";
//send to client block

$confirmcode = uniqid(rand());

//client receive in the manage_services.php
$('td').find(':input').focus();

//user checking in 
alert("$uid is checking-in on $package_name");
function check_in{
while {
	$username = $_GET['username'];
	$email	  = $_GET['email'];
	$phone	  = $_GET['phone'];
	$payment  = $_GET['payment_method'];
}
if($checkIn_code == $checkIn_code){
	$sql = "INSERT INTO (username,email,phone) FROM client_in";
	$
}
}

//disable input in manage services.php in table column
$('td').find(':input').prop("disabled", true);


?>