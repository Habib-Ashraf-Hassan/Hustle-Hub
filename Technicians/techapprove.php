<?php
// Establish a database connection
$con = mysqli_connect("localhost", "root", "", "hustlehub");

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
include "../DB_connection.php";

// Check if the form was submitted
if (isset($_POST['techRegister'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cvlink = $_POST['cvlink'];
    $nid = $_POST['nid'];
    $profession = $_POST['profession'];
    $status = 'not approved';

    // SQL query to insert data into 'approvals' table
    $query = "INSERT INTO approvals(fullname, username, gender, email, phone, password, cvlink, nationalid, profession, status) 
              VALUES ('$fname', '$uname', '$gender', '$email', '$contact', '$password', '$cvlink', '$nid', '$profession', '$status')";

    // Execute the SQL query
    if (mysqli_query($con, $query)) {
        // Close the database connection
        // mysqli_close($con);
        // Display a success message using JavaScript alert
        echo "<script>alert('Application submitted successfully! Please wait for approval.'); window.location.href = '../index2.html';</script>";
    } else {
        // Display an error message using JavaScript alert
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
} else {
    // If the form was not submitted, redirect to the index page
    header("Location: ../index2.html");
}

?>
