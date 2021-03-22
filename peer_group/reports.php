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
        ?> <a onclick="history.back()" class="btn btn-primary text-justify">Back</a>
        <div class="lead">Group created by <?php echo $_SESSION['user'];?></div>
    <div class="container">
<body class="">
        <div class="row bg-secondary text-white text-center">
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
            <div class="col-2"><a href="reports.php?view=<?php echo $row->id;?>" class="btn btn-secondary">View</a></div>     
        </div>
            <?php
        }
    }
?>
<!-- The View Modal -->
<div id="myModal" class="modal">
<p class="shut">x</p>
  <!-- Modal content -->
  <div class="modal-content text-center">
  <p class="lead">Total feedback for Group Coursework</p>
    <div class="row">
    
    
<?php
$grp_id = $_GET['view'];
$sql ="Select *, count(feedback.matricnumber) from  students INNER JOIN feedback WHERE students.group_id = '$grp_id' AND feedback.matricnumber= students.matricnumber ";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)==0){
  die("Query failed". mysqli_error($conn));
}else{?>
<div class="col-6 text-right">
<?php
   while($row=mysqli_fetch_array($result)){
       echo $row['1'] . " " . $row['2'];
   
    
    ?>
</div>
<div class="col-6 text-left">
<a href="reports_view.php?feedback=<?php echo $row['0'];?>"><?php echo $row['11']; ?></a>
    <?php
    }
}
?>

    
    
    
  

</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

function Viewmodal(){
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
        
    

if(isset($_GET['view'])){
    ?>
     <!-- Trigger/Open The Modal -->
    <script>
    Viewmodal();
    </script>
    <?php
}
?>