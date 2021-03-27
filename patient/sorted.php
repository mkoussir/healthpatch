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
    foreach($patients_data as $patient){
        if($patient["doctor_id"] == $user_data["id"]){
            $patients[]=$patient["id"]; 
        }

    }
    $patient_id = $user_data["id"]; 
    $data_query = "select * from patients_data where patient_id = '$patient_id'";
    $result_data_query = mysqli_query($con,$data_query);

    if($result_data_query)
    {
        while($patient_rows=mysqli_fetch_assoc($result_data_query)){
        $patient_data[]= $patient_rows;
        }
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
            <div class="data-display">
                <ul>
                    <li><a href="live.php">Live</a></li>
                    <li><a href="sorted.php">By time</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="timestamp"></div>
               <div class="heart-beat"><?php print_r($patient_data);?></div> 
               <div class="spo2"></div> 
               <div class="temperatue"></div> 
            </div>
        </div>
    </div>
</body>
</html>