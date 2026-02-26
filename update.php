<?php
require_once('./connection.php');
$id = $_POST['id'];

$stmt = $pdo->prepare('UPDATE books SET title = :title, release_date = :release_date, price = :price, cover_path = :cover_path WHERE id = :id;');
$stmt->execute([
    'title' => $_POST['title'],
    'release_date' => $_POST['release_date'],
    'price' => $_POST['price'],
    'cover_path' => $_POST['cover_path'],
    'id' => $id
]);


header('Location: book.php?id=' . $id);