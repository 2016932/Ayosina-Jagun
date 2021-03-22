<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
//print_r($_POST);
$user = $password = $email = $cw = $message = "";
  if($_SERVER['REQUEST_METHOD']==="POST"){
    $user = mysqli_real_escape_string($conn, trim($_POST['username']));
    $pwd = mysqli_real_escape_string($conn, trim($_POST['password']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $cw = mysqli_real_escape_string($conn, trim($_POST['coursework']));
    if(empty($user) || empty($pwd) || empty($email) || empty($cw)){
        $message= " Fill in all details ";
    }
    $sql="Select * from admin where username='$user'";
    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql= "INSERT INTO admin() VALUES (null, '$email', '$user', '$hashed_pwd', '$cw')";
    $res= mysqli_query($conn, $sql);
    if($res===false){
        die(mysqli_error($conn));
    }
    else{
        $message ="Admin added";
    }
    }
    else{
    $message = " Admin already exists, input another name";
    }
    

} include('header.php'); // imports the header.php file
?>

  <body class="text-center">
  <form class="form-signup"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
 <h1 class="h5 mb-3 font-weight-normal">PLEASE ENTER THE REQUIRED DETAILS</h1>

  <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus />

  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required />

  <input type="email" id="email" class="form-control" placeholder="Email" name="email" required />

  <input type="text" id="inputCoursework" class="form-control" placeholder="Coursework" name="coursework" required />
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">REGISTER</button>
  <p><u><a href="admin_list.php" class="btn btn-primary my-2">Check Admin list</a></u></p>
  <p class="mt-5 mb-3 text-muted">Copyright&copy;Suleman2021</p>
</form>
</body>
</html>
