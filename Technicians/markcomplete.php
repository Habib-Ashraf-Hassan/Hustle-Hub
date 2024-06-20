<?php
session_start();
$jid = isset($_GET['jid']) ? $_GET['jid'] : null;
 

if ($jid) {
    include '../DB_connection.php';  
    try {
        $data = 'jobid=' . $jid;
        $completed = 'Completed';
        $sql = "UPDATE jobs SET status = ? WHERE jobid=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$completed, $jid]);

        if ($stmt->rowCount() > 0) {
            $sm = "Job status updated!";
            header("Location: index.php?success=$sm&$data"); // Always exit after header redirect
            exit();
        } else {
            throw new Exception("No rows affected by the update.");
        }
    } catch (PDOException $e) {
        $em = "Error updating job status: " . $e->getMessage();
        header("Location: index.php?error=$em&$data");
        exit(); // Always exit after header redirect
    } catch (Exception $e) {
        $em = "Error: " . $e->getMessage();
        header("Location: index.php?error=$em&$data");
        exit(); // Always exit after header redirect
    }
} else {
    $em = "Something went wrong";
    header("Location: index.php?error=$em&$data");
    exit(); // Always exit after header redirect
}
?>
