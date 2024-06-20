<?php
session_start();
$jid = isset($_GET['appid']) ? $_GET['appid'] : null;
 

if ($jid) {
    include '../DB_connection.php';  
    try {
        $data = 'ApprovalID=' . $jid;
        $completed = 'Denied';
        $sql = "UPDATE approvals SET status = ? WHERE approvalid=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$completed, $jid]);

        if ($stmt->rowCount() > 0) {
            $sm = "Denied successfully";
            header("Location: index.php?error=$sm&$data"); // Always exit after header redirect
            exit();
        } else {
            throw new Exception("No rows affected by the update.");
        }
    } catch (PDOException $e) {
        $em = "Error denial: " . $e->getMessage();
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
