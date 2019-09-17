<?php 
	session_start();
	session_destroy();
	echo "<script>window.open('index.php','_self')</script>";
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/footer.php';?>