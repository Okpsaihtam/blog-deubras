<?php
require_once "../models/Article.php";
require_once "../config/database.php";

$db = Database::getInstance()->getConnection();
$stmt = $db->query("SELECT * FROM articles ORDER BY date_publication DESC");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles as $article) {
    echo "<h2>" . $article['titre'] . "</h2>";
    echo "<p>" . $article['contenu'] . "</p>";
}
?>
