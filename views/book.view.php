<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<h1>Library</h1>

<form>
    <input name='id'/>
    <button>Filter by ID</button>
    </form>

<ul>
    <?php foreach($posts as $post): 
          $availability = ($post["availability"] == 1) ? "Piejams" : "Nav piejams"; ?>
        <li><?= $post["title"] ?> / <?= $post["author"] ?> / <?= $post["publication_year"] ?></br>
        </li>
    <?php endforeach; ?>
</ul>

<?php require "components/footer.php" ?>