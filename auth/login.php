<<?php 
session_start();
?>
!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style2.css">

</head>

<body>

    <header>
        <img src="valetine image.jpg" alt="">
    </header>

    <main class="grid-container">
        <h1>Login to Account</h1>
        <div>
            <form action="login.php" method="post">
               <?php if(isset($_SESSION['message'])){
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
               }
               else{
                   echo "";
               }
               ?>
                <p>Username <br> 
                <input type="text" placeholder= "Enter Username" name="username" id= "user" required></p>
                <p>Password <br> <input type="password" placeholder="Password" name="password" id="password" required></p>
                <button type="submit" name="submit">Create your account</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </main>
</body>

</html>
<?php
    if(isset($_POST['submit'])){
        require_once('connection.php');
        $username =$_POST['username'];
        $password = $_POST['password'];

        $sql="Select * from users where email = '$username' OR  username = '$username' AND password='$password'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)==0){
            $_SESSION['message'] = "Wrong username or password";
            echo $_SESSION['message'];
        }else{
           $row = mysqli_fetch_array($query);
           $_SESSION['user'] = $row['username'];
           header('location: welcome.php');
    }
}