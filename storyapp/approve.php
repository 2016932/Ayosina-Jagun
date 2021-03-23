<?php
require_once('connection.php');
if(isset($_POST['submit'])){
    $id =$msg = "";
    $app = mysqli_real_escape_string($link, $_GET['app']) ;
    $id = mysqli_real_escape_string($link, 1) ;
    
        $sql = "UPDATE stories
                  SET approved = '$id'
                  WHERE stories_id = '$app'";
  
          if($res=mysqli_query($link, $sql)){?>
          <script>
              alert('Story Approved');
          </script>
          <?php
      }
    
     
    
    }
$id= mysqli_real_escape_string($link, 0);
        $sql = "Select * from stories where approved='$id'";
        $result = mysqli_query($link, $sql);
      if($result===0){
        die('Selection failed');
      }else{
        while($rows = mysqli_fetch_object($result)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <link rel="stylesheet" href="style.css">
              <link rel="stylesheet" href="style1.css"> 
              <title>Approve</title>
            </head>
            <body>
            <form action="approve.php?app=<?php echo $rows->stories_id; ?>" method="post">
          <img src="upload/<?php echo $rows->image; ?>" alt=""  width="400px" height="350"><br><br>
          <a href="content.php?id=<?php echo $rows->stories_id; ?>"><h2><?php echo $rows->title; ?></h2></a>
          <p><i>Created at: <?php echo $rows->created_at; ?></i></p><br><br>
          <button name="submit">APPROVE</button>
         
          <p><small><a href="stories_edit.php?id=<?php echo $rows->stories_id; ?>"><h2>Edit</h2></a></small></p>
          <p><small><a href="stories_del.php?id=<?php echo $rows->stories_id; ?>"><h2>Delete</h2></a></small></p>
    </form>
    <div class="column">
     
    </div>
            </body>
            </html>
    

    <?php
        }
      }