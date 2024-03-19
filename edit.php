<?php

$config = require "config.php";
require "database.php";
$db = new Database($config);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $post = $db->execute("SELECT * FROM books WHERE book_id = :book_id", [":book_id" => $_GET['book_id']])[0];
        require 'edit.view.php';
        break;
    case 'POST':
        session_start();

            $db->execute("UPDATE books SET title=:title, author=:author, publication_year=:publication_year, availability=:availability WHERE book_id=:book_id", [
                ":book_id" => $_POST['book_id'],
                ":title" => $_POST['title'],
                ":author" => $_POST['author'],
                ":publication_year" => $_POST['publication_year'],
                ":availability" => $_POST['availability']
                
            ]);
        
        header("Location: /books");
        break;
    default:
        header("Location: /books");
        break;
}