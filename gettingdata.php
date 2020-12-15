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
$description=$_GET['Description'];
$level=$_GET['Level'];
$input=$_GET['input'];
$output=$_GET['input'];

$con=mysqli_connect("localhost","root","","cc");
if(!$con)
{
	die("Connection failed".mysqli_connect_error());
}
$random = rand(1000,9999);
$sql1="insert into question values($random,'$name','$description','$level','$input','$output')";
$result1 = mysqli_query($con,$sql1);
if($result1)
{
	echo "<script>alert('Get Ready To Code');</script>";
	header("Location:admin.php");
}
else
{
	echo "Oops! something went wrong!".mysqli_error($con);
}
mysqli_close($con);
?>