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
    <title>Plaza - Register</title>
</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
<?php 
        if(isset($_SESSION['status']))
        {
        
            if($_SESSION['status'] == "Oops!")
            {
?> 
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Oops!</strong> please fill all
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php  
            }
            else if ($_SESSION['status'] == "success")
            {
?>             
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Success!</strong>Your registration has been successful.<a class="text-danger" href="reserve.php">Reserve Now</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php       }
                else 
                {
?>                  
                <div class="alert alert-primary alert-dismissible fade show" role="alert" style="position: absolute;top:0;width:100%;">
                    <strong>Great!</strong>You alrady have an acount please <a class="text-danger" href="reserve.php">Reserve Now</a>
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
                            <h4><small class="font-weight-bold ">You  have an acount?  <a class="text-danger" href="reserve.php">Reserve Now</a></small></h4> 
                        </div>
                    </div>
                    <div class=" mb-4 px-3">
                        <form action="includes/process.php" method="post" class="d-flex flex-column bd-highlight ">
	                    	<legend>Client Information</legend>
	                    	<div class="row px-3"> 
                                <label class="mb-1" for="first_name"><h6 class="mb-0 text-sm">First Name</h6></label>
                                <input class="mb-2" type="text" id="first_name" name="first_name" maxlength="10" placeholder="First Name" autofocus required> 
                            </div>
                            <div class="row px-3"> 
                                <label class="mb-1" for="last_name"><h6 class="mb-0 text-sm">Last Name</h6></label>
                                <input class="mb-2" type="text" id="last_name" name="last_name" maxlength="10" placeholder="Last Name" required> 
                            </div>
                            <div class="row px-3"> 
                                <label class="mb-1" for="cin"><h6 class="mb-0 text-sm">CIN</h6></label>
                                <input class="mb-2" type="text" id="cin" name="cin" maxlength="10" placeholder="EX: bk123" required> 
                            </div>
                            <div class="row px-3"> 
                                <label class="mb-1" for="mail"><h6 class="mb-0 text-sm">Email Address</h6></label>
                                <input class="mb-2" type="email" id="mail" name="mail" maxlength="25" placeholder="Enter a valid email address" required> 
                            </div>
                            <div class="row px-3"> 
                                <label class="mb-1" for="phone"><h6 class="mb-0 text-sm">Phone</h6></label>
                                <input class="mb-2" type="tel" id="phone" name="phone" maxlength="10" minlength="10" placeholder="Enter a valid phone number" required> 
                            </div>
                            <div class="form-check-inline justify-content-center px-4">
                                <label class="form-check-label" for="gender1"><input class="form-check-input" type="radio" required name="gender" value="male" id="gender1"><strong>Male</strong></label>
                                <label class="form-check-label" for="gender2"><input class="form-check-input" type="radio" required name="gender" value="female" id="gender2"><strong>Female</strong></label>
                            </div>
                            <input type="submit" class="btn btn-success" value="Sign in" name="btn_submit"/>
                            <input type="reset" class="btn btn-danger my-2" value="Clear">
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




