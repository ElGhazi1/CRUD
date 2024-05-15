<?php

// Database connection
$pdo = new PDO(
    "mysql:dbname=enset-a",
    'root',
    ''
);

// Handle form submission for adding users
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['pass']); // Note: Using md5 for password hashing is not recommended for security reasons.
    $role = $_POST['role'];

    // SQL query to insert new user
    $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$pass', '$role')";

    // Execute SQL query
    $stmt = $pdo->exec($sql);

    // Redirect to index.php after insertion
    header('location:index.php');
    exit; // Optional: Terminating script execution after redirection
}

// Handle user deletion
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idd'])) {
    $id = $_GET['idd'];

    // SQL query to delete user
    $sql = "DELETE FROM users WHERE id=$id";

    // Execute SQL query
    $stmt = $pdo->exec($sql);

    // Redirect to index.php after deletion
    header('location:index.php');
    exit; // Optional: Terminating script execution after redirection
}

// Handle user editing
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];

    // SQL query to select user for editing
    $sql = "SELECT * FROM users WHERE id=$id";

    // Execute SQL query
    $stmt = $pdo->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Redirect to index.php if user not found
    if (!$user) {
        header('location:index.php');
        exit;
    }
}

// Handle form submission for saving edited user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_user'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']); // Note: Using md5 for password hashing is not recommended for security reasons.
    $role = $_POST['role'];

    // SQL query to update user
    $sql = "UPDATE users SET email='$email', password='$pass', role='$role' WHERE id=$id";

    // Execute SQL query
    $stmt = $pdo->exec($sql);

    // Redirect to index.php after updating user
    header('location:index.php');
    exit; // Optional: Terminating script execution after redirection
}

// Select all users
$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGBD MySQL</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/litera/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1>Users Manager</h1>

        <form action="" method="post"> <!-- Changed action to empty string to submit to the same page -->
            <input type="text" class="form-control mb-2" name="email" placeholder="Email">
            <input type="password" class="form-control mb-2" name="pass" placeholder="Password">
            <select name="role" id="" class="form-select mb-2">
                <option value="guest">Guest</option>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
            </select>
            <button class="btn btn-primary mb-4 w-100" name="add_user">Ajouter</button> <!-- Changed button name to "add_user" -->
        </form>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>ROLE</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user['id'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td class="text-center">
                            <a href="index.php?idd=<?= $user['id'] ?>" class="btn btn-danger" onclick="valider(event)">x</a>
                        </td>
                        <td class="text-center">
                            <a href="index.php?edit_id=<?= $user['id'] ?>" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!-- Edit user form -->
        <?php if (isset($user)): ?>
        <h1>Edit user</h1>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="text" class="form-control mb-2" name="email" placeholder="Email" value="<?= $user["email"] ?>">
            <input type="password" class="form-control mb-2" name="pass" placeholder="Password"
                value="<?= $user["password"] ?>">
            <select name="role" id="" class="form-select mb-2">
                <option value="guest" <?= $user['role'] === 'guest' ? 'selected' : '' ?>>Guest</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="editor" <?= $user['role'] === 'editor' ? 'selected' : '' ?>>Editor</option>
            </select>
            <button class="btn btn-primary mb-4 w-100" name="save_user">Save</button>
        </form>
        <?php endif; ?>
        <!-- End of Edit user form -->

        <script>
            function valider(evt) {
                evt.preventDefault()
                if (confirm('Etes-vous sûr de vouloir supprimer ?'))
                    location.href = evt.target.href
            }
        </script>
    </div>
</body>

</html>
