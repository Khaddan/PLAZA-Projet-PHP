<?php
session_start();
require_once('connect.php');

if(isset($_POST['btn_reserve']))
{
	$type_room = mysqli_real_escape_string($con, $_POST['cat']);
    $cin =mysqli_real_escape_string($con, $_POST['cin']);
    $oldDate=mysqli_real_escape_string($con, $_POST['checkin']);
    $check_in = date("Y-m-d H:i:s",strtotime($oldDate));
    

	if(empty($type_room)|| empty($cin) || empty($oldDate))
	{
		$_SESSION['status'] = "fill all";
        header("Location: ../reserve.php");
	}
	else
	{   
        $result = mysqli_query($con,"select CIN from clients where CIN = '$cin' limit 1;");
        while($row = mysqli_fetch_array($result))
            {
                $cinCount = $row['CIN'];
            }
            
        //check cin
        //$result = mysqli_query($con,"select count(CIN) from clients where CIN = '$cin';");
	    //$total = mysqli_fetch_assoc($result);
        //$cinCount = $total['CIN'];

        if($cinCount == "")
	    {
            $_SESSION['status'] = "errorCli";
            header("Location: ../reserve.php");
        }
        else
        {
            // check check-in date
            if($check_in < date("Y-m-d H:i:s") || $check_in > date("Y-m-d H:i:s", strtotime('+2 days')) )
	        {
                $_SESSION['status'] = "errordt";
                header("Location: ../reserve.php");
            }
            else
            {
                //check rooms is available or not
                $result = mysqli_query($con,"select NUMERO from rooms where ETAT = 'available' and ID_CAT = '$type_room' limit 1 ;");
                while($row = mysqli_fetch_array($result))
                    {
                        $roomNumber = $row['NUMERO'];
                    }
                    
                if ($roomNumber > 0)
                {
                    mysqli_query($con,"insert into reservations (CHEK_IN_DT, CIN, NUM_ROOM) VALUES ('$check_in', '$cin',$roomNumber);");
                    $_SESSION['status'] = "success";
                    header("Location: ../reserve.php");
                }
                else
                {
                    $_SESSION['status'] = "errorCham";
                    header("Location: ../reserve.php");
                }
            }
        }
	}
}
$con->close();
?>