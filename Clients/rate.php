<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    $username = $clients['username'];
    $email = $clients['email'];
    $phone = $clients['phone'];
    $gender = $clients['gender'];
    $fullname = $clients['fullname'];

if ($tid) {
    $client_name = $_SESSION['fname'];
    include 'embedded_html2.php'; // Include the HTML file
} else {
    echo "Did not get the Job"; // Always exit after header redirect
}
?>
