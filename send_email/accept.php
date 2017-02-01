<?php
	require("../config/config.php");
	
		// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer(true);	
		
		//$sql = mysqli_query($con, "SELECT username,email,phone_num,start_date,end_date,peoplenum,price,payment_method,special_enquiry FROM client_noti WHERE id='$sid' && '$package_id' && '$uid'")or die(mysqli_error($con));
		
		//$sql = mysqli_query($con, "SELECT client_noti.email FROM client_noti INNER JOIN tbl_package, tbl_user, tbl_service ON client_noti.sid = tbl_service.sid ")
		
		if(isset($_POST['btn_send']))
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
	
			
		}

			if(isset($_GET['id']))
			{
				$id = mysqli_real_escape_string($_GET['id']);
				$query = mysqli_query ( $con, "INSERT INTO booking(username,email,phone_num,number_of_people,start_date,end_date,no_of_customer,price,enquiry) VALUES('$username','$email','$phone_num','$no_of_people','$start_date','$end_date','$no_of_customer','$price','$enquiry')");
			}
			else{
				 die(mysqli_error($sql);
				 mysqli_close($sql);
			}
			$text_message    = "Hello $username, <br /><br /> Your Booking Is Successful! Cheers!";			   
			
			
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
							<td colspan='15' style='text-align:center; padding:15px;'>
								<p style='font-size:30px;'>Hello' ".$username.",</p>
								<hr />
								<p style='font-size:15px;'>Thanks for Booking With BookSmart!</p>
								<br />
								<p style='font-size:15px;'>Your Booking Has Been Submitted To The Respective Client Owning The Service That You Book.
								<br />
								<p style='font-size:15px;'>Within 24 hours of Using The Service. You are <strong>OBLIGED</strong> to Check In using CHECK IN system that we will send to you via email</p>
								<br />
								<p style='font-size:15px;'>This is your Booking Information</p>
								<p style='font-size:15px;'>------------------------</p>
								<p style='font-size:15px;'>Username: '.$username.'</p>
								<p style='font-size:15px;'>Email: '.$email.'</p>
								<p style='font-size:15px;'>Phone_num: '.$phone_num.'</p>
								<p style='font-size:15px;'>Start_date: '.$start_date.'</p>
								<p style='font-size:15px;'>End_date: '.$end_date.'</p>
								<p style='font-size:15px;'>Peoplenum: '.$peoplenum.'</p>
								<p style='font-size:15px;'>Price: '.$price.'</p>
								<p style='font-size:15px;'>Payment_method: '.$payment_method';</p>
								<p style='font-size:15px;'>------------------------</p>
								
							</td>
							<td colspan='2' style='text-align:center; padding:15px;'>>
								<p>Please Check In on $time</p>
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
				$mail->AddAddress($email);
				$mail->Username   ="welovebooksmart@gmail.com";  
				$mail->Password   ="Nizar127";            
				$mail->SetFrom('welovebooksmart@gmail.com','BookSmart');
				$mail->AddReplyTo("welovebooksmart@gmail.com","BookSmart");
				$mail->Subject    = "Your Booking Information On $start_date";
				$mail->Body 	  = $message;
				$mail->AltBody    = $message;
				
				
				if($mail->Send())
				{
					
					$msg = "<div class='alert alert-success'>
							Hi,<br /> ".$username." mail was successfully sent to ".$email." go and check, cheers :)
							</div>";
				}
			}
			catch(phpmailerException $ex)
			{
				$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
			}
		}	
		
?>
<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Booking Information</title>
<!--><link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css"><!-->
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
        
          
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Name</label>:<input type="hidden" name="username" value="<?php echo $_POST["username"]; ?>" id="username" class="form-control input-lg" placeholder="Your Name" tabindex="1">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Email</label>:<input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="2">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Phone Number</label>:<input type="hidden" name="phone_num" value="<?php echo $_POST["phone_num"]; ?>" id="phone_num" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Start Date</label>:<input type="hidden" name="start_date" id="start_date" value="<?php echo $_POST["start_date"]; ?>" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>End Date</label>:<input type="hidden" name="end_date" id="end_date" value="<?php echo $_POST["end_date"]; ?>" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Number Of People</label>:<input type="hidden" name="peoplenum" value="<?php echo $_POST["peoplenum"]; ?>" id="peoplenum" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
				 <div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Price</label>:<input type="hidden" name="price" value="<?php echo $_POST["price"]; ?>" id="price" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
			    <div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Payment Method</label>:<input type="hidden" name="payment_method"  value="<?php echo $_POST["payment_method"]; ?>"id="payment_method" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Special Enquiry</label>:<input type="hidden" name="enquiry" id="enquiry" value="<?php echo $_POST["enquiry"]; ?>" class="form-control input-lg" placeholder="Your Most Used Phone Number" tabindex="3">
					</div>
				</div>
			</div>            
   
     
        
    	</form>
    </div>    
</div>
</body>
</html>

<!-->
<script>
var now = new Date();
var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 0, 0, 0) - now;
if (millisTill10 < 0) {
     millisTill10 += 86400000; // it's after 10am, try 10am tomorrow.
}
setTimeout(function(){alert("It's 10am!")}, millisTill10);
</script>
<!-->