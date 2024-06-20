<?php
session_start();
if (isset($_SESSION['cid'])) {
    if (isset($_POST['clientUpdate'])) {

        include '../DB_connection.php';
        include "Data/clients.php";

        $cid = $_SESSION['cid'];
        $fname = $_POST['fname'];
        $username = $_POST['uname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $data = 'client id=' . $cid;

        try {
            $sql = "UPDATE clients SET username = ?, fullname=?, email=?, phone=?, gender=?, password=?, cpassword = ? WHERE clientid=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $fname, $email, $contact, $gender, $password, $cpassword, $cid]);

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $sm = "Profile successfully updated!";
                header("Location: index.php?success=$sm&$data");
                exit(); // Always exit after header redirect
            } else {
                throw new Exception("No changes made or an error occurred during the update");
            }
        } catch (PDOException $e) {
            // Handle any database errors
            $em = "Error updating profile: " . $e->getMessage();
            header("Location: index.php?error=$em&$data");
            exit(); // Always exit after header redirect
        } catch (Exception $e) {
            // Handle any other errors
            $em = "Error: " . $e->getMessage();
            header("Location: index.php?error=$em&$data");
            exit(); // Always exit after header redirect
        }
    } else {
        $em = "An error occurred";
        header("Location: index.php?error=$em&$data");
        exit(); // Always exit after header redirect
    }
} else {
    header("Location: ../index.html");
    exit;
}
?>
