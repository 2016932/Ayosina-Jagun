<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index.css">
  <title>Story Telling App</title>

</head>
<div class="container">
  <nav>STORY TELLING APPLICATION</nav>

  <body>


    <header>

      <div id="sidebar">
        <div class="dropdown">
          <button class="dropbtn">MENU</button>
          <div class="dropdown-content">
            <a href="index.php">Home</a>
            <a href="personal.html">Viewed Post</a>
            <a href="work.html">View by Type</a>
            <a href="life.html">View by Location</a>
            <a href="registration.php">TELL A STORY</a>
            <a href="admin_login.php">Admin</a>
            


          </div>
        </div>

    </header>


    <div class="stories">
      <h1>RECENT POSTS</h1>
    </div>

    <?php
    session_start();

    // Create database connection
      require_once('connection.php');
      $sql = "Select * from stories";
      $result = mysqli_query($link, $sql);
      if($result===0){
        die('Selection failed');
      }else{
        while($rows = mysqli_fetch_object($result)){
            ?>

    <div class="column">
      <button><a href="content.php?id=<?php echo $rows->stories_id; ?>">
          <img src="<?php echo $rows->image; ?>" alt="" style="width:100%;">
          <h2><?php echo $rows->title; ?></h2></button>
      <!-- Add icon library -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Use an element to toggle between a like/dislike icon -->
      <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>
      <script>
        function myFunction(x) {
          x.classList.toggle("fa-thumbs-down");
        }
      </script>

      </a>
    </div>

    <?php
        }
      }
     ?>


  </body>

</html>