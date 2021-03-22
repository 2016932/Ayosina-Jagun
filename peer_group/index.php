
<?php
if(isset($_GET['student'])){
  $stud_id = $_GET['student'];
  header("location: login.php");
}else{
require_once('connection.php');//importing the database connection
/* To display all messages*/
ini_set('display_messages', 1);//set to display all messages

$user = $password = $message = "";
  if(isset($_POST['submit'])){ //what triggers when the submit button is clicked
    
    //protecting user inputs input against sql injection attacks
    $user = mysqli_real_escape_string($conn, trim($_POST['username']));
    $pwd = mysqli_real_escape_string($conn, trim($_POST['password']));
    if(empty($user) || empty($pwd)){//checks for empty text field in the form
        $message= " Fill in all details ";
    }
    $sql="Select * from admin where username='$user'";//checks for a particular user in the database
    $result=mysqli_query($conn, $sql); // runs a mysql query operation and stores the result in the $result variable.

    if(mysqli_num_rows($result)==0){ //checks if the returned result contains the user
        $message= " The name or password doesn't exist ";// kill the connection
}
if($row=mysqli_fetch_assoc($result)){//stores the result in an associative array

	$pwd=password_verify($pwd, $row['password']); // verifies the password in the form against the password in the database

	if($pwd==false){
		$message = "Could not verify Password";// result if password verification is false
	}
	elseif($pwd==true){ //if password verification is true
		session_start(); //starts a session
		$_SESSION['id']=$row['id'];
		$_SESSION['user']=$row['username'];
        $_SESSION['cw']=$row['coursework'];
        $_SESSION['loggedin']= true;
		header("location:admin_board.php");
	}
	
    
  }
}
  include('header.php'); // imports the header.php file
?>

  <body class="text-center">
  
    <form class="form-signin"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
  <?php echo $message; ?>
  <h1 class="h3 mb-3 font-weight-normal text-white">Please sign in</h1>
  <input type="text" id="inputUser" class="form-control" placeholder="Username" name="username" required autofocus>

  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
  <a href="fgtpass.php" class="btn btn-primary my-2">Reset Password</a>
  <p class="mt-5 mb-3 text-muted">&copy;Suleman2021</p>
</form>
</body>
</html>

<?php
}
?>