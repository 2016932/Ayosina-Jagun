<?php
    session_start();
    ob_start();
    require_once('connection.php');
    if(isset($_POST['submit'])){
        //code goes here
        var_dump($_POST);
        //accepting inputs from form
        $fullname=$_POST['fullname'];
        $username =$_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];

        if($password != $confirm){
            $_SESSION['message'] = "Wrong password";
            header('location: registration.php');
        }
            $sql="Select * from users where username = '$username' AND password='$password'";
       $query = mysqli_query($conn, $sql);
       if(mysqli_num_rows($query)==0){
           $insert = "Insert into users values(null, '$fullname', '$username', '$email', '$password')";
           $result = mysqli_query($conn, $insert);
           if(mysqli_affected_rows($conn)){
            $_SESSION['message']= "Registered Successfully";
               header('location: login.php');
           }else{
               die("Could not insert into the database");
           }
       }
    
   
}

    
?>