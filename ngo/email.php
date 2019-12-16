<?php include('includes/header.php');?>

<?php
    if(isset($_POST['submit'])){
    	$ip = getIp();
    	$ngo_name = sanitize($_POST['ngo_name']);
    	$ngo_description = sanitize($_POST['ngo_description']);
    	$organization_type = sanitize($_POST['organization_type']);
    	$email = sanitize($_POST['email']);
    	$password = sanitize($_POST['password']);
    	$ngo_address = sanitize($_POST['ngo_address']);
    	$ngo_head = sanitize($_POST['ngo_head']);
    	$city = sanitize($_POST['city']);
    	$state = sanitize($_POST['state']);
    	$zipcode = sanitize($_POST['zipcode']);
    	$phone = sanitize($_POST['phone']);
    }
	
    $from = "itsumeet@gmail.com";
	$to = $email;
	$subject = "Successful Registration";
	$body = "Hello $ngo_name! Greetings for the day. Thank you for registering with us. You can view your dashboard and upload the courses for training purpose.";
	$headers = "From: $from";

    if(mail($to,$subject,$body,$headers)){
	echo "<h2 class='text-success p-3 h2-responsive'>Email sent successfully!</h2>";
	}else{
	echo "<h2 class='text-danger p-3 h2-responsive'>Failure in sending email!</h2>";
	}
	
?>

<?php include('includes/footer.php'); ?>