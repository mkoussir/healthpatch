<?php
	session_start();
	include("functions.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpass = $_POST['confirm-password'];
		$firstname = $_POST['first-name'];
		$lastname = $_POST['last-name'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];
		$gender = $_POST['gender'];
		$doctor_id = $_POST['doctors'];
		
		if(!empty($email) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($confirmpass) && !empty($phone))
		{
			if($confirmpass === $password){
				$query_user = "insert into users (email,password,status) values ('$email','$password','$status')";
				if(mysqli_query($con, $query_user))
				{
					$last_id = mysqli_insert_id($con);
					if($status == 'doctor')
					{
						$query_doctor = "insert into doctors (id,firstname,lastname,gender,phone,email) values ('$last_id','$firstname','$lastname','$gender','$phone','$email')";
						if(mysqli_query($con, $query_doctor))
						{
							echo "<script>alert(\" signed up \")</script>";
							header("Location:signin.php");
							die;
						}else{
							echo "bad query doc";
						}
					}elseif($status == 'patient'){
						$query_patient = "insert into patients values ('$last_id','$firstname','$lastname','$gender','$phone','$email',$doctor_id)";
						if(mysqli_query($con, $query_patient))
						{
							echo "<script>alert(\" signed up \")</script>";
							header("Location:signin.php");
							die;
						}else{
							echo "bad query patient";
						}
					}
				}else{
					echo "<script>alert(\" bad query user \")</script>";
				}
	
			}else{
				echo "<script>alert(\" passwords doesn't match \")</script>";
			}
		}
		else
		{
			echo "invalid informations";
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
		<link rel="stylesheet" href="CSS/signup.css">
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
						<a id="sign_in" href="signin.php">Sign in</a>
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
			   			<h1>Sign Up</h1>
						<div id="gender">
		   					<input type="radio" name="gender" value="male" >Male 
		   					<input type="radio" name="gender" value="female" >Female
						</div>
						<div>
			   				<label for="first-name">First name</label>
			   				<input name="first-name" type="text"  required="required" />
			   			</div> 
						<div>
			   				<label for="last-name">Last name</label>
			   				<input name="last-name" type="text"  required="required" />
			   			</div>  
			  			<div>
			   				<label for="login-email">Email</label>
			   				<input name="email" type="text"  required="required" />
			   			</div>
			   			<div>
			   				<label for="password">Password</label>
				   			<input name="password" type="password" required="required" />
				   		</div>
						<div>
			   				<label for="confirm-password">Confirm Password</label>
				   			<input name="confirm-password" type="password" required="required" />
				   		</div>
						<div>
			   				<label for="phone">Phone number</label>
							<div class="phone-number">
							<input class="phone" id="phone" name="phone" type="text" />
								<select id="country">
									<option value="FR">France</option>
									<option value="DE">Germany</option>
									<option value="UK">United Kingdom</option>
									<option value="US">United States</option>
									<option value="BE">Belgium</option>
								</select>
							</div>
				   		</div>
						<div id="status">
		   					<input class="status-radio" type="radio" name="status" value="patient" >Patient
		   					<input class="status-radio" type="radio" name="status" value="doctor" >Doctor 
						</div>
						<div class="doctor-name">
			   				<label for="doctor-name">Doctor's name (for patients)</label>
				   			<select name="doctors" id="doctors">
								<option value="NULL"></option>
								<?php
									foreach($doctors_data as $id){
										echo '<option value="'.$id["id"].'"> Dr. '.$id["firstname"].' '.$id["lastname"].'</option>';
									}
								?>
							</select>
				   		</div>
				   		<div id="signup-button-wrapper">
				  			<button id="button_signup" type="submit">Sign Up</button>
				   		</div>	
					</form>
				</div>
			</div>	
		</div>
		<script type="module" src="JS/signup.js"></script>
		<script type="module" src="js_lib/node_modules/cleave.js/dist/cleave.min.js"></script>
		<script type="module" src="js_lib/node_modules/cleave.js/dist/addons/cleave-phone.i18n.js"></script>		
	</body>
</html>

