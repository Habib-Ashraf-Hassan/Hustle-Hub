<?php
session_start();
$client_name = $_SESSION['fname'];
$tid = isset($_GET['tid']) ? $_GET['tid'] : null;
$cid = $_SESSION['cid'];
    // $email = $_SESSION['email'];
    // $phone = $_SESSION['contact'];
    // $gender = $_SESSION['gender'];
    // $fullname = $_SESSION['fname'];
    include "../DB_connection.php";
    include "Data/technicians.php";
    include "Data/clients.php";
    $clients = getclientById($cid, $conn);
    // $techinican = gettechnicianById($tid, $conn);
    $techinican = gettechnicianById($tid, $conn);
    $reviews = getJobsWithReviewsByTechnicianID($conn, $tid);
    $techfullname = $techinican['fullname'];
    $techprofession = $techinican['profession'];


    $username = $clients['username'];
    $email = $clients['email'];
    $phone = $clients['phone'];
    $gender = $clients['gender'];
    $fullname = $clients['fullname'];

if ($tid) {
    $client_name = $_SESSION['fname'];
    include 'embedded_reviews.php'; // Include the HTML file
} else {
    echo "Did not get the TID"; // Always exit after header redirect
}
?>
