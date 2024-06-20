<?php
session_start();
$client_name = $_SESSION['fname'];
$jid = isset($_GET['jid']) ? $_GET['jid'] : null;
$cid = $_SESSION['cid'];
    // $email = $_SESSION['email'];
    // $phone = $_SESSION['contact'];
    // $gender = $_SESSION['gender'];
    // $fullname = $_SESSION['fname'];
    include "../DB_connection.php";
    include "Data/technicians.php";
    include "Data/clients.php";
    $clients = getclientById($cid, $conn);
    // $jobs = getAllJobsByClientID($conn, $cid);

    $username = $clients['username'];
    $email = $clients['email'];
    $phone = $clients['phone'];
    $gender = $clients['gender'];
    $fullname = $clients['fullname'];

if ($jid) {
    $client_name = $_SESSION['fname'];
    include 'embedded_html.php'; // Include the HTML file
} else {
    echo "Did not get the Job"; // Always exit after header redirect
}
?>
