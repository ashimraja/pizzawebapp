<div class="wrapper ">
		<aside id="sidebar" class="vh-100">
			<div class="h-100">
				<div class="sidebar-logo">
					<a href="#">Brother'sPizza</a>
				</div>
				<ul class="sidebar-nav ">
					<li class="sidebar-header">
						Admin Panel
					</li>
					<li class="sidebar-item">
						<a href="<?=$site_url?>admin/dashboard.php" class="sidebar-link">Dashboard</a>
					</li>
					<li class="sidebar-item">
						<a href="<?=$site_url?>admin/user.php" class="sidebar-link">User</a>
					</li>
					<li class="sidebar-item">
						<a href="<?=$site_url?>admin/pizza.php" class="sidebar-link">Pizza</a>
					</li>
					<li class="sidebar-item">
						<a href="<?=$site_url?>admin/drinks.php" class="sidebar-link">Drinks</a>
					</li>
					<li class="sidebar-item">
						<a href="<?=$site_url?>admin/order.php" class="sidebar-link">Order</a>
					</li>
				</ul>
			</div>
		</aside>
		<div class="main">
			<nav class="navbar navbar-expand px-3 border-bottom">
                <button id="sidebar-toggle" type="button">
					<i class="fa-solid fa-bars menu"></i>
                </button>
				<div class="navbar-collapse navbar">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0"> 
							<div class="border rounded-circle mx-auto d-flex " style="width:40px;height:40px" ><i class="fa fa-user text-light fa-2x m-auto"></i></div>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a href="logout.php" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div> 
        	</nav>