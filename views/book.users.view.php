<?php require "components/head.php";
    require "components/navbar.users.php" ?>
<h1>Library</h1>

<form>
    <input name='id'/>
    <button>Filter by ID</button>
    </form>

<ul>
    <?php foreach($posts as $post): 
          $availability = ($post["availability"] == 1) ? "Piejams" : "Nav piejams"; ?>
        <li><?= $post["title"] ?> / <?= $post["author"] ?> / <?= $post["publication_year"] ?> / <?= $availability ?></br>
            <?php if ($post["availability"] == 1): ?>
                <form action="/checkout" method="post">
                    <input type="hidden" name="book_id" value="<?= $post["book_id"] ?>">
                    <button type="submit">Aizņemties</button>
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php require "components/footer.php" ?>