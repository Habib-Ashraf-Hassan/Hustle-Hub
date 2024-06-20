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
    $ratings = $_SESSION['ratings'];

    include "../DB_connection.php";
    include "../Admin/Data/retrieve.php";
    include "Data/techs.php";
    $sumjobs = getTotalJobsByTechnicianID($conn, $tid);
    $sumcompletes = getTotalCompletedJobsByTechnicianID($conn, $tid);
    $sumincompletes = getTotalNotCompletedJobsByTechnicianID($conn, $tid);
    $jobs = getAllJobsByTechnicianID($conn, $tid);
    $completes = getCompletedJobsByTechnicianID($conn, $tid);
    $incompletes = getNotCompletedJobsByTechnicianID($conn, $tid);
    $reviews = getJobsWithReviewsByTechnicianID($conn, $tid);



    $sumjobs = getTotalJobsByTechnicianID($conn, $tid);
    $sumcompletes = getTotalCompletedJobsByTechnicianID($conn, $tid);
    $sumincompletes = getTotalNotCompletedJobsByTechnicianID($conn, $tid);
    

} else {
    // Redirect the user to the login page if not logged in
    header("Location:../index.html");
    exit(); // Ensure that no other code is executed after redirection
}
?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge"> 
    <meta name="viewport" 
          content="width=device-width,  
                   initial-scale=1.0"> 
    <title>Technician HustleHub</title> 
    <link rel="shortcut icon" type="image/x-icon" href="../logos/H_logo_new.png" />

    <link rel="stylesheet" 
          href="../Admin/style-dash.css"> 
    <link rel="stylesheet" 
          href="../Admin/responsive.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->



<style>
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
    .error, .success {
    color: white;
    font-size: 20px; /* Adjust font size as needed */
    width: 50%;
    margin: 10px auto; /* Center the div horizontally */
    padding: 20px; /* Add some padding for spacing */
    border: 1px solid; /* Add border */
    border-radius: 10px; /* Add curved borders */
    }

    .error {
        background-color: red; /* Red background for error */
    }

    .success {
        background-color: green; /* Green background for success */
    }

    
</style>
<script>
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

    function smoothScroll(event) {
        event.preventDefault();
        const targetId = event.currentTarget.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        window.scrollTo({
            top: targetElement.offsetTop,
            behavior: 'smooth'
        });
    }

</script>



</head> 
  
<body> 
    
    <!-- for header part -->
    <header> 
  
        <div class="logosec"> 
            <div class="logo">            
              <img src="../logos/H_logo_new.png" alt="Hustle Hub Logo" style="display: inline-block; width: 30px; height: auto; vertical-align: middle; margin-right: 5px;">
                HustleHub</div> 
            <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" 
                id="menuicn" 
                alt="menu-icon"> 
        </div> 
  
        <div class="searchbar"> 
          <h3> <?php echo $profession; ?> </h3>
            <!-- <input type="text" 
                   placeholder="Search"> 
            <div class="searchbtn"> 
              <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" 
                    alt="search-icon"> 
              </div>  -->
        </div> 
  
        <div class="message"> 
            <!-- <div class="circle"></div> 
            <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" 
                 class="icn" 
                 alt="">  -->

                 <!-- <div class="dp" id="profileDropdown">
                    <img src="" class="dpicn" alt="Admin">
                    <div class="dropdown-content" id="profileDropdownContent">
                        <a href="#">Profile</a>
                        <a href="#">Logout</a>
                    </div>
                </div> -->

                
                
        </div> 
        <div class="custom-dropdown">
            <button class="dropdown-toggle"><h5 class="profheader"><?php echo $username; ?></h5></button>
            <div class="dropdown-menu">
                <a href="techprofileupdate.php">
                    <i class="fa fa-user"></i> &nbsp;Profile
                </a>
                <a href="logout.php"><i class="fa fa-power-off"></i> &nbsp;Logout</a>
            </div>
        </div>
        
  
    </header> 
  
    <div class="main-container"> 
        <div class="navcontainer"> 
            <nav class="nav"> 
                <div class="nav-upper-options"> 
                    <!-- <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" 
                            alt="dashboard"> 
                        <h3> Dashboard</h3> 
                    </div>  -->
                    <div class="nav-option option1" onclick="showDashboard()">
                        <!-- <i class="fa fa-gauge fa-2x"></i> -->

                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard"> 
                        <h3> Dashboard</h3> 
                    </div>
  
                    <!-- <div class="option2 nav-option"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles"> 
                        <h3> Technicians</h3> 
                    </div>  -->
                    <div class="nav-option option2" onclick="showTechnicians()">
                        <i class="fa fa-bookmark fa-2x"></i>
                        <!-- <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img" alt="articles">  -->
                        <h3>  All Jobs</h3> 
                    </div>
                    
  
                    <div class="nav-option option3" onclick="showClients()"> 
                        <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report">  -->
                            <i class="fa fa-check fa-2x"></i>
                        <h3> Completed</h3> 
                    </div> 
  
                    <div class="nav-option option4" onclick="showapprovals()"> 
                        <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" 
                            alt="institution">  -->
                            <i class="fa fa-hourglass-half fa-2x"></i>
                        <h3> Incomplete</h3> 
                    </div> 
  
                    <div class="nav-option option5" onclick="showfeedbacks()">
                        <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" 
                            alt="blog">  -->
                        <i class="fa fa-star fa-2x"></i>
                        <h3> Ratings</h3> 
                    </div> 

                    
  
                </div> 
            </nav> 
        </div> 
        <div class="main"> 
  
            <div class="searchbar2"> 
                <input type="text" 
                       name="" 
                       id="" 
                       placeholder="Search"> 
                <div class="searchbtn"> 
                  <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                        class="icn srchicn" 
                        alt="search-button"> 
                  </div> 
            </div> 
  
            <div class="box-container" style="display: flex; justify-content: space-evenly; align-items: center; flex-wrap: wrap; gap: 50px;">  
                <div class="box box1">
                    <div class="text"> 
                    <h2 class="topic-heading"><?php echo $sumjobs; ?></h2> 
                    <h2 class="topic">Total Jobs</h2> 

                    </div> 
                    <i class="fa fa-bookmark fa-2x"></i>
                    <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
                        alt="Views">  -->
                </div> 
  
                <div class="box box2"> 
                    <div class="text"> 
                        <h2 class="topic-heading"><?php echo $sumcompletes; ?></h2> 
                        <h2 class="topic">Completed</h2> 
                    </div> 
                    <i class="fa fa-check fa-2x"></i>

                    <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png" 
                         alt="likes"> 
                </div>  -->
                </div>
  
                <div class="box box3"> 
                    <div class="text"> 
                        <h2 class="topic-heading"><?php echo $sumincompletes; ?></h2> 
                        <h2 class="topic">Incomplete</h2> 
                    </div> 
                    <i class="fa fa-hourglass-half fa-2x"></i>

                    <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
                        alt="comments">  -->
                </div> 
  
                <div class="box box4"> 
                    <div class="text"> 
                        <h2 class="topic-heading"><?php echo $ratings; ?></h2> 
                        <h2 class="topic">AVG Ratings</h2> 
                    </div> 
                    <i class="fa fa-star fa-2x"></i>

  
                    <!-- <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">  -->
                </div> 
            </div> 
  
            <div class="report-container"> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Reviews</h1> 
                    <!-- <button class="view">View All</button>  -->
                </div> 
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Contact</th>
                            <th>Service</th>
                            <th>Review</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($reviews != 0): ?>
                            <?php foreach ($reviews as $review): ?>
                            <tr>
                                <td><?php echo $review['clientname']; ?></td>
                                <td><?php echo $review['clientcontact']; ?></td>
                                <td><?php echo $review['jobdesc']; ?></td>
                                <td><?php echo $review['reviews']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" style="color: red;">No results found!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                

                

  
                <!-- <div class="report-body"> 
                    <div class="report-topic-heading"> 
                        <h3 class="t-op">Client Name</h3> 
                        <h3 class="t-op">Client Contact</h3> 
                        <h3 class="t-op">Technician Name</h3> 
                        <h3 class="t-op">Profession</h3>
                        <h3 class="t-op">Technician Contact</h3>
                        <h3 class="t-op">Job description</h3> 
                        <h3 class="t-op">Location</h3>   
                    </div> 
  
                    <div class="items"> 
                        <div class="item1"> 
                            <h3 class="t-op-nextlvl">Adan Ali> 
                            <h3 class="t-op-nextlvl">071567890</h3> 
                            <h3 class="t-op-nextlvl">Abdirahman Green</h3> 
                            <h3 class="t-op-nextlvl">Electrician</h3>
                            <h3 class="t-op-nextlvl">011098789</h3> 
                            <h3 class="t-op-nextlvl label-tag">Electrician</h3> 

                            <h3 class="t-op-nextlvl label-tag">Electrician</h3>  -->
                            <!-- <p t-op-nextlvl>Neat Gate C opposite Seasons restaurant</p>
                            <p t-op-nextlvl>My heater stopped functioning , it bought recently...</p>
                            <h3 class="t-op-nextlvl label-tag">Completed</h3> 



                            
                        </div>  -->
  
                        <!-- <div class="item1"> 
                            <h3 class="t-op-nextlvl">Adan Ali> 
                            <h3 class="t-op-nextlvl">071567890</h3> 
                            <h3 class="t-op-nextlvl">Abdirahman Green</h3> 
                            <h3 class="t-op-nextlvl">Electrician</h3>
                            <h3 class="t-op-nextlvl">011098789</h3>  -->
                            <!-- <h3 class="t-op-nextlvl label-tag">Electrician</h3> 

                            <h3 class="t-op-nextlvl label-tag">Electrician</h3>  -->
                            <!-- <p t-op-nextlvl>Neat Gate C opposite Seasons restaurant</p> -->
                            <!-- <p t-op-nextlvl>My heater stopped functioning , it bought recently...</p>
                            <h3 class="t-op-nextlvl label-tag">Completed</h3> 



                            
                        </div>  -->
  
                        
  
                        <!-- <div class="item1"> 
                            <h3 class="t-op-nextlvl">Article 66</h3> 
                            <h3 class="t-op-nextlvl">3.6k</h3> 
                            <h3 class="t-op-nextlvl">160</h3> 
                            <h3 class="t-op-nextlvl label-tag">Published</h3> 
                        </div> 
  
                        <div class="item1"> 
                            <h3 class="t-op-nextlvl">Article 65</h3> 
                            <h3 class="t-op-nextlvl">1.3k</h3> 
                            <h3 class="t-op-nextlvl">220</h3> 
                            <h3 class="t-op-nextlvl label-tag">Published</h3> 
                        </div>  -->
  
                    <!-- </div> 
                </div>  -->
                
                
            </div> 
            
            <div id="techniciansboard" style="display: none;">
                <center>
                    <!-- Content for Technicians goes here -->
                <h3>All Jobs Booked</h3>
                <!-- Add your content specific to Technicians here -->
                </center>
                <div class="report-header"> 
                    <h1 class="recent-Articles">View Jobs</h1> 
                    <!-- <button class="view">View All</button> -->
                </div>
                <div class="report-container-table">
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Contact</th>
                            <th>Service</th>
                            <th>Location</th>
                            <th>Status</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($jobs != 0): ?>
                            <?php foreach ($jobs as $job): ?>
                            <tr>
                                <td><?php echo $job['clientname']; ?></td>
                                <td><?php echo $job['clientcontact']; ?></td>
                                <td><?php echo $job['jobdesc']; ?></td>
                                <td><?php echo $job['clientlocation']; ?></td>
                                <td class="<?php echo $job['status'] == 'Completed' ? 'table-tag-complete' : 'table-tag-uncomplete'; ?>"><?php echo $job['status']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="color: red;">No results found!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                </div>
                
            </div>

            <div id="clientsboard" style="display: none;">
                <center>
                    <!-- Content for Technicians goes here -->
                <h3>Completed Jobs</h3>
                <!-- Add your content specific to Technicians here -->
                </center>
                <div class="report-header"> 
                    <h1 class="recent-Articles">View Completed</h1> 
                    <!-- <button class="view">View All</button> -->
                </div>
                <div class="report-container-table">
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Contact</th>
                            <th>Service</th>
                            <th>Location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($completes != 0): ?>
                            <?php foreach ($completes as $complete): ?>
                            <tr>
                                <td><?php echo $complete['clientname']; ?></td>
                                <td><?php echo $complete['clientcontact']; ?></td>
                                <td><?php echo $complete['jobdesc']; ?></td>
                                <td><?php echo $complete['clientlocation']; ?></td>
                                <td class="<?php echo $complete['status'] == 'Completed' ? 'table-tag-complete' : 'table-tag-uncomplete'; ?>"><?php echo $complete['status']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="color: red;">No results found!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                </div>
                
            </div>

            
            <div id="appprovalboard" style="display: none;">
                <center>
                    <!-- Content for Technicians goes here -->
                <h3>Incompleted Jobs</h3>
                <!-- Add your content specific to Technicians here -->
                </center>
                <div class="report-header"> 
                    <h1 class="recent-Articles">View Incompleted</h1> 
                    <!-- <button class="view">View All</button> -->
                </div>
                <div class="report-container-table">
                    <?php if (isset($_GET['error'])) { ?>
                    <div class="error">
                    <?=$_GET['error']?>
                    </div>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                    <div class="success">
                    <?=$_GET['success']?>
                    </div>
                    <?php } ?>
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Contact</th>
                            <th>Service</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($incompletes != 0): ?>
                            <?php foreach ($incompletes as $incomplete): ?>
                            <tr>
                                <td><?php echo $incomplete['clientname']; ?></td>
                                <td><?php echo $incomplete['clientcontact']; ?></td>
                                <td><?php echo $incomplete['jobdesc']; ?></td>
                                <td><?php echo $incomplete['clientlocation']; ?></td>
                                <td class="<?php echo $incomplete['status'] == 'Completed' ? 'table-tag-complete' : 'table-tag-uncomplete'; ?>"><?php echo $incomplete['status']; ?></td>
                                <td><a href="markcomplete.php?jid=<?= $incomplete['jobid']?>">        
                                <button style="background-color: green; color: white; padding: 10px 20px; border-radius: 20px; font-size: 16px;">Mark Complete</button>
                                </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="color: red;">No results found!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table> 

                </div>
                
            </div>

            <div id="feedbackboard" style="display: none;">
                <center>
                    <!-- Content for Technicians goes here -->
                <h3>Ratings Board</h3>
                <!-- Add your content specific to Technicians here -->
                </center>
                <div class="report-header"> 
                    <h1 class="recent-Articles">View Rating</h1> 
                    <!-- <button class="view">View All</button> -->
                </div>
                <div class="report-container-table">
                <center>
                    <!-- Content for Technicians goes here -->
                    <h3>Your average rating is:</h3>
                <div style="font-size: 50px;">
                <h5 style="color:goldenrod"><?php echo $ratings; ?></h5> out of 5
                </div>
                <!-- Add your content specific to Technicians here -->
                </center>

                </div>
                
            </div>

            <div class="card" id="updateprofile" style="display: none;">
                <center>
                    <!-- Content for Technicians goes here -->
                <h4>Profile</h4>
                <!-- Add your content specific to Technicians here -->
                </center>
            </div>
            
        </div> 
        
        
    </div> 
  
    <script src="../Admin/index.js"></script> 
</body> 
</html>
