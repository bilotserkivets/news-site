<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="/admin/news"><button type="button" class="btn btn-primary">Управління новинами</button></a>
        <a href="#"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>

        <h4>Редагувати новину#<?php echo $id; ?></h4>
        <br/>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Заголовок новини</label>
                <input type="text" name="title" value="<?php echo $news['title']; ?>" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Текст новини</label>
                <input type="text" name="content" value="<?php echo $news['content']; ?>" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3">
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
                <p>Зображення</p>
                <input type="file" name="image" placeholder="" value="">
                <br/><br/>
                <input type="submit" name="submit" value="Оновити новину" button type="button" class="btn btn-success">
            </div>
        </form>

    </div>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>