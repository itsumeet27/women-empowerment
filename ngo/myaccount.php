<!DOCTYPE html>
<?php 
	session_start();
	include '../core/init.php';
?>

<?php 
  if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
        echo "<script>window.open('','_self')</script>";
    }
?>

<?php
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM ngo WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $id = $row_pro['id'];
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

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>NGO Dashboard</title>
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

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="index.php"><?=$ngo_name;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?add_courses">Add Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?edit_account">Edit Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?change_password">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?delete_account">Delete Account</a>
      </li>
      <?php
        if(isset($_SESSION['email'])){
          echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
        }
      ?>
    </ul>
  </div>
</nav>
  <?php
    $selCourses = "SELECT * FROM courses WHERE ngo_id = '$id' AND deleted = 0";
    $resultCourses = $db->query($selCourses);
  ?>

  <?php 
    if(!isset($_GET['add_courses'])) {
      if (!isset($_GET['edit_account'])) {
        if(!isset($_GET['change_password'])){
          if(!isset($_GET['delete_account'])){
            ?>
              <div class='container-fluid'>
                <h3 class='h3-responsive text-center p-3'>List of Courses added</h3>
                <div class='table-responsive'>
                  <table class='table table-bordered'>
                    <thead>
                      <th></th>
                      <th><b>Course Name</b></th>
                      <th><b>Course Description</b></th>
                      <th><b>Course Category</b></th>
                      <th><b>Course Duration</b></th>
                      <th><b>Course Objective</b></th>
                    </thead>
                    <tbody>
                  <?php
                    while($courses = mysqli_fetch_array($resultCourses)){
                      $course_id = $courses['id'];
                      $course_name = $courses['course_name'];
                      $course_description = $courses['course_description'];
                      $course_duration = $courses['course_duration'];
                      $course_category = $courses['course_category'];
                      $course_objective = $courses['course_objective'];
                  ?>
                      <tr>
                        <td><i class='fas fa-trash'></i></td>
                        <td><?=$course_name;?></td>
                        <td class="text-justify"><?=nl2br($course_description);?></td>
                        <td><?=$course_category;?></td>
                        <td><?=$course_duration;?> months</td>
                        <td class="text-justify"><?=nl2br($course_objective);?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

                <h3 class="text-center p-3">List of registered users for courses provided</h3>
                <?php
                  $sqlapp = "SELECT s.firstname, s.lastname, s.email, s.phone, c.course_name, c.course_category, n.ngo_name, a.date FROM applications a INNER JOIN step s ON a.step_id = s.id INNER JOIN courses c ON a.course_id = c.id INNER JOIN ngo n ON a.ngo_id = n.id WHERE c.ngo_id = '$id' AND a.applied = 1";
                  $resultapp = $db->query($sqlapp);
                ?>

                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <th><b>First Name</b></th>
                      <th><b>Last Name</b></th>
                      <th><b>Email</b></th>
                      <th><b>Phone</b></th>
                      <th><b>Course Name</b></th>
                      <th><b>Course Category</b></th>
                      <th><b>NGO Name</b></th>
                      <th><b>Date of Registration</b></th>
                    </thead>
                    <tbody>
                      <?php while($applications = mysqli_fetch_array($resultapp)): ?>
                        <tr>
                          <td><?=$applications['firstname'];?></td>
                          <td><?=$applications['lastname'];?></td>
                          <td><?=$applications['email'];?></td>
                          <td><?=$applications['phone'];?></td>
                          <td><?=$applications['course_name'];?></td>
                          <td><?=$applications['course_category'];?></td>
                          <td><?=$applications['ngo_name'];?></td>
                          <td><?=$applications['date'];?></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php
          }
        }
      }
    }
  ?>
  <?php
    if(isset($_GET['add_courses'])){
      include 'details/add_courses.php';
    }
    if(isset($_GET['edit_account'])){
      include 'details/edit_account.php';
    }
    if(isset($_GET['change_password'])){
      include 'details/change_password.php';
    }
    if(isset($_GET['delete_account'])){
      include 'details/delete_account.php';
    }
  ?>

</body>
</html>