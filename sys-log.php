<?php require_once 'code.php';
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
	<title>TRACK LOG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/system-log.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
	
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
			<a href="sys-home.php"><img src="img/logo1.png" alt="" style="width: 210px;  margin-right: 10px; margin-bottom: 20px;" draggable="false" ></a>

			<ul class="tabs"> 
				<a href="sys-home.php"><li><i class="fa fa-home"></i>HOME</li></a>
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
				
				<a href="sys-log.php"><li id='active'><i class="fas fa-clipboard-list"></i>TRACK LOGS</li></a>
				<a href="sys-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="sys-log.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
			</ul>
		</nav>
		<div class="header" id="fff" >
			<h2> <?php echo $msg, $_SESSION['position'];?></h2>
			<div class="user-icons">
				<span><?php echo $_SESSION['full_name'];?></span>
				<div class="profile-pic">
					<a href="sys-profile.php"><img src="<?php echo $_SESSION['picture'];?>" alt="user" draggable="false" ></a>
				</div>
			</div>
			
		</div>
		<div class="finder" id="fff">		
			<form method="get" class="searchbar-div">
				<input type="text" name="search" placeholder="Search.." class="searchbar"
					<?php
					if(isset($_GET['search'])){
						$search = $_GET['search'];
						echo "value ='".$search."'";
					}
					?>>
				<button type="submit" name="submit" class="searchbttn" id="search-bttn"><i class="fa fa-search"></i></button>
			</form>
				<form method="post" class="clearbtn" onclick="return confirm('Are you sure you want to delete?')">
					<button type="submit" class="clearbtn" name="clearbtn" style="width:100%;">CLEAR</button>
				</form>
				<?php
				if(isset($_POST['clearbtn'])){
					$sql = "UPDATE log SET display = 'inactive'";
					mysqli_query($conn, $sql);
					header ("location: sys-log.php");
				}
				?>
			</div>
		<div class="content" id="fff">
			<div class="record">
				<span> LOG </span>
			</div>
			<div class="table">
			
						<table>
							<tr>
								<th>Full Name</th>
								<th>Employee No</th>
								<th>Action</th>
								<th>Date&Time</th>
							</tr>
						<?php

						if(isset($_GET['page']))
						{
							$page = $_GET['page'];
						}
						else
						{
							$page = 1;
						}
						$num_per_page = 12;
						$start_from = ($page-1)*12;
						$query = "SELECT * FROM log_vw ORDER BY time_log DESC LIMIT $start_from, $num_per_page;";
						$result = mysqli_query($conn, $query);
						if(isset($_GET['search']))
						{
							$search = $_GET['search'];
							$query = "SELECT * FROM log_vw WHERE employee_no LIKE '%$search%' OR full_name LIKE '%$search%' OR action LIKE '%$search%' OR time_log LIKE '%$search%';";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								
								echo    "<tr>";
								echo		"<td>".$row['full_name']."</td>";
								echo		"<td>".$row['employee_no']."</td>";
								echo		"<td>".$row['action']."</td>";
								echo		"<td>".$row['time_log']."</td>";						
								echo	"</tr>";
							
								}
								echo "</table>";
								$pr_query = "SELECT * FROM log_vw WHERE employee_no LIKE '%$search%' OR full_name LIKE '%$search%' ORDER BY time_log";
								$pr_result = mysqli_query($conn,$pr_query);
								$total_record = mysqli_num_rows($pr_result);
								$total_page = ceil($total_record/$num_per_page);
									
								for($i=1;$i<$total_page+1;$i++)
								{
									echo "<div id='page'><a href='sys-log_vw.php?search=".$search."&submit=Submit&page=".$i."'>$i</a></div>";
								}

						}
						else
						{
							while($row = mysqli_fetch_assoc($result)){
							
								echo    "<tr>";
								echo		"<td>".$row['full_name']."</td>";
								echo		"<td>".$row['employee_no']."</td>";
								echo		"<td>".$row['action']."</td>";
								echo		"<td>".$row['time_log']."</td>";					
								echo	"</tr>";
							
							}
							echo "</table>";
							$pr_query = "SELECT * FROM log_vw ORDER BY time_log";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
								
							
						}
						?>
						<?php
						
						echo "<div class='paginator'>";
						for($i=1;$i<$total_page+1;$i++)
							{
								echo "<div id='page'><a href='sys-log.php?page=".$i."'>$i</a></div>";
							}
						echo "</div>";?>
			</div>


		</div>
		
	</div>
	<footer>
		<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>,
		Universidad De Manila, Philippines</p>
	</footer>
<script>
	var modal = document.getElementById("modal-opener");
	var btn = document.getElementById("addbttn");

	var span = document.getElementsByClassName("close")[0];

	// opener onlcik
	btn.onclick = function() {
		modal.style.display = "flex";
	}

	// closer (x)
	span.onclick = function() {
		modal.style.display = "none";
	}

	// close when tap outside
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>
</body>
</html>