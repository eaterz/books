<?php require "components/head.php"?>
<?php require "components/navbar.users.php" ?>
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
                 <form method="GET" action="/checkout">
            <input id="book_id" name="book_id" type="hidden" value="<?= $post['book_id'] ?>" />
            <button class="yes">Add to cart</button>
        </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php require "components/footer.php" ?>