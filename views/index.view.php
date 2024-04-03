<?php require "components/head.php"; ?>
    <?php require "components/navbar.php"; ?>


    <div class="login-container">
    <form class="login-form" action="/login" method="post">
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
    </div>

    <div class="login-container">
    <form class="login-form" action="/register" method="post">
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
    </div>
</body>
</html>

