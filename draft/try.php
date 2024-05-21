<?php
require_once 'code.php';
    


if(isset($_POST['addrecord']))
{
	$student_no = $_POST['user_studnum'];
	$stud_lname = $_POST['user_lname'];
	$stud_fname = $_POST['user_fname'];
	$stud_email = $_POST['user_email'];
	$birthday = $_POST['user_bday'];
	$stud_gender = $_POST['user_gender'];
	$course_code = $_POST['user_coursecode'];

	$sql = "INSERT INTO student (student_no, stud_lname, stud_fname, stud_email, birthday, stud_gender, course_code) 
			VALUES ('$student_no', '$stud_lname', '$stud_fname', '$stud_email',' $birthday', '$stud_gender', '$course_code');";
	if (mysqli_query($conn, $sql)) {
		header("location: admin-medical.php?add=1");
		echo "New record created successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
	<link rel="stylesheet" type="text/css" href="css/records.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
</head>

<body>

<form method="POST">
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Personal Information</legend>
									<div class="modal-addrecord-info" id="studnum-info">
										<label id="studnum-modal-input">Student Number <span>*</span> </label>
										<input class="modal-fillup" type="text" id="studnum-input" name="user_studnum" required placeholder="xx-xx-xxx">
									</div>
									<div class="modal-addrecord-info" id="lname-info">
										<label id="lname-modal-input">Last Name <span>*</span> </label>
										<input class="modal-fillup" type="text" id="lname-input" name="user_lname" required placeholder="xxxx-xxxxx">
									</div>
									<div class="modal-addrecord-info" id="fname-info">
										<label id="fname-modal-input">First Name <span>*</span> </label>
										<input class="modal-fillup" type="text" id="fname-input" name="user_fname" required placeholder="xxxxx-xxxxx">
									</div>
									<div class="modal-addrecord-info" id="email-info">
										<label id="email-modal-input">Email Address <span>*</span> </label>
										<input class="modal-fillup" type="text" id="email-input" name="user_email" required placeholder="xxxxxxx@xxx.xxx">
									</div>
									<div class="modal-addrecord-info" id="bday-info">
										<label id="bday-modal-input">Birthday <span>*</span> </label>
										<input class="modal-fillup" type="date" id="bday-input" name="user_bday" required placeholder="xx-xx-xxxx">
									</div>
									<div class="modal-addrecord-info" id="gender-info">
										<label id="gender-modal-input">Gender <span>*</span> </label>
										<select name="user_gender" class="modal-fillup" required>
											<option value="" disabled selected >Choose an option</option>
											<option >Male</option>
											<option >Female</option>
										</select>
									</div>
									<div class="modal-addrecord-info" id="collegecode-info">
										<label id="collegecode-modal-input">College Code <span>*</span> </label>
										<select name="user_collegecode" class="modal-fillup" required>
											<option value="" disabled selected id="choose" >Choose an option</option>
											<?php
												$sql = "SELECT college_code FROM college;";
												$result = mysqli_query($conn, $sql);

												while($row = mysqli_fetch_assoc($result))
												{
													echo "<option>".$row['college_code']."</option>";
												}
											?>
										</select>
									</div>
									<div class="modal-addrecord-info" id="coursecode-info">
										<label id="coursecode-modal-input">Course Code <span>*</span> </label>
										<select name="user_coursecode" class="modal-fillup" required>
											<option value="" disabled selected id="choose" >Choose an option</option>
											<?php
												$sql = "SELECT course_code FROM course;";
												$result = mysqli_query($conn, $sql);

												while($row = mysqli_fetch_assoc($result))
												{
													echo "<option>".$row['course_code']."</option>";
												}
											?>
										</select>
									</div>
									<div class="modal-addrecord-info" id="blockno-info">
										<label id="blockno-modal-input">Block No <span>*</span> </label>
										<input class="modal-fillup" type="text" id="blockno-input" name="user_blockno" required placeholder="xxxx">
									</div>
									<div class="modal-addrecord-info" id="illnesscode-info">
										<label id="illnesscode-modal-input">Illness Code <span>*</span> </label>
										<select name="user_illnesscode" class="modal-fillup" required>
											<option value="" disabled selected id="choose" >Choose an option</option>
											<?php
												$sql = "SELECT illness_code FROM illness;";
												$result = mysqli_query($conn, $sql);

												while($row = mysqli_fetch_assoc($result))
												{
													echo "<option>".$row['illness_code']."</option>";
												}
											?>
										</select>
									</div>
									<div class="modal-addrecord-info" id="schoolyear-info">
										<label id="schoolyear-modal-input">School Year <span>*</span> </label>
										<input class="modal-fillup" type="text" id="schoolyear-input" name="user_schoolyear" required placeholder="xxxx-xxxx">
									</div>
									
									<div class="modal-addrecord-info" id="semester-info">
										<label id="semester-modal-input">Semester <span>*</span> </label>
										<select name="user_semester" class="modal-fillup" required >
											<option value="" disabled selected id="choose">Choose an option</option>
											<option value="1">First</option>
											<option value="2">Second</option>
											<option value="3">Third</option>
										</select>
									</div>
									<div class="modal-footer">
										<button type="submit" value ="Submit" name="addrecord" class="buttonmodal" id="savebttn">Add Record</button>
									</div>
									
								</fieldset>
                                            </form>
</body>

