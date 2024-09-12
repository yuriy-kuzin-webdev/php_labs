<?php
require 'db.php';

if (isset($_GET['author'])) {
    $author = $_GET['author'];

    $stmt = $pdo->prepare("SELECT title, publisher, year FROM books WHERE author = :author");
    $stmt->bindParam(':author', $author);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($books) {
        echo "<h2>Книги автора $author:</h2>";
        foreach ($books as $book) {
            echo "<p>Назва: {$book['title']}, Видавництво: {$book['publisher']}, Рік: {$book['year']}</p>";
        }
    } else {
        echo "<p>Книг автора $author не знайдено.</p>";
    }
} else {
    echo "<p>Автор не вказаний.</p>";
}
?>
