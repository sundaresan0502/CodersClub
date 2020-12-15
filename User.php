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
<html>
<head>
<title>User</title>
</head>
<style type="text/css">
body{
	background-color: #ccccff;
	font-family: shadow, sans-serif;
	}
.pad{
    width: 200px;
    height: 200px;
    margin: 8px 0;
    margin-left: 100px;
    box-sizing: border-box;
    border: 3px solid black;
	background-size:100% 100%;
	background-repeat:no-repeat;
	background-color:white;
	font-family: Poppins-Regular, sans-serif;
	font-size: 24px;
	text-align: center;
}
</style>
<body>
	<H3>Choose Your Level Here!!...</H3>
<div class="pad">
    <a href="easy.php" style="color: black;"><img src="img/11.jpg" style="width: 100%;height: 100%;"></a>
  	 </div>
  	 <div class="pad" style="margin-left: 350px;margin-top: -210px;">
   <a href="Medium.php" style="color: black;"><img src="img/13.jpg" style="width: 100%;height: 100%;"></a>
  	 </div>
  	 <div class="pad" style="margin-left: 600px;margin-top: -210px;">
    <a href="Hard.php" style="color: black;"><img src="img/12.jpg" style="width: 100%;height: 100%;"></a>
  	 </div>
</body>
</html>