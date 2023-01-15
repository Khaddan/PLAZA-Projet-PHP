
<?php
session_start();
require_once('connect.php');


if(isset($_POST['btn_submit'])){

	$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $cin =mysqli_real_escape_string($con, $_POST['cin']);
    $email = mysqli_real_escape_string($con, $_POST['mail']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
	
	if(empty($first_name)|| empty($last_name)|| empty($cin)||empty($email)|| empty($phone) || empty($gender))
	{
		$_SESSION['status'] = "fill all";
		header("Location: ../register.php");
	}
	else
	{
		$sql = "INSERT INTO clients (CIN, FIRST_NAME, LAST_NAME, TELE, EMAIL, GENDER ) VALUES('$cin', '$first_name', '$last_name', '$phone', '$email', '$gender')";
		$result = mysqli_query($con,$sql);

		if($result>0)
		{
			$_SESSION['status'] = "success";
			header("Location: ../register.php");
		}
		else
		{
			$_SESSION['status'] = "great";
			header("Location: ../register.php");
		}
	}
}
$con->close();
?>