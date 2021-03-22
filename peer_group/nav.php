<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"> PGRM</a>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
    <?php
    if(isset($_SESSION['loggedin'])){?>
      <a class="nav-link" href="admin_board.php?id=6">Settings </a>
  <?php
    }else{?>
    <a class="nav-link" href="stud_board.php?id=1">Settings </a>
  <?php
    }
      ?>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Log out </a>
      </li>
  </ul>
