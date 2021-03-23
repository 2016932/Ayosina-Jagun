<?php
require_once('connection.php');
$id = mysqli_real_escape_string($link, $_GET['id']) ;

		  $sql = "Delete from stories where stories_id = '$id'";
		  $result = mysqli_query($link, $sql);
		  if($result===0){
			die('Delete
             failed');
		  }else{
			if(isset($_SESSION["user"]) ){
				header('location: admin.php?id=2');
			}
              header('location: index.php');
          }

?>