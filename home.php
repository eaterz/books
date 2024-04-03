<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <?php require "components/head.php"?>
            <?php if($_SESSION['username'] == "Admin"){ ?>
                <nav class="nav_bar">
                    <ul class="nav_ul">
                        <li class="nav_li"><a href="/admin">edit books</a></li>
                    </ul>
                </nav>
                
            <?php }else{ ?>
                <?php require "components/navbar.users.php";?>
            <?php } ?>

        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        
       <a class="logout" href="/logout">Logout</a>
    </body>
    </html>

    <?php
}else{
    header("Location: views/index.view.php");
    exit();
}
?>