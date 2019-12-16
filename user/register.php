<?php 
  session_start();
  require_once '../core/init.php';
  include('includes/header.php');
?>

<h2 class="text-center">STEP User Registration</h2>
<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Registration Form</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="email.php">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="firstname" class="form-control form-control-sm" name="firstname">
				              <label for="firstname">First Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="lastname" class="form-control form-control-sm" name="lastname">
				              <label for="lastname">Last Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" name="email">
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-lock prefix"></i>
				              <input type="password" id="password" class="form-control form-control-sm" name="password">
				              <label for="password">Password</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map prefix"></i>
				              <input type="text" id="address" class="form-control form-control-sm" name="address">
				              <label for="address">Address</label>
				            </div>
						</div>
						<div class="col-md-6">				            
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="city" class="form-control form-control-sm" name="city">
				              <label for="city">City</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="state" class="form-control form-control-sm" name="state">
				              <label for="state">State</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="zipcode" class="form-control form-control-sm" name="zipcode">
				              <label for="zipcode">Zipcode</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-phone prefix"></i>
				              <input type="text" id="phone" class="form-control form-control-sm" name="phone">
				              <label for="phone">Phone</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="date" id="dateOfBirth" class="form-control form-control-sm" name="dateOfBirth">
				              <label for="dateOfBirth">Date of Birth</label>
				            </div>		            
						</div>
						<div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="submit">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

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

		$insertEmp = "INSERT INTO step (ip,firstname,lastname,email,password,address,city,state,zipcode,phone,dateOfBirth) VALUES ('$ip','$firstname','$lastname','$email','$password','$address','$city','$state','$zipcode','$phone','$dateOfBirth')";
		$db->query($insertEmp);

		
		if($db){
			$_SESSION['email'] = $email;
			echo "<script>alert('Account has been created successfully')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}else{
			$_SESSION['email'] = $email;

			echo "<script>alert('Account has been created successfully')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>

<?php include 'includes/footer.php';?>