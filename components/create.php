<?php

require "function.php";
$config = require "config.php";
require "database.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $dd = new Database($config);
    $dd->execute("INSERT INTO books (title, author, publication_year, availability) VALUES (:title, :author, :publication_year, :availability)", [
                ":title" => $_POST['title'],
                ":author" => $_POST['author'],
                ":publication_year" => $_POST['publication_year'],
                ":availability" => $_POST['availability']
                
            ]);
            header("Location: /admin");
            exit();

        }

  





require 'views/create.view.php';