<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
$fname = $lname = $email = $grp_id = $message = "";
$admin_id = mysqli_real_escape_string($conn, $_SESSION['id']);
$stud = mysqli_real_escape_string($conn, $_SESSION['edit']);
if(isset($_GET['edit'])){
  $stud_edit = mysqli_real_escape_string($conn, $_GET['edit']); 
  $_SESSION['edit'] = $_GET['edit'];
}
else{
  $_GET['edit'] ="";
}
if($_SERVER['REQUEST_METHOD']==="POST"){
  $fname = mysqli_real_escape_string($conn, trim($_POST['fname']));
  $lname = mysqli_real_escape_string($conn, trim($_POST['lname']));
  $email = mysqli_real_escape_string($conn, trim($_POST['email']));
  $grp_id = mysqli_real_escape_string($conn, trim($_POST['grp_id']));
  $stud= $_SESSION['edit'];
  if(empty($fname) || empty($lname) || empty($email)){
      $message= " Fill in all details ";
  }
  if(empty($grp_id)){
    $grp_id =0;
  }
  $sql="UPDATE students
  SET email='$email',
      group_id='$grp_id'
  WHERE matricnumber = '$stud'";
$update = mysqli_query($conn, $sql);
if($update===false){
die('Could not update or no changes found'.mysqli_error($conn));
}else{
  $message ="Student updated";
}

}
  $sql="Select * from students where matricnumber='$stud'";
  $result=mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)==0){
    die("Query failed". mysqli_error($conn));
}else{
  
  include('header.php'); // imports the header.php file
  
  $rows = mysqli_fetch_object($result);
      
?>
<body class="text-center">
<div class="container-fluid">
  <div class="row">
  
  <div class="col-8">
    <form class="form-signup"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
    <a onclick="history.back()" class="btn btn-primary text-justify">Back</a>
     
      <?php echo $message;?>
      <h1 class="h5 mb-3 font-weight-normal">PLEASE EDIT THE REQUIRED DETAILS</h1>
      <?php echo $message;?>
      <input type="text" id="inputFirstName" class="form-control" value="<?php echo $rows->firstname;?>" readonly name="fname" required autofocus />

      <input type="text" id="inputLastName" class="form-control" value="<?php echo $rows->lastname;?>" readonly  name="lname" required />

      <input type="email" id="email" class="form-control" value="<?php echo $rows->email;?>" name="email" required />
      
      <input type="number" id="grp_id" class="form-control" value="<?php echo $rows->group_id;?>" name="grp_id"  />

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">UPDATE</button>
      
      <p class="mt-5 mb-3 text-muted">Copyright&copy;Suleman2021</p>
    </form>
  </div>
  
  <div class="col-4">
  <div class="row bg-secondary text-white text-center">
  <div class="alert alert-primary" role="alert">
    Click on the number of Students to see the list of Students in a group. One student can only be in one group and not many
  </div>
    <div class="col-4">
      Group Number
    </div>
    <div class="col-4">
    Group Name</div>
    <div class="col-4">
    No. of Students</div>
  </div>
  <?php
  $seql="Select * from groups WHERE admin_id = '$admin_id' order by id asc";
  $result=mysqli_query($conn, $seql);
      while($row = mysqli_fetch_object($result)){
      ?>
 
      <div class="row bg-light py-4">
          <div class="col-4 "><?php  echo $row->id;?></div>
          <div class="col-4"><?php  echo $row->name; ?></div>
          
          <?php
          $stud_count=mysqli_real_escape_string($conn, $row->id);
          $count_sql ="Select count(matricnumber) from students  WHERE students.group_id = '$stud_count'";
          $count=mysqli_query($conn, $count_sql);
          $count= mysqli_fetch_array($count);
          ?>
          <div class="col-4"><a href="stud_add.php?grp_id=<?php echo $row->id;?>"><?php  echo $count[0]; ?></a></div>    
      </div>
          <?php
      }
      ?>
  </div>
  </div>
</div>
<?php

}

 ?>
</body>
</html>
