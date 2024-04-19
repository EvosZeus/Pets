<?php
    $fullname = $_POST ["fname"];
    $telefono = $_POST ["telefono"];
    $date = $_POST ["fecha"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $enc_pass = md5($password);

    echo "Your fullname :". $fullname. "<br>";
    echo "Your telefono :". $telefono. "<br>";
    echo "Your fecha :". $date. "<br>";
    echo "Your email :". $email. "<br>";
    echo "Your password :". $enc_pass;

?>