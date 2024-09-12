<?php
require 'db.php';

if (isset($_GET['start_year']) && isset($_GET['end_year'])) {
    $start_year = $_GET['start_year'];
    $end_year = $_GET['end_year'];

    $stmt = $pdo->prepare("SELECT title, author, year FROM books WHERE year BETWEEN :start_year AND :end_year");
    $stmt->bindParam(':start_year', $start_year);
    $stmt->bindParam(':end_year', $end_year);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($books) {
        echo "<h2>Книги за період $start_year - $end_year:</h2>";
        foreach ($books as $book) {
            echo "<p>Назва: {$book['title']}, Автор: {$book['author']}, Рік: {$book['year']}</p>";
        }
    } else {
        echo "<p>Книг за цей період не знайдено.</p>";
    }
} else {
    echo "<p>Не вказано початковий або кінцевий рік.</p>";
}
?>
