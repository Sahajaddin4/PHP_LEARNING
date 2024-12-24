<?php 
session_start();

if (isset($_SESSION['success'])) {
   
    $msg = $_SESSION['message'] ;

    
    
        $_SESSION['alert'] = $msg; 
 

   
    unset($_SESSION['success'],  $_SESSION['message']);
    header('Location: ../index.php');
    exit;
} 
else{
    session_unset();
    session_destroy();
    header('location:login.php');
}
?>
