<?php
  require_once('connection.php');//importing the database connection
  /* To display all messages*/
  ini_set('display_messages', 1);//set to display all messages
  //print_r($_POST);
  $email = $cw =  $msg = "";
  if(isset($_POST['sub'])){ //what triggers when the submit button is clicked
    
    //protecting user inputs input against sql injection attacks
    
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    if( empty($email)){//checks for empty text field in the form
        $message= " Fill in all details ";
    }
    $sql="Select * from students where email='$email'";//checks for a particular user in the database
    $result=mysqli_query($conn, $sql); // runs a mysql query operation and stores the result in the $result variable.

    if(mysqli_num_rows($result)==0){ //checks if the returned result contains the user
        $message= " The email or course doesn't exist ";// kill the connection
}elseif($row=mysqli_fetch_assoc($result)){//stores the result in an associative array
  session_start(); //starts a session
  $_SESSION['stud']=$row['matricnumber'];
  $_SESSION['student']=$row['firstname'] . $row['lastname'];
  $_SESSION['std_loggedin']= true;
		header("location: stud_board.php");
	}
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="AbdoulRGU">
    <title>Student Dashboard.Peer group Management</title>

    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" href="images/codezyge5.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link href="css/style.css" rel="stylesheet" >

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" >
  </head>
  <body class="text-center">
  <form class="form-signup"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
  <h1 class="h5 mb-3 font-weight-normal">CONFIRM YOUR IDENTITY STUDENT</h1>
    <?php echo $msg; ?>

    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub">SUBMIT</button>
  <p class="mt-5 mb-3 text-muted">Copyright&copy;Suleman2021</p>
</form>
</body>
</html>

