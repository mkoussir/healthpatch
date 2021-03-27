<?php
	session_start();
	include("functions.php");
	
	$user_data = check_signin($con);
	if($_SESSION)
	{
		if($user_data['status'] === 'patient')
		{
			header("Location: ./patient/patient.php");
			die;
		}else{
			header("Location: ./doctor/doctor.php");
			die;
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
		<link rel="stylesheet" href="CSS/index.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<div class="logo" >
				<h1>HealthPatch</h1>
			</div>
			<div class="nav_bar">
				<div class="options">
					<a class="active" href="index.php">Home</a>
				</div>
				<div class="sign"> 
					<a id="sign_in" href="signin.php">Sign in</a>
					<a id="sign_up" href="signup.php">Sign up</a>
				</div>			
			</div>
			<div class="intro">
				<div class="intro-text">
					<div class="hide">
						<h4 class="hide-h4">Welcome to my website</h4>
						<h4 class="hide-h4">Helthy Life</h4>
						<h4 class="hide-h4">Helthy Mind</h4>
					</div>
				</div>
			</div>
			<div class="slider"></div>
			<div class="upper" id="upper">
				</div>
				<svg id="heart" width="800" height="600">
					<path id="heart-path" stroke="#00bfff" stroke-width="10" fill="none" d="m 0 300 h 285 c 22 6 20 -7 18 0 c 13 -30 15 74 32 -33 c 9 -107 13 154 24 33 c 6 -50 12 41 20 0 c 7 -13 0 0 43 0 h 400 m 0 0"></path>
				</svg>
			</div>
			<div class="upper-content">
				<div class="center">
					<div class="text-wrapper">
						<h4 class="big-title text-change-color" id="big-title1">Keeping track</h4>
						<h4 class="big-title" id="big-title2">of your health</h4>
						<h4 class="big-title" id="big-title3">can be easy</h4>
						<h1 id="technology">Health care!</h1>
					</div>
				</div>
			</div>
			<div class="main">					
				<div class="about">
					<div class="animate-item" id="animate-1"></div>
					<div class="animate-item" id="animate-2"></div>
					<div class="animate-item" id="animate-3"></div>
					<div class="animate-item" id="animate-4"></div>
					<div class="animate-item-text" id="animate-text1"> 
						<h3>HealthPatch provide you a smartphone connected device with three sensors. the device is capable of measuring </h4> 
						<li>the heart rate</li>
						<li>the SPO2</li>
						<li>skin temperature</li>
					</div>
					<div class="animate-item-text" id="animate-text2">
						<h3> HealthPatch comes with two user/doctor interfaces: </h4> 
						<h4> - website where the user can access all of his information and health supervisor. </h4> 
						<h4> Doctors are provided with a list of their patients, their information and a live data supervisor of the patient's device </h4> 
						<h4 id="app-text"> - Android app for with the same features and easier access</h4> 
					</div>
				</div>
				<div class="footer">
					<h3>HealthPatch</h3>
				</div>
			</div>
		</div>
			
		<script type="module" src="JS/index.js"></script>		
		<script src="js_lib/node_modules/animejs/lib/anime.min.js"></script>		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js" integrity="sha512-1dalHDkG9EtcOmCnoCjiwQ/HEB5SDNqw8d4G2MKoNwjiwMNeBAkudsBCmSlMnXdsH8Bm0mOd3tl/6nL5y0bMaQ==" crossorigin="anonymous"></script>	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js" integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js" integrity="sha512-5/OHwmQzDSBS0Ous4/hlYoWLHd06/d2r7LdKZQVBXOA6PvOqWVXtdboiLTU7lQTGyVoKVTNkwi0ol4gHGlw5ww==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js" integrity="sha512-RvUydNGlqYJapy0t4AH8hDv/It+zKsv4wOQGb+iOnEfa6NnF2fzjXgRy+FDjSpMfC3sjokNUzsfYZaZ8QAwIxg==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineLite.min.js" integrity="sha512-tSIDeirKC6suYILHqqPuZH3s0MvD4a5vCHXhBIcdmq4gQXZ2IB3fEYA5x2f3D2p/CbSqzKEvuTEVbS5VZ2u+ew==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenLite.min.js" integrity="sha512-pvDW4tehKKsohH97164HwKwRGFpzayEFWTVbk8HuUoLIQ7Jp+WLN5XYokVuoCj2aT6dy8ihbW8SRTG1k0W4mSQ==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/plugins/BezierPlugin.min.js" integrity="sha512-plyexAULVlTExvDn2yUZFJV9F8q+53MC/GpU9dEuNGXmrrI3J8Rcffjvxg3OOBALBvF+UILPLIBEoCeF2maqTQ==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/MotionPathPlugin.min.js" integrity="sha512-lU49UnjuDyVRzZFkzDNDJOtavmwy+c412aZ8JgIxgSza34IbtxvcCDtZdlZ3Ay9t9O22qX1QoGGqILPHRT4bTg==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/plugins/CSSRulePlugin.min.js" integrity="sha512-TPqrL/vK6moJ7N/nHBv5vdSzGC1VI9sMxbgmzOBn5QAgOJGjouR2JcFG9khZNZLksWRZo5N9DPRhSMnVY7VRbA==" crossorigin="anonymous"></script>
	</body>


</html>
