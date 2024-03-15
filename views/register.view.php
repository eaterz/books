<!DOCTYPE html>
<html>
<head>
    <title>Reģistrācija</title>
</head>
<body>
    <?php require "components/navbar.php";?>
    <h2>Reģistrācija</h2>
    <form action="register_process.php" method="post">
        <label for="username">Lietotājvārds:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">E-pasta adrese:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Parole:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Reģistrēties">
    </form>
</body>
</html>