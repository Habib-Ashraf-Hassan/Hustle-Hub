<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (isset($_SESSION['cid'])) {
    if (isset($_POST['clientReview'])) {

        include '../DB_connection.php';
        // include "Data/clients.php";
        // $techinican = gettechnicianById($id, $conn);

        $cid = $_SESSION['cid'];
        $tid = $_POST['tid'];
        $review = $_POST['review'];
        include "Data/clients.php";
        $techinican = gettechnicianById($tid, $conn);
        $initial_rate = $techinican['ratings'];
        $new_rate = ($initial_rate + $review)/2;
        // Round the new rating to two decimal places
        $new_rate = round($new_rate, 2);
        // $tid = 4;

        $data = 'client id=' . $cid;

        try {
            $sql = "UPDATE technicians SET ratings=? WHERE technicianid=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$new_rate, $tid]);

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $sm = "Rating submitted successfully!";
                header("Location: rate-success.php");
                exit(); // Always exit after header redirect
            } else {
                throw new Exception("No changes made or an error occurred during the update");
            }
        } catch (PDOException $e) {
            // Handle any database errors
            $em = "Error submitting Rating: " . $e->getMessage();
            header("Location: rate-error.php");
            exit(); // Always exit after header redirect
        } catch (Exception $e) {
            // Handle any other errors
            $em = "Error: " . $e->getMessage();
            header("Location: rate-error.php?error=$em&$data");
            exit(); // Always exit after header redirect
        }
    } else {
        $em = "An error occurred";
        header("Location: rate-error.php?error=$em&$data");
        exit(); // Always exit after header redirect
    }
} else {
    header("Location: ../index.html");
    exit;
}
?>
