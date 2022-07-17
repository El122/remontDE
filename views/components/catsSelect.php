<select name="newCat" id="newCat">
    <?php $cats = getCats(); ?>
    <?php while ($c = mysqli_fetch_assoc($cats)) : ?>
    <option value="<?= $c["c_id"] ?>"><?= $c["c_name"] ?></option>
    <?php endwhile ?>
</select>