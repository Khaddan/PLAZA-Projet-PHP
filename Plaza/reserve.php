<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_register.css">
    <title>Plaza - Reserve</title>
</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
<?php 
        if(isset($_SESSION['status']))
        {
        
            if($_SESSION['status'] == "fill all")
            {
?> 
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Oops!</strong> please fill all fields
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php  
            }
            else if ($_SESSION['status'] == "errordt")
            {
?>             
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Invalid check_in date ! </strong>try a new date or current date.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php       
            }
            else if ($_SESSION['status'] == "errorCli")
            {
?>             
                <div class="alert alert-danger alert-dismissible fade show" role="alert"style="position: absolute;top:0;width:100%;">
                    <strong>Oops!</strong>Invalid Cin or you are not a client try register first.<a class="text-danger" href="reserve.php">Register Now</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php       
            }
            else if ($_SESSION['status'] == "errorCham")
            {
?>             
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Sorry!</strong>all rooms in this categorie are unavailable now try a diffirent categories.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php       }
            else if ($_SESSION['status'] == "success")
                {
?>                  
                <div class="alert alert-primary alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Great!</strong>Your reservation has been successful visit us to confirm your reservation<a class="text-danger" href="index.php">Back to home</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php       }
            else
                {
?>                  
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>eror!</strong>error
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php 
                }
            
            unset ($_SESSION['status']);
            }
            ?>
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="row  h-100 justify-content-center align-items-center p-4 border-line"><a class="navbar-brand logo" href="index.php">Plaza</a><img src="images/plaza.png" class="img-fluid" ></div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <div class="row  px-3">
                            <h4><small class="font-weight-bold">You don't have an acount?  <a class="text-danger" href="register.php">Register Now</a></small></h4> 
                        </div>
                    </div>
                    <div class="mb-4 px-3">
                        <form action="includes/reservation.php" method="post" class="d-flex flex-column bd-highlight ">
							<legend>Reservation form</legend>
                                <div class="form-control">
                                    <select name="cat" id="cat_list" onChange="getRooms(this.value);" class="my-4 py-2 form-control" aria-label="Default select example" required>   
                                        <option selected disabled>choose a categorie </option>
                                        <?php 
                                            require_once('includes/connect.php');
                                            $query = "select * from categories";
                                            $do = mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($do))
                                            {
                                                echo '<option value="'.$row['ID_CAT'].'">'.$row['NAME'].'</option>';
                                            }
                                        ?>
                                    </select>
							        <div class="row px-3 py-2"> 
                                        <label class="mb-2" for="cin"><h6 class="mb-0 text-sm">CIN</h6></label>
                                        <input class="mb-4" type="text" id="cin" name="cin" maxlength="10" placeholder="EX: bk123" required> 
                                    </div>
                                    <label class="control-label mb-2" for="date"><h6 class="mb-0 text-sm">Check-in date </h6></label>
                                    <input class="form-control mb-4" id="checkin" name="checkin" placeholder="MM/DD/YYY hh:mm" type="datetime-local"/>
                                    <input type="submit" class="btn btn-warning font-weight-bold mt-5" value="Reserve" name="btn_reserve"/>
                                </div>
                        </form>
                    </div>
        </div>
    </div>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        setTimeout(function(){
        $(".alert").alert('close')
        },3000);
    </script>
</body>
</html>



