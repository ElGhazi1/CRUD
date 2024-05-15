<?php
$id = $_GET['idd'];
$pdo = new PDO(
    "mysql:dbname=enset-a",
    'root',
    ''
);

$sql = "SELECT * FROM users WHERE id=$id";

$stmt = $pdo->query($sql);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user)
    header('location:index.php');
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
        <h1>Edit user</h1>

        <form action="save.php?iddd=<?= $id ?>" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" class="form-control mb-2" name="email" placeholder="Email" value="<?= $user["email"] ?>">
            <input type="password" class="form-control mb-2" name="pass" placeholder="Password"
                value="<?= $user["password"] ?>">
            <select name="role" id="" class="form-select mb-2">
                <option value="guest" <?= $user['role'] === 'guest' ? 'selected' : '' ?>>Guest</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="editor" <?= $user['role'] === 'editor' ? 'selected' : '' ?>>Editor</option>
            </select>
            <button class="btn btn-primary mb-4 w-100">Ajouter</button>
        </form>


    </div>
</body>

</html>