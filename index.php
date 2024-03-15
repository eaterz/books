<?php


$url =parse_url($_SERVER["REQUEST_URI"]) ["path"];

if($url == "/"){
    require "controllers/index.php";
}else if($url == "/book"){
    require "controllers/book.php";
}else{
    http_response_code(404);
    require "controllers/404.php";
}