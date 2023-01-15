<?php
require_once('connect.php');
if (! empty($_POST["cat_id"]) ) 
{
    

    $query = "select * from rooms where ETAT = 'available' and ID_CAT = '".$_POST["cat_id"]."';";
    $do = mysqli_query($con,$query);
    $count = mysqli_num_rows($do);
    if($count>0)
    {
        while($row = mysqli_fetch_array($do))
        {
            echo '<option value="'.$row['NUMERO'].'">'.$row['NUMERO'].'</option>';
        }
    }
    else
    {
        echo '<option>Not Rooms available in this categorie</option>';
    }
}
else
{
    echo '<h1>error</h1>';
}
?>

