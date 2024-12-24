<?php
  session_start();
   if(isset($_SESSION['isAuthenticated'])  )
   {
      session_unset();
      session_destroy();
      header('location:login.php');
   }
?>