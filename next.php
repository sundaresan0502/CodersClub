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
$con;
if(!con)
{
header("Location:compiler/index1.php");
}
else
{
header("Location:compiler/index1.php");
}
?>