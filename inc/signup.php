<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pass = $_POST['pass'];
    $passRe = $_POST['pass-re'];


    include '../class/dbh.class.php';
    include '../class/signup.class.php';
    include '../class/signup.contr.class.php';
    
    $signup = new SignupContr($uid, $pass, $passRe, $email);

    $signup->signupUser();

    header('location: ../index.php?error=none');
    exit();
}