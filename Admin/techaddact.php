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
// Establish a database connection


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
    // $status = 'not approved';

    try {
        $sql = "INSERT INTO technicians(fullname,username,gender,email,phone,password,profession,nationalid,CV) VALUES ('$fname','$uname','$gender','$email','$contact','$password','$profession', '$nid','$cvlink');";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            $sm = "Technician registered sucessfully";
            header("Location: techadd.php?success=$sm&$data");
            exit(); // Always exit after header redirect
        } else {
            throw new Exception("No changes made or an error occurred during the update");
        }
    } catch (PDOException $e) {
        // Handle any database errors
        $em = "Error updating profile: " . $e->getMessage();
        header("Location: techadd.php?error=$em&$data");
        exit(); // Always exit after header redirect
    } catch (Exception $e) {
        // Handle any other errors
        $em = "Error: " . $e->getMessage();
        header("Location: techadd.php?error=$em&$data");
        exit(); // Always exit after header redirect
    }
} else {
    // If the form was not submitted, redirect to the index page
    header("Location: techadd.php");
}

?>
