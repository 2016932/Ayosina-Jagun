<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notes</title>
    <link rel="stylesheet" href="notes.css">
    <link rel="manifest" href="details.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

<br />
<h4>Notes</h4>

<ul class="list">
    <div contenteditable>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>

    </div>
</ul>


<button id="save">Click to Save</button>


 
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
$id = mysqli_real_escape_string($db, $_GET) ;
      $sql = "Select * from notes where users_id = '$id'";
      $result = mysqli_query($db, $sql);
      if($result===0){
        die('Selection failed');
      }else{
        while($rows = mysqli_fetch_object($result)){}
      }
            ?>


<?php
if(isset($_POST['save'])){
  $content =mysqli_real_escape_string($db, $_POST['content']);
  $sql= "Insert into notes(users_id, content) Values('$id', '$content')";
  if(mysqli_query($db, $sql)){
      $msg = "saved";
  }else{
    $msg = "not saved";
  }
}
  
?>

<?php

$sql = "Select * from notes where users_id = '$id' order by created_at";
      $res = mysqli_query($db, $sql);
      if(mysqli_num_rows($res)==0){
        echo "Not Saved";
      }else{
        while($row = mysqli_fetch_object($res)){
            ?>
            
           
            <p><?php echo  $row->content; ?></p>
            <hr class=>
            <?php
        }
      }
        ?>

</body>
</html>

</body>

</html>