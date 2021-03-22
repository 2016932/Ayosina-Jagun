<?php
  require_once('connection.php');//importing the database connection
  /* To display all messages*/
  ini_set('display_messages', 1);//set to display all messages
  //print_r($_POST);
  $email = $cw =  $message = "";
  if(isset($_POST['submit'])){ //what triggers when the submit button is clicked
    
    //protecting user inputs input against sql injection attacks
    $cw = mysqli_real_escape_string($conn, trim($_POST['coursework']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    if(empty($cw) || empty($email)){//checks for empty text field in the form
        $message= " Fill in all details ";
    }
    $sql="Select * from admin where email='$email' AND coursework = '$cw'";//checks for a particular user in the database
    $result=mysqli_query($conn, $sql); // runs a mysql query operation and stores the result in the $result variable.

    if(mysqli_num_rows($result)==0){ //checks if the returned result contains the user
        $message= " The email or course doesn't exist ";// kill the connection
}elseif($row=mysqli_fetch_assoc($result)){//stores the result in an associative array
		header("location:chng_pass.php?id={$row['id']}");
	}
  }
?>



<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Suleman AhmedRGU">
    <title>Forgot Password.Peer group Management</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link href="css/style.css" rel="stylesheet" >

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" >



  </head>
  <body class="text-center">
    <form class="form-signin"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
    <?php echo $message;?>
  <h1 class="h3 mb-3 font-weight-normal">Forgot Password</h1>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <input type="text" name="coursework" id="inputCoursework" class="form-control" placeholder="Coursework" required autofocus>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Reset password</button>
  <p class="mt-5 mb-3 text-muted">&copy;Suleman2021</p> 
</form>
</body>
</html>
