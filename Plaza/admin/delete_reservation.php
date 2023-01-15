<?php 
session_start();
 require_once('../includes/connect.php');

    if(isset($_POST['btn_get']))
    {
        $id = mysqli_real_escape_string($con, $_POST['get_id']);
        $query = "DELETE FROM reservations WHERE ID = $id ";
        $result = mysqli_query($con,$query);
        if($result)
        {   
            $_SESSION['status'] = "success";
            header("location: welcome.php");
        }
        else
        {
            $_SESSION['status'] = "cancel";
            header("location: welcome.php");
        }
    }
    mysqli_close($con);
?>