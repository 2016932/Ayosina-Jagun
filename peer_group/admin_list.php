<?php
require_once('session_database.php');
require_once('connection.php');
/* To display all messages*/
ini_set('display_messages', 1);


$sql="Select * from admin order by id asc";
    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
        $message="<h1>No Admin Listed";
    }
    else{
        include('header.php'); // imports the header.php file
        ?> 
    <div class="container">
    <a onclick="history.back()" class="btn btn-primary my-4">Back</a>
        <div class="row bg-secondary text-white">
            <div class="col-3 ">Admin Id</div>
            <div class="col-3">Username</div>
            <div class="col-3">Email</div>
        </div>
        <?php
        while($row = mysqli_fetch_object($result)){
        ?>
   
        <div class="row bg-light py-4">
            <div class="col-3 "><?php  echo $row->id;?></div>
            <div class="col-3"><?php  echo $row->username; ?></div>
            <div class="col-3"><?php  echo $row->email;?></div>
        </div>
            <?php
        }
    }
?>