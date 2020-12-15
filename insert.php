<?php
session_start();
if(!isset($_SESSION['us1'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
}
else {
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
    }
}
$name=$_GET['name'];
$email=$_GET['email'];
$password=$_GET['password'];

$con=mysqli_connect("localhost","root","","cc");
if(!$con)
{
	die("Connection failed".mysqli_connect_error());
}
$sql1="insert into user(name,email,password) values('$name','$email','$password')";
$result1 = mysqli_query($con,$sql1);
if($result1)
{
	echo "<script>alert('Get Ready To Code');</script>";
	header("Location:index.php");
}
else
{
	echo "Oops! something went wrong!".mysqli_error($con);
}
mysqli_close($con);
?>