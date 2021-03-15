<?php
    session_start();
    ob_start();
    require_once('connection.php');
    if(isset($_POST['submit'])){
        //code goes here
        //var_dump($_POST);
        //accepting inputs from form
        $fullname=$_POST['fullname'];
        $username =$_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];

        if($password != $confirm){
            $_SESSION['message'] = "Wrong password";
            echo $_SESSION['message'];
            header('location: index.php');
        }else{
        $sql="Select * from users where email = '$email' OR  username = '$username'";
       $query = mysqli_query($conn, $sql);
       if(mysqli_num_rows($query)==0){
           $insert = "Insert into users values(null, '$fullname', '$username', '$email', '$password')";
           $result = mysqli_query($conn, $insert);
           if($result===false){
               die("Could not insert into the databse");
           }else{
               $_SESSION['message']= "Users record saved";
               echo $_SESSION['message'];
               header('location : index.php');
           }
       }
    }
}

    
?>