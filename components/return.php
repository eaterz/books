<?php
$page_title = "Return";
session_start();
require_once "Database.php"; // Adjust path as needed
$config = require 'config.php'; // Load database configuration
$db = new Database($config);


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $books=[];
        $books = $db -> execute("SELECT * FROM books AS b INNER JOIN borrowed_books AS bb ON b.book_id = bb.book_id WHERE bb.user_id = :user_id AND b.status = 'borrowed'",[":user_id" => $_SESSION['id']]);
        if (empty($borrowed_books)) {
            // If the user hasn't borrowed any books, redirect them to /books
            header("Location: /books/users");
            exit();
        }
           view('return', [
            "books" => $books,
            "page_title" => "Return book"
        ]);
        break;
    case 'POST':
        // Get the book ID from the POST data
        if(isset($_POST)){
            $borrowed_books_id = $_POST['borrowed_books_id'];
        };
        
        
        // Update the borrowed_books table to mark the book as returned and change the status to 'returned'
       $db->execute("UPDATE borrowed_books SET status = 'returned' WHERE book_id = :id AND user_id = :user_id", [
        ":id" => $borrowed_books_id,
        ":user_id" => $_SESSION['id']
        ]);

        $borrowed = $db->execute("SELECT * FROM borrowed_books WHERE book_id = :id", [":id" => $borrowed_books_id]);


        // Update the books table to up the book count
                if (!empty($borrowed)) {
            // Update the books table to update the book count
            foreach ($borrowed as $book) {
            $db->execute("UPDATE books SET availability = 1 WHERE book_id = :id", [
                ":id" => $book['book_id']
            ]);
            //DELETE BOOK
             
            $db->execute("DELETE FROM borrowed_books WHERE book_id = :id;", [
                ":id" => $book['book_id']
            ]);
            }
            header("Location: /mybooks");
            exit();
        } else {
        
            header("Location: /error-page");
            exit();
        }
        break;
    default:
        header("Location: /mybooks");
        break;
}
?>