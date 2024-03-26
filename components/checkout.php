<?php
$page_title = "Checkout";
require_once "components/head.php";
require_once "components/navbar.users.php";
require_once "Database.php"; // Assuming your Database class is in Database.php
$config = require "config.php";
// Establish connection to the database
session_start();
$database = new Database($config);
$conn = $database->getConnection();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["book_id"])) {
        $book_id = $_POST["book_id"];
        $user_id = $_SESSION['id']; 
        
        // Prepare SQL statement to insert into borrowed_books table
        $borrow_date = date("Y-m-d");
        $status = "Borrowed"; // Assuming initial status is "Borrowed"
        $sql = "INSERT INTO borrowed_books (user_id, book_id, borrow_date, status) VALUES (?, ?, ?, ?)";
        $params = [$user_id, $book_id, $borrow_date, $status];
        $database->execute($sql, $params);
        $database->execute("UPDATE books SET availability = false WHERE book_id=:id",[
            ':id' => $book_id
        ]);
        echo "Book successfully borrowed.";
        
        
    } else {
        echo "Invalid request.";
    }
}
?>

<!-- Display borrowed book message -->

<h1>Book Checkout</h1>




<?php require_once "components/footer.php"; ?>
