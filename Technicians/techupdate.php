<?php
session_start();
if (isset($_SESSION['tid'])) {
    if (isset($_POST['techUpdate'])) {

        include '../DB_connection.php';
        include 'Data/techs.php';

        $tid = $_SESSION['tid'];
        $username = $_POST['uname'];
        $fname = $_POST['fname'];
        $nid = $_POST['nid'];

        $gender = $_POST['gender'];
        $profession = $_POST['profession'];
        $desc = $_POST['desc'];

        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // $username = $technician['username'];
        // $fname = $technician['fullname'];
        // $nid = $technician['nationalid'];
        // $gender = $technician['gender'];
        // $profession = $technician['profession'];
        // $desc = $technician['jobdescription'];
        // $email = $technician['email'];
        // $contact = $technician['phone'];
        // $password = $technician['password'];
        // $cpassword = $technician['password'];


        $data = 'Technician id=' . $tid;

        if ($password == $cpassword) {
            $sql = "UPDATE technicians SET
                    username = ?, fullname=?, email=?, phone=?, nationalid=?, gender=?, profession=?, jobdescription=?, password=?
                    WHERE technicianid=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $fname, $email, $contact, $nid, $gender, $profession, $desc, $password, $tid]);

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $sm = "Your Profile successfully updated!";
                header("Location: techprofileupdate.php?success=$sm&$data");
                exit(); // Always exit after header redirect
            } else {
                $em = "No changes made or an error occurred during the update";
                header("Location: techprofileupdate.php?error=$em&$data");
                exit(); // Always exit after header redirect
            }
        } else {
            $em = "Passwords MUST match!";
            header("Location: techprofileupdate.php?error=$em&$data");
            exit(); // Always exit after header redirect
        }
    } else {
        $em = "An error occurred";
        header("Location: techprofileupdate.php?error=$em&$data");
        exit(); // Always exit after header redirect
    }

    // Close the database connection
    $conn = null;
} else {
    header("Location: ../index.html");
    exit;
}
?>
