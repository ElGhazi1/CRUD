<?php


$email = $_POST['email'];
$pass = md5($_POST['pass']);
$role = $_POST['role'];

$pdo = new PDO(
    "mysql:dbname=enset-a",
    'root',
    ''
);

$sql = "INSERT INTO users VALUES(NULL,'$email', '$pass', '$role')";

$stmt = $pdo->exec($sql);

header('location:index.php');