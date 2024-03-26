<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <?php if($_SESSION['username'] == "Admin"){ ?>
                <a href="/admin">edit books</a>
            <?php }else{ ?>
                <?php require "components/navbar.users.php";?>
            <?php } ?>

        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        
        <a href="/logout">Logout</a>
    </body>
    </html>

    <?php
}else{
    header("Location: views/index.view.php");
    exit();
}
?>