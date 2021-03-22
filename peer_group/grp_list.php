<?php
require_once('session_database.php');
/* To display all messages*/
ini_set('display_messages', 1);


$sql="Select * from groups order by id asc";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
        include('header.php');
        echo "
        <div class='container'>
            <div class='row jumbotron'>
                <h1>No Group Created yet
            </div>
        </div>";
    }
    else{
        include('header.php'); // imports the header.php file
        ?> 
        <div class="lead">Group created by <?php echo $_SESSION['user'];?></div>
    <div class="container">
    <a onclick="history.back()" class="btn btn-primary text-justify">Back</a>
<body class="text-center">
        <div class="row bg-secondary text-white">
            <div class="col-2 ">Group Id</div>
            <div class="col-3">Name</div>
            <div class="col-3">Student Count</div>
            <div class="col-2"></div>
            <div class="col-2"></div>
        </div>
        <?php
        while($row = mysqli_fetch_object($result)){
        ?>
   
        <div class="row bg-light py-4">
            <div class="col-2 "><?php  echo $row->id;?></div>
            <div class="col-3"><?php  echo $row->name; ?></div>
            
            <?php
            $stud_count=mysqli_real_escape_string($conn, $row->id);
            $count_sql ="Select count(distinct matricnumber) from groups INNER JOIN students WHERE students.group_id = '$stud_count'";
            $count=mysqli_query($conn, $count_sql);
            $count= mysqli_fetch_array($count);
            ?>
            <div class="col-3"><?php  echo $count[0]; ?></div>
            <div class="col-2"><a href="grp_edit.php?edit=<?php echo $row->id;?>" class="btn btn-info">Edit</a></div> 
            <div class="col-2"><a href="grp_list.php?del=<?php echo $row->id;?>" class="btn btn-danger">Delete</a></div>     
        </div>
            <?php
        }
    }
?>
<!-- The Delete Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content text-center">
    
    <p class="lead">Are you sure you want to delete this Group</p>
    <div class="row">
    <div class="col-6 text-right"><a  href="grp_list.php?del_id=<?php echo $_GET['del']?>" class="btn btn-danger">Yes</a></div>
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
    $sql= "DELETE FROM groups WHERE id ='$id'";
    mysqli_query($conn, $sql);
     if(mysqli_affected_rows($conn)==0){
         die('Could not delete'.mysqli_error($conn));
        ?>
         <script>
        alert("Error deleting Group data");
        </script> 
         <?php
        }else{
        ?>  <script>
        alert("Group data deleted");
        </script>
        <?php 
        header('location: grp_list.php');  
    }
}
?>