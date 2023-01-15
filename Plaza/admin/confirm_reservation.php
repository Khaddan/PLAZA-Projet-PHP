<?php 
    session_start();
    require_once('../includes/connect.php');
   
       if(isset($_POST['btn_get']))
       {
           $id = mysqli_real_escape_string($con, $_POST['get_id']);
           $query = "UPDATE rooms SET ETAT = 'unavailable' WHERE NUMERO = $id ";
           $result = mysqli_query($con,$query);
           if($result)
           {   
               $_SESSION['status'] = "confirm";
               header("location: welcome.php");
           }
           else
           {
               $_SESSION['status'] = "unconfirm";
               header("location: welcome.php");
           }
       }
       mysqli_close($con);
?>