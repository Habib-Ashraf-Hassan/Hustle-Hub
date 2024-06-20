<div class="card" id="updateprofile" style="font-family: 'IBM Plex Sans', sans-serif; max-width: 50%; margin: 75px auto; border-radius: 10px;display:block;">
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
                <form method="post" action="adminupdate.php">
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
                                <input type="text" class="form-control" name="uname" id="uname" onkeydown="return alphaOnly(event);" value="<?=$username?>" />
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
        <?php
session_start();
// Check if the user is logged in
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $aid = $_SESSION['aid'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['contact'];
    

} else {
    // Redirect the user to the login page if not logged in
    header("Location:../index.html");
    exit(); // Ensure that no other code is executed after redirection
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<link rel="shortcut icon" type="image/x-icon" href="../logos/H_logo_new.png" />

<style >
body {
    background: -webkit-linear-gradient(left, #00563b, #026344);
    background-size: cover;
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

</script>

<a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;color: goldenrod;">
            <img src="../logos/H_logo_new.png" alt="Hustle Hub Logo" style="display: inline-block; width: 30px; height: auto; vertical-align: middle; margin-right: 5px;">
            <h4 style="display: inline-block;">HUSTLE HUB</h4>
        </a>
        <tr>
                            <th>Full Name</th>
                            <th>User type</th>
                            <th>Contact</th>
                            <th>Message</th>
                        </tr>

                        <?php
session_start();
// Check if the user is logged in
if(isset($_SESSION['fullname'])){
    $profession = $_SESSION['profession'];
    $username = $_SESSION['username'];
    $tid = $_SESSION['tid'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['contact'];
    $gender = $_SESSION['gender'];
    $fullname = $_SESSION['fullname'];
    $profession = $_SESSION['profession'];
    $nid = $_SESSION['nid'];
    $desc = $_SESSION['desc'];

} else {
    // Redirect the user to the login page if not logged in
    header("Location:../index.html");
    exit(); // Ensure that no other code is executed after redirection
}
?>
include "../DB_connection.php";
    include "../Admin/Data/retrieve.php";
    $clients = getAllClients($conn);
    $technicians = getAllTechnicians($conn);
    $feedbacks = getAllFeedbacks($conn);
    $jobs = getAllJobs($conn);
    $sumclients = getTotalClients($conn);
    $sumtechnicians = getTotalTechnicians($conn);
    $sumfeedbacks = getTotalFeedbacks($conn);


    <div class="col-md-4" style="margin-top: 5%;right: 8%">
          <div class="card" style="font-family: 'IBM Plex Sans', sans-serif;">
            <div class="card-body">
              <center>
                
                <br>
              <h3 style="margin-top: 10%">Technician Application</h3><br>
              <form method="post" action="Technicians/techapprove.php">
                <div class="row register-form">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Full Name *" name="fname"  onkeydown="return alphaOnly(event);" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email *" name="email"  required/>
                        </div>
                        <!-- <div class="form-group">
                          <input type="text" class="form-control" placeholder="Paste your Portfolio or CV link *" id="cvlick" name="cvlick" required>
                        </div> -->
                        <div class="form-group">
                          <select class="form-control" id="profession" name="profession" required>
                              <option value="">Select Profession</option>
                              <option value="Carpenter">Carpenter</option>
                              <option value="Electrician">Electrician</option>
                              <option value="Plumber">Plumber</option>
                              <option value="Laundry">Laundry</option>
                              <option value="Mover">Mover</option>
                          </select>
                      </div>
                      
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" id="password" name="password" onkeyup='check();' required/>
                        </div>
                        
                        <!-- <div class="form-group">
                            <div class="maxl">
                                <label class="radio inline"> 
                                    <input type="radio" name="gender" value="Male" checked>
                                    <span> Male </span> 
                                </label>
                                <label class="radio inline"> 
                                    <input type="radio" name="gender" value="Female">
                                    <span>Female </span> 
                                </label>
                            </div>
                            <a href="index.html">Already have an account?</a>
                        </div> -->
                        
          
                        
                        <div class="maxl">
                          <label class="radio inline"> 
                              <input type="radio" name="gender" value="Male" checked>
                              <span> Male </span> 
                          </label>
                          <label class="radio inline"> 
                              <input type="radio" name="gender" value="Female">
                              <span>Female </span> 
                          </label>
                      </div>
                      <a href="index.html">Already have an account?</a>
                      
                      
                      
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username *" name="uname" onkeydown="return alphaOnly(event);" required/>
                        </div>
                        
                        <div class="form-group">
                            <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone *"  required/>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="National ID *" id="nid" name="nid" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Paste your Portfolio or CV link *" id="cvlink" name="cvlink" required>
                        </div>
                        <!-- <input type="submit" class="btnRegister" name="clientRegister" onclick="return checklen();" value="Register"/> -->
                        <div class="form-group">
                          <input type="submit" class="btnRegister" name="techRegister"  value="Apply"/>
                      </div>
                    </div>

                </div>
            </form>
            </center>
            <div class="form-group">
              Enter your details to submit request for applying as HUSTLE HUB technician, you shall then receive a reply via email...
            </div>
            </div>
          </div>
        </div>