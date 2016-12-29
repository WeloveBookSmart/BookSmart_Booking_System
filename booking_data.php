<?php
//booking_data.php
class GCM {
	//constructor
	function __construct() {
	
    }
	//send push noti to client  via gcm registration id
	public function send($to, $message){
		$fields = array(
			'to' => $to,
			'data' => $message
		)
	}
?>,