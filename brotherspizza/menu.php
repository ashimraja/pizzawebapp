<!DOCTYPE html>
<html>
	<head>
		<?php
			session_start();

			require('dbConnection.php');

        	$connresult = db_connect();
    

			$nonVegPizza = $connresult->query("select * from pizza where p_type = 'Non Veg'");
			$vegPizza = $connresult->query("select * from pizza where p_type = 'Veg'");
			$drinks = $connresult->query("select * from drinks");
			$drinkDetails = $connresult->query("select * from drinks");
			$pizza = $connresult->query("select * from pizza");
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
		<title>Menu | Brothers Pizza</title>
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
		<script src="./js/script.js"></script>
	</head>

    <body>
		<?php 
		include 'pizzaDetails.php';
		?>
		<?php include 'profile.php'?>
        <div class="spinners" id="spinner">
			<div class="spinner-border spinner-border-sm" style="width: 3rem; height: 3rem;color: var(--primary)" role="status">
				<span class="sr-only"></span>
			</div>
			<!-- <div class="spinner-grow spinner-grow-sm" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only"></span>
			</div> -->
		</div>

		<div id="added-to-cart">
			<p><i class="bi bi-check-circle-fill" style="color: var(--primary);"></i> Added To Cart</p>
		</div>
		<?php include 'cart.php'?>
		
        <!-- Navigation Bar -->
        <?php include 'navbar.php'?>

		<!--Pizza List Section-->
		<div class="pizza-list-outer" style="margin-bottom: 50px">
			<div class="pizza-list-inner">
				<h2 style="font-family: 'salsa';color: #4F320C; margin-top: 50px">Make Your Day, <span style="color: var(--primary)">Delicious</span></h2>

				

				<div class="menu-top">
					<ul style="">
						<li class="active-nav" id="show-pizza-button"><img src="./images/pizza-icon.png" height="25">Pizza</li>
						<li class="" id="show-drinks-button"><img src="./images/drinks.png" height="30">Drinks</li>
						
					</ul>
					<!-- <form style="width: 100%; display: flex; flex-direction: column; align-items: end; justify-content: center; position: relative">
						<span style="width: 100%; display: flex; justify-content: end;"><input type="text" placeholder="Search" style="padding: 9px 40px; border: 0; box-shadow: 0 0 1px rgba(0,0,0,0.3); min-width: 50%;background: url('./images/search.png') no-repeat 12px 15px white"><button class="order-button" type="submit">Search</button></span>
					</form> -->
				</div>

				<h5 style="margin: 50px 0 20px 0; font-family: 'salsa';" class="pizza-list-grid">Non-Veg Pizza</h5>

				<div class="list-grid pizza-list-grid">
					<?php
					while($item = $nonVegPizza->fetch_assoc()) {
						echo '
						<div class="grid-element">
							<a onclick="openDescription(`'.$item['p_id'].'`)">
								<div class="grid-image">
									<img src="'.$item['p_image'].'">
								</div>
							</a>
							<div class="element-detail">
								<h6>'.$item['p_name'].'</h6>
								<div class="cart-and-price">
									<h5>₹'.$item['p_price'].'</h5>
									<button class="order-button" id="'.$item['p_id'].'" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								</div>	
							</div>
						</div>
						';
					}
					?>
					<!-- <div class="grid-element">
						<div class="grid-image">
							<img src="./images/chicken-pepperoni-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Chicken Pepperoni Pizza</h6>
							<div class="cart-and-price">
								<h5>₹480</h5>
								<button class="order-button" id="cp1" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
							</div>	
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/chicken-sausage-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Chicken Sausage Pizza</h6>
							<div class="cart-and-price">
								<h5>₹239</h5>
								<button class="order-button" id="cp2" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/grilled-chicken-peppers-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Grilled Chicken & Peppers Pizza</h6>
							<div class="cart-and-price">
								<h5>₹315</h5>
								<button class="order-button" id="cp3" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/spicy-chicken-barbeque-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Spicy Chicken Barbeque Pizza</h6>
							<div class="cart-and-price">
								<h5>₹359</h5>
								<button class="order-button" id="cp4" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/spicy-chicken-tandoori-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Spicy Chicken Tandoori Pizza</h6>
							<div class="cart-and-price">
								<h5>₹465</h5>
								<button class="order-button" id="cp5" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/chicken-supreme-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Chicken Supreme Pizza</h6>
							<div class="cart-and-price">
								<h5>₹480</h5>
								<button class="order-button" id="cp6" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
						</div>
					</div> -->
				</div>

				<h5 style="margin: 50px 0 20px 0; font-family: 'salsa';" class="pizza-list-grid">Veg Pizza</h5>

				<div class="list-grid pizza-list-grid">
					<?php
						while($item = $vegPizza->fetch_assoc()) {
							echo '
							<div class="grid-element">
								<a onclick="openDescription(`'.$item['p_id'].'`)">
									<div class="grid-image">
										<img src="'.$item['p_image'].'">
									</div>
								</a>
								<div class="element-detail">
									<h6>'.$item['p_name'].'</h6>
									<div class="cart-and-price">
										<h5>₹'.$item['p_price'].'</h5>
										<button class="order-button" id="'.$item['p_id'].'" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
									</div>	
								</div>
							</div>
							';
						}
					?>
					<!-- <div class="grid-element">
						<div class="grid-image">
							<img src="./images/double-cheese-margarita-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Double Cheese Margarita Pizza</h6>
							<div class="cart-and-price">
								<h5>₹265</h5>
								<button class="order-button" id="vp1" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/spicy-mushroom-peppers-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Spicy Mushroom Peppers Pizza</h6>
							<div class="cart-and-price">
								<h5>₹265</h5>
								<button class="order-button" id="vp2" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/veg-margarita-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Veg Margarita Pizza</h6>
							<div class="cart-and-price">
								<h5>₹189</h5>
								<button class="order-button" id="vp3" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/spicy-tandoori-paneer-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Spicy Tandoori Paneer Pizza</h6>
							<div class="cart-and-price">
								<h5>₹399</h5>
								<button class="order-button" id="vp4" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/tomato-fresh-veggie-pizza.jpeg">
						</div>
						<div class="element-detail">
							<h6>Tomato Fresh Veggie Pizza</h6>
							<div class="cart-and-price">
								<h5>₹265</h5>
								<button class="order-button" id="vp5" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/premium-veggie-pizza.jpg">
						</div>
						<div class="element-detail">
							<h6>Premium Veggie Pizza</h6>
							<div class="cart-and-price">
								<h5>₹399</h5>
								<button class="order-button" id="vp6" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div> -->
				</div>

				<div class="list-grid drinks-list-grid" style="margin-top: 50px">
					<?php
						while($item = $drinks->fetch_assoc()) {
							echo '
							<div class="grid-element">
								<a onclick="openDescription(`'.$item['d_id'].'`)">
									<div class="grid-image">
										<img src="'.$item['d_image'].'">
									</div>
								</a>
								<div class="element-detail">
									<h6>'.$item['d_name'].'</h6>
									<div class="cart-and-price">
										<h5>₹'.$item['d_price'].'</h5>
										<button class="order-button" id="'.$item['d_id'].'" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
										
									</div>	
									
								</div>
							</div>
							';
						}
					?>
					<!-- <div class="grid-element">
						<div class="grid-image">
							<img src="./images/classic-lemonade.jpg">
						</div>
						<div class="element-detail">
							<h6>Classic Lemonade</h6>
							<div class="cart-and-price">
								<h5>₹120</h5>
								<button class="order-button" id="d1" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/lemon-iced-tea.jpg">
						</div>
						<div class="element-detail">
							<h6>Lemon Iced Tea</h6>
							<div class="cart-and-price">
								<h5>₹120</h5>
								<button class="order-button" id="d2" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/masala-lemonade.jpg">
						</div>
						<div class="element-detail">
							<h6>Masala Lemonade</h6>
							<div class="cart-and-price">
								<h5>₹135</h5>
								<button class="order-button" id="d3" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/cocoa-frappe.jpg">
						</div>
						<div class="element-detail">
							<h6>Cocoa Frappe</h6>
							<div class="cart-and-price">
								<h5>₹215</h5>
								<button class="order-button" id="d4" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/coffee-frappe.jpg">
						</div>
						<div class="element-detail">
							<h6>Coffee Frappe</h6>
							<div class="cart-and-price">
								<h5>₹215</h5>
								<button class="order-button" id="d5" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/mango-frappe.jpg">
						</div>
						<div class="element-detail">
							<h6>Mango Frappe</h6>
							<div class="cart-and-price">
								<h5>₹215</h5>
								<button class="order-button" id="d6" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/strawberry-frappe.jpg">
						</div>
						<div class="element-detail">
							<h6>Strawberry Frappe</h6>
							<div class="cart-and-price">
								<h5>₹215</h5>
								<button class="order-button" id="d7" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div>
					<div class="grid-element">
						<div class="grid-image">
							<img src="./images/vanilla-frappe.jpg">
						</div>
						<div class="element-detail">
							<h6>Vanilla Frappe</h6>
							<div class="cart-and-price">
								<h5>₹190</h5>
								<button class="order-button" id="d8" onclick="addToCart(this.id)"><i class="bi bi-cart-plus"></i></button>
								
							</div>	
							
						</div>
					</div> -->
				</div>

				<!-- <button class="order-button" style="margin: 30px 0">
					Go To Menu
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="15" width="15" fill="white"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
					</span>
				</button> -->

			</div>
		</div>
        <!-- Footer -->
        <?php include 'footer.php'?>
    </body>
	<Script src="./js/cart.js"></script>
	<script src="./js/form-validation.js"></script>
</html>

<script>
	pizzaDetails = [
		<?php
			while ($row=$pizza->fetch_assoc()) {
			    echo "{id: '".$row['p_id']."',name: '".$row['p_name']."',pizza_type: '".$row['p_type']."', price: ".$row['p_price'].", image: '".$row['p_image']."', qty: 1, type: 'pizza'},";
			}
		?>
	];

	drinkDetails = [
		<?php
			while ($row=$drinkDetails->fetch_assoc()) {
			    echo "{id: '".$row['d_id']."',name: '".$row['d_name']."', price: ".$row['d_price'].", image: '".$row['d_image']."', qty: 1, type: 'drink'},";
			}
		?>
	];
	
</script>