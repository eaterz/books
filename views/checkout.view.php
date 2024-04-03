<?php require 'components/head.php';?>
<?php require 'components/navbar.users.php';?>
    <div class="table-container">
    <form class="checkout" action="/checkout" method="post">
        <table class="book_container checkout">
            <tr>

                <th>Name</th>

            </tr>
            <?php foreach ($books as $book): ?>
                <tr class="book_table">
                    <td><?php echo $book['title'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date" required>
        <br/>
        <button class="yes" type="submit">Borrow Books</button>
    </form>
    </div>
<?php require 'components/footer.php' ?>