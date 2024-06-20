<?php 
session_start();
if (isset($_SESSION['aid'])){
    if (isset($_POST['adminUpdate'])) {
    
        include '../DB_connection.php';
        include "Data/clients.php";
    
        $aid = $_SESSION['aid'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $data = 'Admin id='.$aid;


        if($password == $cpassword){
            $sql = "UPDATE admin SET
                    username = ?, email=?, phone=?, password=?
                    WHERE adminid=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $email, $contact,$password, $aid]);
            $sm = "Admin Profile successfully updated!";
            header("Location:profileupdate.php?success=$sm&$data");

        }
        else{
            $em = "Passwords MUST match!";
            header("Location:profileupdate.php?error=$em&$data");

        }
    
        
      }
    


}
else {
	header("Location: ../index.html");
	exit;
}
// Close the database connection
mysqli_close($con);
?> 


 