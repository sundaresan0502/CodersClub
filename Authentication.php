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
?>
<?php
$con = mysqli_connect("localhost","root","","cc");
 $eid= mysqli_real_escape_string($con, $_POST['mail']);
 $pass= mysqli_real_escape_string($con, $_POST['password']);

if(!$con)
{
die("Connection Failed".mysqli_connect_error());
}
$result1 = mysqli_query($con,"select  * from user where email = '$eid' and password = '$pass'");
$result2 = mysqli_query($con,"select * from admin where email = '$eid' and password = '$pass'");

if(mysqli_num_rows($result1)>0)
{
session_start();	
$_SESSION['us1'] =$_POST['mail'];
$row = mysqli_fetch_assoc($result1);
$_SESSION['us2']=$row['Name'];
$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + (600);
header('Location: user.php');
}
elseif(mysqli_num_rows($result2)>0)
{
session_start();	
$_SESSION['us1'] =$_POST['mail'];
    $row = mysqli_fetch_assoc($result2);
    $_SESSION['us2']=$row['Name'];
$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + (600);
header('Location: admin.php');
}
else
{
echo "<script>alert('LoginFailed');</script>";
header("Location:index.php");
}
?>