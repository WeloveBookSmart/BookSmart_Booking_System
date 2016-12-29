   <?php
 include_once('config.php');
 
 if(isset($_GET['edit']))
 {
	$id = $_GET['edit'];
	$res = mysqli_query("SELECT * FROM service");
	$row = mysqli_fetch_array($res);
 }
 
 if(isset($_POST['editName']))
 {
	$editName = $_POST['editName'];
	$id		  = $_POST['id'];
	$sql	  = "UPDATE service SET name='$editName' WHERE id='$id'";
	$res      = mysqli_query($sql) or die("Could not update".mysqli_error());
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
 }
 
?>
<form action="edit.php" method="POST">
Name: <input type="text" name="editName" value="<?php echo $row[1]; ?>"><br />
<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input type="submit" class="btn btn-success" value="Update">


<?php
//insert into service if it is not available
	include_once('config.php');
	if(isset($_POST['name']))
	{
		$name = $_POST['name'];
		
		if(mysqli_query("INSERT INTO service VALUES('','$name')"))
			echo "Success";
		else
			echo "Please Try Again";
	}
	
	$res = mysqli_query("SELECT * FROM service");

?>

<form action="edit.php" method="POST">
Name: <input type="text" name="Service"><br />
<input type="submit" value="Enter">
</form>

<h1>List Of Companies</h1>
<?php
	while($row = mysqli_fetch_array($res))
		echo "$row[id]. $row[name] <a href='edit.php'>Edit</a><br />";
?>