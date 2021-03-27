<?php
	session_start();
	include("../functions.php");
	
	$user_data = check_signin($con);
	if($_SESSION)
	{
		if($user_data['status'] === 'doctor')
        {
            header("Location: ../doctor/doctor.php");
            die;
        }
	}else {
        header("Location: ../index.php");
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="patient.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="logo" >
            <h1>HealthPatch</h1>
        </div>
        <div class="nav-bar">
            <div class="options">
                <a href="../index.php">Home</a>
                <a href="option1.php">About</a>	
            </div>
            <div class="sign"> 
                <a id="profil" href="doctor-profil.php">My account</a>
                <a id="sign_out" href="../signout.php">Sign Out</a>
            </div>			
        </div>
        <div class="main">
			<div class="display-wrapper">
                    <div class="live-wrapper">
                        <div class="comment">Live</div>
                        <a href="live.php"></a></li>
                    </div>
                    <div class="date-wrapper">
                        <div class="comment">Sorted</div>
                        <a href="sorted.php"></a>
                    </div>
            </div>
            <div class="content">
                <h4 id="technology">Page of <?php echo $_SESSION['email'];?> and he is a <?php echo $user_data['status'];?></h4>
            </div>
        </div>
    </div>
</body>
</html>