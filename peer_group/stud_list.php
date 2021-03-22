<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);
$admin_id = mysqli_real_escape_string($conn, $_SESSION['id']);

$sql="Select * from students INNER JOIN groups where students.group_id = groups.id AND groups.admin_id='$admin_id' order by id asc";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
        include('header.php');
        echo "
        <div class='container'>
            <div class='row jumbotron text-center'>
                <h1>No Student Created or added to group yet
            </div>
        </div>";
        
    }
    else{
        include('header.php'); // imports the header.php file
        ?> 
    <div class="container">
    <a onclick="history.back()" class="btn btn-primary">Back</a>
    <div class="lead">Student in Groups created by <?php echo $_SESSION['user'];?></div>
    
        <div class="row bg-secondary text-white">
        <div class="col-1 ">Student No.</div>
            <div class="col-2">Firstame</div>
            <div class="col-2">Lastname</div>
            <div class="col-2">Email</div> 
            <div class="col-1">Group Id</div> 
            <div class="col-2">Group name</div>
            <div class="col-1"></div> 
            <div class="col-1"></div>   
        </div>
        <?php
        while($row = mysqli_fetch_object($result)){
        ?>
   
        <div class="row bg-light py-4">
            <div class="col-1 "><?php  echo $row->matricnumber;?></div>
            <div class="col-2"><?php  echo $row->firstname; ?></div>
            <div class="col-2"><?php  echo $row->lastname; ?></div>
            <div class="col-2"><?php  echo $row->email; ?></div>
            <div class="col-1"><?php  echo $row->group_id; ?></div>
            <div class="col-2"><?php  echo $row->name; ?></div>
            <div class="col-1"><a href="stud_edit.php?edit=<?php echo $row->matricnumber;?>" class="btn btn-info">Edit</a></div> 
            <div class="col-1 px-1"><a href="stud_list.php?del=<?php echo $row->matricnumber;?>" class="btn btn-danger" >Delete</a></div> 
        </div>
        <?php
        }
        ?>

<!-- The Delete Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content text-center">
    
    <p class="lead">Are you sure you want to delete this Student</p>
    <div class="row">
    <div class="col-6 text-right"><a  href="stud_list.php?del_id=<?php echo $_GET['del']?>" class="btn btn-danger">Yes</a></div>
    <div class="col-6 text-left"><a  class="btn btn-warning shut">No</a></div>
    </div>
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');
var anodamodal = document.getElementById('anodaModal');

function Deletemodal(){
    modal.style.display = "block";
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("shut")[0];



// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php
        
    }

if(isset($_GET['del'])){
    ?>
     <!-- Trigger/Open The Modal -->
    <script>
    Deletemodal();
    </script>
    <?php
}
if(isset($_GET['del_id'])){
    $id = mysqli_real_escape_string($conn, $_GET['del_id']);
    $sql= "DELETE FROM students WHERE matricnumber ='$id'";
    mysqli_query($conn, $sql);
     if(mysqli_affected_rows($conn)==0){
         die('Could not delete'.mysqli_error($conn));
        ?>
         <script>
        alert("Error deleting Student data");
        </script> 
         <?php
        }else{
        ?>  <script>
        alert("Student data deleted");
        </script>
        <?php 
        header('location: stud_list.php');  
    }
}
?>