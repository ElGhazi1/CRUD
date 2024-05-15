<?php
$pdo = new PDO(
    "mysql:dbname=enset-a",
    'root',
    ''
);

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

        <form action="add.php" method="post">
            <input type="text" class="form-control mb-2" name="email" placeholder="Email">
            <input type="password" class="form-control mb-2" name="pass" placeholder="Password">
            <select name="role" id="" class="form-select mb-2">
                <option value="guest">Guest</option>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
            </select>
            <button class="btn btn-primary mb-4 w-100">Ajouter</button>
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
                            <a href="del.php?idd=<?= $user['id'] ?>" class="btn btn-danger" onclick="valider(event)">x</a>
                        </td>
                        <td class="text-center">
                            <a href="edit.php?idd=<?= $user['id'] ?>" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

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