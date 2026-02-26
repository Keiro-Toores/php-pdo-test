<?php

require_once('./connection.php');

$id = $_GET['id'];

// SELECT * FROM books WHERE id = 9

$stmt = $pdo->prepare('SELECT b.*, a.first_name , a.last_name FROM books b
    LEFT JOIN book_authors ba ON b.id = ba.book_id
    LEFT JOIN authors a ON ba.author_id = a.id
    WHERE b.id = :id;');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <button><a href="index.php">Back</a></button>
    <h2><?= $book['title']; ?></h2>
    <p>Release date: <?= $book['release_date']; ?></p>
    <p>Author: <?= $book['first_name']; ?> <?= $book['last_name']; ?></p>
    <p>Price: <?= $book['price']; ?></p>
    <p>Pages: <?= $book['pages']; ?></p>
    <p>Summary: <?= $book['summary']; ?></p>
    <p>Language: <?= $book['language']; ?></p>
    <p>Stock: <?= $book['stock_saldo']; ?></p>
    <p>Type: <?= $book['type']; ?></p>
    <img src="<?= $book['cover_path']; ?>">

    <br>
    <a href="edit.php?id=<?= $book['id']; ?>">Muuda</a>
    


</body>
</html>