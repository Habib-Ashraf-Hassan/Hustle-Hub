<?php
session_start();
    if(isset($_SESSION['tid'])){
     include "../DB_connection.php";
     include "Data/techs.php";

     $tid = $_SESSION['tid'];
     if (removeTechnician($tid, $conn)) {
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