<?php
    require_once "lib/config.php";
    require_once "lib/conn.php";
    $info= array(
        'title'=> 'Task Web Application'
    );
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#2ba9ff" />
        
        <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
        <title><?= $info['title']; ?></title>

        <!-- animate css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- shortcut icon -->
        <link rel="shortcut icon" href="./pictures/icon.png" type="image/x-icon">
        
        <!-- jquery cdn -->
		<script src = "scripts/jquery-3.3.1.js" type = text/javascript></script>
        
        <!-- bootstrap css -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!--  validation.js script  -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
        
        <!--my style-->
        <link rel="stylesheet" type="text/css" href="styles/index.css">
    </head>

    
    <body>

    
        <!-- this is the header page -->
        <?php require "header.php";?>

        <!-- this is the mainBody page -->
        <?php require "main.php";?>

        <!-- typed.js -->

        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js" integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ==" crossorigin="anonymous"></script> -->

        <!-- my scripts file -->
         <script src="scripts/controller.js"></script>

         
    </body>
</html>