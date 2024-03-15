<?php
$config = require "config.php";
require "Database.php";

// Iegūstam datus no formas
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Izveidojam savienojumu ar datu bāzi
$db = new Database($config);

// Reģistrējam jauno lietotāju
$db->registerUser($username, $email, $password);
