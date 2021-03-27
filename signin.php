<?php
	session_start();
	include("functions.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		if(!empty($email) && !empty($password))
		{
			$query_signin = "select * from users where email = '$email'";
			$result_signin = mysqli_query($con, $query_signin);
			
			if($result_signin && mysqli_num_rows($result_signin) > 0)
			{
				$user_data = mysqli_fetch_assoc($result_signin);
				if($user_data['password'] === $password)
				{
					$_SESSION['email'] = $user_data['email'];
					if($user_data['status'] === 'patient')
					{
						header("Location: patient/patient.php");
						die;
					}elseif($user_data['status'] === 'doctor'){
						header("Location: doctor/doctor.php");
						die;
					}
				}
				else {
					echo "<script>alert(\" Invalid password\")</script>";
				}
			}
			else
			{
				echo "<script>alert(\" Invalid Email or password\")</script>";
			}
		}
		else
		{
			echo "<script>alert(\" Invalid Email or password\")</script>";
		}
	}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title> PatchDoc </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="cache-control" content="no-cache">
		<meta http-equiv="pragma" content="no-cache">
		<meta http-equiv="expires" content="-1">
		<link rel="stylesheet" href="CSS/signin.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	</head>

	<body>
		<div class="wrapper">
			<div class="nav" >
				<div class="logo" >
					<h1>HealthPatch</h1>
				</div>
				<div class="nav_bar">
					<div class="options">
						<a class="active" href="index.php">Home</a>
					</div>
					<div class="sign"> 
						<a id="sign_up" href="signup.php">Sign up</a>
					</div>			
				</div>
			</div>	
			<div class="main">				
				<div class="upper" id="upper">
				</div>
				<div class="upper-content">
					<div class="center">
						<div class="text-wrapper">
							<h1 class="big-title" id="big-title1">Some New</h1>
							<h1 class="big-title" id="big-title2">Interesting</h1>
							<h1 class="big-title" id="big-title3">Things</h1>
							<h4 id="technology">Technology Of The Futur !</h4>
						</div>
					</div>
				</div>
			<div class="form-wrapper">
		   		<form id="form" method="post">
		   			<h1>Sign in</h1>
		  			<div>
		   				<label for="login-email">Username or Email</label>
		   				<input name="email" type="text"  required="required" />
		   			</div>
		   			<div>
		   				<label for="password">Password</label>
			   			<input name="password" type="password" required="required" />
			   		</div>
			   		<div id="checkbox_bar">
						<label id="checkbox1">
		   					<input type="checkbox" name="remember"> Remember me
			   			</label>
						<div>
				   			<a href="fogot_pass.html">Forgot password?</a>
			   			</div>
			   		</div>
			   		<div>
			   			<button id="button_signin" type="submit">Sign In</button>
			   		</div>
				 	<div id="box_signup">
						<p> You don't have an account?</p>
		   				<p><a id="button_signup" href="signup.php">Sign Up!</a>	</p>
		   			</div>	
				</form>
			</div>
		</div>
	</div>
			<script type="module" src="JS/index.js"></script>				
	</body>
</html>
