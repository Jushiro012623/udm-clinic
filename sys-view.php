<?php
require_once 'code.php';
if(isset($_SESSION['admin'])){
	echo "<script> location.replace('view.php'); </script>";
	exit();
}
if(!isset($_SESSION['system_adm'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}
	$datetime_medical = $_GET['datetime_medical'];
	$student_no = $_GET['student_no'];

	$sql = "SELECT * FROM stud_consult_vw WHERE student_no = '$student_no' AND datetime_medical = '$datetime_medical'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

if(isset($_POST['consult']))
{
	$employee_no = $_SESSION['employee_no'];
	$role = $_SESSION['role'];
	$illness_code = $row['illness_code'];
	$datetime_medical = $row['datetime_medical'];
	$school_year = $row['school_year'];
	$prepared_by = $_POST['user_prepared'];
	$attending_physician = $_POST['user_attending'];
	$diagnosis = $_POST['user_diagnosis'];

	$sql = "INSERT INTO consultation (student_no, illness_code, attending_physician, prepared_by, date_consulted, diagnosis)
			VALUES ('$student_no','$illness_code','$attending_physician','$prepared_by',CURRENT_TIMESTAMP, '$diagnosis')";
	if(mysqli_query($conn, $sql)){
	$sql = "UPDATE medical_requirement SET status = 'consulted' WHERE student_no = '$student_no' 
			AND illness_code = '$illness_code'
			AND school_year = '$school_year' 
			AND datetime_medical = '$datetime_medical'";
		if(mysqli_query($conn, $sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
							 VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'consulted a record')";
			if(mysqli_query($conn, $sql)){
			echo "<script>alert('Consult record success');window.location.href = 'sys-medical.php?consult=success';</script>";
			}else{
				echo "<script>alert('Consult record failed');window.location.href = 'sys-medical.php?consult=fail';</script>";
			}
		}else{
			echo "<script>alert('Update record failed');window.location.href = 'sys-medical.php?updaterecord=error';</script>";
		}
	}else{
		echo "<script>alert('Consult record failed');window.location.href = 'sys-medical.php?colnsultrecord=error';</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
	
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap');
*{
	margin:0;
	padding:0;
	box-sizing:border-box;
}

body{
	font-family: 'Montserrat', sans-serif;
	margin:0;
	padding:0;
    background-color: #d9eff1;

}
/* Modal Content */
.modal-content {
	/* border-radius:15px; */ /*kung trip mo ng medjo bilog balik mo*/
	position: relative;
	background-color: #fefefe;
	margin: auto;
	padding: 0;
	width: 65%;
	margin-top:3%;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	-webkit-animation-name: animatetop;
	-webkit-animation-duration: 0.6s;
	animation-name: animatetop;
	animation-duration: 0.6s;
}
/* 
/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {	
	from {top:-300px; opacity:0}
	to {top:0; opacity:1}
} */

/* The Close Button */
.close {
	color: white;
	font-size: 28px;
	font-weight: bold;
}

.close:hover,
.close:focus {
	color: #000;
	text-decoration: none;
	cursor: pointer;
}

.modal-header {
	padding: 2px 16px;
	display:flex;
	height:5vh;
	background-color: #41a8b1;
	color: white;
	align-items:center;
	justify-content:space-between;
		
}
.modal-header h4{
	font-weight:lighter;
}
.modal-body {
	height:auto;
	padding: 5px 16px;
	display:grid;
	grid-template-columns: repeat(2 1fr);
	grid-template-rows: repeat(2, 1fr);
	column-gap:20px;
	row-gap:10px;
}

.modal-footer {
	color: white;
	height:7vh;
	display:flex;
	justify-content:flex-start;
	align-items: center;
	width:100%;
}
.modal-footer .buttonmodal{
	width:48%;
	margin-bottom:5px;
	color:white;
	cursor:pointer;
	border:none;
	height: 70%;
}

#modal-fielset-div{/*div of filup*/
	grid-column-start:1;
	grid-column-end:3;
	grid-row-start:1;
	grid-row-end:3;
	
	margin-top: 2%;
	align-content:center;
	margin-bottom: 1.5%;
}
/*START OF MODAL*/
.content .modal .modal-body .information-fillup .personal-info-fillup,.consultation-info{ /*field set*/
	padding:10px;
	display:flex;
	flex-wrap:wrap;
	margin: 0 auto;
	justify-content: center;
	border: 1px solid #41a8b1; /*border color*/
	

}
.content .modal .modal-body .information-fillup .personal-info-fillup,.consultation-info legend{
	color:#41a8b1; /*legend color*/
}

#modal-fieldset .modal-addrecord-info label{
	font-size:10px;
	font-weight: lighter;
	font: 10px Arial, Helvetica, sans-serif;
	margin-bottom: 3px;
}
#modal-fieldset .modal-addrecord-info input, select	{
	height: 25px;
	outline:none;
	border: 1px solid #41a8b1; /*border color*/
	padding-left:5px;
	font: 11px Arial, Helvetica, sans-serif;
	font-weight: lighter;
}
select{
	cursor: pointer;
}	
#modal-fieldset .modal-addrecord-info{
	display: flex;
	flex-direction: column;
	font-size:.8em;
	margin-bottom: 3%;
}
#modal-fieldset{
	display: flex;
	justify-content:space-between;
	color: #41a8b1;/*FOnt color for label*/	
	letter-spacing: .5px;
}
/* DIV SIZE FOR MODAL */
#studnum-info, #lname-info, #fname-info,
#illnesscode-info,
#coursecode-info, #collegecode-info, #schoolyear-info, #semester-info{
	width: 32%;
}
#email-info{
	width: 41%;	
}
#gender-info{
	width: 25%;
}
#bday-info{
	width: 30%;
}
#attending-info{
	width: 49%;
}
#diagnosis-info{
	width: 70%;
}
#prepared-info{
	width: 49%;
}
input[type="date"] {
	position: relative;
	padding: 10px;
}
  
input[type="date"]::-webkit-calendar-picker-indicator {
	color: transparent;
	background: none;
	z-index: 1;
	cursor: pointer;
}
  
input[type="date"]:before {
	color: transparent;
	background: none;
	display: block;
	font-family: 'FontAwesome';
	content: '\f073';
	/* This is the calendar icon in FontAwesome */
	width: 15px;
	height: 20px;
	position: absolute;
	top: 5px;
	right: 0;
	color: #999;
}
input[type=date]:invalid::-webkit-datetime-edit {
    color: #999;
}
select:required:invalid {
	color: #999;
}
option[value=""][disabled] {
	display: none;
}
option {
	color: black;
}
#inputed-studnum,#inputed-lname,#inputed-fname,#inputed-email,#inputed-gender,
#inputed-bday,#inputed-illnesscode,#inputed-collegecode,#inputed-blockno,#inputed-coursecode,
#inputed-schoolyear,#inputed-semester, #inputed-prepared{
	height: 23px;
	display: flex;
	border: 1px solid #41a8b1; /*border color*/
	padding-left:5px;
	font: 11px Arial, Helvetica, sans-serif;
	font-weight: lighter;
	align-items: center;
}
.inputed{
	height: 100vh;
	width: 100vw;
	position: absolute;
	top: 0;
	left:0;
}
.inputed .modal-content{
	height: auto;
}
.inputed .close1 {
	color: white;
	font-size: 28px;
	font-weight: bold;
}

.inputed .close1:hover,
.inputed .close1:focus {
	color: #000;
	text-decoration: none;
	cursor: pointer;
}
#modal-fieldset-inputed{		
	padding:10px;
	display:flex;
	flex-wrap:wrap;
	margin: 0 auto;
	justify-content: space-between;
	border: 1px solid #41a8b1; /*border color*/
}
.inputed .modal-addrecord-info{
	margin-bottom: 3%;
	color:#41a8b1;
}
#modal-fieldset-inputed label{
	font: 11px Arial, Helvetica, sans-serif;
}
#modal-fieldset-inputed legend{color:#41a8b1;}
#backbttn{
	margin-right:20px
}
#backbttn,#consultbtn{
	width:10%;
	margin-bottom:5px;
	color:white;
	cursor:pointer;
	border:none;
	height: 60%;
}
#consultbtn{
	background:#41a8b1;
}
#consultbtn:hover{
	background:#368a91;
}
#consultbtn:active{
	transition: 0.2s;
	background:#41a8b1;
}
#backbttn{
	background:red;
}
#backbttn:hover{
	background:maroon;
}
#backbttn:active{
	transition: 0.2s;
	background:#41a8b1;
}
    </style>
</head>
<body>
<section class="inputed" id="user-inputed">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Consultation</h4>
					</div>
					<div class="modal-body">
						<div class="information-inputed" id="modal-fielset-div">
							<form method="POST">
							<fieldset class="personal-info-inputed" id="modal-fieldset-inputed">
								<legend>Personal Information</legend>
								<div class="modal-addrecord-info" id="studnum-info">
									<label>Student Number</label>
									<span id="inputed-studnum"><?php echo $student_no;?></span>						
								</div>
								<div class="modal-addrecord-info" id="lname-info">
									<label>Lastname</label>
									<span id="inputed-lname"><?php echo $row['stud_lname'];?></span>						
								</div>	
								<div class="modal-addrecord-info" id="fname-info">
									<label>First Name</label>
									<span id="inputed-fname"><?php echo $row['stud_fname'];?></span>						
								</div>	
								<div class="modal-addrecord-info" id="email-info">
									<label>Email</label>
									<span id="inputed-email"><?php echo $row['stud_email'];?></span>						
								</div>	
								<div class="modal-addrecord-info" id="bday-info">
									<label>Birthday</label>
									<span id="inputed-bday"><?php echo $row['birthday'];?></span>						
								</div>	
								<div class="modal-addrecord-info" id="gender-info">
									<label>Gender</label>
									<span id="inputed-gender"><?php echo $row['stud_gender'];?></span>						
								</div>	
								<div class="modal-addrecord-info" id="collegecode-info">
									<label>College Code</label>
									<span id="inputed-collegecode"><?php echo $row['college_code'];?></span>					
								</div>	
								<div class="modal-addrecord-info" id="coursecode-info">
									<label>Course Code</label>
									<span id="inputed-coursecode"><?php echo $row['course_code'];?></span>					
								</div>
								<div class="modal-addrecord-info" id="illnesscode-info">
									<label>Illness Code</label>
									<span id="inputed-illnesscode"><?php echo $row['illness_code'];?></span>					
								</div>	
								<div class="modal-addrecord-info" id="schoolyear-info">
									<label>School Year</label>
									<span id="inputed-schoolyear"><?php echo $row['school_year'];?></span>						
								</div>		
								<div class="modal-addrecord-info" id="semester-info">
									<label>Semester</label>
									<span id="inputed-semester"><?php echo $row['semester'];?></span>						
								</div>			
								
							</fieldset>
							<fieldset class="consultation-info" id="modal-fieldset">
								<legend>Consultation</legend>
										
								<div class="modal-addrecord-info" id="prepared-info">
									<label>Prepared By</label>
									<input class="consultation-fillup" type="text" id="prepared-input" name="user_prepared" required>						
								</div>	
								<div class="modal-addrecord-info" id="attending-info">
									<label id="attending-modal-input">Attending Physician <span style="color: red;">*</span> </label> </label>
									<input class="consultation-fillup" type="text" id="attending-input" name="user_attending" required>
								</div>
								<div class="modal-addrecord-info" id="diagnosis-info">
									<label id="diagnosis-modal-input">Diagnosis <span style="color: red;">*</span> </label> </label>
									<input class="consultation-fillup" type="text" id="diagnosis-input" name="user_diagnosis" required>
								</div>

								<div class="modal-footer">
										<button  onclick="window.location.href='/clinicupdate/sys-medical.php'" value = "back" name="back" class="buttonmodal" id="backbttn">Back</button>
										<button  type="submit" value="consult" name="consult" class="buttonmodal" id="consultbtn">Consult</button>
									</div>
							</fieldset>
						</form>
						</div>
					</div>
					
		</section>
<script>
	var modal = document.getElementById("modal-opener");
	var btn = document.getElementById("addbttn");

	var viewbttn = document.getElementById("view");								
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
		else if(event.target == inputedModal) {
			inputedModal.style.display = "none";
		}
	}
	var inputedModal = document.getElementById("user-inputed");
	var spantwo = document.getElementsByClassName("close1")[0];

	viewbttn.onclick = function(){
		document.getElementById("user-inputed").style.display = "flex";
	}
	spantwo.onclick = function() {
		inputedModal.style.display = "none";
	}

	function opens() {
		window.open("C:/xampp/htdocs/clinicupdated3/records.html", "_blank");
	}
</script>
</body>
</html>