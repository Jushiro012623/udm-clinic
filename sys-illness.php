<?php
require_once 'code.php';
if(isset($_SESSION['admin'])){
	echo "<script> location.replace('admin-illness.php'); </script>";
	exit();
}
if(!isset($_SESSION['system_adm'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}

if(isset($_POST['addillness']))
{
	$employee_no = $_SESSION['employee_no'];
	$role = $_SESSION['role'];
	$illness_code = $_POST['user_illnesscode'];
	$illness_desc = $_POST['user_illnessdesc'];
	
	$sql = "SELECT illness_code FROM illness WHERE illness_code = '$illness_code'";
	$result = mysqli_query($conn, $sql);
	if(!mysqli_num_rows($result) == 1){
		$sql = "INSERT INTO illness (illness_code, illness_desc)
		VALUES ('$illness_code','$illness_desc')";
		if(mysqli_query($conn, $sql))
		{
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
							VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'added illness record')";
			if(mysqli_query($conn, $sql)){
			echo '<script>alert("Successfully added a record");window.location.href = "admin-illness.php?addrecords=1";</script>';
			}
		}
	}else{
		echo '<script>alert("'.$illness_code.' Already exists");window.location.href = "admin-illness.php";</script>';
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ILLNESS RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/a-illnesss.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
	
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
	<style>
		 td,tr {text-align: center;height:26px;}
		 .modal-content{width:55%;}
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
                        <a href="sys-illness.php"><li id='active'><i class="fas fa-file-medical"></i>ILLNESS</li></a><br>
                    </ul>
                </div>
				
				<a href="sys-log.php"><li><i class="fas fa-clipboard-list"></i>TRACK LOGS</li></a>
				<a href="sys-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="sys-home.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
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
				if(isset($_GET['search']))
				{
				$search = $_GET['search'];
				echo "value ='".$search."'";
				}
				?>>
				<button type="submit" name="submit" class="searchbttn" id="search-bttn"><i class="fa fa-search"></i></button>
			</form>
			<button type="button" class="addrecord" id="addbttn">ADD RECORD</button>
		</div>
		<div class="content" id="fff">
			<div class="record">
				<span> ILLNESS RECORDS </span>
			</div>
			<div class="table">
			
						<table>
							<tr>
								<th>Illness Code</th>
								<th>Illness Description</th>
								<th>Actions</th>
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
						$num_per_page = 07;
						$start_from = ($page-1)*07;
						$query = "SELECT * FROM illness LIMIT $start_from, $num_per_page;";
						$result = mysqli_query($conn, $query);
						if(isset($_GET['search']))
						{
							$search = $_GET['search'];
							$query = "SELECT * FROM illness WHERE illness_code LIKE '%$search%' OR illness_desc LIKE '%$search%'
							LIMIT $start_from, $num_per_page ;";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								
								echo    "<tr>";
								echo		"<td>".$row['illness_code']."</td>";
								echo		"<td>".$row['illness_desc']."</td>";
								echo		"<td style='background-color:#ff4040;'><a style='color:#fff;' href = 'sys-illness.php?sdeleteillness=1&illness_code=".$row['illness_code']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>";						
								echo		"</tr>";
							
								}
								echo "</table>";
								$pr_query = "SELECT * FROM illness WHERE illness_code LIKE '%$search%' OR illness_desc LIKE '%$search%'";
								$pr_result = mysqli_query($conn,$pr_query);
								$total_record = mysqli_num_rows($pr_result);
								$total_page = ceil($total_record/$num_per_page);
									
								for($i=1;$i<$total_page+1;$i++)
								{
									echo "<div id='page'><a href='sys-illness.php?search=".$search."&submit=Submit&page=".$i."'>$i</a></div>";
								}

						}
						else
						{
							while($row = mysqli_fetch_assoc($result)){
							
								echo    "<tr>";
								echo		"<td>".$row['illness_code']."</td>";
								echo		"<td style='text-align:left;'>".$row['illness_desc']."</td>";
								echo		"<td style='background-color:#ff4040;width:7%;'><a style='color:#fff' id='delete-table' href = 'sys-illness.php?sdeleteillness=1&illness_code=".$row['illness_code']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>";						
								echo		"</tr>";
							
							}
							echo "</table>";
							$pr_query = "SELECT * FROM illness";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
								
							for($i=1;$i<$total_page+1;$i++)
							{
								echo "<div id='page'><a href='sys-illness.php?page=".$i."'>$i</a></div>";
							}
						}
						?>

						
			</div>
			<!-- The Modal -->
			<div id="modal-opener" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<div class="modal-header">
						<h4>Add Employee</h4>
						<span class="close">&times;</span>
						
						
					</div>
					<div class="modal-body">
							<div class="information-fillup" id="modal-fielset-div">
							<form method="POST">
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Illness Record</legend>
									<div class="modal-addrecord-info" id="illnesscode-info">
										<label id="illnesscode-modal-input">Illness Code<span>*</span> </label>
										<input class="modal-fillup" type="text" id="illnesscode-input" name="user_illnesscode" required placeholder="xx-xx-xxx">
									</div>
									<div class="modal-addrecord-info" id="illnessdesc-info">
										<label id="illnessdesc-modal-input">Illness Description<span>*</span> </label>
										<input class="modal-fillup" type="text" id="illnessdesc-input" name="user_illnessdesc" required placeholder="xxxx-xxxxx">
									</div>
									<div class="modal-footer">
										<button type="submit" value = "Submit" name="addillness" class="buttonmodal" id="savebttn">Add Record</button>
									</div>
									
								</fieldset>
							</form>
							</div>
					</div>

				</div>
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