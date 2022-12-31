<?php 
    session_start();
    include("../config/config.php");
    
    if(!isset($_SESSION['user_id']))
    {
        header("Location: {$URL}/admin");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- INCLUDE MY LINKS -->
    <?php include("links.php"); ?>
    
    <title>FOOD ORDER</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item"><a class="nav-link" href="orders.php">Orders</a></li>
      <li class="nav-item"><a class="nav-link" href="add-dish.php">Add Dish</a></li>
      <li class="nav-item"><a class="nav-link active" aria-current="page" href="profile.php">Profile</a></li>
      </ul>
        <div class="profile">
            <div class="profile-img">
                <img src="../assets/images/<?php echo $_SESSION['picture'] ?>" alt="">
            </div>
            <div class="profile-details">
                <p><?php echo $_SESSION['user_name'] ?></p>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
  </div>
</nav>
<div class="container">


    
