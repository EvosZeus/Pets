<?php
require('../config/database.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];


    $sql_get_user = "SELECT * FROM users WHERE id = $1";
    $result = pg_query_params($conn, $sql_get_user, array($user_id));
    $user = pg_fetch_assoc($result);

    if (!$user) {
        echo "<script>alert('User does not exist');</script>";
        header("refresh:0;url=../list_user.php");
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); </script>";
    header("refresh:0;url=../list_user.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="backed/update_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="true" <?php if ($user['status'] == 't') echo 'selected'; ?>>Active</option>
                    <option value="false" <?php if ($user['status'] == 'f') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" >Update User</button>
        </form>
    </div>
</body>
</html>