<?php
session_start();
// Check if the user is logged in
if(isset($_SESSION['username'])){
    // $username = $_SESSION['username'];
    include '../DB_connection.php';
    include "Data/retrieve.php";
    $aid = $_SESSION['aid'];
    // $email = $_SESSION['email'];
    // $phone = $_SESSION['contact'];
    $admin = getadminById($aid, $conn);
    $username = $admin['username'];
    $email = $admin['email'];
    $phone = $admin['phone'];
    $password = $admin['password'];

    

} else {
    // Redirect the user to the login page if not logged in
    header("Location:../index.html");
    exit(); // Ensure that no other code is executed after redirection
}
?>

<!-- HTML code to be embedded -->
<!DOCTYPE html>
            <html>
            <head>
                <title>Admin Profile - HUSTLE HUB</title>
                <!-- <link rel="shortcut icon" type="image/x-icon" href="logos/H_gold_logo.png" /> -->
                <link rel="shortcut icon" type="image/x-icon" href="../logos/H_logo_new.png" />
                
            <link rel="stylesheet" type="text/css" href="../CSS/client_style.css">
            <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
            <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

            <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




            <style >
                .form-control {
                border-radius: 0.75rem;
                }
                /* Change placeholder color to red */
                .form-control::placeholder {
                    color: brown;
                }
                h5{
                    color: goldenrod;
                }
                /* Styles for anchor tags */
                a {
                    color: inherit; /* Inherit color from parent */
                    text-decoration: none; /* Remove underline */
                }

                
                .sub-div {
                    /* Your existing styles */
                    cursor: pointer; /* Change cursor to pointer on hover */
                    transition: background-color 0.3s, border-color 0.3s; /* Smooth transition for background and border color */
                }

                .sub-div:hover {
                    background-color: white; /* Change background color to white on hover */
                    border-color: brown; /* Change border color to green on hover */
                }
                .card{
                    margin-top: 100px;
                }
                .profheader{
                    color: goldenrod;
                    font-size: 15px;
                }
                .custom-dropdown .dropdown-menu {
                margin-right: -100px;
                }

                .custom-dropdown {
                position: relative;
                display: inline-block;
                }

                .dropdown-toggle {
                    background-color: transparent;
                    border: none;
                    cursor: pointer;
                }

                .dropdown-menu {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 250px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                    margin-right: -100px;
                }

                .dropdown-menu a {
                    display: block;
                    padding: 6px 8px;
                    text-decoration: none;
                    color: #333;
                }

                .dropdown-menu a:hover {
                    background-color: #ddd;
                }

                .show {
                    display: block;
                }
                .form-control {
                border-radius: 0.75rem;
                }
                /* Change placeholder color to red */
                .form-control::placeholder {
                    color: brown;
                }

            </style>

            <script>
                var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('cpassword').value) {
                document.getElementById('message').style.color = '#5dd05d';
                document.getElementById('message').innerHTML = 'Matched';
            } else {
                document.getElementById('message').style.color = '#f55252';
                document.getElementById('message').innerHTML = 'Not Matching';
            }
            }

            function alphaOnly(event) {
            var key = event.keyCode;
            return ((key >= 65 && key <= 90) || key == 8 || key == 32);
            };

            function checklen()
            {
                var pass1 = document.getElementById("password");  
                if(pass1.value.length<6){  
                    alert("Password must be at least 6 characters long. Try again!");  
                    return false;  
            }  
            }
            function showUpdateProfile() {
                    document.getElementById("updateprofile").style.display = "block";
                }
                document.addEventListener("DOMContentLoaded", function() {
                var dropdownToggle = document.querySelector(".dropdown-toggle");
                var dropdownMenu = document.querySelector(".dropdown-menu");

                dropdownToggle.addEventListener("click", function() {
                    dropdownMenu.classList.toggle("show");
                });

                // Close the dropdown menu if the user clicks outside of it
                window.addEventListener("click", function(event) {
                    if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.remove("show");
                    }
                    });
                });

            </script>

            </head>

            <!------ Include the above in your HEAD tag ---------->
            <body>
                <!-- Navigation bar-->
            <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav" >
                <div class="container">

                    <a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin: left -50px;font-family: 'IBM Plex Sans', sans-serif;color: goldenrod;">
                        <img src="../logos/H_logo_new.png" alt="Hustle Hub Logo" style="display: inline-block; width: 30px; height: auto; vertical-align: middle; margin-right: 5px;">
                        <h4 style="display: inline-block;">HUSTLE HUB</h4>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="margin-right: -200px;">
                        <a class="nav-link js-scroll-trigger" href="" style="color: white;font-family: 'IBM Plex Sans', sans-serif;float: right;">
                            <a>
                                <h5>CLIENT NAME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i></h5>
                                
                            </a>
                    </li>
                    
                    </ul>
                </div> -->
                <!-- <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown" style="margin-right: -100px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-family: 'IBM Plex Sans', sans-serif;">
                            <h5>Admin</h5>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete this account?');">
                                    <button type="submit" class="dropdown-item" name="deleteAccount">
                                        <i class="fa fa-trash"></i>&nbsp; Delete
                                    </button>
                                </form>

                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> &nbsp;Logout</a>
                            </div>
                        </li>
                    </ul>
                </div> -->
                <div class="custom-dropdown" style="margin-right: -100px;">
                    <button class="dropdown-toggle"><h3 class="profheader">Admin</h3></button>
                    <div class="dropdown-menu">
                        <a href="profileupdate.php">
                            <i class="fa fa-user"></i> &nbsp;Profile
                        </a>
                        <a href="logout.php"><i class="fa fa-power-off"></i> &nbsp;Logout</a>
                    </div>
                </div>
                
                </div>
            </nav>

            <hr style="border-top: 1px solid lightblue;">

            <div class="container">
                    <a href="index.php"
                    class="btn btn-dark">Go Back</a>
                
                    <div class="card" id="updateprofile" style="font-family: 'IBM Plex Sans', sans-serif; max-width: 60%; margin: 75px auto; border-radius: 10px;display:block;">
                    <div class="card-body">
                    <center>
                        <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                        <?=$_GET['error']?>
                        </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                        <div class="alert alert-success" role="alert">
                        <?=$_GET['success']?>
                        </div>
                        <?php } ?>
                    <i class="fa fa-user fa-3x"></i>
                    <h3 style="margin-top: 2%">Admin Profile</h3><br>
                        <form method="post" action="adminupdate.php" onsubmit="return confirm('Are you sure you want to Update your profile?');">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?=$email?>"/>
                                    </div>
                                    
                                    <div class="form-group">
                                    <i class="fa fa-key fa-2x"></i>
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" onkeyup='check();' required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password *</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" onkeyup='check();' required/><span id='message'></span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="uname">Username *</label>
                                        <input type="text" class="form-control" name="uname" id="uname" value="<?=$username?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Your Phone *</label>
                                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" id="contact" value="<?=$phone?>"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" class="btnRegister" name="adminUpdate" value="Update"/>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </center>
                    </div>
                </div>
                
            </div>

            </body>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>

