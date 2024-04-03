<?php
// checkout.php
session_start();

require "database.php";
$config = require "config.php";
$db = new Database($config);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        get([]);
        break;
    case 'POST':
        // Get the book IDs from the cookie
        $book_ids = isset($_COOKIE['book_ids']) ? unserialize($_COOKIE['book_ids']) : [];

        $errors = validateInput($_POST['return_date'], $book_ids);
        if (!empty($errors)) {
            get($errors);
            exit();
        }

        // If there are books in the cookie
        if (!empty($book_ids) && isset($_POST['return_date'])) {
            $borrow_date = date("Y-m-d");

            // Add each book to the borrowed_books table
            foreach ($book_ids as $book_id) {
                // Check if the book is available
                $book = $db->execute("SELECT * FROM books WHERE book_id = :id AND availability = 1", [":id" => $book_id]);
                if ($book) {
                   

                    
                    $db->execute("INSERT INTO borrowed_books (user_id, book_id, borrow_date, return_date, status) VALUES (:user_id, :book_id, :borrow_date, :return_date, 'borrowed')", [
                        ":user_id" => $_SESSION['id'],
                        ":book_id" => $book_id,
                        ":borrow_date" => $borrow_date,
                        ":return_date" => $_POST['return_date']
                    ]);
                    $db->execute("UPDATE books SET  availability = :availability WHERE book_id = :id", [":availability" => 0, ":id" => $book_id]);
                }
            }

            // Clear the book_ids cookie
            setcookie("book_ids", "", time() - 3600);
            header ("Location: /mybooks");
        }
        break;
    default:
        header("Location: /books/users");
        break;
}

function validateInput($return_date, $book_ids): array {
    $errors = [];
    if (empty($return_date)) {
        $errors[] = "❌ Return date is required";
    }
    if (strtotime($return_date) < strtotime(date("Y-m-d") . "+3 days")) {
        $errors[] = "❌ Return date must be in the future (at least 3 days from today)";
    }
    if (empty($book_ids)) {
        $errors[] = "❌ No books in cart!";
    }
    return $errors;
}

function get($errs) {
    $page_title = "Checkout";
    $errors = $errs ?? [];
    $config = require "config.php";
    $db = new Database($config);
    // Get the book IDs from the cookie
    $book_ids = isset($_COOKIE['book_ids']) ? unserialize($_COOKIE['book_ids']) : [];

    // If a book ID is provided in the query string, add it to the array
    if (isset($_GET['book_id']) && !in_array($_GET['book_id'], $book_ids)) {
        $book_ids[] = $_GET['book_id'];
        // Store the updated array back in the cookie
        setcookie("book_ids", serialize($book_ids), time() + 3600);
    }

    if (empty($book_ids)) {
        header("Location: /books/users");
        exit();
    }
    
    // Get the books from the database
    $books = [];
    foreach ($book_ids as $book_id) {

        $book = $db->execute("SELECT * FROM books WHERE book_id = :id", [":id" => $book_id]);
       
        if ($book) {
            $books[] = $book[0];
        }
    }
    
 view('checkout', [
        'books' => $books
    ]);

}
