<?php 
	include('../core/init.php');
?>

<?php
	$email = $_SESSION['email'];
  	$sql = "SELECT * FROM step WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $user_id = $row_pro['id'];
          $user_firstname = $row_pro['firstname'];
          $user_lastname = $row_pro['lastname'];
          $user_email = $row_pro['email'];
          $user_dateOfBirth = $row_pro['dateOfBirth'];
          $user_address = $row_pro['address'];
          $user_city = $row_pro['city'];
          $user_state = $row_pro['state'];
          $user_zipcode = $row_pro['zipcode'];
          $user_phone = $row_pro['phone'];
          $user_noOfMembers = $row_pro['noOfMembers'];
          $user_noOfChildren = $row_pro['noOfChildren'];
          $user_income = $row_pro['income'];
          $user_dateOfRegistration = $row_pro['dateOfRegistration'];
    }
?>

<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Edit Account</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="firstname" class="form-control form-control-sm" value="<?=$user_firstname;?>" name="firstname">
				              <label for="firstname">First Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="lastname" class="form-control form-control-sm" value="<?=$user_lastname;?>" name="lastname">
				              <label for="lastname">Last Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" value="<?=$user_email;?>" name="email">
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map prefix"></i>
				              <input type="text" id="address" class="form-control form-control-sm" value="<?=$user_address;?>" name="address">
				              <label for="address">Address</label>
				            </div>				            
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="city" class="form-control form-control-sm" value="<?=$user_city;?>" name="city">
				              <label for="city">City</label>
				            </div>				            
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="date" id="dateOfBirth" class="form-control form-control-sm" value="<?=$user_dateOfBirth;?>" name="dateOfBirth">
				              <label for="dateOfBirth">Date of Birth</label>
				            </div>
						</div>
						<div class="col-md-6">
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="state" class="form-control form-control-sm" value="<?=$user_state;?>" name="state">
				              <label for="state">State</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="zipcode" class="form-control form-control-sm" value="<?=$user_zipcode;?>" name="zipcode">
				              <label for="zipcode">Zipcode</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-phone prefix"></i>
				              <input type="text" id="phone" class="form-control form-control-sm" value="<?=$user_phone;?>" name="phone">
				              <label for="phone">Phone</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-users prefix"></i>
				              <input type="number" id="noOfMembers" class="form-control form-control-sm" value="<?=$user_noOfMembers;?>" name="noOfMembers">
				              <label for="noOfMembers">No. of Members</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-users prefix"></i>
				              <input type="number" id="noOfChildren" class="form-control form-control-sm" value="<?=$user_noOfChildren;?>" name="noOfChildren">
				              <label for="noOfChildren">No. of Children</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-users prefix"></i>
				              <input type="text" id="income" class="form-control form-control-sm" value="<?=$user_income;?>" name="income">
				              <label for="income">Income</label>
				            </div>				            
						</div>
						<div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="update">Update <i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['update'])){
		$ip = getIp();
		$user_id = $id;
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$dateOfBirth = $_POST['dateOfBirth'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$phone = $_POST['phone'];
		$noOfMembers = $_POST['noOfMembers'];
		$noOfChildren = $_POST['noOfChildren'];
		$income = $_POST['income'];
		$dateOfRegistration = $_POST['dateOfRegistration'];

		$updateCus = "UPDATE customers SET firstname = '$firstname',lastname = '$lastname', email = '$email', address = '$address', dateOfBirth = '$dateOfBirth', city = '$city', state = '$state', zipcode = '$zipcode', phone = '$phone', noOfMembers = '$noOfMembers', noOfChildren = '$noOfChildren', income = '$income' WHERE id = '$user_id'";
		$run_query = $db->query($updateCus);
		if($run_query){
			echo "<script>alert('Your account has been successfully updated')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>
