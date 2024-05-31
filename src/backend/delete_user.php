<?php
require('../../config/database.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];


    $sql_validate_user = "SELECT * FROM users WHERE id = $1";
    $result = pg_query_params($conn, $sql_validate_user, array($user_id));
    $total = pg_num_rows($result);

    if ($total > 0) {
      
        $sql_delete_user = "DELETE FROM users WHERE id = $1";
        $ans = pg_query_params($conn, $sql_delete_user, array($user_id));

        if ($ans) {
            echo "<script>alert('USUARIO FUE ELIMINADO');</script>";
            header("refresh:0;url=../list_user.php");
        } else {
            echo "Error: " . pg_last_error();
        }
    } else {
        echo "<script>alert('USUARIO NO EXISTE'); </script>";
        header("refresh:0;url=../list_user.php");
    }

    
    pg_close($conn);
} else {
    echo "<script>alert('Invalid request'); </script>";
    header("refresh:0;url=../List_user.php");
}
?>