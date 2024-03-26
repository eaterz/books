<?php
$page_title = "Book";
$config = require "config.php";
require "database.php";




$db = new Database($config);

$query_string = "SELECT * FROM books";

$params = [];


if(isset($_GET["id"]) && $_GET["id"] != "" ){
    
    $query_string .= " WHERE book_id=:id";
    $params[":id"] = $_GET["id"];
}

$posts = $db->execute($query_string, $params);

require "views/book.view.php";