<?php
require('../../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["id"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $status = $_POST["status"];

    
    $sql_update_user = "
        UPDATE users 
        SET fullname = $1, email = $2, status = $3 
        WHERE id = $4
    ";
    $result = pg_query_params($conn, $sql_update_user, array($fullname, $email, $status, $user_id));

    if ($result) {
        echo "<script>alert('User has been updated'); </script>";
        header("refresh:0;url=../list_user.php");
    } else {
        echo "Error: " . pg_last_error();
    }

    
    pg_close($conn);
} else {
    echo "<script>alert('Invalid request');</script>";
    header("refresh:0;url=../list_user.php");
}
?>