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
    $selected_patient = $_GET['selected_patient']; 
    $data_query = "select * from patients_data where id = '$selected_patient'";
    $result_data_query = mysqli_query($con,$data_query);

    if($result_data_query)
    {
        while($patient_rows=mysqli_fetch_assoc($result_data_query)){
        $patient_data[]= $patient_rows;
        }
    }
    $_SESSION['selected_patient'] = $selected_patient;
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
                <a href="patients.php">Patients</a>
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
                                    if($data['id']==$selected_patient){
                                        echo '<li><a class="active" href="patient.php?selected_patient='.$patient.'">'.$data['firstname'].' '.$data['lastname'].'</a></li>';
                                    }else {
                                        echo '<li><a href="patient.php?selected_patient='.$patient.'">'.$data['firstname'].' '.$data['lastname'].'</a></li>';
                                    }
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
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
        </div>
    </div>
</body>
</html>