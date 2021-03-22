<?php
// Initialize the session
session_start();

// Create database connection
require_once('connection.php');
$user_id=  mysqli_real_escape_string($link, $_SESSION['id']);
 // Initialize message variable
 $msg = "";
 if(isset($_POST['upload'])){
    $title =  mysqli_real_escape_string($link, $_POST['title']);
    $image = mysqli_real_escape_string($link, $_FILES['image']['name']);
    $image_text = mysqli_real_escape_string($link, $_POST['image_text']);
    $tmp = $_FILES['image']['tmp_name'];
    
    if(empty($title) || empty($image_text) || empty($image)){
      $msg= " Fill in all details or add a file ";
    }
    
        //$files = $_FILES['image']['name'];
      $target = 'upload/'. $image;
      if(move_uploaded_file($tmp, $target)){
        $sql = "INSERT INTO stories (users_id, title, image, image_text) VALUES( '$user_id', '$title','$image', '$image_text')";
        if($result=mysqli_query($link, $sql)){
            if($result === false){
              die("Insert failed".mysqli_error($link));
            }else{
                 $msg ="Story Submitted";
            }
    }
  }
    
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tell a Story</title>
    <link rel="stylesheet" href="storyteller_board.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
    </style>
    <style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   }
</style>
</head>

<body>
<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your Dashboard</h1>
       <center><?php echo $msg;?></center> 
<div id="content">
    
  <form method="POST" action="storyteller_board.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
      <div>
  	  <input type="file" name="image"  class="form-control">
  	</div>
      <div>
  	  <input type="text" name="title"  class="form-control" placeholder="Write Story title">
  	</div>
    <div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Write a story..."  class="form-control" rows="20" cols="30"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload" class="btn btn-primary">POST</button>
  	</div>
</form>
</div>

</body>
</html>

<footer><p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">LOG OUT</a>
    </p></footer>
