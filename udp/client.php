<?php
//just a very simple UDP client
//reduce error
error_reporting(~E_WARNING);

$server = '127.0.0.1';
$port = 9999;

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
	$errormsg = socket_last_error();
	$errormsg = socket_strerro($errorcode);
	
	die("Could Not Create The Socket: [$errorcode] $errormsg \n");
}

echo "Socket Created";

//communication loop
while(1)
{
	//take s0me input to send
	echo 'Enter A Message TO Test : ';
	$input = fgets(STDIN);
	
	//send the message to the server
	if( ! socket_sendto($sock, $input, strlen($input), 0 , $server , $port))
	{
		$errormsg = socket_last_error();
		$errormsg = socket_strerro($errorcode);
	
		die("Could Not Create The Socket: [$errorcode] $errormsg \n");
	}

	//Now receive reply from server and print it
	if(socket_recv ( $sock , $reply , 2045 , MSG_WAITALL ) === FALSE)
	{
		$errormsg = socket_last_error();
		$errormsg = socket_strerro($errorcode);
	
		die("Could Not Create The Socket: [$errorcode] $errormsg \n");
	}

	echo "Reply : $reply";	
}
?>