<!-- index.php -->
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Бібліотека</title>
</head>
<body>
    <h1>Пошук інформації в бібліотеці</h1>

    <?php
    require 'db.php';

    $stmt = $pdo->query("SELECT DISTINCT publisher FROM books");
    $publishers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->query("SELECT DISTINCT author FROM books");
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->query("SELECT DISTINCT year FROM books ORDER BY year ASC");
    $years = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <form action="search_publisher.php" method="get">
        <label for="publisher">Видавництво:</label>
        <select id="publisher" name="publisher">
            <?php foreach ($publishers as $publisher): ?>
                <option value="<?= $publisher['publisher']; ?>"><?= $publisher['publisher']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Пошук за видавництвом">
    </form>

    <form action="search_period.php" method="get">
        <label for="start_year">Початковий рік:</label>
        <select id="start_year" name="start_year">
            <?php foreach ($years as $year): ?>
                <option value="<?= $year['year']; ?>"><?= $year['year']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="end_year">Кінцевий рік:</label>
        <select id="end_year" name="end_year">
            <?php foreach ($years as $year): ?>
                <option value="<?= $year['year']; ?>"><?= $year['year']; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Пошук за часовим періодом">
    </form>

    <form action="search_author.php" method="get">
        <label for="author">Автор:</label>
        <select id="author" name="author">
            <?php foreach ($authors as $author): ?>
                <option value="<?= $author['author']; ?>"><?= $author['author']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Пошук за автором">
    </form>

</body>
</html>
