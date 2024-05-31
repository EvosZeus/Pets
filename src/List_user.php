<?php require('../config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pets | List users</title>
</head>
<body>
    <center><h1>LIST USERS</h1></center>
    <table class="table table-striped">
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Status</th>
            <th>Foto</th>
            <th>...</th>
        </tr>
        <?php
            $query_users = "
                SELECT 
                    id,
                    fullname,
                    email,
                    CASE 
                        WHEN status = true THEN 'Active' ELSE 'Inactive' 
                    END as status  
                FROM 
                    users
            ";
            $result = pg_query($conn, $query_users);
            while($row = pg_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>". $row['fullname'] ."</td>";
                    echo "<td>". $row['email'] ."</td>";
                    echo "<td>". $row['status'] ."</td>";
                    echo "<td><img src='images/hombre.png' width='30'></td>";
                    echo "<td>
                        <a href='backend/delete_user.php?id=". $row['id'] ."' onclick='return confirm(\"Are you sure you want to delete this user?\")'>
                            <img src='images/borrar.png' width='20'>
                        </a>
                        <a href='edit_user.php?id=". $row['id'] ."'>
                            <img src='images/editar.png' width='20'>
                        </a>
                    </td>";
                echo "</tr>";
            }
        ?>
    </table>     
</body>
</html>