<?php
session_start();
require_once "../src/database.php";

if (isset($_POST['submit'])) {
    $username   = mysqli_escape_string($conn, htmlspecialchars($_POST['username']));
    $password   = mysqli_escape_string($conn, htmlspecialchars($_POST['password']));
    
    $errors = [];
    if(empty($username)) {
        $errors['username'] = 'Username cannot be empty';
    }
    else if(empty($password)) {
        $errors['password'] = 'Password cannot be empty';
    }
    else
    {
        $query = "SELECT * 
              FROM accounts
              WHERE username = '$username'";
        
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        $errors = [];
        if ($user)
        {
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['password'];
                header("Location: admin_reservations.php");
                exit;
            }
            else 
            {
                $errors['password'] = 'The password is incorrect';
            }
        } 
        else
        {
            $errors['username'] = 'This email does not appear to exist.';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mandarin Palace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin_stylesheet.css" /> 
      
</head>
<body>
    <div class="login-banner">
        <div class="login-background"> 
            <div class="login-header">
                <img src="../img/MP_logo_white.png" class="login-logo">
            </div>
            <div class="login-form">
                <form method="post">
                    <input type="text" placeholder="Enter Username" name="username" required>
                    <span class="error"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <span class="error"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>