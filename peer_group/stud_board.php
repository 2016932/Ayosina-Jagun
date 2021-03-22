<?php
require_once('stud_session_db.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
  switch ($_GET['id']) {
    case '1':?>
      <iframe src="std_profile.php" frameborder="0"></iframe>
            <?php
            break;
     default:
        break;
  }
}
$stud = mysqli_real_escape_string($conn, trim($_SESSION['stud']));
$title = $feedback = $file = $message = "";
  include_once('stud_bar.php');
  ?>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 mt-3">Welcome Student</h1>
        <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">
          <?php
          $sql="Select * from students where matricnumber='$_SESSION[stud]'";

          $result=mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)==0){
            die("Query failed". mysqli_error($conn));
        }
        else{
          $row = mysqli_fetch_object($result);
          echo "Group " . $row->group_id;
        } 
          ?>
        </button>
          </div>
    </div>
    </main>
    <?php
          if(isset($_POST['submit'])){
            
            $title = mysqli_real_escape_string($conn, trim($_POST['title']));
            $feedback = mysqli_real_escape_string($conn, trim($_POST['feedback']));
            $files = mysqli_real_escape_string($conn, trim(rand(10000, 100000).'-'.$_FILES['files']['name']));
            $files_tmp = $_FILES['files']['tmp_name'];
            
            if(empty($title) || empty($feedback) || empty($files)){
              $message= " Fill in all details or add a file ";
            }
            $sql="INSERT INTO feedback(title, content, matricnumber) VALUES('$title', '$feedback', '$stud')";
            if($result=mysqli_query($conn, $sql)){
                if($result === false){
                  die("Insert failed".mysqli_error($conn));
                }
            else{
              $feedback_id =(mysqli_insert_id($conn));
              $upload_dir = 'uploads/'. $files;
              if(move_uploaded_file($files_tmp, $upload_dir)){
                $sqls="INSERT INTO file_tblfile VALUES(null, '$upload_dir', '$feedback_id' )";
                $res=mysqli_query($conn, $sqls);
                  if(mysqli_affected_rows($conn) === false){
                    die("Insert failed".mysqli_error  ($conn));
                }
               else{
                $message ="Feedback Submitted";
               }
          }
            }
            
            }
          }
          
        ?>
        <div class="container">
          <div class="row">
            <div class="col-8 jumbotron">
            <div class="lead text-center">Feedback form</div>
            <form action="stud_board.php?stud=<?php echo $_SESSION['stud'];?>" enctype="multipart/form-data" class="py-4" method="post">
            <?php echo $message;?>
              <input type="text" name="title" id="" class="form-control" placeholder="Enter feedback title"><br>
              <textarea id="" cols="50" rows="5" placeholder="Enter feedback" class="form-control" name="feedback"></textarea><br>
              <input type="file" name="files" class="form-control"><br>
              <input type="submit" name="submit" value="Submit Feedback" class="form-contol btn-primary">
              
            </form>
            </div>
            <div class="col-4 ">
            <b> Feedback reports </b> 
            <?php
              $sql="Select * from feedback INNER JOIN file_tblfile WHERE feedback.matricnumber = '$stud'  AND feedback.id=file_tblfile.feedback_id order by feedback.created_at  desc";
              $result=mysqli_query($conn, $sql);
              if($result === false){
                die("Select failed".mysqli_error($conn));
              }
          else{
                while($rows = mysqli_fetch_array($result)){
                  ?>
                  <div class="my-4 border border-primary px-2 py-1"><a href="stud_feed.php?feedback=<?php echo $rows[0];?>"><h5><?php echo $rows[1];?></h5></a>
                      <p><small><i>Created at:<?php echo $rows[4];?></i></small></p>
                  </div>
                  <hr>
                  <?php
                }
              }
                ?>
            </div>
          </div>
        </div>
        