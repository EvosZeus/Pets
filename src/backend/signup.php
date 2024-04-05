<?php
    $fullname = $_POST ["fname"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $enc_pass = md5($password);

    echo "Your fullname :". $fullname. "<br>";
    echo "Your email :". $email. "<br>";
    echo "Your password :". $enc_pass;

?>