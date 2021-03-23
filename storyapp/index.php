<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Story Telling App</title>

</head>
<div class="container">
  <nav>STORY TELLING APPLICATION</nav>

  <body>


    <header>

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
<div class="dropdown">
          <button class="dropbtn">MENU</button>
          <div class="dropdown-content">
            <a href="index.php">Home</a>
            <a href="registration.php">TELL A STORY</a>
            <a href="admin_login.php">Admin</a>
          </div>
       </div>
       <a href="storyteller_board.php">Back to Dashboard</a>  
    </header>


    <div class="stories">
      <h1>RECENT POSTS</h1>
     <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
      
      <?php
     }
      ?>
    </div>

    <?php
    session_start();

    // Create database connection
      require_once('connection.php');
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $id= mysqli_real_escape_string($link, $_SESSION['id']);
        $sql = "Select * from stories where users_id ='$id' and approved='1'";
        $result = mysqli_query($link, $sql);
      if($result===0){
        die('Selection failed');
      }else{ ?>
     
    <?php
        while($rows = mysqli_fetch_object($result)){
            ?>

    <div class="column">
      <button>
          <img src="upload/<?php echo $rows->image; ?>" alt=""  width="400px" height="350">
          <a href="content.php?id=<?php echo $rows->stories_id; ?>"><h2><?php echo $rows->title; ?></h2></a>
          <a href="stories_edit.php?id=<?php echo $rows->stories_id; ?>"><h2>Edit</h2></a>
          <a href="stories_del.php?id=<?php echo $rows->stories_id; ?>"><h2>Delete</h2></a>
         
          
        </button>
     
    </div>

    <?php
        }
      }
       
    }else{
      $sql = "Select * from stories where approved='1'";
      $result = mysqli_query($link, $sql);
      if($result===0){
        die('Selection failed');
      }else{
        while($rows = mysqli_fetch_object($result)){
            ?>

    <div class="column">
      <button>
          <img src="upload/<?php echo $rows->image; ?>" alt="" width="400px" height="350">
          <a href="content.php?id=<?php echo $rows->stories_id; ?>"><h2><?php echo $rows->title; ?></h2></a>
         
          
        </button>
     
    </div>

    <?php
        }
      }
    }
     ?>


  </body>

</html>