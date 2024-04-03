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

$user_id = $_SESSION['id']; 
$query = "SELECT books.book_id,books.title, books.author, books.publication_year, borrowed_books.borrow_date, borrowed_books.return_date
          FROM borrowed_books
          INNER JOIN books ON borrowed_books.book_id = books.book_id
          WHERE borrowed_books.user_id = ?";
$params = [$user_id];
$borrowed_books = $database->execute($query, $params);

?>

<h1>My Borrowed Books</h1>

<?php require "views/mybooks.view.php" ?>

<?php require "components/footer.php" ?>
