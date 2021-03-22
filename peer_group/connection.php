<?php
$conn=mysqli_connect("localhost", "root", "");
if(!$conn){
	die("Database connection failed " . mysqli_errno($conn));
}
$db_select=mysqli_select_db($conn, "projects");

if(!$db_select){
	die("Database selection failed" . mysqli_error($conn));
}

?>