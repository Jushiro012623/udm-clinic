<?php
require_once 'code.php';
if(isset($_SESSION['admin'])){
	echo "<script> location.replace('admin-consultation.php'); </script>";
	exit();
}
if(!isset($_SESSION['system_adm'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}

if(isset($_POST['addrecords'])){
	$employee_no = $_SESSION['employee_no'];
	$role = $_SESSION['role'];
	$student_no = $_POST['user_studnum'];
	$illness_code = $_POST['user_illnesscode'];
	$preparedby = $_POST['user_preparedby'];

	$sql = "SELECT student_no FROM student WHERE student_no = '$student_no'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		$sql = "INSERT INTO consultation (student_no, illness_code, prepared_by, date_prepared)
				VALUES ('$student_no','$illness_code', '$preparedby',CURRENT_TIMESTAMP);";
		if(mysqli_query($conn, $sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
						VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'added consultation record')";
			if(mysqli_query($conn, $sql)){
			echo '<script>alert("Successfully added a record");window.location.href = "sys-consultation.php?addrecords=1";</script>';
			}
		}else{
			echo '<script>alert("Insert record failed");window.location.href = "sys-consultation.php?insert=fail";</script>';
		}
	}else{
		echo '<script>alert("Student number does not exist");window.location.href = "sys-consultation.php?fail=wrong_student_no";</script>';
	}
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>CONSULTATION RECORD</title>
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
		td,tr {height:26px;}
		.modal-content{width:55%;}
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
                        <a href="sys-medical.php"><li><i class="fas fa-file-medical"></i>MEDICAL</li></a><br>
                        <a href="sys-consultation.php"><li id='active'><i class="fas fa-file-medical"></i>CONSULTATION</li></a><br>
                        <a href="sys-consulted.php"><li><i class="fas fa-file-medical"></i>CONSULTED</li></a><br>
                        <a href="sys-illness.php"><li><i class="fas fa-file-medical"></i>ILLNESS</li></a><br>
                    </ul>
                </div>

				<a href="sys-log.php"><li><i class="fas fa-clipboard-list"></i>TRACK LOGS</li></a>
				<a href="sys-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="sys-consultation.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
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
								<th>Illness Code</th>
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
						$query = "SELECT * FROM notconsulted_medreqVW LIMIT $start_from, $num_per_page;";
						$result = mysqli_query($conn, $query);
						if(isset($_GET['search']))
						{
							$search = $_GET['search'];
							$query = "SELECT * FROM notconsulted_medreqVW WHERE student_no LIKE '%$search%' OR age LIKE '%$search%' 
							OR illness_code LIKE '%$search%'OR full_name LIKE '%$search%' 
							LIMIT $start_from, $num_per_page ;";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								echo    "<tr>";
								echo		"<td>".$row['student_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
								echo		"<td>".$row['age']."</td>";
								echo		"<td>".$row["illness_code"]."</td>";
								echo		"<td style='background-color:#25bfcd;'><a style='color:#fff' href='sys-consultationview.php?student_no=".$row['student_no']."&illness_code=".$row['illness_code']."&date_prepared=".$row['date_prepared']."'>Consult</a></td>";
								echo		"<td style='background-color:#FF0000;'><a style='color:#fff'href = 'sys-consultation.php?consultation-delete=1&student_no=".$row['student_no']."&illness_code=".$row['illness_code']."&date_prepared=".$row['date_prepared']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>";						
								echo		"</tr>";
						
							}
							echo "</table>";
							$pr_query = "SELECT * FROM notconsulted_medreqVW WHERE student_no LIKE '%$search%' OR age LIKE '%$search%' 
							OR illness_code LIKE '%$search%'OR full_name LIKE '%$search%'";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
								
							for($i=1;$i<$total_page+1;$i++)
							{
								echo "<div id='page'><a href='sys-consultation.php?search=".$search."&submit=Submit&page=".$i."'>$i</a></div>";
								
							}
							
							
						}
						else
						{
							while($row = mysqli_fetch_assoc($result)){
							
								echo    "<tr>";
								echo		"<td>".$row['student_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
								echo		"<td>".$row['age']."</td>";
								echo		"<td>".$row["illness_code"]."</td>";
								echo		"<td style='width:7%;'><a style='color:#000' href='sys-consultationview.php?student_no=".$row['student_no']."&illness_code=".$row['illness_code']."&date_prepared=".$row['date_prepared']."'>Consult</a></td>";
								echo		"<td style='width:7%;'><a style='color:#000'href = 'sys-consultation.php?consultation-delete=1&student_no=".$row['student_no']."&illness_code=".$row['illness_code']."&date_prepared=".$row['date_prepared']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>";						
								echo		"</tr>";
							
							}
							echo "</table>";
							$pr_query = "SELECT * FROM notconsulted_medreqVW";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
								
							
						}
						?>	
						<?php
						
						echo "<div class='paginator'>";
							for($i=1;$i<$total_page+1;$i++)
							{
								echo "<div id='page'><a href='sys-consultation.php?page=".$i."'>$i</a></div>";
							}
						echo "</div>";?>	
						
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

									<div class="modal-addrecord-info" id="illnesscode-info">
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
									</div>

									<div class="modal-addrecord-info" id="semester-info">
										<label id="semester-modal-input">Prepared By <span>*</span> </label>
										<input style="color:#888;"id="prepared-input"  name="user_preparedby" value="<?php echo $_SESSION['full_name'];?>" readonly></input>
									</div>

									<div id="illness_description" class="modal-addrecord-info1">
											<?php echo "<p id='description'></p>";?>
										</div>
										<script>    
												$('#mySelect').change(function(){
													var $selected = $(this).find(':selected');

													$('#description').html($selected.data('description'));
												}).trigger('change'); // run handler immediately
										</script> 
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