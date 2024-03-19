<?php
require_once "components/head.php";
require_once "components/navbar.users.php";
require_once "Database.php"; // Assuming your Database class is in Database.php
$config = require "config.php";
// Establish connection to the database

$database = new Database($config);
$conn = $database->getConnection();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["book_id"])) {
        $book_id = $_POST["book_id"];
        // You may need to get the user_id from the session or somewhere else
        $user_id = 1; // Assuming a user ID of 1 for demonstration
        
        // Prepare SQL statement to insert into borrowed_books table
        $borrow_date = date("Y-m-d");
        $status = "Borrowed"; // Assuming initial status is "Borrowed"
        $sql = "INSERT INTO borrowed_books (user_id, book_id, borrow_date, status) VALUES (?, ?, ?, ?)";
        
        $params = [$user_id, $book_id, $borrow_date, $status];
        $database->execute($sql, $params);
        
        echo "Book successfully borrowed.";
    } else {
        echo "Invalid request.";
    }
}
?>

<!-- Display borrowed book message -->

<h1>Book Checkout</h1>




<?php require_once "components/footer.php"; ?>
