<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    iframe{
      width: 100%;
      height: 710px;
      border: none;
    }
    .nav{
      height: 710px;
      background:  #111;
      display:block;
      
    }
    .nav > a:link, a{
      font-size:33px;
    }
  </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-3 nav ">
                <a href="admin.php?id=2">Approve Stories</a><br>
                <a href="admin.php?id=4">REVIEW STORIES</a><br>
                <a href="logout.php">Logout</a>
            </div>
            <div class="col-9">
            <?php
      if(isset($_GET['id']) && !empty($_GET['id'])){
        switch ($_GET['id']) {
                    
          case '2':?>
            <iframe src="approve.php"></iframe>
            <?php
            break;
          
          case '4':?>
            <iframe src="review.php?id="></iframe>
            <?php
            break;
          default:
            
            break;
        }
      }
      ?>
        </div>
    </div>
</body>