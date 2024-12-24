<?php
  $username="root";
  $server="localhost";
  $database="users";
  $password="";
  $conn=mysqli_connect($server,$username,$password,$database);
  if(!$conn)
  {
  
    die("Failed to connect database!");
  }
  
?>