<?php
include('config.php');

//this block is used to convert data form tbl_booking and store it as JSON in a single column in mysql db
//this data is store in client_noti table as book_data just as notification to notify client about the the data received frm tbl_booking

 function get_data()  
 {
if(isset($_GET['username']) && !empty($_GET['username']) AND isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['phone']) && !empty($_GET['phone']) AND isset($_GET['start_date']) && !empty($_GET['start_date']) AND isset($_GET['end_date']) && !empty($_GET['end_date']) AND isset($_GET['payment_method']) && !empty($_GET['payment_method']))
{
	
	//convert it into array
	//get the booking data from form
	$username = trim(mysqli_real_escape_string($con,$_GET['username']));
	$email = trim(mysqli_real_escape_string($con,$_GET['email']));
	$phone = trim(mysqli_real_escape_string($con,$_GET['phone']));
	$start_date = trim(mysqli_real_escape_string($con,$_GET['start_date']));
	$end_date = trim(mysqli_real_escape_string($con,$_GET['end_date']));
	$payment_method = trim(mysqli_real_escape_string($con,$_GET['payment_method']));
	
	$book_data = ("SELECT (username,email,phone,start_date,end_date,payment_method) FROM tbl_bookings WHERE id='$book_id' AND timestamp >=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND timestamp < CURDATE()");  //obtain the data from a day before
	$result = mysqli_query($con,$booking);
}	
	$book_data = array();
	while($row = mysqli_fetch_array($result))
	{
		$book_data[] = array(
			'username' 			=>	$row["username"],
			'email'				=>	$row["email"],
			'phone'				=>  $row["phone"],
			'start_date'		=>	$row["start_date"],
			'end_date'			=>	$row["end_date"],
			'payment_method'	=>	$row["payment_method"]
		);
	}
	 return json_encode($book_data);
}
	
	 // $file_name = date("d-m-Y") . ".json";  
      //if(file_put_contents($file_name, get_data()))  
     //{  
       //echo $file_name . ' File created';  
     //}  
     //else  
     //{  
        //echo 'There is some error';  
     //}
	 
	 

	//store the json_data into book_data and store it in client_noti
	if(isset($_POST["book_data"])  && !empty($_POST['book_data']))
  {
	
	$book_data = "INSERT INTO client_noti(book_data) VALUE ('','$book_data')";
	
	$res = mysqli_query($con,$book_data);

	$book_data = mysqli_num_rows($booking);
  }
   else{
	  echo "<script>alert(Data are unable to be convert into JSON)</script>";
   }
	
	$close = mysqli_close($con);	
?>	
	