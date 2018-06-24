<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="/admin/category"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>

        <h4>Додати нову категорію</h4>
        <br/>
<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
        <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Заголовок категорії</label>
                    <input type="text" name="title" value="" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3">
                </div>

                    <input type="submit" name="submit" value="Зберегти" class="btn btn-success">
                </div>
            </form>
        </div>
    <br/>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>