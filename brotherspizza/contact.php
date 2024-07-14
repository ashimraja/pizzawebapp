<!DOCTYPE html>
<html>
	<head>
		<?php
			session_start();
			require('dbConnection.php');
			$connresult = db_connect();
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
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Contact | Brothers Pizza</title>
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
	<?php include 'profile.php'?>
        <div class="spinners" id="spinner">
			<div class="spinner-border spinner-border-sm" style="width: 3rem; height: 3rem;color: var(--primary)" role="status">
				<span class="sr-only"></span>
			</div>
			<!-- <div class="spinner-grow spinner-grow-sm" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only"></span>
			</div> -->
		</div>
		<?php include 'cart.php'?>
		
        <!-- Navigation Bar -->
        <?php include 'navbar.php'?>

		<!-- Contact us section -->

		<div class="contact-outer">
			<div class="contact-inner">
				<div class="left-section">
					<h3 style="margin-bottom: 30px; border-bottom: solid; width: fit-content; padding-bottom: 15px">Connect With Us</h3>
					<!-- <p>Questions or cravings? Reach out to us, and we'll take care of the rest! Your satisfaction, delivered hot and delicious by Brothers Pizza.</p> -->
					<div class="contact-detail">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="15" width="15" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
						<p style="margin-bottom: 0;">admin@brotherspizza.com</p>
					</div>
					<div class="contact-detail">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="15" width="15" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
						<p style="margin-bottom: 0;">+91 9204837489</p>
					</div>

					<div class="social-media">
                    	<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="20" width="20" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
                    	<a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20" width="20" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
					</div>
				</div>
				<div class="right-section">
					<form>
						<h4 style="margin-bottom: 50px; font-weight: 500; color: #4F320C; font-family: 'salsa'">Send Your <span style="color: var(--primary)">Request</span></h4>
						<div class="inside-form">
							<p>Name<br><input type="text" id="name"></p>
							<p>Phone<br><input type="number"></p>
						</div>
						<div class="inside-form">
							<p>Email<br><input type="text" id="email"></p>
							<p>Subject<br><input type="text"></p>
						</div>
						<p>Message<br><textarea resizable="false"></textarea></p>
						<button class="order-button" style="padding: 10px 30px; border-radius: 50px;margin-top: 30px">Send</button>
					</form>
				</div>
			</div>	
		</div>

        <!-- Footer -->
        <?php include 'footer.php'?>
    </body>
	<script src="./js/script.js"></script>
	<Script src="./js/cart.js"></script>
	<script src="./js/form-validation.js"></script>
	<script>
		if (sessionStatus == 'active' && userType == 'client') {
			$('#name').val('<?php echo $_SESSION['firstname']." ".$_SESSION['lastname']?>');
			$('#email').val('<?php echo $_SESSION['email']?>');
		}
	</script>
</html>