<?php 
$con = mysqli_connect('localhost','root' , '' , 'gestion_hotelrie');
if ($con->connect_error) 
	{
	die("Connection failed: " . $conn->connect_error);
	}
?>