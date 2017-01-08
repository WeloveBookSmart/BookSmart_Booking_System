<?php

//this is the code to send email notification to other user
$con = new mysqli("localhost","root","","BookSmart");
if($con->connect_error){
  die("Connection Failed: " . $con->connect_error);
}


if($con->query($sql) === TRUE){
  echo "New Record Inserted";
}
else
{
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>

<?php
{
$con = mysqli_connect("localhost","root","","BookSmart");
$to = "<?php echo $id; ?>";
$subject = "Your booking for <?php echo $service_name; ?>";
$message = "  
<!DOCTYPE>
<html>
<head>
<title>$user_name</title>
</head>
<body> 
	<div class='container' style='text-align:center; width:1300px;'>
		<div class='row'>
		 <div class='col-lg-12 col-md-6 col-sm-4 col-xs-12'>
  <form class='form-vertical' action='booking_process.php' method='post' enctype='multipart/form-data' style='float:center;'>
	<fieldset>

<!-- Form Name -->
<legend style='text-align:center;'>Book A Service</legend>

<!-- Text input-->
<div class='form-group'>
	<div class='col-lg-12 col-md-6 col-sm-4 col-xs-12'>
  <label class='col-md-8 control-label' for='name'>Name:</label>  
  <div class='col-lg-8 col-md-6'>
  <input id='name' name='name' type='text' placeholder='' class='form-control input-md' required=''>
  </div>
</div>
</div>

<!-- Text input-->
<div class='form-group'>
	<div class="col-lg-12 col-md-6 col-sm-4 col-xs-12">
  <label class="col-md-8 control-label" for="emailaddress">Email Address</label>  
 <div class="col-lg-8 col-md-6">
  <input id="emailaddress" name="emailaddress" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
	<div class="col-lg-12 col-md-6 col-sm-4 col-xs-4">
  <label class="col-md-8 control-label" for="phone">Phone Number</label>  
  <div class="col-lg-8 col-md-6">
  <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>
</div>
<br />

<!-- Text input-->
<!--select calendar in this one-->
<div class="form-group">
	<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">
		<label class="col-md-8 control-label" for="phone">Booking Date</label> 
  <div class="col-lg-6 col-sm-6 col-md-3">
        <div class="docs-datepicker">
          <div class="input-group">
            <input type="text" class="form-control docs-date" name="date" placeholder="Start date">
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
</div>

<!--select finish date calendar in this one-->
<div class="form-group">
	<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">
  <div class="col-lg-6 col-sm-6 col-md-3">
        <div class="docs-datepicker">
          <div class="input-group">
            <input type="text" class="form-control docs-date" name="date" placeholder="End date">
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
</div>
<br />
<!-- Text input-->
<div class="form-group">
	<div class="col-lg-8 col-md-6 col-sm-4 col-xs-4">
  <label class="col-md-8 control-label" for="payment">Payment Method:</label>
  <br />
  <br />
	<div class="radio">
  <h6>Credit Card:<input id="payment1" name="payment" type="radio" placeholder="" class="form-control input-md input-lg" required=""></h6>
  </div>
  <br>
  <br>
  <br>
  <div class="radio">
  <h6>Paypal:<input id="payment2" name="payment" type="radio" placeholder="" class="form-control input-md input-lg" required=""></h6>
  </div>
  </div>
</div>
</div>

</fieldset>
</form>
</div>
</div>
	<br />
	<br />
	<div class='button' style='float:right; margin-right:400px;' >
		<input type='submit' href='booking_verification.php' method='post' class='btn btn-success' name='submit' id='submit' value='Accept'/>
	</div>
	
	<div class='button' style='float:left; margin-left:400px;'>
		<input type='submit' href='../index.php' method='post' id='cancel' name='cancel' class='btn btn-danger' value='Reject'/>
	</div>
	</body>
	</html>
    ";
//set content-type
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8". "\r\n";
$headers .=  'From: <welovebooksmart@yahoo.com>' . "\r\n";

mail($to,$subject,$message,$headers);
	
<?php } ?>


</html>
	</script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="dist/datepicker.js"></script>
  <script src="js/main.js"></script>
  