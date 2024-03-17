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
                <a href="book.edit.php">edit books</a>
            <?php }else{ ?>
                <a href="book_users.php">books</a>
            <?php } ?>

        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        
        <a href="logout.php">Logout</a>
    </body>
    </html>

    <?php
}else{
    header("Location: index.view.php");
    exit();
}
?>