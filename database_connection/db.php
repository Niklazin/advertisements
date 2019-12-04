<?php

    $user = 'root';
    $password = '';
    $db = 'ad_db';
    $host = 'localhost';
    
    $connection = mysqli_connect($host,$user,$password,$db);
    
    if(!$connection){
        echo 'error';
        exit();
    }

?>