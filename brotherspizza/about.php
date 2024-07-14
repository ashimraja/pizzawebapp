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
		<title>About | Brothers Pizza</title>
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

		<!-- About section -->
		<!-- <div class="about-hero">
			<img src="./images/carousel-1.jpg" width="100%" height="100%">
		</div> -->
		<div class="about-outer">
			<div class="about-inner">

				<div class="about-sections">
					<div class="description">
						<h1 style="margin: 20px 0; color: #4F320C; font-family: 'salsa';font-size: 50px">Brothers Pizza <br> <span style="color: var(--primary); font-size: 40px">Where every delivery is a slice of happiness!</span></h1>
						<p>Welcome to Brothers Pizza, where passion for pizza and a commitment to quality come together to deliver an unforgettable dining experience to your doorstep. Established with a vision to redefine pizza delivery, Brothers Pizza is your go-to destination for mouthwatering pizzas and refreshing beverages that elevate your moments of joy and celebration.</p>

					</div>
					<img src="./images/path4.png" height="100%">
				</div>
				

				<div class="about-sections reverse">
					<img src="./images/chicken-pepperoni-pizza.jpeg">
					<div class="description">
						<h4 style="margin: 20px 0; color: #4F320C">Crafting <span style="color: var(--primary)">Culinary Delights</span></h4>
						<p> At Brothers Pizza, we take pride in our artisanal approach to pizza-making. Our chefs skillfully blend premium ingredients, hand-tossed dough, and a secret family sauce recipe to create pizzas that are a symphony of flavors and textures. Every bite tells a story of dedication to the craft and a love for good food. We take pride in our commitment to culinary excellence. Our pizzas are a testament to the artistry of our skilled chefs who use only the finest ingredients. From hand-tossed dough to premium toppings, every element is chosen to ensure a perfect balance of flavors with each bite. It's not just a pizza; it's a crafted masterpiece.</p>
					</div>
				</div>
				
				<div class="about-sections">
					<div class="description">
						<h4 style="margin: 20px 0; color: #4F320C">Diverse Menu, <span style="color: var(--primary)">Delectable Choices</span></h4>
						<p>At Brothers Pizza, we are dedicated to delivering delicious pizzas and refreshing beverages to your doorstep. Our passion for crafting culinary delights, commitment to quality, and community focus set us apart. Explore our diverse menu that caters to all taste buds. Whether you're a fan of classic Margherita, a meat lover, or prefer adventurous toppings, Brothers Pizza has something for everyone. And what's a pizza without the perfect drink? Complement your meal with our selection of refreshing beverages, from classic sodas to artisanal options.</p>
					</div>
					<img src="./images/classic-lemonade.jpg">
				</div>

				<div class="about-sections reverse">
					<img src="./images/about(4).jpg">
					<div class="description">
						<h4 style="margin: 20px 0; color: #4F320C">Quality, Convenience, <span style="color: var(--primary)">Community</span></h4>
						<p>Brothers Pizza is more than a delivery service; it's an experience. Quality ingredients, convenient service, and a commitment to community make us your go-to choice for pizza and drinks. Join us on this flavorful journey, and let Brothers Pizza be the delicious highlight of your day.</p>
					</div>
				</div>

				<div class="about-sections">
					<div class="description">
						<h4 style="margin: 20px 0; color: #4F320C">Convenience at Your <span style="color: var(--primary)">Doorstep</span></h4>
						<p>Busy days shouldn't mean compromising on quality. With Brothers Pizza, you can enjoy gourmet pizzas and drinks without leaving the comfort of your home. Our efficient delivery service ensures your order arrives hot and fresh, ready to be savored.</p>
					</div>
					<img src="./images/pizza-delivery(1).png">
				</div>
				
			</div>
		</div>

        <!-- Footer -->
        <?php include 'footer.php'?>
    </body>
	<script src="./js/script.js"></script>
	<Script src="./js/cart.js"></script>
	<script src="./js/form-validation.js"></script>
</html>