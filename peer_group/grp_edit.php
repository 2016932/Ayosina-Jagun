<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
$grp_name = $message = "";
if(isset($_GET['edit'])){
    $grp_edit = mysqli_real_escape_string($conn, $_GET['edit']); 
    $_SESSION['edit'] = $_GET['edit'];
  }
  
else{
    $_GET['edit'] ="";
  }
  if($_SERVER['REQUEST_METHOD']==="POST"){
    $grp_name = mysqli_real_escape_string($conn, trim($_POST['groupname']));
    $grp= $_SESSION['edit'];
    if(empty($grp_name)){
        $message= " Fill in all details ";
    }
    $sql="UPDATE groups
    SET name='$grp_name'
    WHERE id = '$grp'";
    $update = mysqli_query($conn, $sql);
    if($update===false){
    die('Could not update or no changes found'.mysqli_error($conn));
    }else{
      $message ="Group updated";
    }
  }

  $grp= $_SESSION['edit'];
  $sql="Select * from groups where id='$grp'";
  $result=mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)==0){
    die("Query failed". mysqli_error($conn));
}else{
  
  include('header.php'); // imports the header.php file
  
  $rows = mysqli_fetch_object($result);
      
?>

<form class="form-group-create"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
<a onclick="history.back()" class="btn btn-primary text-justify">Back</a>
<body class="text-center">
  s<?php echo $message; ?>
  <h1 class="h3 mb-3 font-weight-normal">Create New Group</h1>
  <input type="text" id="inputGroup" class="form-control" value="<?php echo $rows->name; ?>" name="groupname">

  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Update</button>
  <p class="mt-5 mb-3 text-muted">&copy;Suleman2021</p>
</form>
</body>
</html>
<?php
}
?>