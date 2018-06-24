<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<br/>

<div class="col-md-8">
    <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>

    <br/>
    <br/>

    <h4>Редагувати коментар#<?php echo $id; ?></h4>
    <br/>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Зміст коментарію</label>
            <input type="text" name="content" value="<?php echo $comment['content']; ?>" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3">
        </div>
        <p>Статус</p>
        <select name="status">
            <option value="1" <?php if ($comment['status'] == 1) echo ' selected="selected"'; ?>>Відобразити</option>
            <option value="0" <?php if ($comment['status'] == 0) echo ' selected="selected"'; ?>>Приховати</option>
        </select>

        <br/><br/>
        <input type="submit" name="submit" value="Оновити коментар" button type="button" class="btn btn-success">
        </div>
    </form>
    <br/>
</div>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>