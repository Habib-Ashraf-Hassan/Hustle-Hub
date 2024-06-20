<?php
session_start();
if (isset($_SESSION['cid'])) {
    if (isset($_POST['clientReview'])) {

        include '../DB_connection.php';
        // include "Data/clients.php";

        $cid = $_SESSION['cid'];
        $jid = $_POST['jid'];
        $review = $_POST['review'];

        $data = 'client id=' . $cid;

        try {
            $sql = "UPDATE jobs SET reviews = ? WHERE jobid=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$review, $jid]);

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $sm = "Review submitted successfully!";
                header("Location: review-success.php");
                exit(); // Always exit after header redirect
            } else {
                throw new Exception("No changes made or an error occurred during the update");
            }
        } catch (PDOException $e) {
            // Handle any database errors
            $em = "Error submitting review: " . $e->getMessage();
            header("Location: review-error.php");
            exit(); // Always exit after header redirect
        } catch (Exception $e) {
            // Handle any other errors
            $em = "Error: " . $e->getMessage();
            header("Location: review-error.php?error=$em&$data");
            exit(); // Always exit after header redirect
        }
    } else {
        $em = "An error occurred";
        header("Location: review-error.php?error=$em&$data");
        exit(); // Always exit after header redirect
    }
} else {
    header("Location: ../index.html");
    exit;
}
?>
