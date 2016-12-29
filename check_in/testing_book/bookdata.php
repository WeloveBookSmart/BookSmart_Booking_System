<?php
$con = mysqli_connect("localhost","root","","testing");
$user_id =($con, "SELECT * FROM tbl_booking WHERE id?='$book_id'");
$res = mysqli_query($user_id, $res);

$book_item = mysqli_query($con, "SELECT a.username, a.email, a.phone, a.start_date, a.end_date, a.payment_method, b.book_data, b.status, b.book FROM tbl_booking a, client_noti b 
								WHERE b.user_id_fk = b.book_id AND b.update_id_fk = a.user_id ORDER BY b.book_id DESC LIMIT 3");
								
while($row = mysqli_fetch_array($book_item, MYSQLI_ASSOC))
{
	$username = $row['username'];
	$email = $row['email'];
	$update_id = $row['update_id'];
	$update = $row['update'];
	$post_time = $row['post_time'];
	$up = $row['vote_up'];
	$down = $row['vote_down'];


//update html tag filter
$htmldata = array ("<", ">");
$htmlreplace = array ("&lt;","&gt;");
$final_update = str_replace($htmldata, $htmlreplace, $update);

}

?>
<script>
$(document).on('click',function()(
	("book_data").setInterval()

)

</script>