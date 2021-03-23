
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>content</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
<?php
 require_once('connection.php');
 $id =$msg = "";
$id = mysqli_real_escape_string($link, $_GET['id']) ;
      $sql = "Select * from stories where stories_id = '$id'";
      $result = mysqli_query($link, $sql);
      if($result===0){
        die('Selection failed');
      }else{
        while($rows = mysqli_fetch_object($result)){
            ?>
<h1><?php echo  $rows->title; ?></h1>
    <img src="upload/<?php echo  $rows->image; ?>" alt="<?php echo  $rows->image_text; ?>" class="center">


  <p><h3><?php echo  $rows->image_text; ?></h3></p>
  <?php
        }
      }
        ?>



<br><center>
<h1>Comments</h1>
  <?php echo $msg;?>
<form action="content.php?id=<?php echo $id?>" method="post">
  <input type="text" name="viewers" placeholder="Name"><br><br>
  <textarea name="comments" name="comments" placeholder="Leave A Reply" rows="10" cols="60" style="font-family:sans-serif;font-size:1.2em;">
</textarea><br>
<input type="submit" name="submit">
</form> 
</center>
<?php
if(isset($_POST['submit'])){
  $comments =mysqli_real_escape_string($link, $_POST['comments']);
  $viewers =mysqli_real_escape_string($link, $_POST['viewers']);
  $sql= "Insert into comments(stories_id, comments, viewers) Values('$id', '$comments', '$viewers')";
  if(mysqli_query($link, $sql)){
      $msg = "Comment sent";
  }else{
    $msg = "Comment not sent";
  }
}
  
?>

<?php

$sql = "Select * from comments where stories_id = '$id' order by created_at";
      $res = mysqli_query($link, $sql);
      if(mysqli_num_rows($res)==0){
        echo "No Comments";
      }else{
        while($row = mysqli_fetch_object($res)){
            ?>
            
            <h4><?php echo  $row->viewers; ?></h4>
            <p><?php echo  $row->comments; ?></p>
            <hr class=>
            <?php
        }
      }
        ?>

</body>
</html>