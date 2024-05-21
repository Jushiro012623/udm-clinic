<?php
require_once 'code.php';
if(isset($_SESSION['admin'])) {
	echo "<script> location.replace('admin-logout.php'); </script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
	<title>LOGOUT</title>
</head>
<style>
	body {
		margin: 0;
		padding: 0;
		background-color: #d9eff1;
		font-family: 'Montserrat', sans-serif;
	}

	.logout{
		width: 400px;
		height: 300px;
		margin: auto;
		background-color: #41a8b1;
		text-align:center;
		color: #fff;
		font-size: 15px;
		border-radius: 10px;
		position: absolute;

		top:0;
		bottom: 0;
		left: 0;
		right: 0;
	}

	.logout h3{
		margin-top: 40px;
		font-size: 1.2rem;
	}

	.logout p{
		margin-bottom: 50px;
	}

	a{
		color: #fff;
		background-color: #30767c;
		padding: 10px;
		text-decoration: none;
	}
</style>
<body>
	<div class='logout'>
		<h3>LOG OUT?</h3>
		<br><br>
		<p>You are currently logged in as <?php echo $_SESSION["full_name"];?>,<br> Continue to Logout?</p>
		<a href="sys-home.php?logout=1">LOGOUT</a>
		<a href="sys-home.php">CANCEL</a>
	</div>
</body>
</html>