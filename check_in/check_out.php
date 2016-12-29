<?php
require "./config.php"

$sql = "DELETE (id,uid,sid,package_id,username,email,checking_in,checkIn_code) FROM check_in WHERE id=$id";

$result = mysqli_query($con,$sql);

?>