<?php require 'components/head.php' ?>
<h1>Create</h1>
<section>
    <form action="/create" method="post">
        <?php require 'components/book.form.php' ?>
        <button class="yes" type="submit">Create</button>
        <button class="no" type="submit" formaction="/admin" formmethod="get">Cancel</button>
    </form>
</section>
<?php require 'components/footer.php' ?>