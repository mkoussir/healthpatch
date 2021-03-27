<?php

	$host = "localhost";
	$dbUsername ="koussir";
	$dbPassword = "";
	$dbname = "patch";
	
	if(!$con = mysqli_connect($host,$dbUsername,$dbPassword,$dbname))
	{
		die(" failed to connect to patch");
	}else {
		$users_data_query = "select * from users";
		$result1=mysqli_query($con,$users_data_query);
		if($result1)
		{
			while($users_rows=mysqli_fetch_assoc($result1)){
				$users_data[] = $users_rows;
			}
		}
		$patients_data_query = "select * from patients";
		$result2 =mysqli_query($con,$patients_data_query);
		if($result2)
		{
			while($patients_rows=mysqli_fetch_assoc($result2)){
				$patients_data[] = $patients_rows;
			}
		}
		$doctors_data_query = "select * from doctors";
		$result3 = mysqli_query($con,$doctors_data_query);
		if($result3)
		{
			while($rows=mysqli_fetch_assoc($result3)){
				$doctors_data[] = $rows;
			}
		}
		
	}
	
	
	function check_signin($con)
	{
		if(isset($_SESSION['email']))
		{
			$id = $_SESSION['email'];
			$query = "select * from users where email = '$email' limit 1";
			
			$result = mysqli_query($con,$query);
			
			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
			if($user_data['status'] === 'patient')
			{
				header("Location: ./patient/patient.php");
				die;
			}else{
				header("Location: ./doctor/doctor.php");
				die;
			}
		}
	}

