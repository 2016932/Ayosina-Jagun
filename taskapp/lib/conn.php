<?php
    /**
     * This is the database connection file
     * @param $servername= "localhost"
     * @param $username= "root"
     * @param $password= ""
     * @param $dbname= "taskapp"
     */

    //declare the needed variables
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "taskapp";

    $conn=mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn)
    {
        die("Database not connected!");
    }
?>