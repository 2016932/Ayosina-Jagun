<?php
    //start session here
    session_start();
    require_once "lib/conn.php";
    require_once "lib/config.php";

    if(isset($_POST['taskBtn']))
    {
        $taskname= $_POST['taskname'];
        $startdate= mysqli_real_escape_string($conn, $_POST['startdate']);
        $deadline= mysqli_real_escape_string($conn, $_POST['deadline']);
        $deleted= 0;
        $userid= $_SESSION['id'];

        $sql= "INSERT INTO tasks(taskname, start_date, deadline, deleted, userid)
                VALUES(?, ?, ?, ?, ?)
        ";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "notPrepared";
        }else{
            mysqli_stmt_bind_param($stmt, 'ssssi', $taskname, $startdate, $deadline, $deleted, $userid);
            mysqli_stmt_execute($stmt);
            echo "registered";
        }
    }
    /**
     * end of the task registration form controller
     */


     /**
      * Delete Unwanted tasks from the table
      */
    // if(isset($_POST['but_delete']))
    // {
    //     if(isset($_POST['checkbox'])){
    //         foreach($_POST['checkbox'] as $deleteid)
    //         {
    //             $deleteUser = "DELETE from tasks WHERE id=".$deleteid;
    //             mysqli_query($conn, $deleteUser);
    //         }
    //     }
    // }
    // redirect_to("index.php", "task deleted successfully");

    if(isset($_POST['but_delete']))
    {
        if(isset($_POST['checkbox'])){
            foreach($_POST['checkbox'] as $deleteid)
            {
                $deleteUser = "UPDATE tasks SET deleted = 1 WHERE id=".$deleteid;
                mysqli_query($conn, $deleteUser);
            }
        }
        redirect_to("homepage.php", "task deleted successfully");
    }
?>