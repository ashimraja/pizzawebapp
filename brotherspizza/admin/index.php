<?php include('includes/header.php') ?>
<?php include('includes/sidebar.php') ?>
<?php           
	if(isset($_GET['dashboard'])){
		
		include("dashboard.php");
		
	}

?>
<?php include('includes/footer.php') ?>