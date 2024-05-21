<?php require_once 'code.php';
if(isset($_SESSION['admin'])){
	echo "<script> location.replace('admin-home.php'); </script>";
	exit();
}
if(!isset($_SESSION['system_adm'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}

if(isset($_POST['addemployee']))
{
	$employee_no	= $_POST['user_employeeno'];
	$employee_lname	= $_POST['user_lname'];
	$employee_fname	= $_POST['user_fname'];
	$employee_email	= $_POST['user_email'];
	$employee_birthday	= $_POST['user_birthday'];
	$employee_gender	= $_POST['user_gender'];
	$employee_position	= $_POST['user_position'];
	$employee_mobile	= $_POST['user_mobile'];
	$employee_address 	= $_POST['user_address'];


	$sql = "SELECT * FROM employee WHERE employee_no = '$employee_no'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		echo '<script>alert("User Already Exists");window.location.href = "sys-employee.php?addrecords=fail";</script>';
	}else{
		$sql = "INSERT INTO employee (employee_no, employee_lname, employee_fname, employee_email, employee_birthday, employee_gender, employee_position, employee_mobile, employee_address)
				VALUES ('$employee_no','$employee_lname','$employee_fname','$employee_email','$employee_birthday','$employee_gender','$employee_position','$employee_mobile','$employee_address')";
		
		if(mysqli_query($conn,$sql))
		{
			$sql = "INSERT INTO users (employee_no)
					VALUES ('$employee_no')";
			if(mysqli_query($conn, $sql))
			{
				$employeeno = $_SESSION["employee_no"];
						$role = $_SESSION["role"];
						$sql = "INSERT INTO log (employee_no, role, time_log, action)
								VALUES     ('$employeeno', '$role', CURRENT_TIMESTAMP, 'Added an Employee Record')";
						if (!mysqli_query($conn, $sql)) {
							$errors['insert'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
						else
						{
							echo '<script>alert("Successfully added a record");window.location.href = "sys-employee.php?addrecords=1";</script>';
						}
			}
		}
	}
}


if(isset($_GET['delete1']))
{
	$employee_no = $_GET['employee_no'];
	$role = $_SESSION["role"];
		$sql = "UPDATE employee SET display = 'inactive' WHERE employee_no = '$employee_no'";

		if(mysqli_query($conn, $sql))
		{
			$sql = "UPDATE users SET display = 'inactive' WHERE employee_no = '$employee_no'";
			if(mysqli_query($conn, $sql)){
				$sql = "INSERT INTO log (employee_no, role, time_log, action)
				 VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'Deleted an employee record')";
				if (!mysqli_query($conn, $sql)) {
					$errors['insert'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				else
				{
					echo '<script>alert("Successfully deleted a record");window.location.href = "sys-employee.php?delete=1";</script>';
				}
			}
		}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>EMPLOYEE RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/system-employee.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
	
	<link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
	<!-- Favicons-->
	<link rel="icon" href="img/favicon/medical.png" sizes="32x32">
 	<!-- Favicons-->
 	<link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
</head>
<body>
	<div class="container">
		<nav class="navigation">
			<h1>menu</h1>

			<ul class="tabs"> 
				<a href="sys-home.php"><li><i class="fa fa-home"></i>HOME</li></a>
				<a href="sys-profile.php"><li><i class="fa fa-user"></i>PROFILE</li></a>

				<div class="dropdown">
                    <a><label for="checkbox"><li><i class="fas fa-clipboard-list"></i></i>RECORDS</li></label></a>
                    <input type="checkbox" id="checkbox"/>
                    <ul>
						<a href="sys-employee.php"><li id='active'><i class="fas fa-users"></i>EMPLOYEE</li></a><br>
                        <a href="sys-medical.php"><li><i class="fas fa-file-medical"></i>MEDICAL</li></a><br>
						<a href="sys-consultation.php"><li><i class="fas fa-file-medical"></i>CONSULTATION</li></a><br>
                        <a href="sys-consulted.php"><li><i class="fas fa-file-medical"></i>CONSULTED</li></a><br>
                        <a href="sys-illness.php"><li><i class="fas fa-file-medical"></i>ILLNESS</li></a><br>
                    </ul>
                </div>
				
				<a href="sys-log.php"><li><i class="fas fa-clipboard-list"></i>TRACK LOGS</li></a>
				<a href="sys-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="sys-employee.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
			</ul>
		</nav>
		<div class="header" id="fff" >
			<a href="sys-home.php"><img src="img/logo1.png" alt="" style="width: 210px;" draggable="false" ></a>
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
				<span> EMPLOYEE RECORDS </span>
			</div>
			<div class="table">
			
						<table>
							<tr>
								<th>Employee No</th>
								<th>Full Name</th>
								<th>Age</th>
								<th>Position</th>
								<th colspan="2" allign = "center">Actions</th>
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
						$num_per_page = 15;
						$start_from = ($page-1)*15;
						$query = "SELECT * FROM users_vw LIMIT $start_from, $num_per_page;";
						$result = mysqli_query($conn, $query);
						if(isset($_GET['search']))
						{
							$search = $_GET['search'];
							$query = "SELECT * FROM users_vw WHERE employee_no LIKE '%$search%' OR full_name LIKE '%$search%' OR age LIKE '%$search%' OR position LIKE '%$search%'OR username LIKE '%$search%' LIMIT $start_from, $num_per_page ;";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								
								echo    "<tr>";
								echo		"<td>".$row['employee_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
								echo		"<td>".$row['age']."</td>";
								echo		"<td>".$row['position']."</td>";
								echo        "<td style='background-color:#25bfcd;'><a style='color:#fff' href='sys-emprecords.php?employee_no=".$row['employee_no']."'>View</a></td>";					
								echo		"<td style='background-color:#ff4040;'><a style='color:#fff' href='sys-employee.php?delete1=1&employee_no=".$row['employee_no']."'>Delete</a></td>";
								echo	"</tr>";
							
								}
								echo "</table>";
								$pr_query = "SELECT * FROM users_vw WHERE employee_no LIKE '%$search%' OR full_name LIKE '%$search%' OR age LIKE '%$search%' OR position LIKE '%$search%'OR username LIKE '%$search%'";
								$pr_result = mysqli_query($conn,$pr_query);
								$total_record = mysqli_num_rows($pr_result);
								$total_page = ceil($total_record/$num_per_page);
									
								for($i=1;$i<$total_page+1;$i++)
								{
									echo "<div id='page'><a href='sys-users_vw.php?search=".$search."&submit=Submit&page=".$i."'>$i</a></div>";
								}
						}
						else
						{
							while($row = mysqli_fetch_assoc($result)){
							
								echo    "<tr>";
								echo		"<td>".$row['employee_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
								echo		"<td>".$row['age']."</td>";
								echo		"<td>".$row['position']."</td>";
								echo        "<td style='width:7%;'><a style='color:#000;' href='sys-emprecords.php?employee_no=".$row['employee_no']."'>View</a></td>";					
								echo		"<td style='width:7%'><a style='color:#000;' href='sys-employee.php?delete1=1&employee_no=".$row['employee_no']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>";												
								echo	"</tr>";
							
							}
							echo "</table>";
							$pr_query = "SELECT * FROM users_vw";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
								
							
						}
						?>
						<?php
						echo "<div class='paginator'>";
						for($i=1;$i<$total_page+1;$i++)
						{
							echo "<div id='page'><a href='sys-employee.php?page=".$i."'>$i</a></div>";
						}
						echo    "</div>";
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
								<form method = "POST">
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Personal Information</legend>
									<div class="modal-addrecord-info" id="employee-no-info">
										<label class="personal-info" for="lname" id="employeeno-modal-input">Employee No.<span>*</span> </label>
										<input type="text" id="employeeno" name="user_employeeno" required>
									</div>
									<div class="modal-addrecord-info" id="lastname-info">
										<label class="personal-info" for="lname" id="lastname-modal-input">Last Name <span>*</span> </label>
										<input type="text" id="fname" name="user_fname" required>
									</div>
									<div class="modal-addrecord-info" id="firstname-info">
										<label class="personal-info" for="lname" id="firstname-modal-input">First Name <span>*</span> </label>
										<input type="text" id="fname" name="user_lname" required>
									</div>
									
									<div class="modal-addrecord-info" id="email-info">
										<label class="personal-info" for="email" id="email-modal-input">Email Address <span>*</span> </label>
										<input type="email" id="email-addrecord-modal" name="user_email" required>
									</div>
									<div class="modal-addrecord-info" id="address-info">
										<label class="personal-info" for="address" id="address-modal-input">Address <span>*</span> </label>
										<input type="text" id="address-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="contact-info">
										<label class="personal-info" for="contact" id="contact-modal-input">Contact <span>*</span> </label>
										<input type="number" id="contact-modal" name="user_mobile" required>
									</div>
									<div class="modal-addrecord-info" id="birthday-info">
										<label class="personal-info" for="birthday" id="birthday-modal-input">Birthday <span>*</span> </label>
										<input type="date" id="birthday-modal" name="user_birthday" required>
									</div>

									<div class="modal-addrecord-info" id="gender-info">
										<label class="personal-info" for="gender" id="gender-modal-input">Gender <span>*</span> </label>
										<select type="text" id="age-modal" name="user_gender" required>
											<option value="" disabled selected id="choose">Choose an option</option>
											<option>Male</option>
											<option>Female</option>
										</select>
									</div>

									<div class="modal-addrecord-info" id="position-info">
										<label class="personal-info" for="address" id="address-modal-input">Position<span>*</span> </label>
										<select type="text" id="position-modal" name="user_position" required>
											<option value="" disabled selected id="choose">Choose an option</option>
											<option>Doctor</option>
											<option>Dentist</option>
											<option>Nurse</option>
										</select>
									</div>
									
									<button id="modal-add"type="submit" name="addemployee">Add Record</button>
									
								</fieldset>
								
								
							</form>
							</div>
					</div>

				</div>
			</div>


		</div>
		
	</div>
	<!-- <footer>
		<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>,
		Universidad De Manila, Philippines</p>
	</footer> -->
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