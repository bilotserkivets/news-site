<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="/admin/news"><button type="button" class="btn btn-primary">Управління новинами</button></a>
        <a href="/admin/category"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>

        <h4>Видалити коментар #<?php echo $id; ?></h4>


        <p>Ви дійсно хочете видалити коментар?</p>

        <form method="post">
            <input type="submit" name="submit" value="Видалити" class="btn btn-success">
        </form>
    </div>
<br/>

