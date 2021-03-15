<?php
//connecting to database
   $conn= mysqli_connect("localhost", "root", "");
   if($conn===false){
       die("Connection failed").mysqli_error($conn);
   }else{

   //selecting your database
   $db = mysqli_select_db($conn, "auth");
   if($db===false){
    die("Database selection failed");
}
   }
?>