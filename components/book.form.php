<label for="title">Name</label>
<input id="title" name="title" type="text" value="<?=$post['title'] ?? null?>" />
<label for="author">Author</label>
<input id="author" name="author" type="text" value="<?=$post['author'] ?? null?>" />
<label for="publication_year">Release date</label>
<input id="publication_year" name="publication_year" type="date" value='<?=$post['publication_year'] ?? date("Y-m-d")?>' />
<label for="availability">Availability</label>
<select id="availability" name="availability">
    <option value="1" <?= ($book['availability'] ?? 1) == 1 ? 'selected' : '' ?>>Available</option>
    <option value="0" <?= ($book['availability'] ?? 1) == 0 ? 'selected' : '' ?>>Not available</option>
</select>