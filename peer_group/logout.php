<?php
session_start();
//var_dump($_SESSION);
if(isset($_SESSION['stud'])){
    session_unset();
    session_destroy();
//var_dump($_SESSION);
    header('Location: login.php');
}else{
    
    session_unset();
    session_destroy();
//var_dump($_SESSION);
    header('Location: index.php');
}
?>