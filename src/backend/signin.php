<?php
    include("../../config/database.php");
    
    session_start();
    if(isset($_SESSION ["id_user"])){
            header("Location:../home.php");
        }



        if(!empty($_POST)){
            $email = $_POST ["email"];
            $password = $_POST ["password"];
            $enc_pass = md5($password);
   
    
    $sql = "
        SELECT 
        * 
        FROM 
            users 
        WHERE 
        email ='$email' AND 
        password ='$enc_pass'
        Limit 1
        ";

        $result = pg_query($conn,$sql);
        $total = pg_num_rows($result);

    if ($total > 0 ){
        $row = pg_fetch_assoc($result);
        $_SESSION['id_user'] = $row['id'];
        header("refresh:0;url=../home.php");

    }else {
         echo "<script>alert('Invalid email or password')</script>"; 
            header("refresh:0;url=../signin.php");
    }
        }

    

?>