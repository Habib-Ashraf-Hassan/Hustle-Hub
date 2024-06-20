<?php
session_start();
    if(isset($_SESSION['aid'])){
     include "../DB_connection.php";
     include "Data/retrieve.php";

     $tid = isset($_POST['tid']) ? $_POST['tid'] : null;
     if($tid){
        $data = 'Technician id='.$tid;
        if (removeTechnician($tid, $conn)) {
            $sm = "The technician was successfully deleted!";
            echo "<script>alert('The technician was successfully deleted!'); window.location.href = 'index.php';</script>";
            exit;

        }else {
           $em = "Unknown error occurred";
           echo "<script>alert('Unknown error occurred!'); window.location.href = 'index.php';</script>";
           exit;
        }
     }
     else{
        echo "Could not get the technician id";
     }



    }
    else {
        header("Location: ../index.html");
        exit;
    } 
?>