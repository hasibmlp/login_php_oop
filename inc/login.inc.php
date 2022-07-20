<?php

if(isset($_POST['submit'])) {
    $username = $_POST['uid'];
    $pass = $_POST['pwd'];


    include '../class/dbh.class.php';
    include '../class/login.class.php';
    include '../class/login.contr.class.php';


    $login = new LoginContr($username, $pass);

    $login->loginUser();

    header('location: ../index.php?error=none');
    exit();


}