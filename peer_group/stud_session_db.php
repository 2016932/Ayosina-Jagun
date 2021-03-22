<?php
session_start();
  session_regenerate_id();
  
if(!isset($_SESSION['std_loggedin']) || $_SESSION['std_loggedin']!=true){
        header('location: login.php');
    }
  require_once('connection.php');
  ob_start();
  ?>