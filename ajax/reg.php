<?php

    
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $phone = trim(filter_var($_POST['user_phone'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    
    $error = "";
    if(strlen($email) <= 3)
        $error = "Type email";
    else if(strlen($login) <= 3)
        $error = "Type login";
    else if(strlen($phone) <= 3)
        $error = "Type phone";
    else if(strlen($pass) <= 3)
        $error = "Type password";
    
    if($error != ""){
        echo $error;
        exit();
    }
    
    $hash = "aef251fai2";
    $pass = md5($pass . $hash); //шифрование строки
    
    require_once '../database_connection/db.php';
    
    //$dsn = "mysql:host=$host;dbname=$db";
    //$pdo = new PDO($dsn, $user, $password); //подключение к базе даных
    $sql = "INSERT INTO users(id, email, login, phone, password) VALUES (0, '$email','$login', '$phone', '$pass')";
    $query = mysqli_query($connection, $sql);
    
    echo mysqli_error($connection);
    
   
    echo 1;
    
    
    
?>

