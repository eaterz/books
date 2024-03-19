<?php
require "function.php";
$config = require "config.php";
require "database.php";


$page_title = "Posts";


$db = new Database($config);

$query_string = "SELECT * FROM books";

$params = [];


if(isset($_GET["id"]) && $_GET["id"] != "" ){
    // paņem ieprekšējo vērtību un pieliek WHERE klāt!
    $query_string .= " WHERE book_id=:id";
    $params[":id"] = $_GET["id"];
}

$posts = $db->execute($query_string, $params);

require "book.users.view.php";