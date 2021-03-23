<?php
session_start();
	 require_once('connection.php');
	 $id =$msg = "";
	 if(isset($_POST['submit'])){
		
		$id =$msg = $title =$image=$image_text= "";
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$title =  mysqli_real_escape_string($link, $_POST['title']);
		$image = mysqli_real_escape_string($link, $_FILES['image']['name']);
		$image_text = mysqli_real_escape_string($link, $_POST['image_text']);
		$tmp = $_FILES['image']['tmp_name'];
		$target = "upload/". $image;

		if( isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
			if(move_uploaded_file($tmp, $target)){
				$sql = "UPDATE stories 	
					  SET title = '$title',
					  	  image = '$image',
						  image_text = '$image_text'
					  WHERE stories_id = '$id'";
				
				if($res=mysqli_query($link, $sql)){
					$msg ="<h3>Story Updated</h3>";
	   }
			}
			
	  
		}
		
		if(empty($title) || empty($image_text)){
		  $msg= " Fill in all details or add a file ";
		}
	
		
			$sql = "UPDATE stories 
					  SET title = '$title',
						  image_text = '$image_text'
					  WHERE stories_id = '$id'";
	  
			  if($res=mysqli_query($link, $sql)){
					   $msg ="<h3>Story Updated</h3>";
		  }
		
		 
		
		}
	$id = mysqli_real_escape_string($link, $_GET['id']) ;
		  $sql = "Select * from stories where stories_id = '$id'";
		  $result = mysqli_query($link, $sql);
		  if($result===0){
			die('Selection failed');
		  }else{
			while($rows = mysqli_fetch_object($result)){
				?>
	<h1><?php echo  $rows->title; ?></h1>
		
	
	
	  <p><h3><?php echo  $rows->image_text; ?></h3></p>
	  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
	<?php	
		if(isset($_SESSION["user"]) ){

			echo "<h5><a onclick=\"history.back()\" class=\"btn btn-primary\">Go back</a></h5>";

		}
		elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

			echo "<h5><a href=\"index.php\">Go to Home</a></h5>";
			
		}
		else{
			echo "<h5><a href=\"index.php\">Go to Home</a></h5>";
		}
		
	?>
	<?php echo $msg; ?>
<form method="POST" action="stories_edit.php?id=<?php echo  $rows->stories_id; ?>" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
      <div>

	  <img src="upload/<?php echo  $rows->image; ?>" alt="<?php echo  $rows->image_text; ?>" class="center" width="200" height="200"><br>
  	  <input type="file" name="image"  class="form-control">
  	</div>
      <div>
  	  <input type="text" name="title"  class="form-control" value="<?php echo  $rows->title; ?>">
  	</div>
    <div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text"
		  class="form-control" rows="20" cols="30"><?php echo  $rows->image_text; ?></textarea>
  	</div>
  	<div>
  		<button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
  	</div>
</form>
<?php
			}
		  }
			?>
</body>
</html>
<?php

	?>