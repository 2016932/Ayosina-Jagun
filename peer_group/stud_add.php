<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
//print_r($_POST);
$fname = $lname = $email = $grp_id = $message = "";
$admin_id = mysqli_real_escape_string($conn, $_SESSION['id']);
  if($_SERVER['REQUEST_METHOD']==="POST"){
    $fname = mysqli_real_escape_string($conn, trim($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, trim($_POST['lname']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $grp_id = mysqli_real_escape_string($conn, trim($_POST['grp_id']));
    if(empty($fname) || empty($lname) || empty($email)){
        $message= " Fill in all details ";
    }
    if(empty($grp_id)){
      $grp_id =0;
    }
    $sql="Select * from students where email='$email' OR (firstname='$fname' and lastname='$lname')";
    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
    $sql= "INSERT INTO students() VALUES (null,'$fname', '$lname', '$email','$grp_id', '$admin_id')";
    $res= mysqli_query($conn, $sql);
    if($res===false){
        die(mysqli_error($conn));
    }
    else{
        $message ="Student created and added to group {$grp_id}";
    }
    }
    else{
    $message = "Student already exists already exists, input another name and email";
    }
    

} include('header.php'); // imports the header.php file

$sql="Select * from groups WHERE admin_id = '$admin_id' order by id asc";
$result=mysqli_query($conn, $sql);

?>

  <body class="text-center">
  <div class="container-fluid">
    <div class="row">
    <div class="col-8">
      <form class="form-signup"  action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
        <h1 class="h5 mb-3 font-weight-normal">PLEASE ENTER THE REQUIRED DETAILS</h1>
        <?php echo $message;?>
        <input type="text" id="inputFirstName" class="form-control" placeholder="Firstname" name="fname" required autofocus />

        <input type="text" id="inputLastName" class="form-control" placeholder="Lastname" name="lname" required />

        <input type="email" id="email" class="form-control" placeholder="Email" name="email" required />
        
        <input type="number" id="grp_id" class="form-control" placeholder="Group number" name="grp_id"  />

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">REGISTER</button>
        
        <p><u><a href="stud_list.php" class="btn btn-primary my-2">Check Student list</a></u></p>
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
    if(isset($_GET['grp_id'])){
      $id = mysqli_real_escape_string($conn, $_GET['grp_id']);
      $count_sql ="Select * from students WHERE students.group_id = '$id'";
      $count=mysqli_query($conn, $count_sql);?>
       <div class="container">
       <div class="lead">List of Students in Group <?php echo $stud_count;?></div>
        <div class="row bg-secondary text-white">
            <div class="col-3 ">Student No.</div>
            <div class="col-3">Firstame</div>
            <div class="col-3">Lastname</div>
            <div class="col-3">Email</div>
        </div>
        <?php
      while($row = mysqli_fetch_object($count)){?>
        <div class="row bg-light py-4">
            <div class="col-3 "><?php echo $row->matricnumber;?></div>
            <div class="col-3"><?php echo $row->firstname;?></div>
            <div class="col-3"><?php echo $row->lastname; ?></div>
            <div class="col-3"><?php echo $row->email; ?></div>
        </div>
        <?php
      }
    } 
  ?>
  
  </div>
 
</body>
</html>
