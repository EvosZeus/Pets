<?php
include("../../config/database.php");

    $fullname = $_POST ["fname"];
    $telefono = $_POST ["telefono"];
    $date = $_POST ["fecha"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $enc_pass = md5($password);

    $sql_validate_email = "SELECT * FROM users WHERE email ='$email' ";
    $result = pg_query($conn,$sql_validate_email);
    $total = pg_num_rows($result);
    if ($total > 0 ){
        echo "<script>alert('Email already exists')</script>";
        header("refresh:0;url=../signup.php");
    }else {
        $sql = "
        INSERT INTO users (fullname, telefono, fecha, email, password) 
            VALUES ('$fullname','$telefono','$date', '$email','$enc_pass')
        ";

    $ans = pg_query($conn,$sql);    
        if ($ans){
            echo "<script>alert('User has been registered')</script>"; 
            header("refresh:0;url=../signin.php");
       
        }else{
        echo "Error: " . pg_last_error();
        }
    }

    //Close connection
    pg_close($conn)


?>