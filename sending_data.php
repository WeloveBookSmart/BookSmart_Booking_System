<?php
$con = mysqli_connect("localhost","root","","testing");
$q = mysqli_query($con, "SELECT C.notify_id,C.user_from,C.user_to, U.uid, U.username, U.email, T.book_id, T.user_one, T.user_two, T. FROM client_noti.C, user.U, tbl_booking.T
						WHERE T.user")

$c = mysqli_close($con);
?>