<?php


$id = $_POST['id'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$role = $_POST['role'];

$pdo = new PDO(
    "mysql:dbname=enset-a",
    'root',
    ''
);

$sql = "UPDATE users SET email='$email', password='$pass', role='$role' WHERE id=$id";

$stmt = $pdo->exec($sql);

header('location:index.php');