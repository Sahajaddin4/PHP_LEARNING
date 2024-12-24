<?php 
session_start();


if (!isset($_SESSION['user']) || $_SESSION['isAuthenticated'] == false) {
  
    header("location:./auth/login.php");
    exit; 
} 
else {
    $user = $_SESSION['user'];
    if (isset($_SESSION['alert'])) {
        echo '<div class="p-4 alert mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              <span class="font-medium">Success alert!</span> ' . $_SESSION['alert'] . '
              </div>';
    } 
}
unset($_SESSION['alert']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form</title>
</head>
<body>
    <div class="navbar">
        <?php include('./partial/navbar.php'); ?>
    </div>

    <div class="username md:w-[50%] mx-auto ">
    <div class="p-4  mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              <span class="font-medium text-xl">Welcome </span>  <h1 class="inline text-lg"><?php echo $user?> ! </h1><small>into our website</small>
              </div>
        
    </div>
    <script>
        const alert=document.querySelector('.alert');
        
        setTimeout(() => {
           if(alert)
           {
            alert.style.display="none";
           }
           
        }, 1000);
    </script>
    
</body>
</html>
