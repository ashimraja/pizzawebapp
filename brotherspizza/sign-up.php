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
			<form action="" method="post" id="signup-form">
				<h4 style="margin-bottom: 50px; text-align: center; color: var(--dark)">Sign <span style="color: var(--primary)">Up</span></h4>
				<div class="name-section">
                    <p>First Name<br><input type="text" id="firstname" name="firstname" value="<?php if(isset($_POST['submit'])) {echo $_POST['firstname'];}?>"></p>
                    <p>Last Name<br><input type="text" id="lastname" name="lastname" value="<?php if(isset($_POST['submit'])) {echo $_POST['lastname'];}?>"></p>
                </div>
				<p id="first-and-last-name"></p>
                <p>Email</p>
				<input type="text" id="signup-email" name="email" value="<?php if(isset($_POST['submit'])) {echo $_POST['email'];}?>"/>
				<p id="already-exists"></p>
				<p>Password</p>
				<input type="password" id="signup-password" name="password" value="<?php if(isset($_POST['submit'])) {echo $_POST['password'];}?>"/>
				<span style="position: absolute">
					<i class="bi bi-eye-slash passwordEye" onclick="signupTogglePassword();"></i>
				</span>

                <p>Confirm Password</p>
				<input type="password" id="confirm-password" name="confirmPassword" value="<?php if(isset($_POST['submit'])) {echo $_POST['confirmPassword'];}?>"/>
				<span style="position: absolute">
					<i class="bi bi-eye-slash confirmPasswordEye" onclick="signupToggleConfirmPassword();"></i>
				</span>
				<p id="invalid-password"><p>
	
				<button type="submit" name="submit">Register</button>
			</form>
		</div>
	</body>
</html>

<script>
	$('#signup-form').submit(function(e) {
		$('input').each(function() {
			if($(this).val() == "") {
				e.preventDefault();
			}
		})

		var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var validEmail = regEx.test($('#signup-email').val());

		if(($('#firstname').val()).length < 3 || ($('#lastname').val()).length < 3) {
			e.preventDefault();
			$('#first-and-last-name').html('Firstname and Lastname must have at least 3 characters')
		}
		else {
			$('#first-and-last-name').html('')
		}
		if(!validEmail) {
			$('#already-exists').html('Please enter a valid email');
			e.preventDefault();
		} 
		else {
			$('#already-exists').html('');
		}
		if($('#signup-password').val() != $('#confirm-password').val()) {
			$('#invalid-password').html("Passwords don't match");
			e.preventDefault();
		} 
		else {
			if(($('#signup-password').val()).length < 8) {
				$('#invalid-password').html("Password must have at least 8 characters");
				e.preventDefault();
			}
			else {
				$('#invalid-password').html("");
			}
		}
		
	})

	function signupTogglePassword() {
		$('.passwordEye').toggleClass('bi-eye');
		var x = document.getElementById('signup-password');
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

	function signupToggleConfirmPassword() {
		$('.confirmPasswordEye').toggleClass('bi-eye');
		var x = document.getElementById('confirm-password');
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
        $email = $row['email'];
    }
	//echo $email;

    if ($email == "") {
		$uid = 'cl'.rand(10, 10000);
		$sql = "insert into users values('".$uid."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['password']."','client', 'default_user.png')";
		if ($connresult->query($sql) === TRUE) {
			echo "A record is inserted successfully";
		} else {
			echo "Error while executing query ".$connresult->error;
		}
		
		echo "<script>window.location = 'sign-in.php'</script>";
		$connresult->close();
	}
	else {
		echo "<script>
					$('#already-exists').html('This email is already in use');
			</script>";
	}
}
?>