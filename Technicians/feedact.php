<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "hustlehub");
include "../DB_connection.php";

if (isset($_POST['techFeedback'])) {
    include '../DB_connection.php';
    
        $cid = $_SESSION['tid'];
        $fname = $_SESSION['fullname'];
        $email = $_SESSION['email'];
        $message = $_POST['feedback'];
        $usertype = "Technician";
        $data = 'Technician id='.$cid;

        

        $query = "INSERT INTO feedbacks(fullname,usertype,contact,message) VALUES ('$fname','$usertype','$email','$message');";
        $result = mysqli_query($con, $query);

        if ($result) {
            
            // Close the database connection
            mysqli_close($con);

            $sm = "Your feedback was successfully submitted!";
            header("Location:feed-success.php");
        }

        else{
            // Close the database connection
            mysqli_close($con);

            $em = "Something went wrong, Try again!!";
            header("Location:feed-error.php");
        }
    
}

// Close the database connection
mysqli_close($con);
?>
