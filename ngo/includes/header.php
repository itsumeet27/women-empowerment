<!DOCTYPE html>
<html lang="en">
<?php include 'includes/functions.php';?>
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
</head>

<body>
  <header>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
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
              echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
              echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
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