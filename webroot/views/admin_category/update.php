<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="#"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>

        <h4>Редагувати категорію#<?php echo $id; ?></h4>
        <br/>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Назва категорії</label>
                <input type="text" name="title" value="<?php echo $category['title']; ?>" placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="3">
            </div>
            <br/>

                <input type="submit" name="submit" value="Зберегти зміни" button type="button" class="btn btn-success">
            </div>
        </form>

    </div>
    <br/>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>