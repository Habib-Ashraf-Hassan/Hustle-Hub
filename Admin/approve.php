<?php
session_start();
$jid = isset($_GET['appid']) ? $_GET['appid'] : null;
 

if ($jid) {
    include '../DB_connection.php';  
    include 'Data/retrieve.php';  
    $techapprove = gettechById($jid, $conn);
    $fname = $techapprove['fullname'];
    $uname = $techapprove['username'];
    $gender = $techapprove['gender'];
    $email = $techapprove['email'];
    $contact = $techapprove['phone'];
    $password = $techapprove['password'];
    $cvlink = $techapprove['cvlink'];
    $profession = $techapprove['profession'];
    $nid = $techapprove['nationalid'];

    try {
        $data = 'ApprovalID=' . $jid;
        $completed = 'Approved';
        $sql = "UPDATE approvals SET status = ? WHERE approvalid=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$completed, $jid]);

        if ($stmt->rowCount() > 0) {
            $sql = "INSERT INTO technicians(fullname, username, gender, email, phone, password, CV, nationalid, profession) 
            VALUES ('$fname', '$uname', '$gender', '$email', '$contact', '$password', '$cvlink', '$nid', '$profession')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0){
                echo "<script>alert('Approved and registered successfully.'); window.location.href = 'index.php';</script>";

            }
            else{
                $em = "Could not register: " . $e->getMessage();
                header("Location: index.php?error=$em&$data");
                exit();
            }
            
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
