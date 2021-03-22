<?php
  require_once('session_database.php');
    

  include_once('sidebar.php');
  ?>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 mt-3">Welcome Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">
          <?php
          $sql="Select * from admin where id='$_SESSION[id]'";
          $result=mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)==0){
            die("Query failed". mysqli_error($conn));
        }
        else{
          $row = mysqli_fetch_object($result);
          echo $row->coursework;
        } 
          ?>
          </button>
        </div>
      </div>
      </div>
    
      <?php
      if(isset($_GET['id']) && !empty($_GET['id'])){
        switch ($_GET['id']) {
          case '1':?>
            <iframe src="signup.php" frameborder="0"></iframe>
            <?php
            break;
          
          case '2':?>
            <iframe src="grp_add.php" frameborder="0"></iframe>
            <?php
            break;
          
          case '5':?>
            <iframe src="stud_add.php" frameborder="0"></iframe>
            <?php
            break;

          case '6':?>
            <iframe src="profile.php" frameborder="0"></iframe>
            <?php
            break;
          
            case '7':?>
              <iframe src="reports.php" frameborder="0"></iframe>
              <?php
              break;
          default:
            
            break;
        }
      }
      ?>
      
    </main>

     
</html>
