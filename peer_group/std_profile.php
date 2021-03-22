<?php
require_once('stud_session_db.php');
$email = $message =  "";
$stud_id = mysqli_real_escape_string($conn, $_SESSION['stud']);
if(isset($_POST['submit'])){ //what triggers when the submit button is clicked
    
    //protecting user inputs input against sql injection attacks
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    if( empty($email) ){
        $message= " Fill in the details ";
    }
    $sql="UPDATE students
    SET 
      email='$email'
  WHERE matricnumber = '$stud_id'";
   $update = mysqli_query($conn, $sql);
   if($update===false){
   die('Could not update or no changes found'.mysqli_error($conn));
   }else{
     $message ="Student updated";
   }
} $sql="Select * from students where matricnumber='$stud_id'";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)==0){
  die("Query failed". mysqli_error($conn));
}
else{
include('header.php'); // imports the header.php file

$row = mysqli_fetch_object($result);
?>
<body class="text-center">
  <form class=""  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
  <h1 class="h5 mb-3 font-weight-normal">PLEASE ENTER THE REQUIRED DETAILS</h1>
    <?php echo $message; ?>
 
  <input type="email" id="email" class="form-control" value="<?php echo  $row->email;?>" name="email" required />

  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">UPDATE</button>
</form>

</body>
</html>
<?php
}
?>