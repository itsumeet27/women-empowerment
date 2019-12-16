<?php 
  session_start();
  include('includes/header.php');
?>

<h2 class="text-center">NGO Registration</h2>
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
				              <input type="text" id="ngo_name" class="form-control form-control-sm" name="ngo_name">
				              <label for="ngo_name">NGO Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <textarea id="ngo_description" class="form-control form-control-sm" name="ngo_description"></textarea>
				              <label for="ngo_description">NGO Description</label>
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
				              <input type="text" id="ngo_address" class="form-control form-control-sm" name="ngo_address">
				              <label for="ngo_address">Address</label>
				            </div>			            
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="organization_type" class="form-control form-control-sm" name="organization_type">
				              <label for="organization_type">Organization Type</label>
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
				              <input type="text" id="ngo_head" class="form-control form-control-sm" name="ngo_head">
				              <label for="ngo_head">NGO Head</label>
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

		$insertEmp = "INSERT INTO ngo (ip,ngo_name,ngo_description,organization_type,email,password,ngo_address,city,state,zipcode,phone,ngo_head) VALUES ('$ip','$ngo_name','$ngo_description','$organization_type','$email','$password','$ngo_address','$city','$state','$zipcode','$phone','$ngo_head')";
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