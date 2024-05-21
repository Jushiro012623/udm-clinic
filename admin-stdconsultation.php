<?php
require 'code.php';
if(isset($_SESSION['system_adm'])){
    echo "<script> location.replace('sys-stdconsultation.php'); </script>";
	exit();
}
if(!isset($_SESSION['admin'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}

$student_no = $_GET['student_no'];

$sql = "SELECT * FROM consultation_vw WHERE student_no = '$student_no'";
$result = mysqli_query($conn, $sql);

$query = "SELECT * FROM student_vw WHERE student_no = '$student_no'";
$result1 = mysqli_query($conn,$query);
$row1 = mysqli_fetch_assoc($result1);

?>


<!DOCTYPE html>
<html>
<head>
	<title>CONSULTATION HISTORY</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
    
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
    overflow-x:hidden;
}
/* Modal Content */
.modal-content {
    /* border-radius:15px; */ /*kung trip mo ng medjo bilog balik mo*/
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    width: 80%;
    margin-top:3%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.6s;
    animation-name: animatetop;
    animation-duration: 0.6s;
    display:grid;
    grid-template-columns:100%;
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
    width:100%;
    margin-bottom:5px;
    color:white;
    cursor:pointer;
    border:none;
    height: 70%;
}

#modal-fielset-div{/*div of filup*/
    
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
#modal-fieldset .modal-addrecord-info input, select {
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
#studnum-info, #name-info, #college-info,
#course-info{
    width: 32%;
}
#modal-fieldset-inputed span{
    width: 100%;
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
.modal-addrecord-info label{
    width: 150px;
    margin-bottom: 2%;
}
.inputed .modal-addrecord-info{
    margin-bottom: 10px;
    color:#41a8b1;
    display:flex;
    flex-direction:column;
}
#modal-fieldset-inputed label{
    font: 12px Arial, Helvetica, sans-serif;
    font-weight: bold;
}
#modal-fieldset-inputed legend{color:#41a8b1;}
#backbttn{
    margin-right:20px
}
#backbttn,#consultbtn{
    width:8%;
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
    background:#ff4040;
}
#backbttn:hover{
    background:maroon;
}
#backbttn:active{
    transition: 0.2s;
    background:#41a8b1;
}
.content {
}
.content .schedule {
}

.schedule p {
    width: 100%;
    padding: 15px;
    text-align: center;
    font-weight: bolder;
    letter-spacing: 1px;
    font-size: 1rem;
    background-color: #41a8b1;
    color: #fff;
    font: 12px Arial, Helvetica, sans-serif;

}
table{
    grid-column-start:1;
    grid-column-end:1;
    display:flex;
    justify-content:center;
    width: 100%;
}
tr{
    width:100%;
}
table, th, td{
    
    margin-top: 30px;
    border:1px solid #3c9aa3;

    font: 12px Arial, Helvetica, sans-serif;
}

th {
    background-color: #41a8b1;
    color: #fff;
}

td,tr {
    text-align: center;
    height: 26px;
    padding:11px;
}

tr:nth-child(odd){
    background-color: #91d1d7;
}


</style>
</head>
<body>
    <section class="inputed" id="user-inputed">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Student's Consultation Record</h4>
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
                            <div class="modal-addrecord-info" id="-info">
                                <label>Course </label>
                                <span id="inputed-course"><?php echo $row1['course_code']; ?></span>						
                            </div>	
                        </fieldset>
                       
                    </div>
                    <div class="content" id="fff">
                      <div class="schedule">
                            <p>CONSULTATION HISTORY</p>
                        </div>
              
                        <table>
                            <tr>
                                <th style='padding: 5px;width:100px;'>Code</th>
                                <th style='width:600px;'>Description</th>
                                <th style='width:160px;'>Diagnosis</th>
                                <th style='width:150px;'>Attending Physician</th>
                                <th style='width:150px;'>Date Consulted</th>
                                <th style='width:60px;'>Action</th>
                            </tr>
                    <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                            echo "<tr>
                                <td>".$row['illness_code']."</td>
                                <td style='max-width:600px; word-break:break-all'>".$row['illness_desc']."</td>
                                <td>".$row['diagnosis']."</td>
                                <td>".$row['attending_physician']."</td>
                                <td>".$row['date_consulted']."</td>
                                <td style='background-color:#FF4040;color:white;'><a style='text-decoration:none;color:white;'href = 'admin-stdconsultation.php?deleteconsultation=1&student_no=".$row['student_no']."&illness_code=".$row['illness_code']."&date_consulted=".$row['date_consulted']."' onclick=";?>"return confirm('Are you sure you want to delete?')"<?php echo ">Delete</a></td>
                            </tr>";
                            }
                    ?>     
                        </table>
            
                    </div>
                    <div class="modal-footer">
                        <button  onclick="window.location.href='/clinicupdate/admin-consulted.php'" value = "back" name="back" class="buttonmodal" id="backbttn">Back</button>
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

