<?php
require_once 'code.php';
if(isset($_SESSION['admin'])){
	echo "<script> location.replace('admin-home.php'); </script>";
	exit();
}
if(!isset($_SESSION['system_adm'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/system-home.css">
	<link rel="stylesheet" href="icons/css/all.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
	<style>
		 td,tr {text-align: center;height:26px;}
	 </style>
</head>
<body>
	<div class="container">
		<nav class="navigation">
			<h1>Menu</h1>
			<ul class="tabs"> 
				<a href="sys-home.php"><li id='active'><i class="fa fa-home"></i>HOME</li></a>
				<a href="sys-profile.php"><li><i class="fa fa-user"></i>PROFILE</li></a>

				<div class="dropdown">
                    <a><label for="checkbox"><li><i class="fas fa-clipboard-list"></i></i>RECORDS</li></label></a>
                    <input type="checkbox" id="checkbox"/>
                    <ul>
						<a href="sys-employee.php"><li><i class="fas fa-users"></i>EMPLOYEE</li></a><br>
                        <a href="sys-medical.php"><li><i class="fas fa-file-medical"></i>MEDICAL</li></a><br>
						<a href="sys-consultation.php"><li><i class="fas fa-file-medical"></i>CONSULTATION</li></a><br>
                        <a href="sys-consulted.php"><li><i class="fas fa-file-medical"></i>CONSULTED</li></a><br>
                        <a href="sys-illness.php"><li><i class="fas fa-file-medical"></i>ILLNESS</li></a><br>
                    </ul>
                </div>

				<a href="sys-log.php"><li><i class="fas fa-clipboard-list"></i>TRACK LOGS</li></a>
				<a href="sys-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="sys-home.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
			</ul>
		</nav>
		<div class="header" id="fff" >
			<a href="sys-home.php"><img src="img/logo1.png" alt="" style="width: 210px;" draggable="false" ></a>
			<h2> <?php echo $msg, $_SESSION['position'];?></h2>
			<div class="user-icons">
				<span><?php echo $_SESSION['full_name'];?></span>
				<div class="profile-pic">
					<a href="sys-profile.php"><img src="<?php echo $_SESSION['picture'];?>" draggable="false" alt="user"></a>
				</div>
			</div>
		</div>
		<div class="greetings">
			<!-- <img src='img/welcome.png' alt="" id="welcome" draggable="false"> -->
			
			<h1 id="welcome"  draggable="false" >welcome</h1>
		</div>
		<div class="content" id="fff">
			<div class="schedule">
				<p>SCHEDULE</p>
				
			</div>
			
			<table>
				<tr>
					<th style = 'padding: 5px;'>NAME OF CONSULTANT</th>
					<th>POSITION</th>
					<th>DAY/s</th>
					<th>TIME</th>
					<th>ACTION</th>
				</tr>
				<?php

				$sql = "SELECT * FROM schedule_vw";
				$result = mysqli_query($conn, $sql);

				while($row = mysqli_fetch_assoc($result))
				{
					echo    "<tr>";
					echo		"<td>".$row['full_name']."</td>";
					echo		"<td>".$row['employee_position']."</td>";
					echo		"<td>".$row['day']."</td>";
					echo		"<td>".$row['time']."</td>";
					echo		"<td style=''><a style='color:#000' href='sys-homeview.php?employee_no=".$row['employee_no']."&employee_position=".$row['employee_position']."&full_name=".$row['full_name']."'>View</a></td>";
					echo	"</tr>";
				}
				?>
			</table>
				
		</div>	
		<div class="announcement">
			<p>REMINDER</p>
			<?php
					$sql = "SELECT * FROM notconsulted_medreqvw";
					if ($result=mysqli_query($conn,$sql)) {
						$rowcount=mysqli_num_rows($result);
						echo "<a style='text-decoration:none;' href='admin-consultation.php'><p id='announce'>There are ".$rowcount." record(s) to be consulted</p></a>"; 
					}
					
					
			?>			<!--<hr>-->
		</div>

		<div class="deadline">
			<p>DEADLINES</p>
			<!--<hr>-->
		</div>
	</div>

<!-- <footer>
	<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>,
	Universidad De Manila, Philippines</p>
</footer> -->
</body>
</html>

