<?php
// Perform database operations to delete the book with the given ID
// Establish database connection
require_once "Database.php"; // Adjust path as needed
$config = require 'config.php'; // Load database configuration
$database = new Database($config);
$conn = $database->getConnection();

if (isset($_POST['book_id'])) {
    $database->execute("DELETE FROM borrowed_books WHERE book_id = :book_id", [":book_id" => $_POST["book_id"]]);
    $database->execute("DELETE FROM books WHERE book_id = :book_id", [":book_id" => $_POST["book_id"]]);

    // Redirect back to the book list page after successful deletion
    header("Location: book.edit.php");
    exit();
}
?>


