<?php
session_start();
require_once "../src/database.php";

if (isset($_POST['submit'])) {

    //Mysql
    $username   = mysqli_escape_string($conn, htmlspecialchars($_POST['username']));
    $password   = mysqli_escape_string($conn, htmlspecialchars($_POST['password']));
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if (empty($username) || empty($password)){
        echo('<p>Velden zijn leeg</p>');
    } else {
        if (!preg_match("/^[a-zA-Z- \s]*$/", $username)) {
            echo ('<p>Je voornaam mag alleen letters bevatten</p>');
        } else {
                session_start();
                $_SESSION['email'] = $email;
                $sql = "INSERT INTO accounts(username, password) 
                VALUES ('$username', '$password_hash')";
                
                $query = mysqli_query($conn, $sql)
                or die ('Error '.mysqli_error($conn). ' with query' .$sql);
                header('Location: ../login');
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
    <link rel="stylesheet" type="text/css" media="screen" href="../css/staff_stylesheet.css" /> 
      
</head>
<body>
    <div class="login-banner">
        <div class="login-background"> 
            <div class="login-header">
                <img src="../img/MP_logo_white.png" class="login-logo">
                <div class="register">
                    <p>STAFF REGISTER</p>
                </div>
            </div>
            <div class="login-form">
                <form method="post">
                    <input type="text" placeholder="Enter Username" name="username" required>
                    <span class="error"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <span class="error"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                    <button type="submit" name="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

<!-- $password_hash = password_hash($password, PASSWORD_DEFAULT);

echo password_hash('test', PASSWORD_DEFAULT); -->