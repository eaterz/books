<?php
$page_title = "Login";

session_start();
$config = require "config.php";
require "database.php";
$db = new Database($config);
$pdo = $db->getConnection(); // Get PDO connection object

if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$pass = validate($_POST['password']);

if(empty($username)) {
    header("Location: views/index.view.php?log=User Name is required");
    exit();
} elseif(empty($pass)) {
    header("Location: views/index.view.php?log=Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE username=:username AND password=:pass";
$params = array(':username' => $username, ':pass' => $pass);

$result = $db->execute($sql, $params);

if ($result !== false) { // Check if query execution was successful
    if(count($result) === 1) {
        $row = $result[0];
        if($row['username'] === $username && $row['password'] === $pass) {
            echo "Logged in!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: views/index.view.php");
            exit();
        }
    } else {
        // Handle case when username/password combination doesn't match
        header("Location: views/index.view.php?log=Invalid username or password");
        exit();
    }
} else {
    // Handle case when query execution fails
    header("Location: views/index.view.php?log=Database log");
    exit();
}

