<?php
//include error
error_reporting(~E_WARNING);

//create a UDP socket
if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);
	
	die("Could not create socket: [$errorcode] $errormsg \n");
}

echo "Socket Created \n";

//bind the source adddress
if( !socket_bind($sock, "0.0.0.0", 9999) )
{
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);
	
	die("Could not create socket: [$errorcode] $errormsg \n");
}

echo "Socket Is Working Fine \n";

//do some communication
{
	echo "Waiting for data ..\n";
	
	//receive some data
	$r = socket_recvfrom($sock, $buf, 512, 0, $remote_ip, $remote_port);
	echo "$remote_ip : $remote_port -- " . $buff;
	
	//send back the data to the client
	socket_sendto($sock, "OK " . $buff , 100 , 0 , $remote_ip , $remote_port);
}

socket_close($sock);
?>