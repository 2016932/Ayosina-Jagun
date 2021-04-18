<<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">

  </head>

  <body>
    <header>
      <img src="valetine image.jpg" alt="">
    </header>

    <main id="Login">
      <p>Login Details</p>

        <div>
        <?php if(isset($_SESSION['message'])){
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
               }
               else{
                   echo "";
               }
               ?>
            
            <form action="login.php" method="post">
         
                <label for="user"><b>Username/Email</b></label>
          <input type="text" placeholder="Enter Username/Email" id="user" name="username" required>  

          <label for="pass"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" id="pass" name="password" required> 

          <button type="submit" name= "submit">Login</button> 
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me 
          </label>
          <h3>Don't have an account? <a href="index.php">SIGN UP</a></h3>
        </div>
    </main>
</body>

</html>
<?php
    if(isset($_POST['submit'])){
        require_once('lib/config.php');
        require_once('lib/conn.php');
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
           header('location: homepage.php');
    }
}