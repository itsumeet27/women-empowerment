<?php include('includes/header.php'); ?>

<?php
	if(isset($_POST['submit'])){
		$ip = getIp();
		$firstname = sanitize($_POST['firstname']);
		$lastname = sanitize($_POST['lastname']);
		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
		$address = sanitize($_POST['address']);
		$city = sanitize($_POST['city']);
		$state = sanitize($_POST['state']);
		$zipcode = sanitize($_POST['zipcode']);
		$phone = sanitize($_POST['phone']);
		$dateOfBirth = sanitize($_POST['dateOfBirth']);
	}
	
	$from = "itsumeet@gmail.com";
	$to = $email;
	$subject = "Successful Registration";
	$body = "Hello $firstname! Greetings for the day. Thank you for registering with us. You can view your dashboard and apply for the courses.";
	$headers = "From: $from";

    if(mail($to,$subject,$body,$headers)){
	echo "<h2 class='text-success p-3 h2-responsive'>Email sent successfully!</h2>";
	}else{
	echo "<h2 class='text-danger p-3 h2-responsive'>Failure in sending email!</h2>";
	}
?>

<?php include('includes/footer.php'); ?>