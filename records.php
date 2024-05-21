<?php
	require_once 'code.php';

	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = 1;
	}
	$num_per_page = 05;
	$start_from = ($page-1)*05;




	$query = "SELECT * FROM records_vw LIMIT $start_from, $num_per_page;";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/records.css">
	
	<link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
	<!-- Favicons-->
	<link rel="icon" href="img/favicon/medical.png" sizes="32x32">
 	<!-- Favicons-->
 	<link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
</head>
<body>
	<div class="container">
		<nav class="navigation">
			<div class="logo">LOGO</div>
			<ul class="tabs"> 
				<a href="home-admin.php"><li><i class="fa fa-home"></i>HOME</li></a>
				<a href="profile.php"><li><i class="fa fa-user"></i>PROFILE</li></a>
				<a href="records.php"><li id="active"><i class="fas fa-file-medical"></i>RECORDS</li></a>
				<a href="settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="index.php"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
			</ul>
		</nav>
		<div class="header" id="fff" >
			<h2>Dashboard</h2>
			<div class="user-icons">
				<span>Ivan Macabontoc</span>
			</div>
			
		</div>
		<div class="finder" id="fff">		
			<div class="searchbar-div">
			<input type="text" placeholder="Search.." class="searchbar">
			<button type="submit" class="searchbttn" id="search-bttn"><i class="fa fa-search"></i></button>
			</div>
			<button type="button" class="addrecord" id="addbttn">ADD RECORD</button>
			<!-- <div class="dropbox" id="options">
				<select name="first-selection" class="selection1" onchange="hiden(this)">
					<option selected disabled>Choose an option</option>
					<option value="1">College</option>
					<option value="2">Employee</option>
					<option value="3">Age</option>
					<option value="4">Illness</option>
					<option value="5">Year</option>
				</select>
			</div>
			Selection for college*
			<div class="dropbox" id="college-drpdwn"> 
				<select name="colleges" class="college-selection" >
					<option selected disabled >Choose an option</option>
					<option value="1">CET</option>
					<option value="2">CBA</option>
					<option value="3">CC</option>
				</select>
			</div>
			END Selection for college*
			
			Selection for emplyee*
			<div class="dropbox" id="employee-drpdwn"> 
				<select name="employee" class="employee-selection" >
					<option selected disabled >Choose an option</option>
					<option value="1">Nurse</option>
					<option value="2">Doctor</option>
					<option value="3">Janitor</option>
				</select>
			</div>
			END Selection for emplyee*
			
			Selection for Illness
			<div class="inputbox" id="illness-drpdwn"> 
				<input id="illness" name="illness"  type="text" placeholder="Input Illness"  class="illness-selection" >
			</div>
			END Selection for Illness*
			
			
			Selection for age*
			<div class="inputbox" id="age-drpdwn"> 
				<input name="age"   type="number" min="1" max="200" placeholder="Input Age" class="age-selection"  >
			</div>
			END Selection for age*
			
			Selection for Year
			<div class="inputbox" id="year-drpdwn"> 
				<input name="year"   type="number" min="1" max="2021" placeholder="Input Year" class="year-selection"  >
			</div>
			END Selection for year*
			
			<button type="button" class="submit" onclick="colors" id="submition">Submit</button> -->
		</div>
		<div class="content" id="fff">
			<div class="record">
				<span> RECORDS </span>
			</div>
			<div class="table">
			
						<table border="2">
						<?php
						while ($row = mysqli_fetch_assoc($result)){
							
							echo    "<tr>";
							echo		"<td>".$row['student_no']."</td>";
							echo		"<td>".$row['full_name']."</td>";
							echo		"<td>".$row['age']."</td>";
							echo		"<td>".$row["illness_desc"]."</td>";
							echo		"<td>".$row["attending_physician"]."</td>";
							echo		"<td>".$row["date_consulted"]."</td>";
							echo		"<td>".$row["diagnosis"]."</td>";
							echo		"<td>".$row["semester"]."</td>";
							echo		"</tr>";
						
							}
						?>
						</table>
						<?php
							$pr_query = "SELECT * FROM records_vw";
							$pr_result = mysqli_query($conn,$pr_query);
							$total_record = mysqli_num_rows($pr_result);
							$total_page = ceil($total_record/$num_per_page);
								
							for($i=1;$i<$total_page+1;$i++)
							{
								echo "<a href='records.php?page=".$i."'>$i</a>";
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
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Personal Information</legend>
									<div class="modal-addrecord-info" id="lastname-info">
										<label class="personal-info"  id="lastname-modal-input">Last Name <span>*</span> </label>
										<input type="text" id="lname" name="user_lname" required>
									</div>
									<div class="modal-addrecord-info" id="firstname-info">
										<label class="personal-info"  id="firstname-modal-input">First Name <span>*</span> </label>
										<input type="text" id="fname" name="user_fname" required>
									</div>
									<div class="modal-addrecord-info" id="middlename-info">
										<label class="personal-info" id="middlename-modal-input">Middle Name <span>*</span> </label>
										<input type="text" id="mname" name="user_mname" required>
									</div>
									
									<div class="modal-addrecord-info" id="email-info">
										<label class="personal-info"  id="lastname-modal-input">Email Address <span>*</span> </label>
										<input type="text" id="email-addrecord-modal" name="user_email" required>
									</div>
									<div class="modal-addrecord-info" id="contact-info">
										<label class="personal-info"  id="contact-modal-input">Contact <span>*</span> </label>
										<input type="text" id="contact-modal" name="user_contact" required>
									</div>
									<div class="modal-addrecord-info" id="address-info">
										<label class="personal-info"  id="address-modal-input">Address <span>*</span> </label>
										<input type="text" id="address-modal" name="user_address" required>
									</div>
								</fieldset>
								<fieldset class="other-info-fillup" id="modal-fieldset">
									<legend>Other Information</legend>
									<div class="modal-addrecord-info" id="college-info">
										<label class="other-info"  id="college-modal-input">College <span>*</span> </label>
										<input type="text" id="college" name="user_college" required>
									</div>
									<div class="modal-addrecord-info" id="course-info">
										<label class="other-info"  id="course-modal-input">Course <span>*</span> </label>
										<input type="text" id="course" name="user_course" required>
									</div>
									<div class="modal-addrecord-info" id="blockno-info">
										<label class="other-info"  id="blockno-modal-input">Block Number <span>*</span> </label>
										<input type="text" id="blockno" name="user_blockno" required>
									</div>
									
									<div class="modal-addrecord-info" id="studnum-info">
										<label class="other-info" id="studnum-modal-input">Student Number <span>*</span> </label>
										<input type="text" id="studnum-addrecord-modal" name="user_studnum" required>
									</div>
								</fieldset>
								<fieldset class="consultation-fillup" id="modal-fieldset">
									<legend>Consultation</legend>
									<div class="modal-addrecord-info" id="illnesscode-info">
										<label class="consultation-info"  id="illnesscode-modal-input">Illness Code <span>*</span> </label>
										<input type="text" id="illnesscode" name="user_illnesscode" required>
									</div>
									<div class="modal-addrecord-info" id="physician-info">
										<label class="consultation-info"  id="physician-modal-input">Physician <span>*</span> </label>
										<input type="text" id="physician" name="user_physician" required>
									</div>
									<div class="modal-addrecord-info" id="dateconsulted-info">
										<label class="consultation-info"  id="dateconsulted-modal-input">Date Consulted <span>*</span> </label>
										<input type="text" id="dateconsulted" name="user_dateconsulted" required>
									</div>
									
									<div class="modal-addrecord-info" id="diagnosis-info">
										<label class="consultation-info"  id="diagnosis-modal-input">Diagnosis <span>*</span> </label>
										<input type="text" id="diagnosis" name="user_diagnosis" required>
									</div>
								</fieldset>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="buttonmodal" id="closebttn">Close</button>
						<button type="button" class="buttonmodal" id="savebttn">Save</button>
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
/*	
	function hiden(a) {
		var x = (a.value || a.options[a.selectedIndex].value);	
		
		if(x == 1){ // hide all execpt college
			document.getElementById('college-drpdwn').style.display = "flex";
			document.getElementById('employee-drpdwn').style.display = "none";
			document.getElementById('age-drpdwn').style.display = "none";
			document.getElementById('illness-drpdwn').style.display = "none";
			document.getElementById('year-drpdwn').style.display = "none";
		}
		else if(x == 2){ // hide all execpt employee
			document.getElementById('college-drpdwn').style.display = "none";
			document.getElementById('employee-drpdwn').style.display = "flex";
			document.getElementById('age-drpdwn').style.display = "none";
			document.getElementById('illness-drpdwn').style.display = "none";
			document.getElementById('year-drpdwn').style.display = "none";
			
		}
		else if(x == 3){ // hide all execpt age
			document.getElementById('college-drpdwn').style.display = "none";
			document.getElementById('employee-drpdwn').style.display = "none";
			document.getElementById('age-drpdwn').style.display = "flex";
			document.getElementById('illness-drpdwn').style.display = "none";
			document.getElementById('year-drpdwn').style.display = "none";
			
		}
		else if(x == 4){ // hide all execpt illness
			document.getElementById('college-drpdwn').style.display = "none";
			document.getElementById('employee-drpdwn').style.display = "none";
			document.getElementById('age-drpdwn').style.display = "none";
			document.getElementById('illness-drpdwn').style.display = "flex";
			document.getElementById('year-drpdwn').style.display = "none";
			
		}
		else if(x == 5){ // hide all execpt year
			document.getElementById('college-drpdwn').style.display = "none";
			document.getElementById('employee-drpdwn').style.display = "none";
			document.getElementById('age-drpdwn').style.display = "none";
			document.getElementById('illness-drpdwn').style.display = "none";
			document.getElementById('year-drpdwn').style.display = "flex";
			
		}
	}*/
</script>
</body>
</html>