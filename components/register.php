<?php
$page_title = "Register";
session_start();
$config = require_once "config.php";
require_once "database.php";
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Validate input
    if (empty($username) || empty($password) || empty($confirm_password)) {
        header("Location: /?reg=All fields are required");
        exit();
    } elseif ($password !== $confirm_password) {
        header("Location: /?reg=Passwords do not match");
        exit();
    }

    
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $params = array($username, $password);
    $result2 = $db->execute($sql, $params);
    
    
    if ($result2 === 1) {
        header("Location: /?success=Registration successful. Please login.");
        exit();
    } else {
        header("Location: /");
        exit();
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
