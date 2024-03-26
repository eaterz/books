<?php
$page_title = "Mybooks";
session_start();
require "components/head.php";
require "components/navbar.users.php";
require_once "Database.php";
$config = require "config.php";
// Ensure session is started


$database = new Database($config);
$conn = $database->getConnection();

// Fetch list of books borrowed by the current user from borrowed_books table
$user_id = $_SESSION['id']; // Retrieve user ID from session
$query = "SELECT books.title, books.author, books.publication_year, borrowed_books.borrow_date, borrowed_books.return_date
          FROM borrowed_books
          INNER JOIN books ON borrowed_books.book_id = books.book_id
          WHERE borrowed_books.user_id = ?";
$params = [$user_id];
$borrowed_books = $database->execute($query, $params);

?>

<h1>My Borrowed Books</h1>

<ul>
    <?php foreach ($borrowed_books as $book): ?>
        <li>
            <?= $book["title"] ?> / <?= $book["author"] ?> / <?= $book["publication_year"] ?>
            / Borrowed Date: <?= $book["borrow_date"] ?> / Return Date: <?= $book["return_date"] ?>
        </li>
        <form action="/return" method="post">
<button type="submit">Return</button>
</form>
    <?php endforeach; ?>
</ul>

<?php require "components/footer.php" ?>
