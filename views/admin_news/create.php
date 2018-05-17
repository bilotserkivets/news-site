<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="/admin/news"><button type="button" class="btn btn-primary">Управління новинами</button></a>
        <a href="/admin/category"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>

        <h4>Додати нову новину</h4>
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
                    <label for="exampleFormControlTextarea1">Заголовок новини</label>
                    <input type="text" name="title" value="" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Текст новини</label>
                    <textarea name="content" value="" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Категорія</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                        <?php if(is_array( $categoriesList)): ?>
                        <?php foreach($categoriesList as $category): ?>
                            <option value="<?php echo $category['id']; ?>">
                                 <?php echo $category['title']; ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </select>
                    <br/>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Зображення</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <br/><br/>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-success">
                </div>
            </form>
        </div>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>