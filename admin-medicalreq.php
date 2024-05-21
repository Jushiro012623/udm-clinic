<?php
require 'code.php';
if(isset($_SESSION['system_adm'])){
    echo "<script> location.replace('sys-medicalreq.php'); </script>";
	exit();
}
if(!isset($_SESSION['admin'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}

$student_no = $_GET['student_no'];

$sql = "SELECT * FROM medreq_records_vw WHERE student_no = '$student_no'";
$result = mysqli_query($conn, $sql);

$query = "SELECT * FROM student_vw WHERE student_no = '$student_no'";
$result1 = mysqli_query($conn,$query);
$row1 = mysqli_fetch_assoc($result1);

?>


<!DOCTYPE html>
<html>
<head>
	<title>MEDICAL HISTORY</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/views.css">
    
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
</head>
<body>
    <section class="inputed" id="user-inputed">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Student's Medical Records</h4>
                </div>
                <div class="modal-body">
                    <div class="information-inputed" id="modal-fielset-div">
                        <fieldset class="personal-info-inputed" id="modal-fieldset-inputed">
                            <legend>Personal Information</legend>
                            <div class="modal-addrecord-info" id="studnum-info">
                                <label>Student Number </label>
                                <span id="inputed-studnum"><?php echo $student_no; ?></span>						
                            </div>
                            <div class="modal-addrecord-info" id="name-info">
                                <label>Name </label> 
                                <span id="inputed-name"><?php echo $row1['full_name']; ?></span>						
                            </div>	
                            <div class="modal-addrecord-info" id="college-info">
                                <label>College </label> 
                                <span id="inputed-college"><?php echo $row1['college_code']; ?></span>						
                            </div>	
                            <div class="modal-addrecord-info" id="course-info">
                                <label>Course </label>
                                <span id="inputed-course"><?php echo $row1['course_code']; ?></span>						
                            </div>
                        </fieldset>
                       
                    </div>
                    <div class="content" id="fff">
                      <div class="schedule">
                            <p>MEDICAL REQUIREMENTS</p>
                        </div>
              
                        <table>
                            <tr>
                                <th style = 'padding: 5px;'>Illness Code</th>
                                <th>Illness Description</th>
                                <th>School Year</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                    <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                            echo "<tr>
                                <td>".$row['illness_code']."</td>
                                <td style='width:600px; word-break: break-all;'>".$row['illness_desc']."</td>
                                <td>".$row['SY']."</td>
                                <td>".$row['semester']."</td>
                               <td style='background-color:#FF4040;color:white;'><a style='text-decoration:none;color:white;' href = 'admin-medicalreq.php?deletemedical=1&student_no=".$row['student_no']."&illness_code=".$row['illness_code']."&school_year=".$row['SY']."&semester=".$row['semester']."&datetime_medical=".$row['datetime_medical']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>
                            </tr>";
                            }
                    ?>     
                        </table>
            
                    </div>
                    <div class="modal-footer">
                        <button  onclick="window.location.href='/clinicupdate/admin-medical.php'" value = "back" name="back" class="buttonmodal" id="backbttn">Back</button>
                       <!-- <button  type="submit" value = "consult" name="consult" class="buttonmodal" id="consultbtn">Consult</button>-->
                    </div>
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

