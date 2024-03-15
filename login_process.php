<?php
// Iekļaujam datu bāzes savienojuma failu
$config = require "config.php";
require_once "database.php";

// Pārbaudam, vai formas dati ir iesniegti
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Iegūstam datus no formas
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Izveidojam SQL pieprasījumu, lai atrastu lietotāju ar norādīto lietotājvārdu
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute(["username" => $username]);
    $user = $stmt->fetch();

    // Pārbaudam, vai lietotājs ir atrasts un vai parole ir pareiza
    if ($user && password_verify($password, $user["password_hash"])) {
        // Autentificējam lietotāju, saglabājot viņa informāciju sesijā
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        // Pārsūtam lietotāju uz galveno lapu pēc pieteikšanās
        header("Location: index.php");
        exit();
    } else {
        // Ja lietotājs netika atrasts vai parole ir nepareiza, attēlojam kļūdas ziņojumu
        echo "Nepareizi lietotājvārds vai parole. Lūdzu, mēģiniet vēlreiz.";
    }
}
?>
