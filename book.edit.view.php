<?php 
require "components/head.php";


?>
<a href="home.php">home</a>
<h1>Library</h1>

<form>
    <input name='id'/>
    <button>Filter by ID</button>
</form>

<ul>
    <?php foreach($posts as $post): 
          $availability = ($post["availability"] == 1) ? "Piejams" : "Nav piejams"; ?>
        <li><?= $post["title"] ?> / <?= $post["author"] ?> / <?= $post["publication_year"] ?> / <?= $availability ?><br>
           
                <form method="GET" action="edit.php">
                        <input id="book_id" name="book_id" type="hidden" value=<?=$post['book_id']?> />
                        <button class="blu">Edit</button>
                    </form>

            
            <form action="delete.php" method="post">
                <input type="hidden" name="book_id" value="<?= $post["book_id"] ?>">
                <button type="submit">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
    
</ul>

<?php 


require "components/footer.php" ?>
