<?php
	session_start();
	require_once '../core/init.php';
?>
<?php 
	// Check if user is logged in
	if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }
?>

<?php
	// Select the user based on logged in email
    $email = $_SESSION['email'];
    $sqlcus = "SELECT * FROM step WHERE email = '$email'";
    $result = $db->query($sqlcus);
    while ($row_pro = mysqli_fetch_array($result)) {
        $step_id = $row_pro['id'];
        $step_firstname = $row_pro['firstname'];
        $step_email = $row_pro['email'];
        $step_address = $row_pro['address'];
        $step_city = $row_pro['city'];
        $step_state = $row_pro['state'];
        $step_zipcode = $row_pro['zipcode'];
        $step_phone = $row_pro['phone'];
    }
?>
<?php
	// Fetch the internship selected/applied
	if(isset($_GET['apply'])){

		//Fetch the id from apply and verify in courses table
	    $id = sanitize((int)$_GET['apply']);
        $sqlcourse = "SELECT n.id, n.ngo_name, c.course_name FROM courses c INNER JOIN ngo n ON c.ngo_id = n.id WHERE c.deleted = 0 AND c.id = '$id'";
        $courses = $db->query($sqlcourse);
        while ($course = mysqli_fetch_assoc($courses)) {
            $course_name = $course['course_name'];
            $ngo_name = $course['ngo_name'];
            $ngo_id = $course['id'];
        }

        //Fetch data from applications table
	    $sql = "SELECT * FROM applications WHERE course_id = '$id'";
        $applications = $db->query($sql);
        while ($application = mysqli_fetch_assoc($applications)) {
            $step_user_id = $application['step_id'];
            $course_user_id = $application['course_id'];
        }

		$insertSql = "INSERT INTO applications (`step_id`,`course_id`,`ngo_id`,`applied`) VALUES ('$step_id','$id','$ngo_id', 1)";
        $insert = $db->query($insertSql);
		if($insert){
        ?>
            <script type="text/javascript">
                alert('Successfully applied for the course!');
            </script>
        <?php
        }else{
            ?>
            <script type="text/javascript">
                alert('Sorry your application could not be added!');
            </script>
        <?php
        }
    }
  	else{
		echo "Data is missing, please select the course";
		exit();
	}
	
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Assignment</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">  
</head>
<body>
	<!-- Message for succesful application -->
	<h2 class="text-center text-success p-3">Dear <?=$step_firstname;?>, You have successfully applied for <b><?=$course_name; ?></b> course by <b><i><?=$ngo_name;?></i></b></h2>
	<a href="index.php" class="btn btn-default">Go Back</a>
</body>
</html>