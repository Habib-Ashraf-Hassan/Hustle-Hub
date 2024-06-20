<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "hustlehub");

if (isset($_POST['clientFeedback'])) {
    include '../DB_connection.php';
    
        $tid = $_SESSION['tid'];
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
            header("Location:index.php?fsuccess=$sm&$data");
        }

        else{
            // Close the database connection
            mysqli_close($con);

            $em = "Something went wrong, Try again!!";
            header("Location:index.php?ferror=$em&$data");
        }
    
}

// Close the database connection
mysqli_close($con);
?>
