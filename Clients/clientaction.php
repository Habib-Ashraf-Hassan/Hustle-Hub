<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "hustlehub");
include '../DB_connection.php';

if (isset($_POST['clientRegister'])) {
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $query = "INSERT INTO clients(fullname,username,gender,email,phone,password,cpassword) VALUES ('$fname','$uname','$gender','$email','$contact','$password','$cpassword');";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['username'] = $_POST['uname'];
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['contact'] = $_POST['contact'];
            $_SESSION['email'] = $_POST['email'];

            // Close the database connection
            mysqli_close($con);

            // Display a pop-up success message using JavaScript
            echo "<script>alert('Registration successful!Proceed to Login'); window.location.href = '../index.html';</script>";
            exit;
        }

        // Fetch data to set additional session variables
        $query1 = "SELECT * FROM clients WHERE username='$uname';";
        $result1 = mysqli_query($con, $query1);
        if ($result1 && $row = mysqli_fetch_assoc($result1)) {
            $_SESSION['cid'] = $row['clientid'];
        }
    } else {
        header("Location: error1.php");
        exit;
    }
}

// Close the database connection
mysqli_close($con);
?>
