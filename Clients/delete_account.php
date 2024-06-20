<?php
session_start();
    if(isset($_SESSION['cid'])){
     include "../DB_connection.php";
     include "Data/clients.php";

     $cid = $_SESSION['cid'];
     if (removeClient($cid, $conn)) {
        $sm = "Successfully deleted!";
       header("Location: delete-success.php");
    }else {
       $em = "Unknown error occurred";
       header("Location: delete-error.php");
       exit;
    }

    }

    else {
        header("Location: index.php");
        exit;
    } 
?>