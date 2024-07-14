<div class="profile-outer">
	<div class="profile-inner">
	<i class="bi bi-x-lg" style="font-size: 25px; cursor: pointer; position: absolute; top: 10px; right: 20px" onclick="closeProfile()"></i>
	<div class="user-detail">
		<div class="left-section" style="margin: 60px 50px">
			<div class="profile-picture" onclick="document.getElementById('input-pp').click()" style="background-image: url('./images/users/<?php echo $_SESSION['profile_pic']?>')"></div>
			<form id="upload-pp" method="POST" action="uploadProfilePic.php" style="display: none">
				<input type="file" id="input-pp" name="profile_pic" onchange="changeProfilePicture()">
			</form>
			<div style="margin: 20px 0 0 20px">
				<h4 style="color: var(--primary)"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']?></h4>
				<h6><?php echo $_SESSION['email']?></h6><br>
				<!-- <button class="order-button" onclick="openEditProfile()"><i class="bi bi-pencil-square"></i> Edit Profile</button> -->
			</div>
			<!-- <div class="profile-navigation">
				<ul style="list-style-type: none; padding: 0; margin: 0">
					<li class="active">Orders</li>
					<li>Reviews</li>
				</ul>
			</div> -->
		</div>
		<div class="right-section" style="margin: 60px 50px">
			<div class="orders">
				<h5>Your Orders</h5>
				<div class="order-list">
				</div>
			</div>

			<!-- <div class="reviews" style="display: none">
				<h5>Your Reviews</h5>
				<div class="review-list">

				</div>
			</div> -->
		</div>
	</div>
	</div>
</div>

<!-- <div class="editProfile-outer">
	<div class="editProfile-inner">
		<i class="bi bi-x-lg" style="font-size: 25px; cursor: pointer; position: absolute; top: 10px; right: 20px" onclick="closeEditProfile()"></i>
        <h5 style="font-family: 'salsa';color: #4F320C;">Edit <span style="color: var(--primary)">Profile</span></h5>
		<form action="editProfile.php" method="POST">
			<span>First Name</span><br>
			<input type="text" name="firstname"><br>
			<span>Last Name</span><br>
			<input type="text" name="lastname"><br>
			<span>Email</span><br>
			<input type="email" name="email"><br>
			<input type="submit" name="submit" value="Save" class="order-button">
		</form>
	</div>
</div> -->