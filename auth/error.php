<?php 
session_start();
$errorType = $_SESSION['error-type'];
$msg = $_SESSION['message'];

if ($_SESSION['error'] && $errorType == "login") {
    $_SESSION['alert'] = $msg;
    unset($_SESSION['error-type']);
    unset($_SESSION['message']);
    header('Location: login.php');
    exit;
} elseif ($_SESSION['error'] && $errorType == "signup") {
    $_SESSION['alert'] =$msg;
    unset($_SESSION['error-type']);
    unset($_SESSION['message']);
    header('Location: signup.php');
    exit;
}
else{
    session_unset();
    session_destroy();
    header('location:login.php');
}
?>