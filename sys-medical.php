<?php
require_once 'code.php';
if(isset($_SESSION['admin'])){
	echo "<script> location.replace('admin-medical.php'); </script>";
	exit();
}
if(!isset($_SESSION['system_adm'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}
$illness_code ="";
$student_no="";
$semester ="";
$school_year ="";
if(isset($_POST['addrecords'])){
	$employee_no = $_SESSION['employee_no'];
	$role = $_SESSION['role'];
	$student_no = $_POST['user_studnum'];
	$illness_code = $_POST['user_illnesscode'];
	$school_year = $_POST['user_schoolyear'];
	$semester = $_POST['user_semester'];

	$sql = "SELECT student_no FROM student WHERE student_no = '$student_no'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		$sql = "SELECT illness_code FROM medical_requirement WHERE illness_code = '$illness_code'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) >= 1){
			echo '<script>alert("Illness already recorded before");window.location.href = "sys-medical.php?fail=existing_illness";</script>';
		}else{
			$sql = "INSERT INTO medical_requirement (student_no, illness_code, school_year, semester,datetime_medical)
					VALUES ('$student_no','$illness_code', '$school_year', '$semester',CURRENT_TIMESTAMP);";
			if(mysqli_query($conn, $sql)){
				$sql = "INSERT INTO log (employee_no, role, time_log, action)
							VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'added medical record')";
				if(mysqli_query($conn, $sql)){
				echo '<script>alert("Successfully added a record");window.location.href = "sys-medical.php?addrecords=1";</script>';
				}
			}else{
				echo '<script>alert("Insert record failed");window.location.href = "sys-medical.php?insert=fail";</script>';
			}
		}
	}else{
		echo '<script>alert("Student number does not exist");window.location.href = "sys-medical.php?fail=wrong_student_no";</script>';
	}
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>MEDICAL RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/a-medical.css">
	<script src="jquery-3.5.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
	
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
	<style>
	td,tr {
		height: 26px;
	}
	.modal-content{
		width:55%;
	}
	</style>
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
						<a href="sys-employee.php"><li><i class="fas fa-users"></i>EMPLOYEE</li></a><br>
                        <a href="sys-medical.php"><li id='active'><i class="fas fa-file-medical"></i>MEDICAL</li></a><br>
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
				<span> MEDICAL RECORDS </span>
			</div>
			<div class="table" style = "display:table;">
			
			<table>
							<tr>
								<th>Student No</th>
								<th>Full Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Course Code</th>
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
						$num_per_page = 13;
						$start_from = ($page-1)*13;
						$query = "SELECT * FROM student_vw LIMIT $start_from, $num_per_page;";
						$result = mysqli_query($conn, $query);
						if(isset($_GET['search']))
						{
							$search = $_GET['search'];
							$query = "SELECT * FROM student_vw WHERE student_no LIKE '%$search%' OR full_name LIKE '%$search%'
                                        OR age LIKE '%$search%' OR course_code LIKE '%$search%' OR stud_gender LIKE '%$search%'
                                        LIMIT $start_from, $num_per_page;";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								
								echo    "<tr>";
								echo		"<td>".$row['student_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
                                echo		"<td>".$row['age']."</td>";
                                echo		"<td>".$row['stud_gender']."</td>";
                                echo		"<td>".$row['course_code']."</td>";
								echo		"<td style='background-color:#25bfcd;'><a style='color:#fff' href='sys-medicalreq.php?student_no=".$row['student_no']."'>View</a></td>";					
								echo		"</tr>";
							
								}
								echo "</table>";
								$pr_query = "SELECT * FROM student_vw WHERE student_no LIKE '%$search%' OR full_name LIKE '%$search%'
								OR age LIKE '%$search%' OR course_code LIKE '%$search%' OR stud_gender LIKE '%$search%'";
								$pr_result = mysqli_query($conn,$pr_query);
								$total_record = mysqli_num_rows($pr_result);
								$total_page = ceil($total_record/$num_per_page);
									
								for($i=1;$i<$total_page+1;$i++)
								{
									echo "<div id='page'><a href='sys-medical.php?search=".$search."&submit=Submit&page=".$i."'>$i</a></div>";
								}

						}
						else
						{
							while($row = mysqli_fetch_assoc($result)){
							
								echo    "<tr style='height: 26px;'>";
								echo		"<td>".$row['student_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
                                echo		"<td>".$row['age']."</td>";
                                echo		"<td>".$row['stud_gender']."</td>";
                                echo		"<td>".$row['course_code']."</td>";
								echo		"<td style='width:7%;'><a style='color:#000' href='sys-medicalreq.php?student_no=".$row['student_no']."'>View</a></td>";					
								echo		"</tr>";
							
							}
							echo "</table>";
							$pr_query = "SELECT * FROM student_vw";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
							
						}
						?>	
						<?php
						echo "<div class='paginator'>";
						for($i=1;$i<$total_page+1;$i++)
						{
							echo "<div id='page'><a href='sys-medical.php?page=".$i."'>$i</a></div>";
						}echo "</Sdiv>";
						?>
						
			</div>
			<!-- The Modal -->
			<div id="modal-opener" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<div class="modal-header">
						<h4>Add Record</h4>
						<span class="close">&times;</span>
						
						
					</div>
					<div class="modal-body">
							<div class="information-fillup" id="modal-fielset-div">
								<form method="POST">
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Personal Information</legend>
									<div class="modal-addrecord-info" id="studnum-info">
										<label id="studnum-modal-input">Student Number <span>*</span> </label>
										<input class="modal-fillup" type="text" id="studnum-input" name="user_studnum" required placeholder="xx-xx-xxx">
									</div>
									<div class="modal-addrecord-info" id="semester-info">
										<label id="semester-modal-input">Semester <span>*</span> </label>
										<select name="user_semester" class="modal-fillup" required>
											<option value="" disabled selected id="choose">Choose an option</option>
											<option>First</option>
											<option>Second</option>
											<option>Third</option>
										</select>
									</div>
									<div class="modal-addrecord-info" id="schoolyear-info">
										<label id="schoolyear-modal-input">School Year <span>*</span> </label>
										<input class="modal-fillup" type="text" id="schoolyear-input" name="user_schoolyear" required placeholder="xxxx-xxxx">
									</div>
									<div class="modal-addrecord-info" id="illnesscode-info1">
										<label id="illnesscode-modal-input">Illness Code <span>*</span> </label>
										<select id="mySelect" name="user_illnesscode" class="modal-fillup" required>
											<option value="" disabled selected id="choose" >Choose an option</option>
											<?php
												$sql = "SELECT * FROM illness;";
												$result = mysqli_query($conn, $sql);

												while($row = mysqli_fetch_assoc($result))
												{
													echo "<option value=".$row['illness_code']." data-description=".$row['illness_desc'].">".$row['illness_code']."</option>";
												}
											?>
										</select>
										<div id="illness_description" class="modal-addrecord-info1">
											<?php echo "<p id='description'></p>";?>
										</div>
										<script>    
												$('#mySelect').change(function(){
													var $selected = $(this).find(':selected');

													$('#description').html($selected.data('description'));
												}).trigger('change'); // run handler immediately
										</script> 
									</div>
									
									<div class="modal-footer">
										<button type="submit" value = "Submit" name="addrecords" class="buttonmodal" id="savebttn">Add Record</button>
									</div>
									
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