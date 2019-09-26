<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  include 'core/init.php';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Women Empowerment</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">

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
      <a class="navbar-brand" href="index.php">MWCD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="legislations.php">Legislations & Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user/index.php">STEP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ngo/index.php">NGO</a>
          </li>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-default"
              aria-labelledby="navbarDropdownMenuLink-333">
              <?php
                if(!isset($_SESSION['email'])){
                  echo "<a href='user/login.php' class='dropdown-item'>Login as User</a>";
                  echo "<a href='ngo/login.php' class='dropdown-item'>Login as NGO</a>";
                }else{
                  $email = $_SESSION['email'];
                  $sqluser = "SELECT * FROM step WHERE email = '$email'";
                  $result = $db->query($sqluser);
                  while ($row_user = mysqli_fetch_array($result)) {
                    $step_email = $row_user['email'];
                  }

                  if($email == $step_email){
                    echo "<a href='user/myaccount.php' class='dropdown-item'>My Account</a>";
                    echo "<a href='user/logout.php' class='dropdown-item'>Logout</a>";
                  }

                  $sqlngo = "SELECT * FROM ngo WHERE email = '$email'";
                  $result = $db->query($sqlngo);
                  while ($row_ngo = mysqli_fetch_array($result)) {
                    $ngo_email = $row_ngo['email'];
                  }

                  if($email == $ngo_email){
                    echo "<a href='ngo/myaccount.php' class='dropdown-item'>My Account</a>";
                    echo "<a href='ngo/logout.php' class='dropdown-item'>Logout</a>";
                  }
                }
              ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!--/.Navbar -->
  </header>
  <div id="about" class="view" style="height: 50%;background: url('img/women-empowerment-1.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="white-text my-4 h1-responsive" style="line-height: 1.5em;">Ministry of Women and Child Development</h1>
            </div>
          </div>
        </div>
      </div>
    </div>