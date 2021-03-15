<?php 
session_start();
?>
<!DOCTYPE html>
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
        <h1>Create Account</h1>
        <div>
            <form action="signup.php" method="post">
                <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }else{
                    echo "";
                }
                 ?>
                <p>Your fullname (Surname First) <br>
                <input type="text" placeholder="Fullname" id="name" min="15"
                        max="25" name="fullname" required></p>
                <p>Username <br> 
                <input type="text" placeholder= "Enter Username" name="username" id= "user" required></p>
                <p>Email <br> <input type="email" placeholder="Your mail" name="email" id="email" required></p>
                <p>Password <br> <input type="password" placeholder="Password" name="password" id="password" required></p>
                <p>Re-enter password <br> <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm password" required>
                </p>
                <button type="submit" name="submit">Create your account</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </main>
</body>

</html>
