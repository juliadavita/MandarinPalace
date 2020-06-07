<?php

if(isset($_POST['submit'])) {

    require_once 'database.php';

    // Submitting user input into variables
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (empty($name) || empty($date) || empty($time) || empty($quantity) || empty($phonenumber) || empty($email)){
        echo('<p>Velden zijn leeg</p>');
    } else {
        if (!preg_match("/^[a-zA-Z- \s]*$/", $name)) {
            echo ('<p>Je naam mag alleen letters bevatten</p>');
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo('<p> Je e-mail adres is niet correct ingevuld </p>');
            } else {
                session_start();
                $_SESSION['email'] = $email;
                $sql = "INSERT INTO reservation(name, date, time, quantity, phonenumber, email) VALUES ('$name', '$date', '$time', '$quantity', '$phonenumber', '$email')";
                $query = mysqli_query($conn, $sql)
                or die ('Error '.mysqli_error($conn). ' with query' .$sql);
                header('Location: ../gereserveerd.php');
            }
        }
    }
}



?>