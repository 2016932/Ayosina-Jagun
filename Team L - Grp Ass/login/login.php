<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

  </head>

  <body>
    <header>
      <img src="valetine image.jpg" alt="">
    </header>

    <main id="Login">
      <p>Login Details</p>

      <form action="process.php" method="POST">
        <div class="container">
          <label for="user"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" id="user" name="user" required>  

          <label for="pass"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" id="pass" name="pass" required> 

          <button type="submit">Login</button> 
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me 
          </label>
        </div>

        <div class="container" style="background-color: #228CBE;">
          <button type="button">Don't have an account?<a href="signup.php">Signup</a></button> 
        </div>
      </form>
    </main>

  </body>

</html>