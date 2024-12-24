<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include('../config/dbConnect.php');

    // Sign up logic
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $confirmPassword = $_POST['confirmPassword'];
        $password = $_POST['password'];

        $check = "SELECT * FROM `user` WHERE email='$email'";
        $isPresent = mysqli_query($conn, $check);

        if (!$isPresent) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($isPresent) > 0) {
            $_SESSION['error-type'] ="signup";
            $_SESSION['error']=true;
            $_SESSION['success']=false;
            $_SESSION['message'] = "User already exists!";
            header('location:error.php');
            exit;
        }

        if ($password == $confirmPassword) {
            $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`username`, `email`, `password`, `createdAt`)
                    VALUES ('$username', '$email', '$hashedPassword', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['user'] = $username;
                $_SESSION['success'] = true;
                $_SESSION['error']=false;
                $_SESSION['message'] = 'Account created successfully';
                $_SESSION['isAuthenticated'] = true;
                header('location:success.php');
                exit;

            } else {
                $_SESSION['error'] = true;
                $_SESSION['success']=false;
                $_SESSION['message'] = 'Account creation failed!';
                $_SESSION['error-type'] = "signup";
                header('location:error.php');
                exit;
            }


        } else {
            $_SESSION['error'] = true;
            $_SESSION['success']=false;
            $_SESSION['message'] = 'Password mismatch!';
            $_SESSION['error-type'] = "signup";
            header('location:error.php');
            exit;
        }
    }

    // Login logic
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `user` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password,$row['password'])) {
                $_SESSION['error'] = false;
                $_SESSION['success'] = true;
                $_SESSION['user'] = $row['username'];
                $_SESSION['message'] = 'Login successful';
                $_SESSION['isAuthenticated'] = true;
                header('location:success.php');
                exit;


            } else {
                $_SESSION['error'] = true;
                $_SESSION['success'] = false;
                $_SESSION['error-type'] = "login";
                $_SESSION['message'] = 'Password incorrect!';
                header('location:error.php');
                exit;
            }


        } else {
            $_SESSION['error'] = true;
            $_SESSION['success']=false;
            $_SESSION['error-type'] = "login";
            $_SESSION['message'] = 'User does not exist!';
            header('location:error.php');
            exit;
        }
    }
}
?>
