<!DOCTYPE html>
<html lang="en">
<?php 
  include 'includes/functions.php';
  include '../core/init.php';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>NGO</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">

  <style type="text/css">
    .top-nav-collapse {
      background-color: #36a1c8
    }
    @media (max-width: 768px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #36a1c8
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #36a1c8
      }
    }

  </style>
</head>

<body>
  <header>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar z-depth-0">
      <a class="navbar-brand" href="../index.php">NGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="criteria.php">Criteria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organizations.php">Organizations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="funding.php">Funding & Norms</a>
          </li>
          <?php 
            if(!isset($_SESSION['email'])){
              echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
            }
            else{
              $email = $_SESSION['email'];
              $sqlngo = "SELECT * FROM ngo WHERE email = '$email'";
              $result = $db->query($sqlngo);
              while ($row_user = mysqli_fetch_array($result)) {
                $ngo_email = $row_user['email'];
              }

              if($email == $ngo_email){
                echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
                echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
              }else{
                echo "<script>window.open('','_self')</script>";
              }              
            }
          ?>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!--/.Navbar -->
  </header>

  <div id="about" class="view" style="height: 50%;background: url('../img/women-empowerment-2.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="white-text my-4 h1-responsive" style="line-height: 1.5em;">Non Governmental Organizations (NGO)</h1>
            </div>
          </div>
        </div>
      </div>
    </div>