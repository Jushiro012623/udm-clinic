<?php require_once 'code.php';
if(isset($_SESSION['admin'])){
	header('Location: admin-home.php');
	exit();
}
if(!isset($_SESSION['system_adm'])){
	header('Location: index.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/sys-view.css">
	<!--<link rel="stylesheet" type="text/css" href="css/record-finder.css">-->
</head>
<body>
	<div class="container">
		<nav class="navigation">
			<a href="sys-home.php"><img src="img/logo1.png" alt="" style="width: 200px; margin-bottom: 50px;"></a>
			<ul class="tabs"> 
				<a href="sys-home.php"><li><i class="fa fa-home"></i>HOME</li></a>
				<a href="sys-profile.php"><li><i class="fa fa-user"></i>PROFILE</li></a>

				<a href="sys-records.php"><li><i class="fas fa-file-medical"></i>RECORDS</li></a>
				<a href="sys-log.php"><li><i class="fas fa-clipboard-list"></i>TRACK LOGS</li></a>
				<a href="sys-view.php"><li  id='active'><i class="fas fa-folder"></i>VIEW</li></a>

				<a href="sys-medical.php"><li><i class="fas fa-file-medical"></i>MEDICAL</li></a>
				<a href="sys-consulted.php"><li><i class="fas fa-file-medical"></i>CONSULTED</li></a>
				<a href="sys-illness.php"><li><i class="fas fa-file-medical"></i>ILLNESS</li></a>

				<a href="sys-settings.php"><li><i class="fa fa-cog"></i>SETTINGS</li></a>
				<a href="sys-view.php?logout=1"><li><i class="fas fa-sign-out-alt"></i>LOG OUT</li></a>
			</ul>
		</nav>
		<div class="header" id="fff" >
			<h2>Dashboard</h2>
			<div class="user-icons">
				<span><?php echo $_SESSION['full_name'];?></span>
				<div class="profile-pic">
					<a href="sys-profile.php"><img id="previewImg" src="<?php echo $_SESSION['picture'];?>" alt="user"></a>
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
				<span> VIEW </span>
			</div>
			<div class="table">
			


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
										<label class="personal-info" for="lname" id="lastname-modal-input">Last Name <span>*</span> </label>
										<input type="text" id="fname" name="user_fname" required>
									</div>
									<div class="modal-addrecord-info" id="firstname-info">
										<label class="personal-info" for="lname" id="firstname-modal-input">First Name <span>*</span> </label>
										<input type="text" id="fname" name="user_lname" required>
									</div>
									<div class="modal-addrecord-info" id="middlename-info">
										<label class="personal-info" for="lname" id="middlename-modal-input">Middle Name <span>*</span> </label>
										<input type="text" id="fname" name="user_mname" required>
									</div>
									
									<div class="modal-addrecord-info" id="email-info">
										<label class="personal-info" for="email" id="lastname-modal-input">Email Address <span>*</span> </label>
										<input type="text" id="email-addrecord-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="address-info">
										<label class="personal-info" for="lname" id="address-modal-input">Address <span>*</span> </label>
										<input type="text" id="address-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="contact-info">
										<label class="personal-info" for="lname" id="contact-modal-input">Contact <span>*</span> </label>
										<input type="number" id="contact-modal" name="user_contact" required>
									</div>
								</fieldset>
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Personal Information</legend>
									<div class="modal-addrecord-info" id="lastname-info">
										<label class="personal-info" for="lname" id="lastname-modal-input">Last Name <span>*</span> </label>
										<input type="text" id="fname" name="user_fname" required>
									</div>
									<div class="modal-addrecord-info" id="firstname-info">
										<label class="personal-info" for="lname" id="firstname-modal-input">First Name <span>*</span> </label>
										<input type="text" id="fname" name="user_lname" required>
									</div>
									<div class="modal-addrecord-info" id="middlename-info">
										<label class="personal-info" for="lname" id="middlename-modal-input">Middle Name <span>*</span> </label>
										<input type="text" id="fname" name="user_mname" required>
									</div>
									
									<div class="modal-addrecord-info" id="email-info">
										<label class="personal-info" for="email" id="lastname-modal-input">Email Address <span>*</span> </label>
										<input type="text" id="email-addrecord-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="address-info">
										<label class="personal-info" for="lname" id="address-modal-input">Address <span>*</span> </label>
										<input type="text" id="address-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="contact-info">
										<label class="personal-info" for="lname" id="contact-modal-input">Contact <span>*</span> </label>
										<input type="number" id="contact-modal" name="user_contact" required>
									</div>
								</fieldset>
								<fieldset class="personal-info-fillup" id="modal-fieldset">
									<legend>Personal Information</legend>
									<div class="modal-addrecord-info" id="lastname-info">
										<label class="personal-info" for="lname" id="lastname-modal-input">Last Name <span>*</span> </label>
										<input type="text" id="fname" name="user_fname" required>
									</div>
									<div class="modal-addrecord-info" id="firstname-info">
										<label class="personal-info" for="lname" id="firstname-modal-input">First Name <span>*</span> </label>
										<input type="text" id="fname" name="user_lname" required>
									</div>
									<div class="modal-addrecord-info" id="middlename-info">
										<label class="personal-info" for="lname" id="middlename-modal-input">Middle Name <span>*</span> </label>
										<input type="text" id="fname" name="user_mname" required>
									</div>
									
									<div class="modal-addrecord-info" id="email-info">
										<label class="personal-info" for="email" id="lastname-modal-input">Email Address <span>*</span> </label>
										<input type="text" id="email-addrecord-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="address-info">
										<label class="personal-info" for="lname" id="address-modal-input">Address <span>*</span> </label>
										<input type="text" id="address-modal" name="user_address" required>
									</div>
									<div class="modal-addrecord-info" id="contact-info">
										<label class="personal-info" for="lname" id="contact-modal-input">Contact <span>*</span> </label>
										<input type="number" id="contact-modal" name="user_contact" required>
									</div>
								</fieldset>
							</div>
					</div>
					<div class="modal-footer">
						<h3><button type="button" name="submit">SUBMIT</button></h3>
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