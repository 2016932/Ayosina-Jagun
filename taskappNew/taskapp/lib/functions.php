<?php
    // session_start();
    /**
     * Function to calculate the founded year to current year
     */
    function copyright()
    {
        $devDate    = 2015;
        $currDate   = date('Y');
        if($devDate < $currDate){
            echo "Copyright &copy; {$devDate} - {$currDate}";
        }else{
            echo "Copyright &copy; {$currDate} ";
        }
    }

    /**
     * Function to clean the data you are collecting from the user
     */
    function cleanData($data)
    {
        return htmlspecialchars(trim($data));
    }

    /**
     * Function to hash collected password
     */
    function hashPwd($data)
    {
        return password_hash($data, PASSWORD_DEFAULT);
    }

    /**
     * Redirect to any page
     */
    function redirect_to($data, $statement)
    {
        return header("Location: $data?$statement");
    }

    /**
     * display all the task information available in the database table
     */
    function display_tasks()
    {
        include "conn.php";
        $userid= $_SESSION['id'];
        $sql= "SELECT * FROM tasks WHERE userid= '$userid' AND deleted= 0 ORDER BY id DESC";
        $result= mysqli_query($conn, $sql);
        
        $tasks= [];
        while($task= mysqli_fetch_assoc($result))
        {
            array_push($tasks, $task);
        }
        return $tasks;
    }

    /**
     * select all tasks available in the tasks table
     */
    function totalNoOfTasks()
    {
        include "conn.php";
        $userid= $_SESSION['id'];
        $sql= "SELECT * FROM tasks WHERE userid= '$userid' AND deleted= 0";
        $result= mysqli_query($conn, $sql);
        
        $total= mysqli_num_rows($result);
        return $total;
    }

    /**
     * select the newest task in the database table
     */
    function displayNewEvent()
    {
        include "conn.php";
        $userid= $_SESSION['id'];
        $sql= "SELECT * FROM tasks WHERE userid= '$userid' AND deleted= 0 ORDER BY id DESC LIMIT 1";
        $result= mysqli_query($conn, $sql);
        
        $newTasks= [];
        while($task= mysqli_fetch_assoc($result))
        {
            array_push($newTasks, $task);
        }
        return $newTasks;
    }

    // function displayTodayWork()
    // {
    //     include "conn.php";
    //     $currDate= date('Y');
    //     $sql= "SELECT * FROM tasks WHERE start_date <= $currDate";
    //     $result= mysqli_query($conn, $sql);

    //     $totalToday= mysqli_num_rows($result);
    //     return $totalToday;
    // }

    /**
     * select all deleted users from a particular table
     */
    function display_deleted_users($table_name)
    {
        include "conn.php";
        $userid= $_SESSION['id'];
        $sql= "SELECT * FROM $table_name WHERE userid= '$userid' AND deleted= 1 ORDER BY adminID DESC";
        $result= mysqli_query($conn, $sql);
        
        $admins= [];
        while($admin= mysqli_fetch_assoc($result))
        {
            array_push($admins, $admin);
        }
        return $admins;
    }
?>