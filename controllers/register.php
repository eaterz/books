<?php
// Pieslēdzamies datu bāzei
require_once "database.php";

// Pārbaudam, vai formas dati ir iesniegti
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Iegūstam datus no formas
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Pārbaudam, vai lietotājvārds un e-pasta adrese jau nav aizņemti
    $query = "SELECT * FROM users WHERE username = :username OR email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(["username" => $username, "email" => $email]);
    $existing_user = $stmt->fetch();

    if ($existing_user) {
        echo "Lietotājvārds vai e-pasta adrese jau ir aizņemta.";
    } else {
        // Paroles hashēšana
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Saglabājam jauno lietotāju datu bāzē
        $query = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["username" => $username, "email" => $email, "password" => $hashed_password]);

        echo "Reģistrācija veiksmīga! Varat pieteikties tagad.";
    }
}


require "views/register.view.php";