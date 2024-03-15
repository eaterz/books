<!DOCTYPE html>
<html>
<head>
    <title>Pieteikšanās</title>
</head>
<body>
    <?php require "components/navbar.php";?>
    <h2>Pieteikšanās</h2>
    <form action="login_process.php" method="post">
        <label for="username">Lietotājvārds:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Parole:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Pieteikties">
    </form>
</body>
</html>