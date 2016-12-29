<?php
//check availability
//use via AJAX
include("config.php");
$find_avail_package = ($con, "SELECT COUNT (start_date,end_date,period_booked) FROM booked WHERE start_date - end_date AS period_booked");
$result = mysqli_query($con,$find_avail_package);
$availability = ($con, "SELECT b.period_booked,b.no_of_booked, c.total_package FROM b.booked AND c.tbl_packages 
						WHERE 
						b.total_package - c.period_booked*b.no_of_booked AS b.package_availability");
echo "<div class='statusmsg'>There are $no_of_avail in the $package_id</div>"

?>