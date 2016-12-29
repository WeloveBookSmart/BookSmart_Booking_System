<?php
$connect = mysqli_connect("localhost","root","","testing");
if(isset($_POST['submit'])){
	
	//get the text data from the fields
	$username = trim(mysqli_real_escape_string($connect, $_POST['username']));
	$email = trim(mysqli_real_escape_string($connect, $_POST['email']));
	$phone = trim(mysqli_real_escape_string($connect, $_POST['phone']));
	$start_date = tim(mysqli_real_escape_string($connect, $_POST['start_date']));
	$end_date = trim(mysqli_real_escape_string($connect, $_POST['end_date']));
	$payment_method = trim(mysqli_real_escape_string($connect, $_POST['payment_method']));
	
	$sql = "INSERT INTO tbl_booking(username,email,phone,start_date,end_date,payment_method) VALUES('$user_name','$email','$phone','$start_date','$end_date','$payment_method')";
	
	$result = mysqli_query($connect, $sql);

	if($result){
	
	echo "<script>alert('Booking  Has Been Inserted')</script>";
	echo "<script>window.open('booking_process.php','_SELF')</script>";
	
	console.log($result);
	}
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Booking Service</title>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/datepicker.css">
    <link rel="stylesheet" href="css/main.css">

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body> 
	<div class="container">
  <form class="form-horizontal" id="form" action="booking_process.php" method="post" enctype="multipart/form-data">
	<fieldset>

<!-- Form Name -->
<legend style="text-align:center;">Book A Service</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailaddress">Email Address</label>  
  <div class="col-md-4">
  <input id="emailaddress" name="emailaddress" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone Number</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<!--select calendar in this one-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateselection">Start Date:</label>  
  <div class="col-sm-6 col-md-3">
        <div class="docs-datepicker">
          <div class="input-group">
			<!--><div class="input-group date">
    <input type="text" class="form-control" value="12-02-2012">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div><!-->
            <input type="text" class="form-control docs-date" name="date" placeholder="Pick a date">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default docs-datepicker-trigger" disabled>
                <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
              </button>
            </span>
          </div>
          <div class="docs-datepicker-container"></div>
        </div>
      </div>
</div>

<!--select finish date calendar in this one-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateselection">End Date:</label>  
  <div class="col-sm-6 col-md-3">
        <div class="docs-datepicker">
          <div class="input-group">
            <input type="text" class="form-control docs-date" name="date" placeholder="Pick a date">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default docs-datepicker-trigger" disabled>
                <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
              </button>
            </span>
          </div>
          <div class="docs-datepicker-container"></div>
        </div>
      </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="payment">Payment Method:</label>  
  Credit Card:<input id="payment" name="payment" type="radio" placeholder="" class="form-control input-md" required="">
  Paypal:<input id="payment" name="payment" type="radio" placeholder="" class="form-control input-md" required="">
</div>

</fieldset>
</form>
	<br />
	<br />
	<div class="button" style="float:right; margin-right:400px;" >
		<input type="submit" href="payment/payment_made.php" method="post" class="btn btn-success" name="submit" id="submit" value="Book Now, baby!"/>
	</div>
	
	<div class="button" style="float:left; margin-left:400px;">
		<input type="submit" href="../index.php" method="post" id="cancel" name="cancel" class="btn btn-danger" value="Cancel"/>
	</div>
  </div>
	<br />
	<hr class="divider">
	  <footer>
		<div style="text-align:center;" id="copyright">
				&copy; BookSmart.Inc 2016
		</div>
		  <p class="pull-right"><a href="#">Back To Top</a></p>
		  <p><a href="#">Privacy</a> . <a href="#">Term</a></p> . <p><a href="about.html">About Us</a>
               
	  </footer>
		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
	<!--<script>
		$(document).ready(function(){
			var date_input=$('input[name="date"]');
		};
		date_input.datepicker();
	  );
	  
		$(function() {
			$(.'error').hide();
			$(".submit").click(function{
				//validate
				
				$('.error').hide();
			  var name = $(".username").val();
			  if name
			  
			  var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&start_date=' + start_date + '&end_date=' + end_date + '&payment_method=' + payment_method;
			  //alert (dataString);
			  e.preventDefault();
			  $.ajax({
				 type: "POST",
				 url : "send_data.php",
				 data: dataString,
				 success: function(){
					$('#booking_form').html("<div id='message'>Your Booking Details:</div>");
					$('#message').html("<h2>Your Booking Has Been Made!</h2>");
					 .append("<p>Please Check Your Booking Status In Your Profile</p>");
					 .hide();
					 .fadeIn(1500, function() {
						$('#message').append("<img id='checkmark' src='checkmark.png'></img>")
				});
			  }
			});
			 
			 e.preventDefault();
			  
		$(document).on('click', function() {
			$.ajax({
				type: "POST",
				url: "booking_view.php",
				data: json,
				success: function(){
					$('#booking_view').html("<div id='message'>Your Booking Details</div>");
					$('#message').html("<h2>Your Booking Has Been Made!</h2>");
					 .append("<p>Please Check Your Booking Status In Your Profile</p>")
				}
			});
		});
	</script> 
 <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="dist/datepicker.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>

  
