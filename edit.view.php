<?php require 'components/head.php' ?>
<h1>Edit book</h1>
<section>
    <form method="POST" action="/books/edit">
    <input id="book_id" name="book_id" type="hidden" value="<?=$post['book_id']?>" />
        <?php require 'components/book.form.php' ?>
        <button class="yes">Save</button>
    </form>
</section>
<?php require 'components/footer.php' ?>