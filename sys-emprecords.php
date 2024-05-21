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


$employee_no = $_GET['employee_no'];

$sql = "SELECT * FROM employee WHERE employee_no = '$employee_no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$query = "SELECT * FROM users WHERE employee_no = '$employee_no'";
$result1 = mysqli_query($conn, $query);
$row1   = mysqli_fetch_assoc($result1);



if(isset($_POST['editrecord']))
{
    $lname = $_POST['employee_lname'];
    $fname = $_POST['employee_fname'];
    $email = $_POST['employee_email'];
    $birthday = $_POST['employee_birthday'];
    $gender = $_POST['employee_gender'];
    $position = $_POST['employee_position'];
    $mobile = $_POST['employee_mobile'];
    $address = $_POST['employee_address'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $employee_no1 = $_SESSION['employee_no'];
    $role1 = $_SESSION['role'];
    $sql = "UPDATE employee SET employee_lname = '$lname', employee_fname = '$fname', employee_email = '$email', 
            employee_birthday = '$birthday', employee_gender = '$gender', employee_position = '$position', employee_mobile = '$mobile', 
            employee_address = '$address' WHERE employee_no = '$employee_no'";

    if(mysqli_query($conn, $sql))
    {
        $sql = "UPDATE users SET password = '$password', role = '$role' WHERE employee_no = '$employee_no'";
        if(mysqli_query($conn,$sql))
        {
            $_SESSION['employee_lname'] = $lname;
            $_SESSION['employee_fname'] = $fname;
			$sql = "INSERT INTO log (employee_no, role, time_log, action)
                            VALUES('$employee_no1', '$role1', CURRENT_TIMESTAMP, 'Edited Employee Record')";
                if(mysqli_query($conn, $sql)){
                    echo '<script>alert("Successfully Edited a Record");window.location.href = "sys-employee.php?edit_records=1";</script>';
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
    
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
</head>
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
.information-inputed label {
    display: inline-block;
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
#inputed-studnum,#inputed-name,#inputed-college,#inputed-course{
	height: 23px;
	width: 200px;
	display: inline-flex;
	border: 1px solid #41a8b1; /*border color*/
	padding-left:5px;
	font: 13px Arial, Helvetica, sans-serif;
	font-weight: lighter;
	align-items: center;
}
.inputed{
	height: 100vh;
	width: 50vw;
	position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
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
	display:block;
	flex-wrap:wrap;
	margin: 0 auto;
	justify-content: space-between;
	border: 1px solid #41a8b1; /*border color*/
}
.modal-addrecord-info label{
	width: 150px;
}
.inputed .modal-addrecord-info{
	margin-bottom: 10px;
	color:#41a8b1;
}
#modal-fieldset-inputed label{
	font: 13px Arial, Helvetica, sans-serif;
	font-weight: bold;
}
#modal-fieldset-inputed legend{color:#41a8b1;}

.modal-footer {
	color: white;
	height:7vh;
	display:flex;
	justify-content:flex-start;
	align-items: center;
	width:100%;
}

#backbttn, #editbttn{
	color:white;
	cursor:pointer;
	border:none;
	height: 70%;
    width:100px;
    text-align: center;
    margin-bottom: 10px;
}

#backbttn{
    background: #ff4040;
    margin-top:1.8px;
    transform:translateX(-110%);
    padding-bottom:1px;
}

#editbttn{
    background-color: #41a8b1;
}

#editbttn:hover{
    background-color: #368a91;
}

#backbttn:hover{
	background:maroon;
}

#backbttn:active{
	transition: 0.2s;
	background:maroon;
}

.modal-content label{  
    width: 105px;
    display: inline-block;
    margin-left: 50px;
}

.content {
    grid-column-start: 1;
    grid-column-end: 3;
    grid-row-start: 3;
    grid-row-end: 5;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 10% 3% 8% 74.6%;

}
.content fieldset{
	border: 1px solid #41a8b1;
	padding:10px;
	height: 22vh;
}

.content legend{
	color: #41a8b1;
}

.content .user-account-info label{
	font: 13px Arial, Helvetica, sans-serif;
	font-weight: bolder;
    display: inline-block;
}

.modal-body input{
    outline: none;
    border: none;
}
</style>
<body>
    <section class="inputed" id="user-inputed">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Employee Record</h4>
                </div>

                <div class="modal-body">
                    <div class="information-inputed" id="modal-fielset-div">
                    <form method = "POST">
                        <fieldset class="personal-info-inputed" id="modal-fieldset-inputed">
                            <legend>Personal Information</legend>
                            <div class="modal-addrecord-info" id="studnum-info">
                                <label>Employee No.</label><span>:</span> 
                                <input id="inputed-studnum" name="employee_no" value = "<?php echo $employee_no; ?>">		
                            </div>
                            <div class="modal-addrecord-info" id="name-info">
                                <label>First Name</label><span>:</span> 
                                <input id="inputed-name" name="employee_fname" value = "<?php echo $row['employee_fname']; ?>">					
                            </div>	
                            <div class="modal-addrecord-info" id="college-info">
                                <label>Last Name</label><span>:</span> 
                                <input id="inputed-college" name="employee_lname" value = "<?php echo $row['employee_lname']; ?>">				
                            </div>	
                            <div class="modal-addrecord-info" id="-info">
                                <label>Email</label><span>:</span> 
                                <input id="inputed-course" name="employee_email" value = "<?php echo $row['employee_email']; ?>">					
                            </div>
                            <div class="modal-addrecord-info" id="-info">
                                <label>Birthday</label><span>:</span> 
                                <input id="inputed-course" name="employee_birthday" value = "<?php echo $row['employee_birthday']; ?>">					
                            </div>
                            <div class="modal-addrecord-info" id="-info">
                                <label>Gender</label><span>:</span> 
                                <select type="text" id="inputed-course" name="employee_gender" required>
                                    <option value="<?php echo $row['employee_gender']; ?>"><?php echo $row['employee_gender']; ?></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>				
                            </div>
                            <div class="modal-addrecord-info" id="-info">
                                <label>Contact No.</label><span>:</span> 
                                <input id="inputed-course" name="employee_mobile" value = "<?php echo $row['employee_mobile']; ?>">					
                            </div>
                            <div class="modal-addrecord-info" id="-info">
                                <label>Address</label><span>:</span> 
                                <input id="inputed-course" name="employee_address" value = "<?php echo $row['employee_address']; ?>">					
                            </div>
                            <div class="modal-addrecord-info" id="-info">
                                <label>Position</label><span>:</span> 
                                <input   value = >
                                
                                <select type="text" id="inputed-course"name="employee_position">
                                    <option value="<?php echo $row['employee_position']; ?>"><?php echo $row['employee_position']; ?></option>
                                    <option>Doctor</option>
                                    <option>Dentist</option>
                                    <option>Nurse</option>
                                </select>					
                            </div>
                        </fieldset>      
                    </div>
                    
                    <div class="content" id="fff">
                        <fieldset class="user-account-info">
                            <legend>User Account Information</legend>
                        
                        <div class="modal-addrecord-info" id="username-info">
                            <label>Username </label><span>:</span> 
                            <input id="inputed-studnum"  value = "<?php echo $employee_no ?>	" readonly>					
                        </div>
                        <div class="modal-addrecord-info" id="password-info">
                            <label>Password </label><span>:</span> 
                            <input id="inputed-name" name="password" value = "<?php echo $row1['password']; ?>" readonly>					
                        </div>	
                        <div class="modal-addrecord-info" id="role-info">
                            <label>Role </label><span>:</span> 
                            <input id="inputed-college" name="role" value = "<?php echo $row1['role']; ?>" readonly>						
                        </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                    
                    <button  type = "submit" name = "editrecord" class="buttonmodal" id="editbttn">Edit Changes</button>
                </div>
                    </form>
                    
                    <button  onclick="window.location.href='/clinicupdate/sys-employee.php'"class="buttonmodal" id="backbttn">Back</button>
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

