<?php
	$email = $_SESSION['email'];
  	$sql = "SELECT * FROM ngo WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $ngo_id = $row_pro['id'];
          $ngo_name = $row_pro['ngo_name'];
          $ngo_description = $row_pro['ngo_description'];
          $email = $row_pro['email'];
          $ngo_head = $row_pro['ngo_head'];
          $ngo_address = $row_pro['ngo_address'];
          $city = $row_pro['city'];
          $state = $row_pro['state'];
          $zipcode = $row_pro['zipcode'];
          $phone = $row_pro['phone'];
          $organization_type = $row_pro['organization_type'];
    }
?>

<h2 class="text-center p-3">Add Courses</h2>
<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Course Form</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="">					
						<div class="">
							<div class="md-form form-sm"> 
				              <input type="text" id="course_name" class="form-control form-control-sm" name="course_name">
				              <label for="course_name">Course Name</label>
				            </div>
				            <div class="md-form form-sm"> 
				              <textarea id="course_description" class="md-textarea form-control form-control-sm" name="course_description"></textarea>
				              <label for="course_description">Course Description</label>
				            </div>
				            <div class="md-form form-sm"> 
				              <input type="text" id="course_category" class="form-control form-control-sm" name="course_category">
				              <label for="course_category">Course Category</label>
				            </div>
				            <div class="md-form form-sm"> 
				              <input type="number" id="course_duration" class="form-control form-control-sm" name="course_duration">
				              <label for="course_duration">Course Duration</label>
				            </div>
				            <div class="md-form form-sm"> 
				              <textarea id="course_objective" class="md-textarea form-control form-control-sm" name="course_objective"></textarea>
				              <label for="course_objective">Course Objective</label>
				            </div>
				            <div class="md-form form-sm"> 
				              <input type="text" id="course_medium" class="form-control form-control-sm" name="course_medium">
				              <label for="course_medium">Course Medium</label>
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
		$course_name = sanitize($_POST['course_name']);
		$course_description = sanitize($_POST['course_description']);
		$course_category = sanitize($_POST['course_category']);
		$course_duration = sanitize($_POST['course_duration']);
		$course_objective = sanitize($_POST['course_objective']);
		$course_medium = sanitize($_POST['course_medium']);

		$insertCourse = "INSERT INTO courses (ngo_id, course_name, course_description, course_category, course_duration, course_objective, course_medium) VALUES ('$ngo_id', '$course_name', '$course_description', '$course_category', '$course_duration', '$course_objective', '$course_medium')";
		$db->query($insertCourse);

		
		if($db){
			$_SESSION['email'] = $email;
			echo "<script>alert('Courses have been added successfully!')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}else{
			$_SESSION['email'] = $email;
			echo "<script>alert('Courses have been added successfully!')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>

<?php include 'includes/footer.php';?>