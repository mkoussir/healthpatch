<?php
	session_start();
	include("../functions.php");
	
	$user_data = check_signin($con);
	if($_SESSION)
	{
		if($user_data['status'] === 'patient')
        {
            header("Location: patient.php");
            die;
        }
	}else {
        header("Location: index.php");
        die;
    }
    foreach($patients_data as $patient){
        if($patient["doctor_id"] == $user_data["id"]){
            $patients[]=$patient["id"]; 
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="patients.css">
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
                <a id="patients" href="patients.php">Patients</a>
                <a id="profil" href="doctor-profil.php">My account</a>
                <a id="sign_out" href="../signout.php">Sign Out</a>
            </div>			
        </div>
        <div class="main">
            <div class="patients-list">
                <ul>
                    <?php
                        foreach($patients as $patient){
                            foreach($patients_data as $data){
                                if($data['id'] == $patient){
                                    echo '<li><a href="patient.php?selected_patient='.$patient.'">'.$data['firstname'].' '.$data['lastname'].'</a></li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="content">
               
            </div>
        </div>
    </div>
</body>
</html>