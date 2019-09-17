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

<h2 class="text-center">Add details</h2>
<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Details Form</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="">					
						<div class="">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="noOfMembers" class="form-control form-control-sm" name="noOfMembers">
				              <label for="noOfMembers">No. of Members</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="noOfChildren" class="form-control form-control-sm" name="noOfChildren">
				              <label for="noOfChildren">No. of Children</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="text" id="email" class="form-control form-control-sm" name="income">
				              <label for="income">Income</label>
				            </div>
				        </div>
						<div class="mt-4">
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
		$noOfMembers = sanitize($_POST['noOfMembers']);
		$noOfChildren = sanitize($_POST['noOfChildren']);
		$income = sanitize($_POST['income']);

		$insertUser = "UPDATE step SET noOfMembers = '$noOfMembers', noOfChildren = '$noOfChildren', income = '$income' WHERE id = '$user_id'";
		$db->query($insertUser);

		
		if($db){
			$_SESSION['email'] = $email;
			echo "<script>alert('Your details have been added')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}else{
			$_SESSION['email'] = $email;
			echo "<script>alert('Your details have been added')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>

<?php include 'includes/footer.php';?>