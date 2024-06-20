<?php
session_start();
// Check if the user is logged in
if(isset($_SESSION['fname'])){
    // $username = $_SESSION['username'];
    $cid = $_SESSION['cid'];
    // $email = $_SESSION['email'];
    // $phone = $_SESSION['contact'];
    // $gender = $_SESSION['gender'];
    // $fullname = $_SESSION['fname'];
    include "../DB_connection.php";
    include "Data/technicians.php";
    include "Data/clients.php";
    $clients = getclientById($cid, $conn);
    $jobs = getAllJobsByClientID($conn, $cid);

    $username = $clients['username'];
    $email = $clients['email'];
    $phone = $clients['phone'];
    $gender = $clients['gender'];
    $fullname = $clients['fullname'];


    $electricians = getAllRankedElectricianTechnicians($conn);
    $carpenters = getAllRankedCarpenterTechnicians($conn);
    $plumbers = getAllRankedPlumbersTechnicians($conn);
    $laundrys = getAllRankedLaundryTechnicians($conn);
    $movers = getAllRankedMoverTechnicians($conn);

} else {
    // Redirect the user to the login page if not logged in
    header("Location:../index.html");
    exit(); // Ensure that no other code is executed after redirection
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Client - HUSTLE HUB</title>
	<!-- <link rel="shortcut icon" type="image/x-icon" href="logos/H_gold_logo.png" /> -->
    <link rel="shortcut icon" type="image/x-icon" href="../logos/H_logo_new.png" />
    <link rel="stylesheet" href="../CSS/clientstyle2.css">    
<link rel="stylesheet" type="text/css" href="../CSS/client_style.css">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<style >
    #myTab{
        margin:0 auto;
    }
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
        text-decoration: none; /*Remove underline*/
    }

    
    .sub-div {
        /* Your existing styles */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.3s, border-color 0.3s; /* Smooth transition for background and border color */
    }
    .sub-div2{
    background-color: bisque;
    border: 1px solid #ccc;
    border-radius: 30px;
    width:80%;
    margin: 20px;
    padding: 5px;
    }
    .info2{
        font-size: 14px; /* Adjust font size as needed */
        width: 800px;
    }

    .sub-div:hover {
        /*background-color: white; /*Change background color to white on hover */
        /* border-color: red;Change border color to green on hover */
        /* box-shadow: 4px 4px 4px rgba(60, 60, 93, 0.33); */
        box-shadow: 0px 0px 10px rgba(0, 0,0, 0.2);
        transform:scale(1.05);
    }
    .sub-div:hover .content{
        color:#000;
        text-decoration:none;
    }
    .sub-div2 {
        /* Your existing styles */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.3s, border-color 0.3s; /* Smooth transition for background and border color */
        width:100%;
        transition:box-shadow 0.3s ease-in-out;
    }
    .sub-div2 .info2{
        /* border:1px solid red; */
        width:80%;
        margin:auto;
    }
    .sub-div2 .price_range{
        font-weight:bold;
    }
    .sub_div2 .rate_border{
        font-style:italic;
    }
    .sub-div2 .info2 p{ 
        text-align:left;
    }
    .sub-div2:hover {
        box-shadow: 0px 0px 10px rgba(0, 0,0, 0.2);
        transform:scale(1.05);
    }
    .sub-div2 .review{
        padding:5px 10px;
        background-color:#00563b;
        color:#fff;
        text-decoration:none;
    }
    .card{
        margin-top: 100px;
    }
    .review{
    background-color: rgb(5, 150, 5);
    color: black;
    border: 1px solid;
    border-radius: 10px;
    margin: 10px;
    padding: 5px;
    width: 150px;
    transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    .review:hover{
        background-color: greenyellow; /* Change background color on hover */
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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background: #00563b;box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);">
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
                <h5><?php echo $fullname; ?></h5>
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
  
  <div class="container register" style="font-family: 'IBM Plex Sans', sans-serif;">
    <div class="row">
        <div class="col-md-12 register-right text-center"> <!-- Changed col-md-9 to col-md-12 and removed register-left class -->
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="margin: 0 auto;"> <!-- Added margin: 0 auto; to center the nav-tabs -->
                <li class="nav-item">
                    <a class="nav-link active" id="carpenters-tab" data-toggle="tab" href="#carpenters" role="tab" aria-controls="carpenters" aria-selected="true">Carpenters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="electrician-tab" data-toggle="tab" href="#electrician" role="tab" aria-controls="electrician" aria-selected="false">Electrician</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="plumbers-tab" data-toggle="tab" href="#plumbers" role="tab" aria-controls="plumbers" aria-selected="false">Plumbers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="laundry-tab" data-toggle="tab" href="#laundry" role="tab" aria-controls="laundry" aria-selected="false">Laundry</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" id="movers-tab" data-toggle="tab" href="#movers" role="tab" aria-controls="movers" aria-selected="false">Movers</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="margin: bottom 50px;">
                <!-- <div class="tab-pane fade show active" id="carpenters" role="tabpanel" aria-labelledby="carpenters-tab">
                    
                    
                </div> -->
                
                <div class="tab-pane fade show active" id="carpenters" role="tabpanel" aria-labelledby="carpenters-tab">
                <?php
                    $i = 0;
                    foreach ($carpenters as $carpenter) {
                        $i++;
                        $data = base64_encode(json_encode([
                            'client_id' => $cid,
                            'client_name' => $fullname,
                            'clientcontact' => $phone,
                            'techfullname' => $carpenter['fullname'],
                            'profession' => $carpenter['profession'],
                            'technicianid' => $carpenter['technicianid'],
                            'techcontact' => $carpenter['phone'],
                            'ratings' => $carpenter['ratings']
                        ]));
                        ?>
                        <a  id="card-link" href="clientservice.php?data=<?= $data ?>">
                            <div class="sub-div">
                                <div class="info">
                                    <div class="client-card">
                                        <img src='<?= $carpenter['image_location'] ?>' alt="Technician">
                                        <div class="content">
                                        <h6 class="sub-div-headings">Name: <?= $carpenter['fullname'] ?></h6>
                                        <p>Profession: <?= $carpenter['profession'] ?></p>
                                        <p><?= $carpenter['jobdescription'] ?></p>
                                        <p>Availability: <span style="color: <?= ($carpenter['availability'] == 'Available') ? 'green' : 'red' ?>;"><?= $carpenter['availability'] ?></span></p>
                                        </div>
                                    </div>
                                    
                                    <div style="display: flex; justify-content: space-between;">
                                        <span class="price_range" style="color:blue;"><span class="rate_border">Phone:</span><?= $carpenter['phone'] ?></span>
                                        <span class="Ratings" style="color:blue;"><span class="rate_border">RATE:</span> <?= $carpenter['ratings'] ?></span>
                                    </div>
                                    <div style="display: flex; justify-content:center">
                                        <a href="reviews.php?tid=<?= $carpenter['technicianid']?>"><span class="review"> REVIEWS </span></a>
                                        
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </a>
                    <?php } ?>

                </div>
                
                
                

                
                <div class="tab-pane fade show" id="electrician" role="tabpanel" aria-labelledby="electrician-tab">
                <?php $i = 0; foreach ($electricians as $electrician ) { 
                    $i++;
                    $data = base64_encode(json_encode([
                        'client_id' => $cid,
                        'client_name' => $fullname,
                        'clientcontact' => $phone,
                        'techfullname' => $electrician['fullname'],
                        'profession' => $electrician['profession'],
                        'technicianid' => $electrician['technicianid'],
                        'techcontact' => $electrician['phone'],
                        'ratings' => $electrician['ratings']
                    ]));
                      ?>
                    <a id="card-link" href="clientservice.php?data=<?= $data ?>">
                    <div class="sub-div">
                        <div class="info">
                            <div class="client-card" style="display: flex; justify-content: space-between; @media (max-width: 440px) { flex-direction: column; }">
                                <img src="<?=$electrician["image_location"]?>" alt="Electrician"/>
                                <div class="content">
                                    <h6 class="sub-div-headings">Name: <?=$electrician['fullname']?></h6>
                                    <p>Profession: <?=$electrician['profession']?></p>
                                    <p><?=$electrician['jobdescription']?></p>
                                    <p>Availability: <span style="color: <?= ($electrician['availability'] == 'Available') ? 'green' : 'red' ?>;"><?= $electrician['availability'] ?></span></p>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-between;">
                                <span class="price_range" style="color:blue;"><span class="rate_border">Phone:</span><?=$electrician['phone']?></span>
                                <span class="Ratings" style="color:blue;"><span class="rate_border">RATE:</span> <?=$electrician['ratings']?></span>
                            </div>

                            <div style="display: flex; justify-content:center">
                                <a href="reviews.php?tid=<?= $electrician['technicianid']?>"><span class="review"> REVIEWS </span></a>
                            </div>
                            <br>
                        </div>
                    </div>
                </a>

                <?php } ?>
                    
                   
                </div>

                <div class="tab-pane fade show" id="laundry" role="tabpanel" aria-labelledby="laundry-tab">
                    
                    <?php $i = 0; foreach ($laundrys as $laundry ) { 
                        $i++;
                        $data = base64_encode(json_encode([
                            'client_id' => $cid,
                            'client_name' => $fullname,
                            'clientcontact' => $phone,
                            'techfullname' => $laundry['fullname'],
                            'profession' => $laundry['profession'],
                            'technicianid' => $laundry['technicianid'],
                            'techcontact' => $laundry['phone'],
                            'ratings' => $laundry['ratings']
                        ]));
                        ?>
                        <a  id="card-link" href="clientservice.php?data=<?= $data ?>">
                        <div class="sub-div">
                            <div class="info">
                                <div class="client-card">
                                    <img src="<?=$laundry['image_location']?>" alt="">
                                    <div class="content">
                                    <h6 class="sub-div-headings">Name: <?=$laundry['fullname']?></h6>
                                    <p>Profession: <?=$laundry['profession']?></p>
                                    <p><?=$laundry['jobdescription']?></p>
                                    <p>Availability: <span style="color: <?= ($laundry['availability'] == 'Available') ? 'green' : 'red' ?>;"><?= $laundry['availability'] ?></span></p>
                                    </div>
                                </div>
                                

                                <div style="display: flex; justify-content: space-between;">
                                    <span class="price_range" style="color:blue;"><span class="rate_border">Phone:</span><?=$laundry['phone']?></span>
                                    <span class="Ratings" style="color:blue;"><span class="rate_border">RATE:</span> <?=$laundry['ratings']?></span>
                                </div>
                                <div style="display: flex; justify-content:center">
                                        <a href="reviews.php?tid=<?= $laundry['technicianid']?>"><span class="review"> REVIEWS </span></a>
                                        
                                </div>
                                <br>
                                
                            </div>
                        </div>
                        </a>
                    <?php } ?>
                    
                    
                    
                </div>

                
                <div class="tab-pane fade show" id="movers" role="tabpanel" aria-labelledby="movers-tab">
                    <?php $i = 0; foreach ($movers as $mover ) { 
                            $i++;
                            $data = base64_encode(json_encode([
                                'client_id' => $cid,
                                'client_name' => $fullname,
                                'clientcontact' => $phone,
                                'techfullname' => $mover['fullname'],
                                'profession' => $mover['profession'],
                                'technicianid' => $mover['technicianid'],
                                'techcontact' => $mover['phone'],
                                'ratings' => $mover['ratings']
                            ]));
                             ?>
                        <a  id="card-link" href="clientservice.php?data=<?= $data ?>">
                        <div class="sub-div">
                                <div class="info">
                                    <div class="client-card">
                                        <img src="<?=$mover["image_location"]?>" alt="Mover">
                                        <div class="content">
                                        <h6 class="sub-div-headings">Name: <?=$mover['fullname']?></h6>
                                        <p>Profession: <?=$mover['profession']?></p>
                                        <p><?=$mover['jobdescription']?></p>
                                        <p>Availability: <span style="color: <?= ($mover['availability'] == 'Available') ? 'green' : 'red' ?>;"><?= $mover['availability'] ?></span></p>
                                        </div>
                                    </div>
                                    

                                    <div style="display: flex; justify-content: space-between;">
                                        <span class="price_range" style="color:blue;"><span class="rate_border">Phone:</span><?=$mover['phone']?></span>
                                        <span class="Ratings" style="color:blue;"><span class="rate_border">RATE:</span> <?=$mover['ratings']?></span>
                                    </div>

                                    <div style="display: flex; justify-content:center">
                                        <a href="reviews.php?tid=<?= $mover['technicianid']?>"><span class="review"> REVIEWS </span></a>
                                        
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                    
                    
                    
                </div>

                <div class="tab-pane fade show" id="services" role="tabpanel" aria-labelledby="services-tab">
                    <?php $i = 0; foreach ($jobs as $job ) { 
                            $i++;
                            $data = base64_encode(json_encode([
                                'client_id' => $cid,
                                'client_name' => $fullname,
                                'clientcontact' => $phone,
                                'techfullname' => $mover['fullname'],
                                'profession' => $mover['profession'],
                                'technicianid' => $mover['technicianid'],
                                'techcontact' => $mover['phone'],
                                'ratings' => $mover['ratings']
                            ]));
                             ?>
                        
                        <div class="sub-div2">
                                <div class="info2">
                                    <h5 class="sub-div-headings">Name: <?=$job['technicianname']?></h5>
                                    <p><b><u>Technician's Profession: </u></b><?=$job['techprofession']?></p>
                                    <p><b><u>Service: </u></b><?=$job['jobdesc']?></p>
                                    <p><b><u>Your Review: </u></b><?=$job['reviews']?></p>
                                    <div style="display: flex; justify-content: space-between;">
                                        <span class="price_range" style="color:blue;"><span class="rate_border">Contact:</span><?=$job['techniciancontact']?></span>
                                        <span class="Ratings" style="color: <?= ($job['status'] == 'Completed') ? 'green' : 'red' ?>;">
                                            <span class="rate_border">Status:</span> <?= $job['status'] ?>
                                        </span>

                                    </div>
                                    <div style="display: flex; justify-content:center; margin-top:20px">
                                        <a href="review.php?jid=<?= $job['jobid']?>"><span class="review"> REVIEW </span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="rate.php?tid=<?= $job['technicianid']?>"><span class="review"> RATE </span></a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        
                    <?php } ?>
                    
                    
                    
                </div>


                <div class="tab-pane fade show" id="plumbers" role="tabpanel" aria-labelledby="plumbers-tab">
                    <?php $i = 0; foreach ($plumbers as $plumber ) { 
                                $i++;
                                $data = base64_encode(json_encode([
                                    'client_id' => $cid,
                                    'client_name' => $fullname,
                                    'clientcontact' => $phone,
                                    'techfullname' => $plumber['fullname'],
                                    'profession' => $plumber['profession'],
                                    'technicianid' => $plumber['technicianid'],
                                    'techcontact' => $plumber['phone'],
                                    'ratings' => $plumber['ratings']
                                ]));  
                                ?>
                        <a  id="card-link" href="clientservice.php?data=<?= $data ?>">
                            <div class="sub-div">
                                    <div class="info">
                                        <div class="client-card">
                                            <img src="<?=$plumber["image_location"]?>" alt="Plumber">
                                            <div class="content">
                                            <h6 class="sub-div-headings">Name: <?=$plumber['fullname']?></h6>
                                            <p>Profession: <?=$plumber['profession']?></p>
                                            <p><?=$plumber['jobdescription']?></p>
                                            <p>Availability: <span style="color: <?= ($plumber['availability'] == 'Available') ? 'green' : 'red' ?>;"><?= $plumber['availability'] ?></span></p>

                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <span class="price_range" style="color:blue;"><span class="rate_border">Phone:</span><?=$plumber['phone']?></span>
                                            <span class="Ratings" style="color:blue;"><span class="rate_border">RATE:</span> <?=$plumber['ratings']?></span>
                                        </div>

                                        <div style="display: flex; justify-content:center">
                                        <a href="reviews.php?tid=<?= $plumber['technicianid']?>"><span class="review"> REVIEWS </span></a>
                                        
                                        </div>
                                        <br>
                                    </div>
                            </div>
                            </a>
                    <?php } ?>
                    
                </div>
            </div>

        </div>
    </div>
           
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </html>

  