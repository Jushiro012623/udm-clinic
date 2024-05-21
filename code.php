<?php
session_start();
require 'connection.php';
$errors = array();
$msg;
$username = "";
date_default_timezone_set('Asia/Manila');

// 24-hour format of an hour without leading zeros (0 through 23)
$Hour = date('G');

if ( $Hour >= 5 && $Hour <= 11 ) {
    $msg = "Good Morning, ";
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    $msg = "Good Afternoon, ";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $msg = "Good Evening, ";
}

if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        $errors['username'] = "<p id='errorUsername'><i class='fas fa-exclamation-circle'></i> Username Required</p>";
    }//end if
    if (empty($password)) {
        $errors['password'] = "<p id='errorPassword'><i class='fas fa-exclamation-circle'></i> Password Required</p>";
    }//end if
    if(count($errors) === 0) {
		$query = "SELECT * FROM users WHERE employee_no ='$username' AND password = '$password' AND display = 'active'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)){
				if ($row["role"] == "system_admin"){
					$_SESSION['system_adm'] = $row["employee_no"];
					$_SESSION['employee_no'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["role"] = $row["role"];

					$employee_no = $_SESSION['employee_no'];
					$query = "SELECT * FROM profile_vw WHERE employee_no = '$employee_no';";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['full_name'] = $row["full_name"];
					$_SESSION['position'] = $row["position"];
					$_SESSION['email'] = $row["email"];
					$_SESSION['birthday'] = $row["birthday"];
					$_SESSION['age'] = $row["age"];
					$_SESSION['address'] = $row["address"];
					$_SESSION['gender'] = $row["gender"];
					$_SESSION['mobile'] = $row["mobile_number"];
					$_SESSION['picture'] = $row["profile_pic"];
					

					$employee_no = $_SESSION["employee_no"];
					$role = $_SESSION["role"];
					$sql = "INSERT INTO log (employee_no, role, time_log, action)
							 VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'logged in')";
					if (!mysqli_query($conn, $sql)) {
						$errors['insert'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					
					echo "<script> location.replace('sys-home.php'); </script>";
					exit();
				}//end if
				else{
					$_SESSION['admin'] = $row["employee_no"];
					$_SESSION['employee_no'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["role"] = $row["role"];

					$employee_no = $_SESSION['employee_no'];
					$query = "SELECT * FROM profile_vw WHERE employee_no = '$employee_no';";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['full_name'] = $row["full_name"];
					$_SESSION['position'] = $row["position"];
					$_SESSION['email'] = $row["email"];
					$_SESSION['birthday'] = $row["birthday"];
					$_SESSION['age'] = $row["age"];
					$_SESSION['address'] = $row["address"];
					$_SESSION['gender'] = $row["gender"];
					$_SESSION['mobile'] = $row["mobile_number"];
					$_SESSION['picture'] = $row["profile_pic"];
					

					$employee_no = $_SESSION["employee_no"];
					$role = $_SESSION["role"];
					$sql = "INSERT INTO log (employee_no, role, time_log, action)
							 VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'logged in')";
					if (!mysqli_query($conn, $sql)) {
						$errors['insert'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
					}


					echo "<script> location.replace('admin-home.php'); </script>";
					exit();
				}//end else
			}
		}else {
			$errors['login_fail'] = "<p id='errorCredentials'>
            <i class='fas fa-exclamation-circle'></i> Wrong Credentials</p>";}
	}//end else
}//end if

if (isset($_GET['logout'])){
	$employee_no = $_SESSION["employee_no"];
	$role = $_SESSION["role"];
	$sql = "INSERT INTO log (employee_no, role, time_log, action)
			 VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'logged out')";
	if (!mysqli_query($conn, $sql)) {
		$errors['insert'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


    session_destroy();
    unset($_SESSION['employee_no']);

    echo "<script> location.replace('index.php'); </script>";
    exit();
}

/*settings*/
//for password


//for address
if(isset($_POST['add-submit'])){
	if($_POST['curPass']==$_SESSION["password"]){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$address = $_POST['address'];
		if(!empty($_POST['address'])){
			if($_SESSION['address'] != $address){
				$sql = "UPDATE employee SET employee_address='$address' WHERE employee_no='$employee_no'";
				if(mysqli_query($conn, $sql)){	
					$_SESSION['address'] = $address;
					$sql = "INSERT INTO log (employee_no, role, time_log, action)
								VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'updated address')";
					if(mysqli_query($conn, $sql)){
					$errors['success'] = "<p id='success'><i class='fas fa-check-circle'></i> Success</p>";
					}
				}else{
					echo "Error updating record: " . mysqli_error($conn);
				}
			}else{
				$errors['error'] = "<p id='address-error'><i class='fas fa-exclamation-circle'></i>Old Address cannot be used</p>";
			}
		}else{
			$errors['error'] = "<p id='address-error'><i class='fas fa-exclamation-circle'></i>Old Address cannot be blank</p>";
		}
	}else{
		$errors['wrongPass'] = "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> Wrong Password</p>";
	}
}
else if(isset($_POST['cancel']))
{
	echo "<script> location.replace('admin-settings.php'); </script>";
}

//for email
if(isset($_POST['email-submit'])){
								
	if($_POST['curPass']==$_SESSION['password']){
		$email = $_POST['email'];
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		if($_POST['email'] != ""){
			if($_SESSION['email'] != $email){
				$sql = "UPDATE employee SET employee_email='$email' WHERE employee_no='$employee_no'";
				if(mysqli_query($conn, $sql)){	
					$_SESSION['email'] = $email;
					$sql = "INSERT INTO log (employee_no, role, time_log, action)
								VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'updated email address')";
					if(mysqli_query($conn, $sql)){
					$errors['success'] = "<p id='success'><i class='fas fa-check-circle'></i> Success</p>";
					}
				}else{
					echo "Error updating record: " . mysqli_error($conn);
				}
			}else{
				$errors['error'] = "<p id='email-error'><i class='fas fa-exclamation-circle'></i>Old Email cannot be used</p>";
			}
		}else{
			$errors['error'] = "<p id='email-error'><i class='fas fa-exclamation-circle'></i>Old Email cannot be blank</p>";
		}
	}else{
		$errors['wrongPass'] = "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> Wrong Password</p>";
	}
}
else if(isset($_POST['cancel']))
{
	echo "<script> location.replace('admin-settings.php'); </script>";
}

//for contact
if(isset($_POST['contact-submit'])){
								
	if($_POST['curPass']==$_SESSION['password']){
		$employee_no = $_SESSION['employee_no'];
		$contact = $_POST['contact'];
		$role = $_SESSION['role'];
		if($_POST['contact'] != ""){
			if($_SESSION['mobile'] !=$contact){
				$sql = "UPDATE employee SET employee_mobile='$contact' WHERE employee_no='$employee_no'";
				if(mysqli_query($conn, $sql)){	
					$_SESSION['mobile'] = $contact;
					$sql = "INSERT INTO log (employee_no, role, time_log, action)
								VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'updated contact number')";
					if(mysqli_query($conn, $sql)){
					$errors['success'] = "<p id='success'><i class='fas fa-check-circle'></i> Success</p>";
					}
				}else{
					echo "Error updating record: " . mysqli_error($conn);
				}
			}else{
				$errors['error'] = "<p id='contact-error'><i class='fas fa-exclamation-circle'></i>Old contact number cannot be used</p>";
			}
		}else{
			$errors['empty'] = "<p id='contact-error'><i class='fas fa-exclamation-circle'></i>Contact Number cannot be blank</p>";
		}
	}else{
		$errors['wrongPass'] = "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> Wrong Password</p>";
	}
}
else if(isset($_POST['cancel']))
{
	echo "<script> location.replace('admin-settings.php'); </script>";
}


//for profile image
if(isset($_POST['upload']))
	{
		$targetDir = "img/";
		if(!empty($_FILES["file"]["name"])){
			$fileName = basename($_FILES["file"]["name"]);
			$targetFilePath = $targetDir . $fileName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);	
			$employee_no = $_SESSION['employee_no'];
			$role = $_SESSION['role'];
			$allowTypes = array('jpg','png','jpeg');
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
					$update = $conn->query("UPDATE employee SET profile_picture = '$targetFilePath' WHERE employee_no = '$employee_no'");
					if($update){
						$sql = "INSERT INTO log (employee_no, role, time_log, action)
							 VALUES     ('$employee_no', '$role', CURRENT_TIMESTAMP, 'updated profile picture')";
						if(mysqli_query($conn, $sql)){
						$_SESSION['picture'] = $targetFilePath;
						$errors['success'] = "<p id='success'><i class='fas fa-check-circle'></i>Success</p>";
						}
					}else{
						echo "<script>alert('Profile Uploaded failed');window.location.href = 'admin-profile.php?uploadprofile=error';</script>";}
				}else{
					$errors['username'] = "<p id='errorUsername'><i class='fas fa-exclamation-circle'></i> Profile not uploaded</p>";}
			}else{
				$errors['fileType'] = "<p id='errorFileType'><i class='fas fa-exclamation-circle'></i> Only JPG and PNG allowed</p>";}
		}else{
			$errors['usernoFilename'] = "<p id='errorUsernoFilename'><i class='fas fa-exclamation-circle'></i> Select a file</p>";}
	}


//admin medical delete button
	if(isset($_GET['deletemedical'])){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$student_no = $_GET['student_no'];
		$illness_code = $_GET['illness_code'];
		$school_year = $_GET['school_year'];
		$semester = $_GET['semester'];
		$datetime_medical = $_GET['datetime_medical'];
		$sql = "UPDATE medical_requirement SET display = 'inactive' WHERE  student_no = '$student_no' AND illness_code = '$illness_code' 
				AND school_year = '$school_year' AND semester = '$semester' AND datetime_medical = '$datetime_medical'";
		if(mysqli_query ($conn,$sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
						VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted medical record')";
			if(mysqli_query($conn, $sql)){
			echo '<script>alert("Successfully deleted medical record");window.location.href = "admin-medical.php?deleterecord=success";</script>';
			}
		}
	}

	if(isset($_GET['deleteconsultation']))
	{
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$student_no = $_GET['student_no'];
		$illness_code = $_GET['illness_code'];
		$date_consulted = $_GET['date_consulted'];

		$sql = "UPDATE consultation SET display = 'inactive' WHERE student_no = '$student_no' AND illness_code = '$illness_code' AND date_consulted = '$date_consulted'";
		if(mysqli_query ($conn,$sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
						VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted consultation record')";
			if(mysqli_query($conn, $sql)){
			echo '<script>alert("Successfully deleted consultation record");window.location.href = "admin-consulted.php?deleterecord=success";</script>';
			}
		}
	}

	if(isset($_GET['adelete'])){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$illness_code = $_GET['illness_code'];
		$sql = "SELECT illness_code FROM medical_requirement WHERE illness_code ='$illness_code'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) >= 1){
			echo '<script>alert("'.$illness_code.' is being used, cannot delete record");window.location.href = "admin-illness.php?delete&illness_code='.$illness_code.'=fail";</script>';
		}else{
			$sql = "DELETE FROM illness WHERE illness_code = '$illness_code'";
			if(mysqli_query($conn,$sql)){
				$sql = "INSERT INTO log (employee_no, role, time_log, action)
							VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted illness record')";
				if(mysqli_query($conn, $sql)){
					echo '<script>alert("Successfully deleted illness record");window.location.href = "admin-illness.php?delete&illness_code='.$illness_code.'=success";</script>';
				}
			}
		}
	}

//system admin medical delete button
	if(isset($_GET['sys-delete'])){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$student_no = $_GET['student_no'];
		$illness_code = $_GET['illness_code'];
		$school_year = $_GET['school_year'];
		$semester = $_GET['semester'];
		$datetime_medical = $_GET['datetime_medical'];

		$sql = "DELETE FROM medical_requirement WHERE  student_no = '$student_no' AND illness_code = '$illness_code' 
				AND school_year = '$school_year' AND semester = '$semester' AND datetime_medical = '$datetime_medical'";
		if(mysqli_query ($conn,$sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
						VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted medical record')";
			if(mysqli_query($conn, $sql)){
			echo '<script>alert("Successfully deleted medical record");window.location.href = "sys-medical.php?deleterecord=success";</script>';
			}
		}
	}
	if(isset($_GET['sdeleteillness'])){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$illness_code = $_GET['illness_code'];
		$sql = "SELECT illness_code FROM medical_requirement WHERE illness_code ='$illness_code'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) >= 1){
			echo '<script>alert("'.$illness_code.' is being used, cannot delete record");window.location.href = "sys-illness.php?delete&illness_code='.$illness_code.'=fail";</script>';
		}else{
			$sql = "DELETE FROM illness WHERE illness_code = '$illness_code'";
			if(mysqli_query($conn,$sql)){
				$sql = "INSERT INTO log (employee_no, role, time_log, action)
							VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted illness record')";
				if(mysqli_query($conn, $sql)){
					echo '<script>alert("Successfully deleted illness record");window.location.href = "sys-illness.php?delete&illness_code='.$illness_code.'=success";</script>';
				}
			}
		}
	}
	if(isset($_GET['admin-delete'])){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$student_no = $_GET['student_no'];
		$illness_code = $_GET['illness_code'];
		$date_prepared = $_GET['date_prepared'];

		$sql = "DELETE FROM consultation WHERE student_no = '$student_no' AND illness_code ='$illness_code' AND date_prepared='$date_prepared'";
		if(mysqli_query($conn,$sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
							VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted illness record')";
				if(mysqli_query($conn, $sql)){
					echo '<script>alert("Successfully deleted consultation record");window.location.href = "admin-consultation.php?delete&record=success";</script>';
				}
		}
	}
	if(isset($_GET['consultation-delete'])){
		$employee_no = $_SESSION['employee_no'];
		$role = $_SESSION['role'];
		$student_no = $_GET['student_no'];
		$illness_code = $_GET['illness_code'];
		$date_prepared = $_GET['date_prepared'];

		$sql = "DELETE FROM consultation WHERE student_no = '$student_no' AND illness_code ='$illness_code' AND date_prepared='$date_prepared'";
		if(mysqli_query($conn,$sql)){
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
							VALUES('$employee_no', '$role', CURRENT_TIMESTAMP, 'deleted illness record')";
				if(mysqli_query($conn, $sql)){
					echo '<script>alert("Successfully deleted consultation record");window.location.href = "sys-consultation.php?delete&record=success";</script>';
				}
		}
	}

?>

						
						
						
