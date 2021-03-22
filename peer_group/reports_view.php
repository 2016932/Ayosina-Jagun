<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
include('header.php');?>
<a onclick="history.back()" class="btn btn-primary text-justify">Back</a>
<div class="container">
<?php
if(isset($_GET['feedback'])){
    $id = mysqli_real_escape_string($conn, $_GET['feedback']);
    $sql="Select * from feedback WHERE feedback.matricnumber = '$id' order by feedback.created_at  desc";
    $result = mysqli_query($conn, $sql);
     if(mysqli_num_rows($result)==0){
         die('Could not read'.mysqli_error($conn));
        }else{
                while($rows = mysqli_fetch_assoc($result)){
                  ?>
                  <div><h5><?php echo $rows["title"];?></h5>
                        <p><?php echo $rows["content"];?></p>
                      <p><small><i>Created at:<?php echo $rows["created_at"];?></i></small></p>
                  </div>
                  <hr>
                  <?php
                }
              }
            }
        ?>
    </div>