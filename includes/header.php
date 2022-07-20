<?php session_start() ?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <style>
      .submit-bt {
        /* form btn not working */
        background-color: #4caf50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        width: 100%;
}
    </style>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav>
      <ul>
      <li><a href="index.php">Home</a></li>
        <?php 
          if(isset($_SESSION['userId'])) 
          {
        ?>
            <li><a href="logout.php">logout</a></li>
        <?php
          }else {
        ?>
          <li><a href="login.php">login</a></li>
          <li><a href="signup.php">Sighup</a></li>
        <?php
          }
        ?>
        
        <li><a href="about.php">about</a></li>

      
      </ul>
    </nav>
    <div>