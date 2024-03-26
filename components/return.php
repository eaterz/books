<?php
$page_title = "Return";
// Perform database operations to delete the book with the given ID
// Establish database connection
require_once "Database.php"; // Adjust path as needed
$config = require 'config.php'; // Load database configuration
$database = new Database($config);
$conn = $database->getConnection();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
    $borrowed_books = $db -> execute("SELECT * FROM borrowed_books WHERE user_id = :user_id AND status = 'Borrowed'",[":user_id" => $_SESSION["id"]]);
    
    
    
    
}
?>