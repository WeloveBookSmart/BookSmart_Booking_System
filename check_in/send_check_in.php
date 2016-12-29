<?php
$to 	 = $email; 
$subject = 'Check In $service_booked';
$message = '

This is BookSmart Check-In Feature  

Check-In feature is BookSmart feature that help user to notify client that user are checking in and currently are in their service.

It is activated when user book in service or package that been provided in BookSmart. The check in system will notify client through email and SMS regarding your check-in

----------------------------------
Username:  '.username.'
Service Booked:  '.service_booked.'
Package Booked: '.package_booked.'
----------------------------------

Please click this button to check-in the service:
<button class="btn btn-success" href="http://www.welovebooksmart.com/check-in/send_to_client.php">Check-In</button>

';  //our message includes the link

$headers = 'From:noreply@welovebooksmart.com' . "\r\n";
mail($to, $subject, $message, $headers);

?>
