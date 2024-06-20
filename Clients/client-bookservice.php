<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "hustlehub");

if (isset($_POST['clientFeedback'])) {
    include '../DB_connection.php';
    
        $cid = $_POST['client_id'];
        $clientname = $_POST['fname'];
        $clientcontact = $_POST['email'];
        $techcontact = $_POST['techcontact'];
        $techfullname = $_POST['techfullname'];
        $technicianid = $_POST['technicianid'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $profession = $_POST['profession'];
        $data = 'client id='.$cid;

        

        $query = "INSERT INTO jobs(clientid,clientname,clientcontact,clientlocation,jobdesc,technicianid,technicianname,techniciancontact,techprofession) VALUES ('$cid','$clientname','$clientcontact','$location','$description','$technicianid','$techfullname','$techcontact','$profession' );";
        $result = mysqli_query($con, $query);

        if ($result) {
            
            // Close the database connection
            mysqli_close($con);

            // $sm = "Your service was successfully booked!";
            // header("Location:index.php?fsuccess=$sm&$data");
            header("Location: client-booksuccess.php");

        }

        else{
            // Close the database connection
            mysqli_close($con);

            // $em = "Something went wrong, Try again!!";
            // header("Location:clientservice.php?ferror=$em&$data");
            header("Location: client-bookerror.php");

        }
    
}

// Close the database connection
mysqli_close($con);
?>
