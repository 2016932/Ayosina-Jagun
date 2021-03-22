<?php
session_start();
require_once('connection.php');
// $_SESSION['stud'] = $_GET['stud'];
// $stud = mysqli_real_escape_string($conn, trim($_SESSION['stud']));
$feedback = mysqli_real_escape_string($conn, trim($_GET['feedback']));
include_once('stud_bar.php');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 mt-3">Welcome Student</h1>
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Group 4</button>
          </div>
    </div>
    </main>

    
    <div class="container">
          <div class="row">
          <a onclick="history.back()" class="btn btn-primary my-4">Back</a>
          <?php
            $sql="Select * from feedback INNER JOIN file_tblfile WHERE feedback.id = '$feedback'  AND feedback.id=file_tblfile.feedback_id ";
            $result=mysqli_query($conn, $sql);
            if($result === false){
              die("Insert failed".mysqli_error($conn));
            }
        else{
              while($rows = mysqli_fetch_array($result)){
                ?>
          </div>
          <div class="row">
          
                <h5><?php echo $rows[1];?></h5>
                </div>
                <p><?php echo $rows[2];?></p>
                <br><br>
                <div class="row">
                <p><small><i>Created at:<?php echo $rows[4];?></i></small></p>
                </div>
          </div>
                
                <?php
              }
            }
          ?>