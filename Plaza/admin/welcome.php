<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plaza- Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<?php 
        if(isset($_SESSION['status']))
        {
        
            if($_SESSION['status'] == "success")
            {
?> 
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>success!</strong> reservation deleted
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php  
            }
            else if($_SESSION['status'] == "confirm")
            {
?>             
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>success! </strong>reservation confirmed
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php        }
              else 
              {
?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>semthing wrong! </strong>reservation not confirmed
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php         }
          unset ($_SESSION['status']);
        } 
?>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>Welcome in Plaza Dashboard</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    <!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="clients-tab" data-toggle="tab" href="#clients" role="tab" aria-controls="clients" aria-selected="true">Clients</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="rooms-tab" data-toggle="tab" href="#rooms" role="tab" aria-controls="rooms" aria-selected="false">Rooms</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categories</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="reservations-tab" data-toggle="tab" href="#reservations" role="tab" aria-controls="reservations" aria-selected="false">reservations</a>
  </li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="clients" role="tabpanel" aria-labelledby="clients-tab">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">CIN</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Tele</th>
          <th scope="col">E-mail</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
          require_once('../includes/connect.php');
          // Check connection
          $result = mysqli_query($con,"SELECT * FROM clients");
          while($row = mysqli_fetch_array($result))
          {
          echo "<tr>";
          echo "<td>" . $row['CIN'] . "</td>";
          echo "<td>" . $row['FIRST_NAME'] . "</td>";
          echo "<td>" . $row['LAST_NAME'] . "</td>";
          echo "<td>" . $row['GENDER'] . "</td>";
          echo "<td>" . $row['TELE'] . "</td>";
          echo "<td>" . $row['EMAIL'] . "</td>";
          echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

  <div class="tab-pane" id="rooms" role="tabpanel" aria-labelledby="rooms-tab">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Room Number</th>
            <th scope="col">Room Phone</th>
            <th scope="col">Room Categorie</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $result1 = mysqli_query($con,"SELECT * FROM rooms  order by ETAT desc");
            while($row1 = mysqli_fetch_array($result1))
            {
            echo "<tr>";
            echo "<td>" . $row1['NUMERO'] . "</td>";
            echo "<td>" . $row1['TELE_ROOM'] . "</td>";
            echo "<td>" . $row1['ID_CAT'] . "</td>";
            echo "<td>" . $row1['ETAT'] . "</td>";
            echo "</tr>";
            }
          ?>
        </tbody>
    </table>
  </div>
  <div class="tab-pane" id="categories" role="tabpanel" aria-labelledby="categories-tab">
  <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Categorie Name</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $result1 = mysqli_query($con,"SELECT * FROM categories");
            while($row1 = mysqli_fetch_array($result1))
            {
            echo "<tr>";
            echo "<td>" . $row1['ID_CAT'] . "</td>";
            echo "<td>" . $row1['NAME'] . "</td>";
            echo "</tr>";
            }
          ?>
        </tbody>
    </table>
  </div>
  <div class="tab-pane" id="reservations" role="tabpanel" aria-labelledby="reservations-tab">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Check-in date</th>
            <th scope="col">Client Cin</th>
            <th scope="col">Room Reserved</th>
            <th scope="col">Room Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $result1 = mysqli_query($con,"SELECT ID,CHEK_IN_DT,CIN,ETAT,NUM_ROOM FROM reservations inner join rooms on rooms.NUMERO = reservations.NUM_ROOM ");
            while($row1 = mysqli_fetch_array($result1))
            {
            echo "<tr>";
            echo "<td>" . $row1['ID'] . "</td>";
            echo "<td>" . $row1['CHEK_IN_DT'] . "</td>";
            echo "<td>" . $row1['CIN'] . "</td>";
            echo "<td>" . $row1['NUM_ROOM'] . "</td>";
            echo "<td>" . $row1['ETAT'] . "</td>";
            echo "<td>";
            echo '<form action="delete_reservation.php" method="post" class = "d-inline"><button type="submit" class="btn btn-danger mx-3" name = "btn_get" >Delete</button><input type="hidden" name = "get_id" value = "'.$row1['ID'].'"/></form>';
            echo '<form action="confirm_reservation.php" method="post" class = "d-inline"><button type="submit"  class="btn btn-success mx-3" name = "btn_get" >Confirm</button><input type="hidden" name = "get_id" value = "'.$row1['NUM_ROOM'].'"/></form>';
            echo "</td>";
            echo "</tr>";
            }
            mysqli_close($con);
          ?>
        </tbody>
      </table>
  </div>
</div>
<!-- scripts -->
<script>
setTimeout(function(){
  $(".alert").alert('close')
},3000);
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>