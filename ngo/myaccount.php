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
          $firstname = $row_pro['firstname'];
          $lastname = $row_pro['lastname'];
          $email = $row_pro['email'];
          $dateOfBirth = $row_pro['dateOfBirth'];
          $address = $row_pro['address'];
          $city = $row_pro['city'];
          $state = $row_pro['state'];
          $zipcode = $row_pro['zipcode'];
          $phone = $row_pro['phone'];
          $noOfMembers = $row_pro['noOfMembers'];
          $noOfChildren = $row_pro['noOfChildren'];
          $income = $row_pro['income'];
          $dateOfRegistration = $row_pro['dateOfRegistration'];
    }
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>User Dashboard</title>
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
  <a class="navbar-brand" href="index.php"><?=$firstname;?> <?=$lastname;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?add_details">Add Details</a>
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
    if(!isset($_GET['add_details'])) {
      if (!isset($_GET['edit_account'])) {
        if(!isset($_GET['change_password'])){
          if(!isset($_GET['delete_account'])){
            echo 
            "<div class='card'>
                <div class='card-header'>
                  <h3 class='h3-responsive p-2'>Hello $firstname</h3>
                </div>
                <div class='card-body table-responsive'>
                  <table class='table table-striped table-condensed' style='display: table'>
                    
                    <tr>
                      <th><b>Full Name: </b></th>
                      <td>$firstname $lastname</td>
                    </tr>
                    <tr>
                      <th><b>Email </b></th>
                      <td>$email</td>
                    </tr>
                    <tr>
                      <th><b>Phone: </b></th>
                      <td>$phone</td>
                    </tr>
                    <tr>
                      <th><b>Address: </b></th>
                      <td>$address</td>
                    </tr>
                    <tr>
                      <th><b>City: </b></th>
                      <td>$city</td>
                    </tr>
                    <tr>
                      <th><b>State: </b></th>
                      <td>$state</td>
                    </tr>
                    <tr>
                      <th><b>Zipcode: </b></th>
                      <td>$zipcode</td>
                    </tr>
                  </table>
                </div>
              </div>
            ";
          }
        }
      }
    }
  ?>
  <?php
    if(isset($_GET['add_details'])){
      include 'details/add_details.php';
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