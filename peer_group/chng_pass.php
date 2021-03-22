<?php
require_once('connection.php');
if(!isset($_GET['id'])){
    header("location: fgtpass.php");
  }else{
    $admin_id =  mysqli_real_escape_string($conn, trim($_GET['id']));
    }
ini_set('display_messages', 1);
$new_pwd = $msg =  "";
if(isset($_POST['sub'])){
    
    $new_pwd = mysqli_real_escape_string($conn, trim($_POST['new_password']));

    
        $new_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
           $sql="UPDATE admin 
            SET password= '$new_pwd'
        WHERE id = '$admin_id'";
        $update = mysqli_query($conn, $sql);
        if($update===false){
        die('Could not update or no changes found'.mysqli_error($conn));
        }else{
            header("location: index.php");
        }
    }

       include('header.php');
?>  
<form  action="chng_pass.php?id=<?php echo $admin_id ;?>" method="post">
  <h1 class="h5 mb-3 font-weight-normal">CHANGE PASSWORD</h1>
    <?php echo $msg; ?>

  <input type="password" id="inputNewPassword" class="form-control" placeholder="Enter New Password" name="new_password" required />
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub">SUBMIT</button>
  <p class="mt-5 mb-3 text-muted">Copyright&copy;Suleman2021</p>
</form>