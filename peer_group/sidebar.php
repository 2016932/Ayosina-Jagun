
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Suleman AhmedRGU">
    <title>Peer Group Report Management</title>


    <!-- Bootstrap core CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

 
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <style>
      body{
    background-color: royalblue;
    margin:10px;
}
      .dropbtn {
    background-color: darkcyan;
    width:100%;
    color: white;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: static;
    display: block;
}


iframe{
  width:100%;
  height:100%;
}



/* Show the dropdown menu on hover */
.dropdown:hover  {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: lightsteelblue;
}
.nav-item{
  width: 100%;
  background:skyblue;
  margin: 10px auto;
}
    </style>
  </head>
  <body>
   <?php include_once('nav.php');?>
 
 
  
</nav>

<div class="container-fluid mt-5">
  <div class="row">
    <nav class="col-md-2 d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="admin.dashboard.php">
              <span data-feather="home"></span>
              Welcome <?php echo  $_SESSION['user'];?>
            </a>
          </li>
            <li class="nav-item "><a class="nav-link" href="">
            <div class="dropdown">
              <a class="dropbtn" href="admin_board.php?id=1">Admin</a>
            </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="">
            <div class="dropdown">
            <a class="dropbtn"  href="admin_board.php?id=2">Groups</a>
            </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="">
            <div class="dropdown">
            <a class="dropbtn" href="admin_board.php?id=5">Students</a >
            </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="">
            <div class="dropdown">
            <a class="dropbtn" href="admin_board.php?id=7 ">Reports</a>
            </div>
            </li>
           
              <p class="my-4">Copyright©Suleman 2021</p> 
      </div>
    </nav>