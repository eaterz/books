<!DOCTYPE html>
<html>
<head>
    <title>Pieteikšanās</title>
</head>
<body>
    <?php require "navbar.php"; ?>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['log'])) { ?>
            <p class="log"><?php echo $_GET['log']; ?></p>
        <?php } ?>
        <label> User Name</label>
        <input type="text" name="username" placeholder="Lietotājvārds">
        <label>Password</label>
        <input type="password" name="password" placeholder="Parole"><br>

        <button type="submit">Pieteikties</button>
    </form>

    <form action="register.php" method="post">
        <h2>Registration</h2>
        <?php if(isset($_GET['reg'])) { ?>
            <p class="reg"><?php echo $_GET['reg']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <button type="submit">Register</button>
    </form>

</body>
</html>

