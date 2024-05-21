<?php 
    require_once 'code.php';
    if(isset($_SESSION['system_adm'])) {
        echo "<script> location.replace('sys-logout.php'); </script>";
	    exit();
    }
    if(isset($_SESSION['admin'])) {
        echo "<script> location.replace('admin-logout.php'); </script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="icons/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- <link rel="icon" href="img/logo.png"> -->
    
    <link rel="icon" href="img/favicon/medical.png" type="image" sizes="32x32">
    <!-- Favicons-->
    <link rel="icon" href="img/favicon/medical.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/medical.png">
    <title>LOG-IN</title>
</head>

<body>
    <header>
        <a href=""><img src="img/logo1.png"></a>
    </header>

    <section>
        <div class="about">
            <span id="bold">TREATING</span> <span id="you">YOU IS</span><br><span id="you">OUR</span> <span id="bold">PRIORITY</span>
        </div>

        <div class="login">
            <form action="index.php" method="post">

                <?php if(count($errors) > 0): ?>
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error;?>	
                    <?php endforeach ?>
                <?php endif ?>

                <input type="text" placeholder="Username" class="text" name="username" value="<?php echo $username; ?>">
                <input type="password" placeholder="Password" class="text" name="password">
                <input type="submit" name="btn-login" value="LOGIN" class="login-button">
            </form>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>,
        Universidad De Manila, Philippines</p>
    </footer>
</body>
</html>