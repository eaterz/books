<?php
session_start();
$config = require "config.php";
require "database.php";
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Validate input
    if (empty($username) || empty($password) || empty($confirm_password)) {
        header("Location: index.view.php?reg=All fields are required");
        exit();
    } elseif ($password !== $confirm_password) {
        header("Location: index.view.php?reg=Passwords do not match");
        exit();
    }

    
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $params = array($username, $password);
    $result2 = $db->execute($sql, $params);

    
    if ($result2 === 1) {
        header("Location: index.view.php?success=Registration successful. Please login.");
        exit();
    } else {
        header("Location: index.view.php");
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
