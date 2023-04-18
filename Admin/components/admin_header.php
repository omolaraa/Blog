<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  ob_start();
  include '../includes/config.php';
  include 'includes/admin_database.php';
  include 'includes/admin_functions.php';
  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="fontawesome-free/css/brands.css">
  <link rel="stylesheet" href="fontawesome-free/css/regular.css">
  <link rel="stylesheet" href="fontawesome-free/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-free/css/solid.css">
  <link rel="stylesheet" href="css/admin.css">
  <title>Document</title>
</head>

<body> 

  <header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-md-3 col-lg-2 col-4 me-0 px-3" href="#">CMS Admin</a>

    <button class="navbar-toggler d-md-none collapsed mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav col-md-8 col-lg-9 col-12 d-flex flex-row justify-content-end px-5 px-md-0">

      <div class="nav-item">
        <a class="nav-link px-3" href="../blog.php">Home Site</a>
      </div>

      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="user-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-fw fa-user"></i> John Smith
        </a>
        <ul class="dropdown-menu" aria-labelledby="user-dropdown">
          <div><a class="dropdown-item" href="#"> <i class="fa fa-fw fa-user"></i> Profile</a></div>
          <div><a class="dropdown-item" href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></div>
        </ul>
      </div>

    </div>
  </header>