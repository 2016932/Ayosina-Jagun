<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
//print_r($_POST);
 $grp = $message = "";
  if($_SERVER['REQUEST_METHOD']==="POST"){
    $grp = mysqli_real_escape_string($conn, trim($_POST['groupname']));
    $admin = mysqli_real_escape_string($conn, trim($_SESSION['id']));

    if(empty($grp)){
        $message= " Fill in the details ";
    }
    $sql="Select * from groups where name='$grp'";
    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
    $sql= "INSERT INTO groups() VALUES (null, '$grp', '$admin')";
    $res= mysqli_query($conn, $sql);
    if($res===false){
        die(mysqli_error($conn));
    }
    else{
        $message ="Group created";
    }
    }
    else{
    $message = " Group name already exists, input another name";
    }
    

}
include('header.php'); // imports the header.php file
?>
<body class="text-center">
<form class="form-group-create"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
  <?php echo $message; ?>
  <h1 class="h3 mb-3 font-weight-normal">Create New Group</h1>
  <input type="text" id="inputGroup" class="form-control" placeholder="Groupname" name="groupname">

  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Create</button>
  <p><u><a href="grp_list.php" class="btn btn-primary my-2">Check Group list</a></u></p>
  <p class="mt-5 mb-3 text-muted">&copy;Suleman2021</p>
</form>
</body>
</html>