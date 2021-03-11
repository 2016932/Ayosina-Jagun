<?php
  session_start();
  // connect to database
  $db = mysqli_connect("localhost", "root", "daily planner");

  if (isset($_POST['register_btn'])) {
    $username = mysql_real_escape_string($_POST['user']);
    $fullname = mysql_real_escape_string($_POST['fullname']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['pass']);
    $confirmpass = mysql_real_escape_string($_POST['confirm pass']);

    if ($password == $confirmpassword) {
       // create user
       $password = md5($password); //hash password before storing for security purposes
       $sql = "INSERT INTO users[fullname, username, email, password] VALUES( '$fullname', '$username', '$email', '$password')";
       mysql_query($db, $sql);
       $_SESSION['message'] = "You are now logged in";
       $_SESSION['username'] = $username;
         } else {
        $_SESSION['message'] = "The two passwords do not match";
    }
    
  } 
  
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">

</head>

<body>

    <header>
        <img src="valetine image.jpg" alt="">
    </header>

    <main class="grid-container">
        <h1>Create Account</h1>
        <div>
            <form action="process.php" method="POST">
                <p>Your fullname (Surname First) <br> <input type="text" placeholder="Fullname" id="fullname" min="15"
                        max="25" required></p>
                <p>Username <br> <input type="text" placeholder= "Enter Username" id= "user" required></p>
                <p>Email <br> <input type="text" placeholder="Your mail" id="email" required></p>
                <p>Password <br> <input type="password" placeholder="Password" id="pass" required></p>
                <p>Re-enter password <br> <input type="password" placeholder="Confirm Password" id="confirmpass" required>
                </p>
                <button type="submit" id="register_btn">Create your account</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </main>
</body>

</html>