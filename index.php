<?php


$url =parse_url($_SERVER["REQUEST_URI"]) ["path"];

if($url == "/"){
    require "controllers/index.php";
}else if($url == "/book"){
    require "controllers/book.php";
}else if($url == "/login"){
    require "controllers/login.php";
}else if($url == "/register"){
    require "controllers/register.php";
}else{
    http_response_code(404);
    require "controllers/404.php";
}