<!DOCTYPE html>
<html>
	<head>

		<?php
			session_start();
			if (isset($_SESSION['id'])) {
				header('Location: index.php');
			}
			?>
        <script>
			console.log = function(){ }
			function myInitFunction() {
				$('#spinner').fadeOut(200);
			}
			
		</script>

		<script>
			window.addEventListener("load", myInitFunction)
		</script>
		<!-- <script src="./js/form-validation.js"></script> -->
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Brothers Pizza</title>
		<link rel="icon" type="image/x-icon" href="./images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	</head>
	<body>

		<div class="spinners" id="spinner">
			<div class="spinner-border spinner-border-sm" style="width: 3rem; height: 3rem;color: var(--primary)" role="status">
				<span class="sr-only"></span>
			</div>
			<!-- <div class="spinner-grow spinner-grow-sm" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only"></span>
			</div> -->
		</div>
		<div class="signin-section">
			<div class="sign-in-head">
				<i class="bi bi-x-lg" style="font-size: 25px; cursor: pointer" onclick="window.location = 'index.php';"></i>
			</div>
			<form method="post" id="signin-form" action="">
				<h4 style="margin-bottom: 50px; text-align: center; color: var(--dark)">Sign <span style="color: var(--primary)">In</span></h4>
				<p>Email</p>
				<input type="text" id="signin-email" name="email" value="<?php if(isset($_POST['submit'])) {echo $_POST['email'];}?>"/>
				<p id="invalid-email"></p>
				<p>Password</p>
				<input type="password" id="signin-password" name="password" value="<?php if(isset($_POST['submit'])) {echo $_POST['password'];}?>"/>
				<span style="position: absolute">
					<i class="bi bi-eye-slash eye" onclick="togglePassword();"></i>
				</span>
				<p id="wrong-password"></p>
				
				<div style="display: flex; align-items: center; justify-content: end;">
					<a href="#">Forgot Password?</a>
				</div>
				<button type="submit" name="submit">Log In</button>
				<p style="text-align: center; margin-top: 50px; font-size: 15px">Don't have an account? <a href="sign-up.php">Sign Up</a></p>
			</form>
		</div>
	</body>
</html>

<script>
	$('#signin-form').submit(function(e) {

		var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var validEmail = regEx.test($('#signin-email').val());

		if($('input').val() == "" || $('#signin-password').val() == "") {
			e.preventDefault();
		}
		if(!validEmail) {
			e.preventDefault();
			$('#invalid-email').html('Please enter a valid email');
		} 
		else {
			$('#invalid-email').html('');
		}
		
	})

	function togglePassword() {
		$('.eye').toggleClass('bi-eye');
		var x = document.getElementById('signin-password');
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>

<?php
if(isset($_POST['submit'])) {
	require('dbConnection.php');

	$connresult = db_connect();


    $sql = "select * from users where email = '".$_POST['email']."'";
    $result = $connresult->query($sql);

    while ($row=$result->fetch_assoc()) {
        if ($row['email'] != "") {
			$uid =  $row['u_id'];
			$post = $row['u_post'];
			$password =  $row['password'];
			$fname =  $row['firstname'];
			$lname =  $row['lastname'];
			$email = $row['email'];
			$profile_picture = $row['profile_pic'];
		} 
    }

    if ($email != '') {
		if($_POST['password'] == $password) {
			$_SESSION['id'] = $uid.$post;
			$_SESSION['uid'] = $uid;
			$_SESSION['firstname'] = $fname;
			$_SESSION['lastname'] = $lname;
			$_SESSION['email'] = $email;
			$_SESSION['post'] = $post;
			$_SESSION['profile_pic'] = $profile_picture;
			if ($post == 'admin') {
				$_SESSION['login'] = true;
				header ('Location: ./admin/dashboard.php');
			}	
			else {
				header ('Location: index.php');
			}
			
		}
		else {
			echo "<script>
					$('#wrong-password').html('Incorrect Password');
			</script>";
		}
	}
	else {
		echo "<script>
					$('#invalid-email').html('Email is not registered');
			</script>";
	}
}
?>