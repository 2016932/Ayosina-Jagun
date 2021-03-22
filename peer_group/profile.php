<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
$user = $password = $email = $cw = $message = $msg =  "";
$admin_id = mysqli_real_escape_string($conn, $_SESSION['id']);
if(isset($_POST['submit'])){ //what triggers when the submit button is clicked
    
    //protecting user inputs input against sql injection attacks
    $user = mysqli_real_escape_string($conn, trim($_POST['username']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $cw = mysqli_real_escape_string($conn, trim($_POST['coursework']));
    if(empty($user) || empty($email) || empty($cw)){
        $message= " Fill in all details ";
    }
    $sql="UPDATE admin 
    SET username= '$user',
      email='$email',
      coursework = '$cw'
  WHERE id = '$admin_id'";
   $update = mysqli_query($conn, $sql);
   if($update===false){
   die('Could not update or no changes found'.mysqli_error($conn));
   }else{
     $message ="Admin updated";
   }
}
if(isset($_POST['sub'])){
    $old_pwd = mysqli_real_escape_string($conn, trim($_POST['old_password']));
    $new_pwd = mysqli_real_escape_string($conn, trim($_POST['new_password']));

    $sql="Select * from admin where id='$admin_id'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0){
      die("Query failed". mysqli_error($conn));
    }else{
       $res =  mysqli_fetch_object($result);
       if(password_verify($old_pwd, $res->password)){
        $new_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
           $sql="UPDATE admin 
            SET password= '$new_pwd'
        WHERE id = '$admin_id'";
        $update = mysqli_query($conn, $sql);
        if($update===false){
        die('Could not update or no changes found'.mysqli_error($conn));
        }else{
            $msg ="Admin password updated";
        }
       }else{
        $msg ="Wrong password";
       }
    }
}
   $sql="Select * from admin where id='$admin_id'";
  $result=mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)==0){
    die("Query failed". mysqli_error($conn));

}
else{
  include('header.php'); // imports the header.php file
  
  $row = mysqli_fetch_object($result);
?>

<body class="text-center">
  <form class="form-signup"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
 <h1 class="h5 mb-3 font-weight-normal">PLEASE ENTER THE REQUIRED DETAILS</h1>
    <?php echo $message; ?>
  <input type="text" id="inputUsername" class="form-control" value="<?php echo  $row->username;?>" name="username" required autofocus />

  <input type="email" id="email" class="form-control" value="<?php echo  $row->email;?>" name="email" required />

  <input type="text" id="inputCoursework" class="form-control" value="<?php echo  $row->coursework;?>" name="coursework" required />
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">UPDATE</button>
</form>
<form class="form-signup"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
  <h1 class="h5 mb-3 font-weight-normal">CHANGE PASSWORD</h1>
    <?php echo $msg; ?>
  <input type="password" id="inputPassword" class="form-control" placeholder="Enter Old Password" name="old_password" required autofocus />

  <input type="password" id="inputNewPassword" class="form-control" placeholder="Enter New Password" name="new_password" required />
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub">UPDATE</button>
    <i>If you forgot your password, logout and click forgot password</i>
  <p class="mt-5 mb-3 text-muted">Copyright&copy;Suleman2021</p>
</form>
</body>
</html>
<?php
}

?>