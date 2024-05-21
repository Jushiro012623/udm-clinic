<?php
require_once 'code.php';
if(isset($_SESSION['system_adm'])){
	echo "<script> location.replace('sys-consulted.php'); </script>";
	exit();
}
if(!isset($_SESSION['admin'])){
	echo "<script> location.replace('index.php'); </script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CONSULTED RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/a-consulted.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
	
	<link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
	<!-- Favicons-->
	<link rel="icon" href="img/favicon/medical.png" sizes="32x32">
 	<!-- Favicons-->
 	<link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
	 <style>
		 td,tr {text-align: center;height:26px;}
	 </style>
</head>
<body>
	<div class="container">
		<nav class="navigation">
			<h1>menu</h1>
			<ul class="tabs"> 
				<a href="admin-home.php"><li><i class="fa fa-home"></i>HOME</li></a>
				<a href="admin-profile.php"><li><i class="fa fa-user"></i>PROFILE</li></a>
				
				<div class="dropdown">
                    <a><label for="checkbox"><li><i class="fas fa-file-medical"></i></i>RECORD</li></label></a>
                    <input type="checkbox" id="checkbox"/>
                    <ul>
                        <a href="admin-medical.php"><li><i class="fas fa-file-medical"></i>MEDICAL</li></a><br>
						<a href="admin-consultation.php"><li><i class="fas fa-file-medical"></i>CONSULTATION</li></a><br>
                        <a href="admin-consulted.php"><li id='active'><i class="fas fa-file-medical"></i>CONSULTED</li></a><br>
                        <a href="admin-illness.php"><li><i class="fas fa-file-medical"></i>ILLNESS</li></a><br>
                    </ul>
                </div>

				
				<a href="admin-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="admin-illness.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
			</ul>
		</nav>
		<div class="header" id="fff" ><a href="admin-home.php">
			<img src="img/logo1.png" alt="" style="width: 200px;" draggable="false"></a>
			
			<h2> <?php echo $msg, $_SESSION['position'];?></h2>
			<div class="user-icons">
				<span><?php echo $_SESSION['full_name'];?></span>
				<div class="profile-pic">
					<a href="admin-profile.php"><img src="<?php echo $_SESSION['picture'];?>" alt="user" draggable="false"></a>
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

		</div>
		<div class="content" id="fff">
			<div class="record">
				<span> CONSULTED RECORDS </span>
			</div>
			<div class="table">
			
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
								echo		"<td style='background-color:#25bfcd;'><a style='color:#fff' href='admin-stdconsultation.php?student_no=".$row['student_no']."'>View</a></td>";					
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
									echo "<div id='page'><a href='admin-consulted.php?search=".$search."&submit=Submit&page=".$i."'>$i</a></div>";
								}

						}
						else
						{
							while($row = mysqli_fetch_assoc($result)){
							
								echo    "<tr>";
								echo		"<td>".$row['student_no']."</td>";
								echo		"<td>".$row['full_name']."</td>";
                                echo		"<td>".$row['age']."</td>";
                                echo		"<td>".$row['stud_gender']."</td>";
                                echo		"<td>".$row['course_code']."</td>";
								echo		"<td style='width:7%;'><a style='color:#000' href='admin-stdconsultation.php?student_no=".$row['student_no']."'>View</a></td>";					
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
									echo "<div id='page'><a href='admin-consulted.php?page=".$i."'>$i</a></div>";
								}
						
							echo "</div>";
						?>	

						
			</div>
			


		</div>
		
	</div>
	<footer>
		<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>,
		Universidad De Manila, Philippines</p>
	</footer>
</script>
</body>
</html>