
<ul>
    <?php foreach ($borrowed_books as $borrowed_book): ?>
       
        <li>
            <?= $borrowed_book["title"] ?> / <?= $borrowed_book["author"] ?> / <?= $borrowed_book["publication_year"] ?>
            / Borrowed Date: <?= $borrowed_book["borrow_date"] ?> / Return Date: <?= $borrowed_book["return_date"] ?>
        </li>
        <form action="/return" method="post">
             <input type="hidden" name="borrowed_books_id" value="<?= $borrowed_book['book_id'] ?>" />
<button type="submit">Return</button>
</form>
    <?php endforeach; ?>
</ul>

