<?php
		
		// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer(true);	
		
		if(isset($_POST['client_email']))
		{
				$username = trim(mysqli_real_escape_string($con, $_POST['username']));
				$email= trim(mysqli_real_escape_string($con, $_POST['email']));
				$phone_num = trim(mysqli_real_escape_string($con, $_POST['phone_num']));
				$start_date = trim(mysqli_real_escape_string($con, $_POST['start_date']));
				$end_date = trim(mysqli_real_escape_string($con, $_POST['end_date']));
				$peoplenum = trim(mysqli_real_escape_string($con, $_POST['peoplenum']));
				$price = trim(mysqli_real_escape_string($con, $_POST['price']));
				$enquiry = trim(mysqli_real_escape_string($con, $_POST['enquiry']));
	
				//this is for radio button on payment_method
		
				if(isset($_POST['payment_method']))
				{
					echo "<span>You have selected :<b> ".$_POST['payment_method']."</b></span>";
				}
					else{ echo "<span>Please choose any payment method.</span>";}
					
				$subject    = "Sending HTML eMail using PHPMailer.";
				$text_message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";			   
				
				$client_email = mysqli_query($con, "SELECT tbl_services.sid, tbl_user.email FROM tbl_services LEFT JOIN tbl_user ON tbl_user.uid = tbl_services.uid");
		}
			
			// HTML email starts here
			
			$message  = "<html><body>";
			
			$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
			
			$message .= "<tr><td>";
			
			$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
				
			$message .= "<thead>
						<tr height='80'>
							<th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Coding Cage</th>
						</tr>
						</thead>";
				
			$message .= "<tbody>
						<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
							<td style='background-color:#00a2d1; text-align:center;'><a href='http://www.codingcage.com/search/label/PDO' style='color:#fff; text-decoration:none;'>PDO</a></td>
							<td style='background-color:#00a2d1; text-align:center;'><a href='http://www.codingcage.com/search/label/jQuery' style='color:#fff; text-decoration:none;'>jQuery</a></td>
							<td style='background-color:#00a2d1; text-align:center;'><a href='http://www.codingcage.com/search/label/PHP OOP' style='color:#fff; text-decoration:none;' >PHP OOP</a></td>
							<td style='background-color:#00a2d1; text-align:center;'><a href='http://www.codingcage.com/search/label/MySQLi' style='color:#fff; text-decoration:none;' >MySQLi</a></td>
						</tr>
						
						<tr>
							<td colspan='4' style='text-align: center; padding:15px;'>
								<p style='font-size:20px;'>Hi' ".$username.",</p>
								<hr />
								<p style='font-size:25px;'>	Your Booking Request Details</p>
								<img src='https://4.bp.blogspot.com/-rt_1MYMOzTs/VrXIUlYgaqI/AAAAAAAAAaI/c0zaPtl060I/s1600/Image-Upload-Insert-Update-Delete-PHP-MySQL.png' alt='Sending HTML eMail using PHPMailer in PHP' title='Sending HTML eMail using PHPMailer in PHP' style='height:auto; width:100%; max-width:100%;' />
								<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$text_message.".</p>
							</td>
						</tr>
						
						<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
							<td align='center' width='100' height='40' bgcolor='#3ECC1E' style='-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;'>
								<a href='send_email/accept.php' style='font-size:16px; font-weight: bold; font-family:sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block'>
									<span style='color: #ffffff;'>
									Accept
									</span>
								</a>
							</td>
							<td align='center' width='100' height='40' bgcolor='#d62828' style='-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;'>
								<a href='#' style='font-size:16px; font-weight: bold; font-family:sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block' name='reject' onclick=' swal('Good job!', 'Your Booking Is Not Possible As Client Have Denied Your Order At The Moment!', 'danger').catch(swal.noop)'>
									<span style='color: #ffffff;'>
									Reject
									</span>
								</a>
							</td>
						</tr>
						
						</tbody>";
				
			$message .= "</table>";
			
			$message .= "</td></tr>";
			$message .= "</table>";
			
			$message .= "</body></html>";
			
			// HTML email ends here
			
			try
			{
				$mail->IsSMTP(); 
				$mail->isHTML(true);
				$mail->SMTPDebug  = 0;                     
				$mail->SMTPAuth   = true;                  
				$mail->SMTPSecure = "ssl";                 
				$mail->Host       = "smtp.gmail.com";      
				$mail->Port       = 465;             
				$mail->AddAddress($client_email);
				$mail->Username   ="welovebooksmart@gmail.com";  
				$mail->Password   ="Nizar127";            
				$mail->SetFrom('welovebooksmart@gmail.com','Tested');
				$mail->AddReplyTo("welovebooksmart@gmail.com","Coding Cage test");
				$mail->Subject    = $subject;
				$mail->Body 	  = $message;
				$mail->AltBody    = $message;
					
				if($mail->Send())
				{
					
					$msg = "<div class='alert alert-success'>
							Hi,<br /> ".$full_name." mail was successfully sent to ".$email." go and check, cheers :)
							</div>";
					
				}
			}
			catch(phpmailerException $ex)
			{
				$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
			}
		}	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sending HTML eMail using PHPMailer in PHP</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css">
</head>
<body>


<div class="container">

	    
    <div class="email-form">
    
    	<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
        
    	<form method="post" class="form-control-static">
            
            <div class="form-group">
                <input class="form-control" type="hidden" name="client_email" value="<?php echo $_POST[]; ?>" />
            </div>
        
    	</form>
    </div>    
</div>

</body>

</html>
		