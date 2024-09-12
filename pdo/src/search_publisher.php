<?php

require 'db.php';

if (isset($_GET['publisher'])) {
    $publisher = $_GET['publisher'];

    $stmt = $pdo->prepare("SELECT title, author, year FROM books WHERE publisher = :publisher");
    $stmt->bindParam(':publisher', $publisher);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($books) {
        echo "<h2>Книги видавництва $publisher:</h2>";
        foreach ($books as $book) {
            echo "<p>Назва: {$book['title']}, Автор: {$book['author']}, Рік: {$book['year']}</p>";
        }
    } else {
        echo "<p>Книг з видавництва $publisher не знайдено.</p>";
    }
} else {
    echo "<p>Видавництво не вказано.</p>";
}
?>
