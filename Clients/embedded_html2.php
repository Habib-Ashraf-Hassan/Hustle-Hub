<!DOCTYPE html>
            <html>
            <head>
                <title>Review - HUSTLE HUB</title>
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
                    color: bisque;
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

            </script>

            </head>

            <!------ Include the above in your HEAD tag ---------->
            <body>
                <!-- Navigation bar-->
            <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav" >
                <div class="container">

                    <a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;color: goldenrod;">
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
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown" style="margin-right: -100px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-family: 'IBM Plex Sans', sans-serif;">
                            <h5><?php echo $client_name; ?></h5>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#updateprofile"><i class="fa fa-user"></i> &nbsp;Profile</a>
                                <a class="dropdown-item" href="#placeFeedback"><i class="fa fa-comments"></i> &nbsp;Feedback</a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="delete_account.php" onsubmit="return confirm('Are you sure you want to delete this account?');">
                                    <button type="submit" class="dropdown-item" name="deleteAccount">
                                        <i class="fa fa-trash"></i>&nbsp; Delete
                                    </button>
                                </form>

                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> &nbsp;Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                
                </div>
            </nav>

            <div class="container">
                    <a href="index.php"
                    class="btn btn-dark">Go Back</a>
                
                <div class="card" id="placerate" style="font-family: 'IBM Plex Sans', sans-serif; max-width: 40%; margin: 100px auto; border-radius: 10px; border: 1px solid #ccc;">
                    <div class="card-body">
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
                        <center>
                            <i class="fa fa-star fa-3x"></i>
                            <h3 style="margin-top: 2%">Rate The technician</h3><br>
                            <form method="post" action="rateact.php">
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <!-- <label for="feedback"></label>
                                            <textarea class="form-control" name="feedback" id="feedback" rows="8" maxlength="1600" placeholder="Enter your Feedback here (max 400 words)" required></textarea> -->
                                            <div class="col-md-8">
                                            
                                            
                                            <input type="text"
                                                value="<?=$tid?>"
                                                name="tid"
                                                hidden>

                                            
                                            <div class="form-group">
                                                <label for="review">Rate *</label>
                                                <input type="number" min="1" max="5" class="form-control" name="review" id="review" required/> out of 5
                                            </div>
                                            </div>
                                        <div class="form-group text-center">
                                            <input type="submit" class="btnRegister" name="clientReview" value="Submit"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </center>
                    </div>
                </div>
                
            </div>

            <div class="card" id="updateprofile" style="font-family: 'IBM Plex Sans', sans-serif; max-width: 75%; margin: 0 auto; border-radius: 10px;display:block;">
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
              <h3 style="margin-top: 2%">Your Profile</h3><br>
                <form method="post" action="clientupdate.php">
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Full Name *</label>
                                <input type="text" class="form-control" name="fname" id="fname" onkeydown="return alphaOnly(event);" value="<?=$fullname?>"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email *</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?=$email?>"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control" id="password" name="password" onkeyup='check();' required/>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender *</label>
                                <input type="text" class="form-control" name="gender" id="gender" value="<?=$gender?>"/>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uname">Username *</label>
                                <input type="text" class="form-control" name="uname" id="uname" onkeydown="return alphaOnly(event);" value="<?=$username?>" />
                            </div>
                            <div class="form-group">
                                <label for="contact">Your Phone *</label>
                                <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" id="contact" value="<?=$phone?>"/>
                            </div>
                            <div class="form-group">
                                <label for="cpassword">Confirm Password *</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" onkeyup='check();' required/><span id='message'></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnRegister" name="clientUpdate" value="Update"/>
                            </div>
                        </div>
                    </div>
                </form>

            </center>
            </div>
        </div>

        <div class="card" id="placeFeedback" style="font-family: 'IBM Plex Sans', sans-serif; max-width: 60%; margin: 75px auto; border-radius: 10px;display:block;">
            <div class="card-body">
              <center>
                <?php if (isset($_GET['ferror'])) { ?>
                <div class="alert alert-danger" role="alert">
                <?=$_GET['ferror']?>
                </div>
                <?php } ?>

                <?php if (isset($_GET['fsuccess'])) { ?>
                <div class="alert alert-success" role="alert">
                <?=$_GET['fsuccess']?>
                </div>
                <?php } ?>
              <i class="fa fa-comments fa-3x"></i>
              <h3 style="margin-top: 2%">Feedback Section</h3><br>
                <form method="post" action="clientfeedback.php">
                    <div class="row register-form">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label for="feedback"></label>
                                <textarea class="form-control" name="feedback" id="feedback" rows="8" maxlength="1600" placeholder="Enter your Feedback here (max 400 words)" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btnRegister" name="clientFeedback" value="Submit"/>
                            </div>
                        </div>
                    </div>
                </form>


            </center>
            </div>
          </div>



            </body>
            </html>