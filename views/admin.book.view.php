<?php 
require "components/head.php";


?>
<nav class="nav_bar">
    <ul class="nav_ul">
        <li class="nav_li"><a href="home.php">home</a></li>
    </ul> 
</nav>  
<h1>Library</h1>

<form>
    <input name='id'/>
    <button>Filter by ID</button>
</form>

<ul>
    <?php foreach($posts as $post): 
          $availability = ($post["availability"] == 1) ? "Piejams" : "Nav piejams"; ?>
        <li><?= $post["title"] ?> / <?= $post["author"] ?> / <?= $post["publication_year"] ?> / <?= $availability ?><br>
           <div class="admin_butt">
                <form method="GET" action="/books/edit">
                        <input id="book_id" name="book_id" type="hidden" value=<?=$post['book_id']?> />
                        <button class="blue">Edit</button>
                    </form>

            
            <form action="/books/delete" method="post">
                <input type="hidden" name="book_id" value="<?= $post["book_id"] ?>">
                <button class="red" type="submit">Delete</button>
            </form>
            </div>
        </li>
    
    <?php endforeach; ?>
    
</ul>
<div class="create_butt">
<form action="/create" method="GET">
<button class="add" type="submit">Pievienot Grāmatu</button>
</form>
</div>
<?php 


require "components/footer.php" ?>
