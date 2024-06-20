<?php
session_start();
$con=mysqli_connect("localhost","root","","hustlehub");
include "../DB_connection.php";

if(isset($_POST['adminLogin'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from admin where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $_SESSION['aid'] = $row['adminid'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['contact'] = $row['phone'];
      $_SESSION['email'] = $row['email'];
    }
		header("Location:index.php");
	}
  else {
    echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = '../index.html';</script>");
    // header("Location:error.php");
  }
		
}
// Close the database connection
mysqli_close($con);

?>
