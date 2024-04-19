<?php
include("../../config/database.php");

    $fullname = $_POST ["fname"];
    $telefono = $_POST ["telefono"];
    $date = $_POST ["fecha"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $enc_pass = md5($password);


    $sql = "
        INSERT INTO users (fullname, telefono, fecha, email, password) 
            VALUES ('$fullname','$telefono','$date', '$email','$enc_pass')
    ";

    $ans = pg_query($conn,$sql);    
        if ($ans){
        echo "User has been created successfully";
        }else{
        echo "Error: " . pg_last_error();
        }

    //Close connection
    pg_close($conn)


?>