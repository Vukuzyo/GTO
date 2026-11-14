<?php
    $connect = require_once 'connect.php';
    
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE email = '{$email}'";

    $req = mysqli_query($connect, $sql);

    if (mysqli_num_rows($req) > 0){
        header("Location: ../registration.html");
    }
    else{
        $sql2 = "INSERT INTO Users (`fio`, `email`, `phone`, `password`) 
        values ('{$fio}', '{$email}', '{$phone}', '{$password}')";

        $req2 = mysqli_query($connect, $sql2);

        $user_id = mysqli_insert_id($connect);

        session_start();
        $_SESSION["id"] = $user_id;
        header("Location: ../lk.php");
    }
?>