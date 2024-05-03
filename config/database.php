<?php
    //DataBase configuration
    $host = "127.0.0.1"; // =>localhost
    $dbname = "Pets";
    $username = "postgres";
    $password = "123456789";
    $port = "5432";


    $conn = pg_connect("
    host=$host
    dbname=$dbname
    user=$username
    password=$password
    port=$port
    ");
    if (!$conn){
        die("Connection error:".pg_last_error());
    }else {
       
        echo " Success !!!";
    }
    
?>                                                                                                                                                                                 