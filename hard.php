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
$con = mysqli_connect("localhost","root","","cc");
if(!$con)
{
die("Connection Failed".mysqli_connect_error());
}
$result1 = mysqli_query($con,"select  * from question where level = 'Hard'");
if(mysqli_num_rows($result1)>0)
{	
$row = mysqli_fetch_assoc($result1);
$question=$row['QName'];
$description=$row['Qdescription'];
$input=$row['Input'];
$output=$row['Output'];
echo "<html lang='en'>
<head>
	<title>Admin</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
<!--===============================================================================================-->
	<link rel='icon' type='image/png' href='images/icons/favicon.ico'/>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/bootstrap/css/bootstrap.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='fonts/font-awesome-4.7.0/css/font-awesome.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='fonts/iconic/css/material-design-iconic-font.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/animate/animate.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/css-hamburgers/hamburgers.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/animsition/css/animsition.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/select2/select2.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/daterangepicker/daterangepicker.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/noui/nouislider.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='css/util.css'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
<!--===============================================================================================-->
</head>
<body>
<form  class='form' action='next.php' method='post'>
<div class='container-contact100'>
<div class='wrap-contact100'>
<h6>question:</h6>
<h7>$question</h7><br>
<br>
<h6>question description:</h6>
<h7>$description</h7><br>
<br>
<h6>Sample Input:</h6>
<h7>$input</h7><br>
<br>
<h6>sample output:</h6>
<h7>$output</h7><br>
<br>
<div class='container-contact100-form-btn'>
					<button class='contact100-form-btn' type='Submit'>
						<span>
							Let's Code Here!.
							<i class='fa fa-long-arrow-right m-l-7' aria-hidden='true'></i>
						</span>
					</button>
				</div>
</div>
</div>
</form>
<!--===============================================================================================-->
	<script src='js/main.js'></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-23581568-13'></script>

</body>
</html>
";
}

?>
