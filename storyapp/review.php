<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style1.css"> 
  <title>Story Telling App</title>
</head>
<div class="container">
<h3><nav>STORY TELLING APPLICATION</nav></h3>

  <body>

        <div class="container">
            <div class="row">
                <div class="col-3 text-center users mt-5">

                      
<?php  
    require_once('connection.php');
      $sql = "Select * from users ";
      $result = mysqli_query($link, $sql);
      if($result===0){
        die('Selection failed');
      }else{
        while($rows = mysqli_fetch_object($result)){
            ?>
                <h1><a href="review.php?id=<?php echo  $rows->id; ?>"><?php echo  $rows->username; ?></a></h1>
            <?php
        }
    }
            ?>
         </div>
         
 
            <div class="col-9 story">
                <?php 
                    if(isset($_GET['id'])){
                        $id = mysqli_real_escape_string($link, $_GET['id']);
                        $sql = "Select * from stories where users_id ='$id' and approved='1'";
                        $result = mysqli_query($link, $sql); 
                        if($result===0){
                            die("Selection failed");
                        }else{
                            while($rows = mysqli_fetch_object($result)){
                                ?>
                                 <img src="upload/<?php echo $rows->image; ?>" alt=""  width="400px" height="350">
                                 <a href="content.php?id=<?php echo $rows->stories_id; ?>"><h2><?php echo $rows->title; ?></h2></a>
                                <?php
                    }
                }
            }
                ?>

            </div>
    </div>
        </div>