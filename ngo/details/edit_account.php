<?php 
	include('../core/init.php');
?>

<?php
	$email = $_SESSION['email'];
  	$sql = "SELECT * FROM ngo WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $id = $row_pro['id'];
          $ngo_name = $row_pro['ngo_name'];
          $ngo_description = $row_pro['ngo_description'];
          $ngo_email = $row_pro['email'];
          $ngo_head = $row_pro['ngo_head'];
          $ngo_address = $row_pro['ngo_address'];
          $ngo_city = $row_pro['city'];
          $ngo_state = $row_pro['state'];
          $ngo_zipcode = $row_pro['zipcode'];
          $ngo_phone = $row_pro['phone'];
          $ngo_organization_type = $row_pro['organization_type'];
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
							<div class="md-form form-sm"> <i class="fa fa-ngo prefix"></i>
				              <input type="text" id="ngo_name" class="form-control form-control-sm" value="<?=$ngo_name;?>" name="ngo_name">
				              <label for="firstname">NGO Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="ngo_description" class="form-control form-control-sm" value="<?=$ngo_description;?>" name="ngo_description">
				              <label for="lastname">NGO Description</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" value="<?=$ngo_email;?>" name="ngo_email">
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map prefix"></i>
				              <input type="text" id="ngo_address" class="form-control form-control-sm" value="<?=$ngo_address;?>" name="ngo_address">
				              <label for="address">Address</label>
				            </div>				            
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="city" class="form-control form-control-sm" value="<?=$ngo_city;?>" name="city">
				              <label for="city">City</label>
				            </div>
						</div>
						<div class="col-md-6">
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="state" class="form-control form-control-sm" value="<?=$ngo_state;?>" name="state">
				              <label for="state">State</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-map-marker-alt prefix"></i>
				              <input type="text" id="zipcode" class="form-control form-control-sm" value="<?=$ngo_zipcode;?>" name="zipcode">
				              <label for="zipcode">Zipcode</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-phone prefix"></i>
				              <input type="text" id="phone" class="form-control form-control-sm" value="<?=$ngo_phone;?>" name="phone">
				              <label for="phone">Phone</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-users prefix"></i>
				              <input type="text" id="organization_type" class="form-control form-control-sm" value="<?=$ngo_organization_type;?>" name="organization_type">
				              <label for="income">Organization Type</label>
				            </div>	
				            <div class="md-form form-sm"> <i class="fas fa-users prefix"></i>
				              <input type="text" id="ngo_head" class="form-control form-control-sm" value="<?=$ngo_head;?>" name="ngo_head">
				              <label for="income">NGO Head</label>
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
		$ngo_id = $id;
		$name = $_POST['ngo_name'];
		$description = $_POST['ngo_description'];
		$email = $_POST['ngo_email'];
		$head = $_POST['ngo_head'];
		$address = $_POST['ngo_address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$phone = $_POST['phone'];
		$organization_type = $_POST['organization_type'];

		$updateCus = "UPDATE customers SET ngo_name = '$ngo_name',ngo_description = '$ngo_description', email = '$email', ngo_address = '$address', ngo_head = '$head', city = '$city', state = '$state', zipcode = '$zipcode', phone = '$phone', organization_type = '$organization_type' WHERE id = '$ngo_id'";
		$run_query = $db->query($updateCus);
		if($run_query){
			echo "<script>alert('Your account has been successfully updated')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>
